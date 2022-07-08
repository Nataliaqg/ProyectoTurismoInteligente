<?php

namespace App\Http\Livewire\Admin\TransportePriv;

use App\Models\TipoTransPrivado;
use App\Models\TransportePrivado;
use Livewire\Component;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Bitacora;
use App\Models\Categoria;
use Livewire\WithFileUploads;

class EditTransPriv extends Component
{
    use WithFileUploads;
    public $transportePrivado, $tipoTransPrivados, $tipoTransPrivado_id;
    public $categorias, $categoria_id;
    public $imagen;

    protected $rules = [
        'transportePrivado.precio' => 'required',
        'transportePrivado.capacidadPersonas' => 'required',
        'transportePrivado.tipoTransPrivado_id' => 'required',
        'transportePrivado.categoria_id' => 'nullable'
    ];

    protected $listeners = ['refreshTranportePrivado'];

    public function mount(TransportePrivado $transportePrivado)
    {
        $this->transportePrivado = $transportePrivado;

        //$tipoTransPrivado=TipoTransPrivado::find($transportePrivado->tipoTransPrivado_id);
        // $this->tipoTransPrivado_nombre=$tipoTransPrivado->nombre;
        $this->tipoTransPrivados = TipoTransPrivado::all();
        $this->categorias = Categoria::all();
    }

    public  function refreshTransportePrivado()
    {
        $this->transportePrivado = $this->transportePrivado->fresh();
    }

    public function saveI()
    {

        $url =  "https://bnzv-clinica-salud-s3.s3.us-east-1.amazonaws.com/" . $this->imagen->store("documentos", "s3");
    }
    public function save()
    {
        $rules = $this->rules;

        $this->validate($rules);
        //guardar imagen
        foreach ($this->imagen as $im) {
            $url =  "https://bnzv-clinica-salud-s3.s3.us-east-1.amazonaws.com/" . $im->store("documentos", "s3");
            $this->transportePrivado->images()->create(
                [
                    'url' => $url
                ]
            );
        }

        //---------------------------
        $this->transportePrivado->save();
        $bitacora = new Bitacora();
        $bitacora->crear('Transporte Privado Editado');
        $this->emit('saved');
    }

    public function deleteImage(Image $image)
    {
        Storage::delete([$image->url]);
        $image->delete();
        $this->transportePrivado = $this->transportePrivado->fresh();
    }

    public function render()
    {
        return view('livewire.admin.transporte-priv.edit-trans-priv')->layout('layouts.admin');
    }
}
