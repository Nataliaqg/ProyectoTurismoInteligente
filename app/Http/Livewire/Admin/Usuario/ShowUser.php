<?php

namespace App\Http\Livewire\Admin\Usuario;

use App\Models\User;
use Livewire\Component;

class ShowUser extends Component
{

    public $search;

    public function render()
    {
        $users = User::where('email', '<>', auth()->user()->email)
             ->where(function($query){
            $query->where('name', 'LIKE', '%' . $this->search . '%');
            $query->orWhere('email', 'LIKE', '%' . $this->search . '%');
            $query->orWhere('carnetIdentidad', 'LIKE',  $this->search );
            $query->orWhere('telefono', 'LIKE', $this->search );
            $query->orWhere('edad', 'LIKE', $this->search);
        })->paginate(10);

        return view('livewire.admin.usuario.show-user', compact('users'))->layout('layouts.admin');
    }
}
