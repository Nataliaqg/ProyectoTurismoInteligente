<?php

namespace App\Http\Livewire\Admin\Usuario;

use App\Models\User;
use Livewire\Component;

class CreateUser extends Component
{

    public $name,$telefono,$edad,$carnetIdentidad,$email,$password;  

    

    protected $rules = [
        'name' => 'required|string',
        'telefono' => 'required|numeric',
        'edad' => 'required|numeric',
        'carnetIdentidad' => 'required|numeric|unique:users',
        'email' => 'required|unique:users',
        'password' => 'required'
    ];

   

    public function save(){
        $this->validate(); 

        $user = new User();
        $user->name = $this->name;
        $user->telefono = $this->telefono;
        $user->edad = $this->edad;
        $user->carnetIdentidad = $this->carnetIdentidad;
        $user->email = $this->email;
        $user->password = bcrypt($this->password); 

        $user->save();

        $this->emit('saved');

        return redirect()->route('admin.users.show');
    }

    public function render()
    {
        return view('livewire.admin.usuario.create-user')->layout('layouts.admin');
    }
}
