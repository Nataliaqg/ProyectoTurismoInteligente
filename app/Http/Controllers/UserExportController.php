<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel as CSV;
use Maatwebsite\Excel\Excel as PDF;
use Maatwebsite\Excel\Excel as HTML;
use Maatwebsite\Excel\Excel as ODS;
use Maatwebsite\Excel\Excel as TSV;
use Maatwebsite\Excel\Facades\Excel; 

class UserExportController extends Controller
{
    //
    public function exportAllUsersExcel(){

        return Excel::download(new UsersExport, 'ReporteUsuarios.xlsx'); 
    }

    public function exportAllUsersCSV(){

        return (new UsersExport)->download('ReporteUsuarios.csv',CSV::CSV); 
    }

    public function exportAllUsersODS(){

        return (new UsersExport)->download('ReporteUsuarios.ods',ODS::ODS); 
    }

    public function exportAllUsersTSV(){

        return (new UsersExport)->download('ReporteUsuarios.tsv',TSV::TSV); 
    }

    public function exportAllUsersHTML(){

        return (new UsersExport)->download('ReporteUsuarios.html',HTML::HTML); 
    }

    public function exportAllUsersPDF(){

        return (new UsersExport)->download('ReporteUsuarios.pdf',PDF::DOMPDF); 
    }

}
