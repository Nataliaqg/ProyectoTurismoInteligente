<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ContraBitacora extends Component
{
    public $contra;
    Public $error=false;
    

    public function verificar(){

      //  $contraseña = $this->cotraseña;
       if($this->contra=='12345678'){
        
        return redirect()->route('admin.bitacora');
       }else{
           $this->error = true;
       }

    }
    public function render()
    {
        return view('livewire.admin.contra-bitacora')->layout('layouts.admin');
    }
}
