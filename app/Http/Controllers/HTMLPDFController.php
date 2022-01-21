<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Equipo;
use App\Models\Persona;
use App\Models\Caracteristica;
use App\Models\Mantenimiento;
use App\Models\Trabajadore;

class HTMLPDFController extends Controller
{
    public function createPDF()
    {
        $fechas=date('Y-m-d');
        $fechas1=$fechas.' 00:00:00';
        $salida=date('Y-m-d H:i:s');
        $id=0;
        $mantenimientosR=DB::table('mantenimientos')->where('salida','=',$fechas1)->get();
        foreach($mantenimientosR as $aux){
            $id=$aux->id;
            $mantenimientos=Mantenimiento::find($id);
            $mantenimientos->salida=$salida;
            $mantenimientos->save();
        }
        
        $reportes=Reporte::latest('id')->first();
        if($reportes==null){
            $reportes=1;
        }
        else{
            $reportes=$reportes->id+1;
        }
        $mantenimientos=Mantenimiento::find($id);
        $equipos=DB::table('equipos')->get();
        $caracteristicas=Caracteristica::find($mantenimientos->equipo);
        $trabajadores=Trabajadore::find($caracteristicas->responsable);
        $caracteristicasR=DB::table('caracteristicas')->where('responsable','=',$caracteristicas->responsable)->get();

        $datos=[$equipos,$trabajadores,$caracteristicas,$caracteristicasR,$mantenimientosR,$mantenimientos,$reportes, $fechas];
        view()->share('datos', $datos);

        $pdf=PDF::loadView('PDF', $datos);

        $documento=new Reporte();
        $documento->PDF='Reporte'.$reportes;
        $documento->save();

        if($reportes<10){
            return $pdf->download('R000'.$reportes.'.pdf');
        }
        elseif($reportes<100){
            return $pdf->download('R00'.$reportes.'.pdf');
        }
        elseif($reportes<1000){
            return $pdf->download('R0'.$reportes.'.pdf');
        }
        else{
            return $pdf->download('R'.$reportes.'.pdf');
        }
    }
}
