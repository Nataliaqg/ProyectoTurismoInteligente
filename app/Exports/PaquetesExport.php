<?php

namespace App\Exports;

use App\Models\Order;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PaquetesExport implements FromView, ShouldAutoSize
{

    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('reportes.paquetesformatos',[
            'paquetes' => Order::all()
        ]);
    }

}
