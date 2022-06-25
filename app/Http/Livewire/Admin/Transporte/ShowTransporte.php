<?php

namespace App\Http\Livewire\Admin\Transporte;

use App\Models\Transporte;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTransporte extends Component
{

    use WithPagination;

    public $search;

    public $listeners =['delete'];


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($transporte){
      
        $transporte = Transporte::find($transporte);        
        $transporte->delete();
        return redirect()->route('admin.transportes.show');
   }

    public function render()
    {
        $transportes = Transporte::where('modelo','LIKE', '%'. $this->search . '%')
        ->orWhere('descripcion', 'LIKE', '%' . $this->search . '%')
        ->paginate(6);

        return view('livewire.admin.transporte.show-transporte', compact('transportes'))->layout('layouts.admin');
    }
}
