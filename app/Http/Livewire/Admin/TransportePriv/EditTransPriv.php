<?php

namespace App\Http\Livewire\Admin\TransportePriv;

use App\Models\TipoTransPrivado;
use App\Models\TransportePrivado;
use Livewire\Component;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Bitacora;

class EditTransPriv extends Component
{
    public $transportePrivado, $tipoTransPrivados, $tipoTransPrivado_id;

    protected $rules =[
        'transportePrivado.precio'=>'required',
        'transportePrivado.capacidadPersonas'=>'required',
        'transportePrivado.tipoTransPrivado_id'=>'required'
    ];

    protected $listeners = ['refreshTranportePrivado'];

    public function mount(TransportePrivado $transportePrivado){
        $this->transportePrivado=$transportePrivado;

        //$tipoTransPrivado=TipoTransPrivado::find($transportePrivado->tipoTransPrivado_id);
       // $this->tipoTransPrivado_nombre=$tipoTransPrivado->nombre;
        $this->tipoTransPrivados=TipoTransPrivado::all();
    }

    public  function refreshTransportePrivado(){
        $this->transportePrivado=$this->transportePrivado->fresh();
    }

    public function save(){
        $rules=$this->rules;

       $this->validate($rules);
       
       $this->transportePrivado->save();
       $bitacora = new Bitacora();
       $bitacora->crear('Transporte Privado Editado'); 
       $this->emit('saved');
    }

    public function deleteImage(Image $image)
    {
        Storage::delete([$image->url]);
        $image->delete();
        $this->transportePrivado=$this->transportePrivado->fresh();
    }

    public function render()
    {
        return view('livewire.admin.transporte-priv.edit-trans-priv')->layout('layouts.admin');
    }
}
