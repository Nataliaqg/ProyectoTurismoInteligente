<?php

namespace App\Http\Livewire\Admin\Usuario;

use Livewire\Component;
use App\Models\User;

class EditUser extends Component
{

    public $user;

    public $password;

    public $listeners =['save']; 

    protected $rules = [
        'user.name' => 'required|string',
        'user.telefono' => 'required|numeric',
        'user.edad' => 'required|numeric',
        'user.carnetIdentidad' => 'required|unique:users,carnetIdentidad',
        'user.email' => 'required|unique:users,email',
        'password' => 'required'
    ];

    //Capturar dato desde la url
    public function mount(User $user){
        $this->user = $user;
    }


    public function save(User $user){
        
        $rules = $this->rules;

        $rules['user.carnetIdentidad'] = 'required|unique:users,carnetIdentidad,' .$this->user->id;
        $rules['user.email'] = 'required|unique:users,email,'.$this->user->id;


        /* if (!$this->validate($rules)){
            $this->validate($rules);
        } */
        //$this->user = $user;

        $this->user->password = bcrypt($this->password); 
        $this->validate($rules);
        $this->user->save(); 
        
        $this->emit('saved');

        return redirect()->route('admin.users.show');
        

    }

    public function render()
    {
        return view('livewire.admin.usuario.edit-user')->layout('layouts.admin');;
    }
}
