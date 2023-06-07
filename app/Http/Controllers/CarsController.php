<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarsController extends Controller
{
    public function index()
    {
        $cars = Cars::all();
        return view('admin.cars.list', ['cars' => $cars]);
    }

    public function list(Request $request)
    {
        return datatables()
            ->eloquent(Cars::query()->when(!$request->order, function ($query) {
                $query->latest('created_at');
            }))
            ->addIndexColumn('DT_RowIndex')
            ->addColumn('action', function ($car) {
                return '
            <div class="d-flex">
            <form onsubmit="destroy(event)" action="' .  route('car.destroy', $car->id) . '" method="POST">
            <input type="hidden" name="_token" value="' . @csrf_token() . '">
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn-danger btn btn-sm  mr-2">
            <i class="fa fa-trash"></i>
            </button>
            </td>
            </form>
            <a href="' . route('car.edit', $car->id) . '" class="btn btn-sm btn-primary rounded"><i class="fa fa-pen"></i></a>
             </div>  
        ';
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }


    public function create()
    {
        return view('admin.cars.add');
    }

    public function destroy(Cars $car)
    {
        $path = public_path('storage/public/cars/' . $car->image);
        if (File::exists($path)) {
            File::delete($path);
        }
        $car->delete();

        return redirect()->back();

        toastr()->success('Sukses Menghapus Mobil');
    }

    public function store(Request $request)
    {
        //memvalidasi input
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'image' => ['required'],
            'type' => ['required', 'max:255'],
            'seats' => ['required'],
            'price' => ['required', 'integer'],
            'bensin' => ['required', 'string'],
            'gear' => ['required', 'string'],
            'status' => ['required'],
        ]);

        $filename = $request->image->getClientOriginalName();
        $request->image->storeAs('public/cars', $filename);

        $data = [
            'name' => $validatedData['name'],
            'image' => $filename,
            'type' => $validatedData['type'],
            'seats' => $validatedData['seats'],
            'price' => $validatedData['price'],
            'bensin' => $validatedData['bensin'],
            'gear' => $validatedData['gear'],
            'jumlah_unit' => 0,
            'status' => $validatedData['status'],
        ];


        //menyimpan data
        $car = Cars::create($data);

        toastr()->success('Sukses Menambahkan Mobil');
        return redirect('/car/list');
    }
    public function edit($id)
    {
        $car = Cars::find($id);
        return view('admin.cars.editcar', ['car' => $car]);
    }

    public function update(Request $request, Cars $car)
    {
        //memvalidasi input
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'type' => ['required', 'max:255'],
            'seats' => ['required'],
            'price' => ['required', 'integer'],
            'bensin' => ['required', 'string'],
            'gear' => ['required', 'string'],
            'status' => ['required'],
        ]);

        if ($request->image) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('public/cars', $filename);
            $data = ['image' => $filename];
        }


        $data = [
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'seats' => $validatedData['seats'],
            'price' => $validatedData['price'],
            'bensin' => $validatedData['bensin'],
            'gear' => $validatedData['gear'],
            'status' => $validatedData['status'],
        ];


        //menyimpan data
        $car = Cars::find($car->id);

        $car->update($data);
        toastr()->success('Sukses Mengupdate Mobil');
        return redirect('/car/list');
    }
}
