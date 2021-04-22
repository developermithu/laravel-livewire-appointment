<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use App\Models\Client;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Update extends Component
{

    public $state = [];
    public $appointment;

    public function mount(Appointment $appointment)
    {
        $this->state = $appointment->toArray();
        $this->appointment = $appointment;
    }

    public function update()
    {
        $validatedData = Validator::make($this->state, [
            'client_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'note' => 'nullable',
            'status' => 'required',
        ])->validate();

        $this->appointment->update($validatedData);

        $this->dispatchBrowserEvent('success', ['message' => 'Appointment updated successfully.']);
        Toastr::success('success', ['message' => 'Appointment updated successfully.']);
        return redirect()->route('admin.appointments');
        // Toastr::success('success', ['message' => 'Appointment updated successfully.']);
    }



    public function render()
    {
        $clients = Client::all();
        return view('livewire.admin.appointments.update', compact('clients'));
    }
}
