<?php

namespace App\Http\Livewire\Admin\Hotel;

use App\Models\Bitacora;
use App\Models\Categoria;
use App\Models\Ciudad;
use App\Models\Hotel;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class EditHotel extends Component
{
    public $hotel, $ciudads,$categorias;
    public $ciudad_id,$categoria_id;
    public $ciudad_nombre,$categoria_nombre;

    protected $rules = [
        'hotel.ciudad_id' => 'nullable',
        'hotel.categoria_id'=>'nullable',
        'hotel.nombre' =>'required',
        'hotel.descripcion' => 'required',
        'hotel.direccion' => 'required',
        'hotel.telefono' => 'required',
        'hotel.categoria' => 'required',
        'hotel.capacidadMaximaHabitacion' => 'required',    
    ]; 
    protected $listeners = ['refreshHotel'];
    public function mount(Hotel $hotel)
    {
        $this->hotel = $hotel;

        $ciudad=Ciudad::find($hotel->ciudad_id);
        $this->ciudad_nombre=$ciudad->nombre;

        $categoria=Categoria::find($hotel->categoria_id);
        $this->categoria_nombre=$categoria->nombre;

        $this->ciudads = Ciudad::all();
        $this->categorias=Categoria::all();
    }
    public  function refreshHotel(){
        $this->hotel=$this->hotel->fresh();
    } 
    public function save()
    {
        $rules = $this->rules;
        $this->validate($rules);
        $this->hotel->save();
        $bitacora = new Bitacora();
        $bitacora->crear('Hotel: ' .$this->hotel->nombre .' Actualizada');    
      
        $this->emit('saved');
    }
    public function deleteImage(Image $image)
    {
        Storage::delete([$image->url]);
        $image->delete();
        $this->hotel=$this->hotel->fresh();
    }

    public function render()
    {
        return view('livewire.admin.hotel.edit-hotel')->layout('layouts.admin');
    }
}
