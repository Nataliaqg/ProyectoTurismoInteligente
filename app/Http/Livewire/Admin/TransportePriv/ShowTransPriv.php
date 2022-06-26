<?php

namespace App\Http\Livewire\Admin\TransportePriv;

use App\Models\TipoTransPrivado;
use Livewire\Component;
use App\Models\TransportePrivado;
use Livewire\WithPagination;

class ShowTransPriv extends Component
{
    use WithPagination;

    public $search,$transportePrivado,$tipoTransPrivados;

    protected $listeners = ['delete2'=>'delete'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($transportePrivado){
        $idtransportePrivado= TransportePrivado::find($transportePrivado);
        $idtransportePrivado->delete();
    }

    public function mount (TransportePrivado $transportePrivado){
        $this->transportePrivado= $transportePrivado;
        $this->tipoTransPrivados=TipoTransPrivado::all();
    }

    public function render()
    {
        $transportePrivados= TransportePrivado::where('precio','like','%'.$this->search.'%')->paginate(5);;
        return view('livewire.admin.transporte-priv.show-trans-priv',compact('transportePrivados'))->layout('layouts.admin');
    }
}
