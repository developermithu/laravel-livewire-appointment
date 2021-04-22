<?php

namespace App\Http\Livewire\Admin\Clients;

use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class ClientManagement extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = null;

    // public $name, $email, $password, $password_confirmation; instead of

    public $name;
    public $client_id;
    public $showEditModal = false;
    public $client = null;

    // deleteConfirmed From Delete Component
    protected $listeners = ['deleteConfirmed' => 'destroy'];
    public $removeClient;


    public function addNew()
    {
        $this->showEditModal = false;
        $this->dispatchBrowserEvent('show-form');
    }

    public function create()
    {
        $this->validate([
            'name' => 'required | string',
        ]);

        $client = new Client();
        $client->name = $this->name;
        $client->save();

        $this->name = '';
        $this->dispatchBrowserEvent('hide-form', ['message' => 'Client added successfully.']);
        return back();
    }

    public function edit($client_id)
    {
        $this->showEditModal = true;
        $client = Client::findOrFail($client_id);
        $this->name = $client->name;
        $this->client_id = $client_id;
        $this->dispatchBrowserEvent('show-form');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required | string',
        ]);

        $client = Client::findOrFail($this->client_id);
        $client->name = $this->name;
        $client->save();

        $this->dispatchBrowserEvent('hide-form', ['message' => 'Client updated successfully.']);
        return back();
    }

    public function confirmRemoval($client_id)
    {
        $this->removeClient = $client_id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function destroy()
    {
        $client = Client::findOrFail($this->removeClient);
        $client->delete();
        $this->dispatchBrowserEvent('deleted', ['message' => 'Client deleted successfully']);
        return back();
    }

    public function render()
    {
        $clients = Client::where('name', 'like', '%' . $this->search . '%')->latest()->paginate(5);
        return view('livewire.admin.clients.client-management', compact('clients'));
    }
}
