<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;
use Livewire\WithPagination;

class AppointmentList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.admin.appointments.appointment-list');
    }
}
