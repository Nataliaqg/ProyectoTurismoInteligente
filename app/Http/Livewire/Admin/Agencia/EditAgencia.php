<?php

namespace App\Http\Livewire\Admin\Agencia;

use App\Models\Agencia;
use App\Models\Bitacora;
use App\Models\TipoAgencia;
use Livewire\Component;

class EditAgencia extends Component
{
    public $agencia,$tipoAgencias;

    public $nombre,$tipoAgencia_id;

    public $listeners =['save'];

    protected $rules =[
        'agencia.nombre' => 'required',
        'agencia.tipoAgencia_id' => 'required'
    ];


    //Capturar informacion que se manda desde la URL

    public function mount(Agencia $agencia){
        $this->agencia = $agencia;
        $this->tipoAgencias = TipoAgencia::all();
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
