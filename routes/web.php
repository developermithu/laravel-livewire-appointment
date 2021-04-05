<?php

use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Admin\Appointments\AppointmentList;
use App\Http\Livewire\Admin\Users\UserList;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', DashboardController::class)->name('admin.dashboard');
Route::get('admin/users', UserList::class)->name('admin.users');

Route::get('admin/appointments', AppointmentList::class)->name('admin.appointments');