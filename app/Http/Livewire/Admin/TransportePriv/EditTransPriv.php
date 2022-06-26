<?php

namespace App\Http\Livewire\Admin\TransportePriv;

use App\Models\TipoTransPrivado;
use App\Models\TransportePrivado;
use Livewire\Component;

class EditTransPriv extends Component
{
    public $transportePrivado, $tipoTransPrivados, $tipoTransPrivado_id, $tipoTransPrivado_nombre;

    protected $rules =[
        'transportePrivado.precio'=>'required',
        'transportePrivado.capacidadPersonas'=>'required',
        'transportePrivado.tipoTransPrivado_id'=>'nullable'
    ];


    public function mount(TransportePrivado $transportePrivado){
        $this->transportePrivado=$transportePrivado;

        //$tipoTransPrivado=TipoTransPrivado::find($transportePrivado->tipoTransPrivado_id);
       // $this->tipoTransPrivado_nombre=$tipoTransPrivado->nombre;
        $this->tipoTransPrivados=TipoTransPrivado::all();
    }

    public function save(){
        $rules=$this->rules;

       $this->validate($rules);
       
       $this->transportePrivado->save();
       $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.admin.transporte-priv.edit-trans-priv')->layout('layouts.admin');
    }
}
