<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class ListController extends Controller
{

    public function sewa()
    {
        return view('admin.administrasi.listsewa');
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
                <input type="hidden" name="status" value="Selesai">
                <button class="btn-success btn btn-sm">
                Selesai
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
            <form onsubmit="destroy(event)" action="' .  route('booking.destroy', $booking->id) . '" method="POST">
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
