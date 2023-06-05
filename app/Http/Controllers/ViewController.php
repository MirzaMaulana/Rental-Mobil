<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Unit;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function welcome()
    {
        return view('pages.home', ["cars" => Cars::inRandomOrder()->limit(3)->get(),]);
    }
    public function dashboard()
    {
        $users = User::all();
        $units = Unit::all();
        $new_order = Booking::where('status', 'Pending')->count();
        $pendapatan = Booking::sum('total_price');
        $booking = Booking::where('status', '<>', 'Selesai')->get();

        return view(
            'admin.dashboard',
            [
                'users' => $users,
                'pendapatan' => $pendapatan,
                'units' => $units,
                'booking' => $booking,
                'new_order' => $new_order
            ]
        );
    }
    public function order(Cars $car_id)
    {
        return view('pages.order', ['car' => $car_id]);
    }
    public function cars(Request $request)
    {
        if ($request->search) {
            $cars = Cars::where('name', 'like', '%' . $request->search . '%')->get();
        } else {
            $cars = Cars::all();
        }

        return view('pages.cars', [
            'cars' => $cars
        ]);
    }
    public function pesanan()
    {
        $bookings = Booking::where('user_id', auth()->user()->id)->latest('created_at')->get();
        return view('pages.pesanan', ['bookings' => $bookings]);
    }

    public function about()
    {
        return view('pages.about');
    }
}
