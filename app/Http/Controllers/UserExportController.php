<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel; 

class UserExportController extends Controller
{
    //
    public function exportAllUsers(){

        return Excel::download(new UsersExport, 'Usuarios.xlsx'); 
    }

}
