<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // public $name, $email, $password, $password_confirmation; instead of

    public $state = [];
    public $showEditModal = false;
    public $user = null;
    public $removeUser;

    public function addNew()
    {
        $this->showEditModal = false;
        $this->dispatchBrowserEvent('show-form');
    }

    public function creatUser()
    {
        // dd($this->state);
        $validatedData = Validator::make($this->state, [
            'name' => 'required | string',
            'email' => 'required | email | unique:users',
            'password' => 'required | confirmed | min:6',
        ])->validate();

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        $this->state = [];
        $this->dispatchBrowserEvent('hide-form', ['message' => 'User added successfully.']);
        return redirect()->back();
    }

    public function edit(User $user)
    {
        // dd($user->toArray());
        $this->showEditModal = true;
        $this->user = $user;
        $this->state = $user->toArray();
        $this->dispatchBrowserEvent('show-form');
    }

    public function updateUser()
    {
        // dd($this->state);
        $validatedData = Validator::make($this->state, [
            'name' => 'required | string',
            'email' => 'required | email | unique:users,email,' . $this->user->id,
            'password' => 'sometimes | confirmed | min:6',
        ])->validate();

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }
        $this->user->update($validatedData);
        $this->dispatchBrowserEvent('hide-form', ['message' => 'User updated successfully.']);
        return redirect()->back();
    }

    public function confirmUserRemoval($userId)
    {
        // dd($userId);
        $this->removeUser = $userId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteUser()
    {
        // dd($userId);
        $user = User::findOrFail($this->removeUser);
        $user->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'User deleted successfully.']);
    }

    public function render()
    {
        $users = User::latest()->paginate(5);
        return view('livewire.admin.users.user-list', compact('users'));
    }
}
