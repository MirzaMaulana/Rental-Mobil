<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        return view('admin.driver.list');
    }
    public function store(Request $request)
    {
        //memvalidasi input
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'alamat' => ['required', 'max:255'],
            'nomer_hp' => ['required', 'integer'],
            'jenis_kelamin' => ['required', 'string'],
        ]);

        $data = [
            'name' => $validatedData['name'],
            'alamat' => $validatedData['alamat'],
            'nomer_hp' => $validatedData['nomer_hp'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
        ];

        //menyimpan data
        $driver = Driver::create($data);

        return redirect()->back();
    }

    public function list(Request $request)
    {
        return datatables()
            ->eloquent(Driver::query()->when(!$request->order, function ($query) {
                $query->latest('created_at');
            }))
            ->addIndexColumn('DT_RowIndex')
            ->addColumn('action', function ($driver) {
                return '
            <div class="d-flex">
            <form onsubmit="destroy(event)" action="' .  route('driver.destroy', $driver->id) . '" method="POST">
            <input type="hidden" name="_token" value="' . @csrf_token() . '">
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn-danger btn btn-sm  mr-2">
            <i class="fa fa-trash"></i>
            </button>
            </td>
            </form>
             <a href="" class="btn btn-sm btn-primary rounded"><i class="fa fa-pen"></i></a>
             </div>  
        ';
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }
    public function destroy(Driver $driver)
    {
        $driver->delete();

        return redirect()->back();
    }
}
