<?php

namespace App\Http\Livewire\Admin\TransportePriv;

use App\Models\TipoTransPrivado;
use App\Models\TransportePrivado;
use Livewire\Component;

class CreateTransPriv extends Component
{
    public $tipoTransPrivados,$tipoTransPrivado_id;
    public $precio,$capacidadPersonas;

    protected $rules = [
        'tipoTransPrivado_id' => 'required',
        'precio' => 'required',
        'capacidadPersonas'=>'required'
    ];

    public function mount()
    {
        $this->tipoTransPrivados = TipoTransPrivado::all();
    }

    public function getTipoTransPrivadoProperty(){
        return TipoTransPrivado::find($this->tipoTransPrivado_id);
    }

    public function save(){
        $rules = $this->rules;
        $this->validate($rules);

        $transportePrivado = new TransportePrivado();
        $transportePrivado->tipoTransPrivado_id= $this->tipoTransPrivado_id;
        $transportePrivado->precio=$this->precio;
        $transportePrivado->capacidadPersonas=$this->capacidadPersonas;

        $transportePrivado->save();

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.admin.transporte-priv.create-trans-priv');
    }
}
