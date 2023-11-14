<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserList extends Component
{
    public $users;

    protected $listeners = [
        'loadUsers'
    ];

    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $this->users = User::all();
    }

    public function editUser($user_id)
    {
        $this->dispatch('edit', $user_id);
    }

    public function deleteUser($user_id)
{
    $user = User::find($user_id);

    if ($user) {
        $user->articles()->delete();
        $user->delete();
        session()->flash('success', 'User successfully deleted');
        $this->loadUsers();
    } else {
        session()->flash('error', 'User not found');
    }
}

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.user-list', [
            'utenti' => User::paginate(4),
        ]);
    }
   
}
