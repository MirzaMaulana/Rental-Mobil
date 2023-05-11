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
        $booking = Booking::where('status', '<>', 'Selesai')->get();

        return view(
            'admin.dashboard',
            [
                'users' => $users,
                'units' => $units,
                'booking' => $booking
            ]
        );
    }
    public function order(Cars $car_id)
    {
        return view('pages.order', ['car' => $car_id]);
    }
    public function cars()
    {
        $cars = Cars::all();
        return view('pages.cars', [
            'cars' => $cars
        ]);
    }
    public function pesanan()
    {
        $bookings = Booking::where('user_id', auth()->user()->id)->get();
        return view('pages.pesanan', ['bookings' => $bookings]);
    }
}
