<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function store(Request $request)
    {
        // Memvalidasi input
        $validatedData = $request->validate([
            'plat_nomer' => ['required', 'max:255'],
            'status' => ['required', 'max:255'],
            'car_id' => ['required', 'exists:cars,id'],
        ]);

        // Membuat unit baru
        $unit = Unit::create($validatedData);

        // Menambahkan 1 ke jumlah_unit pada mobil yang sesuai
        $car = Cars::find($request->car_id);
        $car->jumlah_unit += 1;
        $car->save();

        toastr()->success("Sukses Menambahkan Unit Di $car->name");
        return redirect()->back();
    }

    public function index()
    {
        $units = Unit::all();
        $cars = Cars::all();
        return view('admin.cars.unitlist', ['units' => $units, 'cars' => $cars]);
    }

    public function list(Request $request)
    {
        return datatables()
            ->eloquent(Unit::query()->when(!$request->order, function ($query) {
                $query->latest('created_at');
            }))
            ->addColumn('action', function ($unit) {
                return '
            <div class="d-flex">
                <form onsubmit="destroy(event)" action="' .  route('unit.destroy', $unit->id) . '" method="POST">
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
                data-bs-target="#ModalEdit' . $unit->id . '"
                >
                    <i class="fa fa-pen-alt"></i>
                </button>
            </div>
        ';
            })
            ->addColumn('car_name', function ($unit) {
                return $unit->car->name;
            })
            ->addColumn('status', function ($unit) {
                $status = $unit->status == 'Tersedia' ? '<small class="badge badge-primary">' . $unit->status . '</small>' :
                    '<small class="badge badge-warning">' . $unit->status . '</small>';
                return $status;
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => ['required'],
            'car_id' => ['required', 'integer'],
        ]);


        //jika status diubah ke dalam peminjaman maka kurangi unit di table cars
        if ($validatedData['status'] == 'Disewa') {
            if ($validatedData['status'] != Unit::find($id)->status) {
                ///mengurangi unit
                $car = Cars::find($validatedData['car_id']);
                $car->jumlah_unit -= 1;
                $car->save();
            }
        }
        //jika status diubah ke pengembalian maka kembalikan unit di table cars
        elseif ($validatedData['status'] == 'Tersedia') {
            if ($validatedData['status'] != Unit::find($id)->status) {
                // Menambah unit
                $car = Cars::find($validatedData['car_id']);
                $car->jumlah_unit += 1;
                $car->save();
            }
        }

        $unit = Unit::where('id', $id);
        toastr()->success('Sukses Mengupdate data unit');;
        $unit->update($validatedData);
        return redirect()->back();
    }
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->back();
        toastr()->success("Sukses Menghapus Unit dari $unit->car");
    }
}
