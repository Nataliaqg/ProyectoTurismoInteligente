<?php

namespace App\Http\Livewire\Admin\Usuario;

use App\Models\Bitacora;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;
    public $search;

    public function UpdatingSearch(){
        $this->resetPage();
    }

    public function assignRole(User $user, $value){
        if ($value == '1'){
            $user->assignRole('admin');
            $bitacora = new Bitacora();
            $bitacora->crear('Rol Asiganado a : '. $user->name);    
        }else{
            $user->removeRole('admin');
            $bitacora = new Bitacora();
            $bitacora->crear('Rol Removido a : '. $user->name);  
        }
    }

    public function render()
    {
        $users = User::where('email', '<>', auth()->user()->email)
                    ->where(function($query){
                        $query->where('name', 'LIKE', '%' . $this->search . '%');
                        $query->orWhere('email', 'LIKE', '%' . $this->search . '%');
                    })->paginate();

        return view('livewire.admin.usuario.user-component', compact('users'))->layout('layouts.admin');;
    }
}
