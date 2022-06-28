<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Categoria;
use App\Models\Ciudad;
use App\Models\Hotel;
use App\Models\Restaurante;
//use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriaFiltro extends Component
{

    use WithPagination;
    public $categoria, $ciudad;
    public $view = "grid";


    public function limpiar()
    {
        $this->reset(['ciudad']);
    }

    public function render()
    {
        $ciudades = Ciudad::all();
        $prueba = $this->categoria->id;

        if ($this->categoria->id == 1) {
            $servicios = $this->categoria->LugarTuristicos()->paginate(5);
        }
        if ($prueba == 2) {
            $servicios = $this->categoria->hoteles()->paginate(5);
        }
        if ($prueba == 3) {
            $servicios = $this->categoria->Restaurantes()->paginate(5);
        }

        if ($prueba == 4) {
            $servicios = $this->categoria->Viajes()->paginate(5);
        }
        if ($prueba == 5) {
            $servicios = $this->categoria->TransportePrivados()->paginate(5);
        }

       if ($this->ciudad) {

        if ($this->categoria->id == 1) {
            $servicios = $this->categoria->LugarTuristicos()->where('ciudad_id', $this->ciudad)->paginate(5);
        }
        if ($prueba == 2) {
            $servicios = $this->categoria->hoteles()->where('ciudad_id', $this->ciudad)->paginate(5);
        }
        if ($prueba == 3) {
            $servicios = $this->categoria->Restaurantes()->where('ciudad_id', $this->ciudad)->paginate(5);
        }

        if ($prueba == 4) {
            $servicios = $this->categoria->Viajes()->where('ciudad_id', $this->ciudad)->paginate(5);
        }
        if ($prueba == 5) {
            $servicios = $this->categoria->TransportePrivados()->where('ciudad_id', $this->ciudad)->paginate(5);
        }
        }
        
        return view('livewire.cliente.categoria-filtro', compact('ciudades', 'servicios'));
    }
}
