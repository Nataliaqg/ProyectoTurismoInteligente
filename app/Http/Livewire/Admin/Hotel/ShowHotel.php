<?php

namespace App\Http\Livewire\Admin\Hotel;

use App\Models\Bitacora;
use App\Models\Ciudad;
use App\Models\Hotel;
use Livewire\Component;
use Livewire\WithPagination;

class ShowHotel extends Component
{
    use WithPagination;
    public $search;
    public $hotel,$ciudads;
    protected $listeners = ['delete2'=>'delete'];

    //para que cuando busque valla a la paginacion correcta 
   
   public function updatingSearch(){
       $this->resetPage();
   }
   public function delete($hotel){
       $idnombre = Hotel::find($hotel);
       $idnombre->delete();
       $bitacora = new Bitacora();
       $bitacora->crear('Hotel Eliminado');       
   
       
   }
   public function mount(Hotel $hotel)
    {
        $this->hotel = $hotel;
        $this->ciudads = Ciudad::all();
    }
   

    public function render()
    {
        $hoteles = Hotel::where('nombre','like','%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.hotel.show-hotel',compact('hoteles'))->layout('layouts.admin');
    }
}
