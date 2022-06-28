<?php

namespace App\Http\Livewire\Admin\TransportePriv;

use App\Models\TipoTransPrivado;
use App\Models\TransportePrivado;
use Livewire\Component;
use App\Models\Bitacora;
use App\Models\Categoria;

class CreateTransPriv extends Component
{
    public $transportePrivados;
    public $tipoTransPrivados,$tipoTransPrivado_id;
    public $categorias,$categoria_id;
    public $precio,$capacidadPersonas;

    protected $rules = [
        'precio' => 'required',
        'capacidadPersonas'=>'required',
        'tipoTransPrivado_id' => 'required',
        'categoria_id'=>'required'
    ];

    public function mount()
    {
        $this->transportePrivados=TransportePrivado::all();
        $this->tipoTransPrivados = TipoTransPrivado::all();
        $this->categorias=Categoria::all();
    }

   /* public function getTipoTransPrivadoProperty(){
        return TipoTransPrivado::find($this->tipoTransPrivado_id);
    }*/

    public function save(){
        $rules = $this->rules;
        $this->validate($rules);

        $transportePrivado = new TransportePrivado();
        
        $transportePrivado->tipoTransPrivado_id= $this->tipoTransPrivado_id;
        $transportePrivado->precio=$this->precio;
        $transportePrivado->capacidadPersonas=$this->capacidadPersonas;
        $transportePrivado->categoria_id=$this->categoria_id;

        $transportePrivado->save();
        $bitacora = new Bitacora();
        $bitacora->crear('Transporte Privado Creado'); 
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.admin.transporte-priv.create-trans-priv')->layout('layouts.admin');
    }
}
