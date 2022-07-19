<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel as CSV;
use Maatwebsite\Excel\Excel as PDF;
use Maatwebsite\Excel\Excel as HTML;
use Maatwebsite\Excel\Excel as ODS;
use Maatwebsite\Excel\Excel as TSV;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaquetesExport;

class PaqueteExportController extends Controller
{
    //
    public function exportAllPaquetesExcel(){

        return Excel::download(new PaquetesExport, 'ReportePaquetes.xlsx'); 
    }

    public function exportAllPaquetesCSV(){

        return (new PaquetesExport)->download('ReportePaquetes.csv',CSV::CSV); 
    }

    public function exportAllPaquetesODS(){

        return (new PaquetesExport)->download('ReportePaquetes.ods',ODS::ODS); 
    }

    public function exportAllPaquetesTSV(){

        return (new PaquetesExport)->download('ReportePaquetes.tsv',TSV::TSV); 
    }

    public function exportAllPaquetesHTML(){

        return (new PaquetesExport)->download('ReportePaquetes.html',HTML::HTML); 
    }
}
