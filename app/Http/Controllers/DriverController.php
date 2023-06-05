<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $driver = Driver::all();
        return view('admin.driver.list', ['drivers' => $driver]);
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

        toastr()->success('Sukses Menambahkan Driver');
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
             <button
                type="button"
                class="btn btn-primary btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#ModalEdit' . $driver->id . '"
                >
                    <i class="fa fa-pen-alt"></i>
                </button>
             </div>  
        ';
            })
            ->addColumn('status', function ($driver) {
                $status = $driver->status == 'Disewa' ? '<small class="badge badge-warning">' . $driver->status . '</small>' : '<small class="badge badge-success">' . $driver->status . '</small>';
                return $status;
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
    public function update(Request $request, Driver $driver)
    {
        $validatedData = $request->validate([
            'status' => ['required'],
        ]);
        $driver->update($validatedData);

        return redirect()->back();
    }
}
