<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class ListController extends Controller
{

    public function sewa()
    {
        $booking = Booking::where('status', 'Disewa')->get();
        return view('admin.administrasi.listsewa', [
            'bookings' => $booking
        ]);
    }

    public function selesai()
    {
        return view('admin.administrasi.listselesai');
    }

    public function listSewa(Request $request)
    {
        return datatables()
            ->eloquent(Booking::query()->where('status', '=', 'DiSewa')->latest())
            ->addColumn('action', function ($booking) {
                return '
            <div class="d-flex">
            <form action="' .  route('booking.destroy', $booking->id) . '" method="POST">
            <input type="hidden" name="_token" value="' . @csrf_token() . '">
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn-danger btn btn-sm  mr-2">
            <i class="fa fa-trash"></i>
            </button>
            </td>
            </form>    
            <button
                type="button"
                class="btn btn-success btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#ModalReturn' . $booking->id . '"
                >
                    <i class="fa fa-check"></i>
             </button>    
            </div>                
        ';
            })
            ->addColumn('car_name', function ($booking) {
                return $booking->car->name;
            })

            ->addColumn('unit', function ($booking) {
                return $booking->unit->plat_nomer;
            })

            ->addColumn('driver', function ($driver) {
                $driver = $driver->driver == '1' ? '<small class="badge badge-success">IYA</small>' : '<small class="badge badge-danger">TIDAK</small>';
                return $driver;
            })

            ->addColumn('bukti_image', function ($booking) {
                return '<img id="bukti" src="' . asset('storage/pembayaran/' . $booking->bukti_image) . '" alt="' . $booking->bukti_image . '" height="50" />';
            })

            ->addColumn('status', function ($booking) {
                return '<small class="badge badge-primary">' . $booking->status . '</small>';
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }

    public function listSelesai(Request $request)
    {
        return datatables()
            ->eloquent(Booking::query()->where('status', '=', 'Selesai')->latest())
            ->addColumn('action', function ($booking) {
                return '
            <div class="d-flex">
            <form action="' .  route('booking.destroy', $booking->id) . '" method="POST">
            <input type="hidden" name="_token" value="' . @csrf_token() . '">
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn-danger btn btn-sm  mr-2">
            <i class="fa fa-trash"></i>
            </button>
            </td>
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
                return '<small class="badge badge-success">' . $booking->status . '</small>';
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }
}
