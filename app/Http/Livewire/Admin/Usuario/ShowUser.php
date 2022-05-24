<?php

namespace App\Http\Livewire\Admin\Usuario;

use App\Models\User;
use Livewire\Component;

class ShowUser extends Component
{

    public $search;

    public function render()
    {
        $users = User::paginate(10);

        return view('livewire.admin.usuario.show-user', compact('users'))->layout('layouts.admin');
    }
}
