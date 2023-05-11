<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Unit;
use App\Models\Booking;
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

        return redirect('/cars');
    }

    public function index()
    {
        return view('admin.administrasi.listpemesanan');
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
        
            <form action="' . route("booking.update", $booking->id) . '" method="POST">
                <input type="hidden" name="_token" value="' . @csrf_token() . '">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="car_id" value="' . $booking->car_id . '">
                <input type="hidden" name="status" value="Disewa">
                <button class="btn-info btn btn-sm">
                Confirm
                </button>
            </form>
            
                            

        ';
            })
            ->addColumn('car_name', function ($unit) {
                return $unit->car->name;
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
    public function update(Request $request, Booking $booking)
    {
        $validatedData = $request->validate([
            'status' => ['required'],
            'car_id' => ['required', 'integer'],
        ]);


        //jika status diubah ke dalam peminjaman maka kurangi unit di table cars
        if ($validatedData['status'] == 'Disewa') {
            //mengurangi unit
            $car = Cars::find($validatedData['car_id']);
            $car->jumlah_unit -= 1;
            $car->save();
        }
        //jika status diubah ke pengembalian maka kembalikan unit di table cars
        elseif ($validatedData['status'] == 'Selesai') {
            //menambah unit
            $car = Cars::find($validatedData['car_id']);
            $car->jumlah_unit += 1;
            $car->save();
        }

        $booking->update($validatedData);

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
    }
}
