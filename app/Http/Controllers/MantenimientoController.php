<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Equipo;
use App\Models\User;
use App\Models\Persona;
use App\Models\Caracteristica;
use App\Models\Mantenimiento;
// use App\Models\Trabajadore;
use App\Models\Responsable;
use App\Models\Responsable_Equipo;
Use Carbon\Carbon;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct(){
    //     $this->middleware('auth'); 
    // }

    
    public function index()
    {
        $fecha_inicio=new Carbon('2016-01-23');
        $fecha_fin=Carbon::now()->toDateTimeString();
        // $mantenimientos=DB::table('mantenimientos')->where('entregado','=','0')->where('fecha_entrega','=',null)->get();
        $mantenimientos=Mantenimiento::where('entregado','No entregado')->get();
        // dd($mantenimientos);

        // dd($mantenimientos);
        // $trabajadores=DB::table('trabajadores')->get();
        
        $responsable=Responsable::all();
        $equipos=Equipo::all();
        $users=User::all();
        
        return view('mantenimiento\index',compact('fecha_inicio','fecha_fin'))->with('mantenimientos',$mantenimientos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fechas=date('Y-m-d');
        $equipos=Equipo::where("estado","OPERATIVO");
        $responsable_equipos=Responsable_Equipo::all();
        $mantenimientos=DB::table('mantenimientos')->where('fecha_entrega','=',null)->get();
        $users=User::all();
        return view('mantenimiento.create')->with('responsable_equipos',$responsable_equipos)->with('fechas',$fechas)->with('mantenimientos',$mantenimientos)->with('users',$users);
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
        $mantenimientos->fecha_entrada=Carbon::now()->toDateTimeString();
        $mantenimientos->user_id=$request->get('encargado');

        $personas=DB::table('personas')->where('name','=',$mantenimientos->encargado)->get();
        foreach($personas as $aux){
            $personaencargada=Persona::find($aux->id);
            $mantenimientos->celular=$personaencargada->celular;
        }

        $mantenimientos->responsable_equipo_id=$request->get('equipo');
        $mantenimientos->problema=$request->get('problema');
        $mantenimientos->causa=$request->get('causa');
        $mantenimientos->solucion=$request->get('solucion');
        $mantenimientos->observacion=$request->get('observacion');
        $mantenimientos->estado=0;
        // dd($request->get('estado'));

        $equipo=Responsable_Equipo::find($mantenimientos->responsable_equipo_id)->equipo;
        // dd($equipo->estado);
        if ($request->get('estado')==1) {
            $equipo->estado='OPERATIVO';
        }
        else {
            $equipo->estado='INOPERATIVO';

        }
        // $equipo->estado=$mantenimientos->estado;

        $equipo->save();
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
        $mantenimiento=Mantenimiento::find($id);
        // $caracteristicas=Caracteristica::find($mantenimientos->equipo);
        // $trabajadores=Trabajadore::find($caracteristicas->responsable);
        // $equipos=Equipo::find($mantenimento->equipo_id);
        return view('mantenimiento.edit')->with('mantenimiento',$mantenimiento)->with('fechas',$fechas);
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
        // $responsable=Responsable::find($mantenimientos->responsable_equipo_id->id);
        // $responsable=$mantenimento->responsable_equipo->responsable;

        $mantenimientos->fecha_entrega=$request->get('fecha_entrega').' 00:00:00';




        // $responsable->$mantenimientos->responsable_equipo->id=$request->get('persona');

        // $caracteristicas=Caracteristica::find($mantenimientos->equipo);
        // $trabajadores=Trabajadore::find($caracteristicas->responsable);
        // $mantenimientosR=DB::table('mantenimientos')->where('fecha_entrega','=',null)->get();
        // $caracteristicasR=DB::table('caracteristicas')->where('responsable','=',$caracteristicas->responsable)->get();

        $mantenimientos->save();

        // foreach($mantenimientosR as $mantenimento){
        //     foreach($caracteristicasR as $caracteristica){
        //         if($mantenimento->equipo==$caracteristica->id){
        //             $mantenimientoID=Mantenimiento::find($mantenimento->id);
        //             $mantenimientoID->fecha_entrega=$mantenimientos->fecha_entrega;
        //             $mantenimientoID->save();
        //         }
        //     }
        // }

        // $equipos=DB::table('equipos')->get();
        
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

        $equipo=Equipo::find($mantenimento->responsable_equipo->equipo->id);
        $equipo->estado="OPERATIVO";

        $equipo->save();
        $mantenimento->save();
        
        return redirect('/mantenimientos');
    }
    public function desabilitar($id)
    {
        $mantenimento=Mantenimiento::find($id);

        $equipo=Equipo::find($mantenimento->responsable_equipo->equipo->id);
        $equipo->estado="INOPERATIVO";

        $equipo->save();
        $mantenimento->save();
        

        return redirect('/mantenimientos');
    }

    public function entregar(Request $request){
        
        // dd($request);
        $fechaSalida=Carbon::now()->toDateTimeString();
        $mantenimento=Mantenimiento::find($request->id);
        $mantenimento->entregado="Entregado";
        $mantenimento->fecha_entrega=Carbon::now()->toDateTimeString();
        
        // $mantenimento->responsable_equipo->equipo->id
        $equipo=Equipo::find($mantenimento->responsable_equipo->equipo->id);
        $equipo->estado="OPERATIVO";

        // dd(!($request->get('dni')==$mantenimento->responsable_equipo->responsable->dni));
        $responsable_equipos=new Responsable_Equipo();
        if(!($request->get('dni')==$mantenimento->responsable_equipo->responsable->dni))
        {
            
            // dd(Responsable::where('dni',$request->get('dni'))->first()->dni);
            if(Responsable::where('dni',$request->get('dni'))->exists()){
                $responsable=Responsable::where('dni',$request->get('dni'))->first();

                
                $responsable_equipos->responsable_id=$responsable->id;

            }
            else {
                $responsable = new Responsable();
                $responsable->dni=$request->get('dni');
                $responsable->nombre=$request->get('nombre');
                $responsable->area=$mantenimento->responsable_equipo->responsable->area;
                $responsable->save();
                $responsable_equipos->responsable_id=$responsable->id;

            }

            $responsable_equipos->equipo_id=$equipo->id;

            $responsable_equipos->save();
            
            $mantenimento->responsable_equipo_id=$responsable_equipos->id;
        }



        $equipo->save();
        
        $mantenimento->save();
        
        return redirect('/mantenimientos');
    }
}
