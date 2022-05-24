<?php

namespace App\Http\Livewire\Admin\Agencia;

use App\Models\Agencia;
use App\Models\Bitacora;
use Livewire\Component;

class EditAgencia extends Component
{
    public $agencia;

    public $nombre,$tipo;

    public $listeners =['save'];

    protected $rules =[
        'agencia.nombre' => 'required',
        'agencia.tipo' => 'required'
    ];


    //Capturar informacion que se manda desde la URL

    public function mount(Agencia $agencia){
        $this->agencia = $agencia;
    }

    public function save(){
        $this->validate();
        
        $this->agencia->save();

        $this->emit('saved');
        $bitacora = new Bitacora();
        $bitacora->crear('Agencia: ' .$this->agencia->nombre .' Actualizada'); 

        return redirect()->route('admin.agencias.show');
    }

    public function render()
    {
        return view('livewire.admin.agencia.edit-agencia')->layout('layouts.admin');

    }
}
