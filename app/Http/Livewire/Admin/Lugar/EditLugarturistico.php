<?php

namespace App\Http\Livewire\Admin\Lugar;

use App\Models\Bitacora;
use App\Models\Categoria;
use Livewire\Component;
use App\Models\Ciudad;
use App\Models\Image;
use App\Models\LugarTuristico;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class EditLugarturistico extends Component
{
    use WithFileUploads;
    public $lugarturistico, $ciudads,$categorias;
    public $ciudad_id,$categoria_id;
    public $imagen;

    protected $rules = [
        'lugarturistico.categoria_id'=>'nullable',
        'lugarturistico.ciudad_id' => 'nullable',
        'lugarturistico.nombre' => 'required',
        'lugarturistico.descripcion' => 'required',
        'lugarturistico.direccion' => 'required',
        'lugarturistico.precio' => 'required',
        'lugarturistico.cantidad'=>'required',
        'lugarturistico.horaEntrada' => 'nullable',
        'lugarturistico.horaSalida' => 'nullable',

    ];
    protected $listeners = ['refreshLugar'];

    public function mount(LugarTuristico $lugarturistico)
    {
        $this->lugarturistico = $lugarturistico;
        $this->ciudads = Ciudad::all();
        $this->categorias= Categoria::all();
        //$this->ciudad_id = $lugarturistico->ciudad->id;

    }
    // no se para que es esto 
    /* public function getCiudadProperty(){
        return Ciudad::find($this->lugarturistico->ciudad_id);
    }*/

    public  function refreshLugar(){
        $this->lugarturistico=$this->lugarturistico->fresh();
    }
    public function save()
    {
        $rules = $this->rules;

        $this->validate($rules);
        if($this->imagen != null){
        foreach ($this->imagen as $im) {
            $url =  "https://bnzv-clinica-salud-s3.s3.us-east-1.amazonaws.com/" . $im->store("documentos", "s3");
            $this->lugarturistico->images()->create(
                [
                    'url' => $url
                ]
            );
        }
        }
        $this->lugarturistico->save();
        $bitacora = new Bitacora();
        $bitacora->crear('Lugar Turistico : ' .$this->lugarturistico->nombre .' Actualizada');    
        //emitir une evento o escuchar
        $this->emit('saved');
    }
    public function deleteImage(Image $image)
    {
        Storage::delete([$image->url]);
        $image->delete();
        $this->lugarturistico=$this->lugarturistico->fresh();
    }


    public function render()
    {

        return view('livewire.admin.lugar.edit-lugarturistico')->layout('layouts.admin');
    }
}
