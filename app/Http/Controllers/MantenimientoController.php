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

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth'); 
    }

    public function index()
    {
        $mantenimientos=DB::table('mantenimientos')->where('salida','=',null)->get();
        $caracteristicas=DB::table('caracteristicas')->get();
        $trabajadores=DB::table('trabajadores')->get();
        $equipos=DB::table('equipos')->get();
        $personas=DB::table('personas')->get();
        
        return view('mantenimiento\index')->with('equipos',$equipos)->with('caracteristicas',$caracteristicas)->with('mantenimientos',$mantenimientos)->with('trabajadores',$trabajadores)->with('personas',$personas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fechas=date('Y-m-d');
        $equipos=DB::table('equipos')->get();
        $mantenimientos=DB::table('mantenimientos')->where('salida','=',null)->get();
        $caracteristicas=DB::table('caracteristicas')->get();
        $personas=DB::table('personas')->where('rol','=','administrador')->get();
        return view('mantenimiento.create')->with('equipos',$equipos)->with('caracteristicas',$caracteristicas)->with('fechas',$fechas)->with('personas',$personas)->with('mantenimientos',$mantenimientos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mantenimientos=new Mantenimiento();

        $mantenimientos->entrada=$request->get('entrada');
        $mantenimientos->encargado=$request->get('encargado');

        $personas=DB::table('personas')->where('name','=',$mantenimientos->encargado)->get();
        foreach($personas as $aux){
            $personaencargada=Persona::find($aux->id);
            $mantenimientos->celular=$personaencargada->celular;
        }

        $mantenimientos->equipo=$request->get('equipo');
        $mantenimientos->problema=$request->get('problema');
        $mantenimientos->causa=$request->get('causa');
        $mantenimientos->solucion=$request->get('solucion');
        $mantenimientos->observacion=$request->get('observacion');
        $mantenimientos->estado=$request->get('estado');
        // dd($request->get('estado'));

        $caracteristicas=Caracteristica::find($mantenimientos->equipo);
        if ($request->get('estado')==1) {
            $caracteristicas->estado='OPERATIVO';
        }
        else {
            $caracteristicas->estado='INOPERATIVO';

        }
        // $caracteristicas->estado=$mantenimientos->estado;

        $caracteristicas->save();
        $mantenimientos->save();

        return redirect('/mantenimientos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fechas=date('Y-m-d');
        $mantenimientos=Mantenimiento::find($id);
        $caracteristicas=Caracteristica::find($mantenimientos->equipo);
        $trabajadores=Trabajadore::find($caracteristicas->responsable);
        $equipos=Equipo::find($caracteristicas->marca);
        return view('mantenimiento.edit')->with('mantenimientos',$mantenimientos)->with('caracteristicas',$caracteristicas)->with('trabajadores',$trabajadores)->with('equipos',$equipos)->with('fechas',$fechas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $mantenimientos=Mantenimiento::find($id);

        $mantenimientos->salida=$request->get('salida').' 00:00:00';
        $mantenimientos->persona=$request->get('persona');
        $mantenimientos->DNI=$request->get('DNI');

        $caracteristicas=Caracteristica::find($mantenimientos->equipo);
        $trabajadores=Trabajadore::find($caracteristicas->responsable);
        $mantenimientosR=DB::table('mantenimientos')->where('salida','=',null)->get();
        $caracteristicasR=DB::table('caracteristicas')->where('responsable','=',$caracteristicas->responsable)->get();

        $mantenimientos->save();

        foreach($mantenimientosR as $mantenimento){
            foreach($caracteristicasR as $caracteristica){
                if($mantenimento->equipo==$caracteristica->id){
                    $mantenimientoID=Mantenimiento::find($mantenimento->id);
                    $mantenimientoID->salida=$mantenimientos->salida;
                    $mantenimientoID->save();
                }
            }
        }

        $equipos=DB::table('equipos')->get();
        
        return redirect('/reporte');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function habilitar($id)
    {
        $mantenimento=Mantenimiento::find($id);
        $mantenimento->estado=1;
        $mantenimento->save();
        
        return redirect('/mantenimientos');
    }
    public function desabilitar($id)
    {
        $mantenimento=Mantenimiento::find($id);
        $mantenimento->estado=0;
        $mantenimento->save();
        
        return redirect('/mantenimientos');
    }
}
