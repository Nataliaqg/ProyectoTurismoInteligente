<?php

namespace App\Http\Controllers;

use App\Models\Informacion;
use App\Models\Order;
use App\Models\User;
//use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
//use Barryvdh\DomPDF\PDF;
use PDF;

class ReportePaq extends Controller
{
    //
    public function index()
    {
        $users = User::all();

        return 'hola mundo';
    }
    public function downloadPdf()
    {
       /*  $users = User::all();

        view()->share('reportes.paquetes',$users);
 
         $pdf = PDF::loadView('reportes.paquetes', ['users' => $users]);
  */     
        $empresa = Informacion::where('id',1)->First();
        
        $paquetes = Order::all();
        view()->share('reportes.paquetes',$paquetes,$empresa);
        $pdf = PDF::loadView('reportes.paquetes', ['paquetes' => $paquetes,'empresa' => $empresa]);

         return $pdf->setPaper('a4','landscape')->download('Reportes de Paquetes.pdf');
    }
}
