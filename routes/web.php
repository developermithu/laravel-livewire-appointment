<?php

use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Admin\Appointments\AppointmentList;
use App\Http\Livewire\Admin\Appointments\Create;
use App\Http\Livewire\Admin\Appointments\Update;
use App\Http\Livewire\Admin\Clients\ClientManagement;
use App\Http\Livewire\Admin\Test;
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

// Users
Route::get('admin/users', UserList::class)->name('admin.users');

// Clients
Route::get('admin/clients', ClientManagement::class)->name('admin.clients');

// Appointments
Route::get('admin/appointments', AppointmentList::class)->name('admin.appointments');
Route::get('admin/appointments/create', Create::class)->name('admin.appointments.create');
Route::get('admin/appointments/{appointment}/edit', Update::class)->name('admin.appointments.edit');
