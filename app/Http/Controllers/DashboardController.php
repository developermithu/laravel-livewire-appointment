<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __invoke(Request $request)
    {
        $data['users'] = User::count();
        $data['clients'] = Client::count();
        $data['appointments'] = Appointment::count();

        return view('admin.dashboard', $data);
    }
}
