<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ListController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ViewController::class, 'welcome'])->name('home');

Auth::routes();

Route::get('/dashboard', [ViewController::class, 'dashboard'])->middleware(['auth', 'admin'])->name('dashboard');

Route::get('/cars', [ViewController::class, 'cars'])->name('cars');
Route::get('/cars/order/{car_id}', [ViewController::class, 'order'])->name('order');

Route::middleware(['auth'])->group(function () {
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.input');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('car')->group(function () {
        Route::controller(CarsController::class)->group(function () {
            Route::get('/create', 'create')->name('car.create');
            Route::post('/store', 'store')->name('car.input');
            Route::delete('/{car}', 'destroy')->name('car.destroy');
            Route::get('/index',  'list')->name('car.list');
            Route::get('/list',  'index')->name('car.index');
        });
    })->name('car');

    Route::prefix('unit')->group(function () {
        Route::controller(UnitController::class)->group(function () {
            Route::post('/store', 'store')->name('unit.input');
            Route::delete('/destroy/{unit}', 'destroy')->name('unit.destroy');
            Route::put('/{unit}', 'update')->name('unit.update');
            Route::get('/index',  'list')->name('unit.list');
            Route::get('/list',  'index')->name('unit.index');
        });
    })->name('unit');

    Route::prefix('driver')->group(function () {
        Route::controller(DriverController::class)->group(function () {
            Route::post('/store', 'store')->name('driver.input');
            Route::delete('/{driver}', 'destroy')->name('driver.destroy');
            Route::get('/index',  'list')->name('driver.list');
            Route::get('/list',  'index')->name('driver.index');
        });
    })->name('driver');

    Route::prefix('booking')->group(function () {
        Route::controller(BookingController::class)->group(function () {
            Route::delete('/{booking}', 'destroy')->name('booking.destroy');
            Route::put('/update/{booking}', 'update')->name('booking.update');
            Route::get('/index',  'list')->name('booking.list');
            Route::get('/list',  'index')->name('booking.index');
        });
        Route::get('/index/sewa', [ListController::class, 'listSewa'])->name('booking.sewa.list');
        Route::get('/list/sewa', [ListController::class, 'sewa'])->name('booking.sewa');
        Route::get('/index/selesai', [ListController::class, 'listSelesai'])->name('booking.selesai.list');
        Route::get('/list/selesai', [ListController::class, 'selesai'])->name('booking.selesai');
    })->name('booking');
});
