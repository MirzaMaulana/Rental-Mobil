<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Unit;
use App\Models\Booking;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        //memvalidasi input 
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'days' => ['required', 'integer'],
            'alamat' => ['required', 'max:255'],
            'nomer_hp' => ['required'],
            'total_price' => ['required', 'integer'],
            'bukti_image' => ['required'],
            'driver' => ['required', 'boolean'],
        ]);

        $filename = $request->bukti_image->getClientOriginalName();
        $request->bukti_image->storeAs('public/pembayaran', $filename);

        $data = [
            'name' => $validatedData['name'],
            'days' => $validatedData['days'],
            'user_id' => auth()->user()->id,
            'car_id' => $request->car_id,
            'nomer_hp' => $validatedData['nomer_hp'],
            'total_price' => $validatedData['total_price'],
            'driver' => $validatedData['driver'],
            'bukti_image' => $filename,
            'alamat' => $validatedData['alamat'],
        ];

        //menyimpan data
        $booking = Booking::create($data);
        return redirect('/cars')->with('success', 'Anda Berhasil Membuat Pesanan Mohon Menunggu Admin Untuk Menkonfirmasi');
    }

    public function index()
    {
        $booking = Booking::all();
        $driver = Driver::where('status', '=', 'Tersedia')->get();
        $unit = Unit::where('status', '=', 'Tersedia')->get();

        return view('admin.administrasi.listpemesanan', [
            'drivers' => $driver,
            'units' => $unit,
            'bookings' => $booking,
        ]);
    }
    public function list(Request $request)
    {
        return datatables()
            ->eloquent(Booking::query()->where('status', '=', 'Pending')->latest())
            ->addColumn('action', function ($booking) {
                return '
            <div class="d-flex">
            <form onsubmit="destroy(event)" action="' .  route('booking.destroy', $booking->id) . '" method="POST">
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
                data-bs-target="#ModalConfirm' . $booking->id . '"
                >
                    <i class="fa fa-pen-alt"></i>
                </button>
                </div>
            
                            

        ';
            })
            ->addColumn('car_name', function ($unit) {
                return $unit->car->name;
            })

            ->addColumn('driver', function ($driver) {
                $driver = $driver->driver == '1' ? '<small class="badge badge-success">IYA</small>' : '<small class="badge badge-danger">TIDAK</small>';
                return $driver;
            })

            ->addColumn('bukti_image', function ($booking) {
                return '<img id="bukti" src="' . asset('storage/pembayaran/' . $booking->bukti_image) . '" alt="' . $booking->bukti_image . '" height="50" />';
            })

            ->addColumn('status', function ($booking) {
                return '<small class="badge badge-warning">' . $booking->status . '</small>';
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }
    public function confirm(Request $request, Booking $booking)
    {
        $validatedData = $request->validate([
            'status' => ['required'],
            'unit_id' => ['required'],
            'car_id' => ['required']
        ]);

        // Memanipulasi Unit
        $unit = Unit::where('id', $validatedData['unit_id'])->first();
        $unit->status = 'Disewa';
        $unit->update();

        // Mengurangi jumlah Unit di tabel car
        $car = Cars::where('id', $validatedData['car_id'])->first();
        $car->jumlah_unit -= 1;
        $car->save();


        $data = [
            'status' => $validatedData['status'],
            'unit_id' => $validatedData['unit_id'],
        ];

        // Memanipulasi driver (jika ada)
        if ($request->has('driver_id')) {
            $driver = Driver::find($request->driver_id);
            if ($driver) {
                $driver->status = 'Disewa';
                $driver->save();
                $data['driver_id'] = $driver->id;
            }
        }

        // Mengupdate data booking
        $booking->update($data);

        toastr()->success('Sukses Mengkonfirmasi data pesanan');
        return redirect()->back();
    }

    public function return(Request $request, Booking $booking)
    {
        $validatedData = $request->validate([
            'status' => ['required'],
            'unit_id' => ['required'],
            'car_id' => ['required']
        ]);

        // Memanipulasi Unit
        $unit = Unit::where('id', $validatedData['unit_id'])->first();
        $unit->status = 'Tersedia';
        $unit->update();

        // Mengurangi jumlah Unit di tabel car
        $car = Cars::where('id', $validatedData['car_id'])->first();
        $car->jumlah_unit += 1;
        $car->save();

        $data = [
            'status' => $validatedData['status'],
            'unit_id' => $validatedData['unit_id'],
        ];

        // Memanipulasi driver (jika ada)
        if ($request->has('driver_id')) {
            $driver = Driver::find($request->driver_id);
            if ($driver) {
                $driver->status = 'Tersedia';
                $driver->save();
                $data['driver_id'] = $driver->id;
            }
        }

        // Mengupdate data booking
        $booking->update($data);

        toastr()->success('Sukses Mengembalikan Kendaraan');
        return redirect()->back();
    }

    public function destroy(Booking $booking)
    {
        $path = public_path('storage/public/pembayaran/' . $booking->bukti_image);
        if (File::exists($path)) {
            File::delete($path);
        }
        $booking->delete();

        return redirect()->back();
        toastr()->success('Sukses Menghapus');
    }
}
