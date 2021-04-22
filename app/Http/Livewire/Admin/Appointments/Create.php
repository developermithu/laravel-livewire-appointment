<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Brian2694\Toastr\Facades\Toastr;

class Create extends Component
{

    public $state = [];

    public function create()
    {
        $validatedData = Validator::make($this->state, [
            'client_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'note' => 'nullable',
            'status' => 'required',
        ])->validate();

        Appointment::create($validatedData);

        // $this->dispatchBrowserEvent('success', ['message' => 'Appointment added successfully.']);
        Toastr::success('Appointment added successfully');
        return redirect()->route('admin.appointments');
    }

    public function render()
    {
        $clients = Client::orderBy('name', 'asc')->get();
        return view('livewire.admin.appointments.create', compact('clients'));
    }
}
