<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;

class AppointmentList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $status = null;
    protected $queryString = ['status'];  //livewire default queryString for URL

    // deleteConfirmed From Delete Component
    protected $listeners = ['deleteConfirmed' => 'destroy'];
    public $removeAppointment;

    public function confirmRemoval($appointment_id)
    {
        $this->removeAppointment = $appointment_id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function destroy()
    {
        $appointment = Appointment::findOrFail($this->removeAppointment);
        $appointment->delete();
        $this->dispatchBrowserEvent('deleted', ['message' => 'Appointment deleted']);
        return back();
    }

    public function appointmentFilterByStatus($status = null)
    {
        $this->resetPage();  //livewire for working filter and pagination url
        $this->status = $status;
    }

    public function render()
    {
        $data['appointments'] = Appointment::when($this->status, function ($query, $status) {
            return $query->where('status', $status);
        })
            ->latest()->paginate(5);

        $data['appointmentCount'] = Appointment::count();
        $data['appointmentScheduledCount'] = Appointment::where('status', 'scheduled')->count();
        $data['appointmentClosedCount'] = Appointment::where('status', 'closed')->count();

        return view('livewire.admin.appointments.appointment-list', $data);
    }
}
