<?php

namespace App\Http\Controllers;

use App\Models\Informacion;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;

class ReporteUsuario extends Controller
{
    //
    public function downloadPdf()
    {
       /*  $users = User::all();

        view()->share('reportes.paquetes',$users);
 
         $pdf = PDF::loadView('reportes.paquetes', ['users' => $users]);
  */     
        $empresa = Informacion::where('id',1)->First();
        
        $users = User::all();
        view()->share('reportes.usuarios',$users,$empresa);
        $pdf = PDF::loadView('reportes.usuarios', ['users' => $users,'empresa' => $empresa]);

         return $pdf->setPaper('a4','landscape')->download('Reportes de Usuarios.pdf');
    }
}
