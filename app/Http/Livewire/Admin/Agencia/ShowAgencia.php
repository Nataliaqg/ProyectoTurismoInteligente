<?php

namespace App\Http\Livewire\Admin\Agencia;

use App\Models\Agencia;
use App\Models\Bitacora;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAgencia extends Component
{
    use WithPagination;

    public $search;

    public $listeners =['delete'];


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($agencia){
      
        $agencia = Agencia::find($agencia);        
        $agencia->delete();
        $bitacora = new Bitacora();
        $bitacora->crear('Agencia eliminada ' .$agencia->nombre); 
        

   }

    public function render()
    {
        $agencias = Agencia::where('nombre','like', '%'. $this->search . '%')
                    ->paginate(6);
        return view('livewire.admin.agencia.show-agencia', compact('agencias'))->layout('layouts.admin');
    }
}
