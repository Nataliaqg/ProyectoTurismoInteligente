<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Agencia;
use App\Models\Categoria;
use App\Models\Ciudad;
use App\Models\TipoAgencia;
use App\Models\TipoTransPrivado;
use App\Models\Transporte;
use App\Models\Viaje;
use Illuminate\Database\Eloquent\Builder;
//use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriaFiltro extends Component
{

    use WithPagination;
    public $categoria, $ciudad, $movil, $ciudadorigen, $ciudadllegada, $agencia, $agenciatipo, $transporte;
    public $view = "grid";


    public function limpiar()
    {
        $this->reset(['ciudad', 'movil', 'ciudadorigen', 'ciudadllegada', 'agencia', 'agenciatipo']);
    }

    public function render()
    {
        $ciudades = Ciudad::all();
        $prueba = $this->categoria->id;

        if ($this->categoria->id == 1) {
            $servicios = $this->categoria->LugarTuristicos()->paginate(9);
        }
        if ($prueba == 2) {
            $servicios = $this->categoria->hoteles()->paginate(9);
        }
        if ($prueba == 3) {
            $servicios = $this->categoria->Restaurantes()->paginate(9);
        }
        //viajes 

        if ($prueba == 4) {
            //$servicios = $this->categoria->Viajes()->paginate(9);
            $tipoAgencias = TipoAgencia::all();
            $serviciosquery = Viaje::query()->whereHas('categoria', function (Builder $query) {
                $query->where('categoria_id', $this->categoria->id);
            });

            if ($this->agenciatipo) {
                $agencias = Agencia::All()->where('tipoAgencia_id', $this->agenciatipo);
                $serviciosquery = $serviciosquery->whereHas('transporte.agencia.tipoAgencia', function (Builder $query) {
                    $query->where('id', $this->agenciatipo);
                });
            } else {
                $agencias = Agencia::All();
            }

            if ($this->agencia) {
                $serviciosquery = $serviciosquery->whereHas('transporte.agencia', function (Builder $query) {
                    $query->where('id', $this->agencia);
                });
            }
            if ($this->ciudadorigen || $this->ciudadllegada) {
                if ($this->ciudadorigen) {
                    $serviciosquery = $serviciosquery->whereHas('ciudadOrigen', function (Builder $query) {
                        $query->where('id', $this->ciudadorigen);
                    });
                    if ($this->ciudadllegada) {
                        $serviciosquery = $serviciosquery->whereHas('ciudadDestino', function (Builder $query) {
                            $query->where('id', $this->ciudadllegada);
                        });
                    }
                } else {
                    if ($this->ciudadllegada) {
                        $serviciosquery = Viaje::query()->whereHas('ciudadDestino', function (Builder $query) {
                            $query->where('id', $this->ciudadllegada);
                        });
                    }
                }
            }
            $servicios = $serviciosquery->paginate(9);


            return view('livewire.cliente.filtro-viaje', compact('tipoAgencias', 'servicios', 'ciudades', 'agencias'));
        }
        //transporte 
        if ($prueba == 5) {
            $servicios = $this->categoria->TransportePrivados()->paginate(9);
            $vehiculos  = TipoTransPrivado::all();
            if ($this->movil) {
                $servicios =  $servicios = $this->categoria->TransportePrivados()->where('tipoTransPrivado_id', $this->movil)->paginate(9);
            }
            return view('livewire.cliente.filtro-transporte', compact('vehiculos', 'servicios'));
        }

        if ($this->ciudad) {

            if ($this->categoria->id == 1) {
                $servicios = $this->categoria->LugarTuristicos()->where('ciudad_id', $this->ciudad)->paginate(9);
            }
            if ($prueba == 2) {
                $servicios = $this->categoria->hoteles()->where('ciudad_id', $this->ciudad)->paginate(9);
            }
            if ($prueba == 3) {
                $servicios = $this->categoria->Restaurantes()->where('ciudad_id', $this->ciudad)->paginate(9);
            }
        }

        return view('livewire.cliente.categoria-filtro', compact('ciudades', 'servicios'));
    }
}
