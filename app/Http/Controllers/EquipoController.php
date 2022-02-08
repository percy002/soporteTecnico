<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\Equipo;
use App\Models\Caracteristica;
use App\Models\Mantenimiento;
use App\Models\Responsable;
use App\Models\Responsable_Equipo;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth'); 
    }
    public function buscar(Request $request){
        
        $term = $request->search;

        return response()->json($term);
    }
    public function index()
    {
        $responsable_equipos=Responsable_Equipo::all();
        $equipos = DB::table('equipos')->orderByDesc('id')->get();
        // dd($equipos);
        // $equipo=DB::table('equipo')->where('responsable','!=',NULL)->get();
        // $trabajadores=DB::table('trabajadores')->get();
        
        return view('equipo.index')->with('equipos',$equipos)->with('responsable_equipos',$responsable_equipos);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validaciones
        
        // dd($request->get('dni'));
        // dd(Responsable_Equipo::where('dni','=',$request->get('dni'))->exists());
        // dd(Responsable::where('dni','=',$request->get('dni'))->exists());

        

        $responsable_equipo=new Responsable_Equipo(); 
        $equipos=new Equipo(); 
        $equipos->equipo=$request->get('equipo');
        $equipos->tipo=$request->get('tipo');
        $equipos->patrimonio=$request->get('patrimonio');
        $equipos->marca=$request->get('marca');
        $equipos->sistema=$request->get('sistema');
        // $equipos->procesador=$request->get('procesador_marca').'-'.$request->get('procesador').'-'.$request->get('velocidad');
        if ($request->get('procesador_marca')=='intel') {
            $equipos->procesador=$request->get('procesador_marca').'-'.$request->get('procesador1');
        }
        else {
            $equipos->procesador=$request->get('procesador_marca').'-'.$request->get('procesador2');

        }
        $equipos->placa=$request->get('placa');
        $equipos->socket=$request->get('socket');
        $equipos->ram=$request->get('ram');
        if ($request->get('aux2')=='GB') {
            $equipos->disco=$request->get('disco12')." ".$request->get('aux2')." ".$request->get('disco1');
        }
        else {
            $equipos->disco=$request->get('disco11')." ".$request->get('aux2')." ".$request->get('disco1');

        }
        
        $equipos->video=$request->get('video');
        $equipos->red=$request->get('red');
        $equipos->bateria=$request->get('bateria');
        $equipos->lectora=$request->get('lectora');
        $equipos->tamaño=$request->get('tamaño');
        $equipos->estado="OPERATIVO"
        ;

        
        
        //agregar responsable si no esta registrado aun
        if (Responsable::where('dni','=',$request->get('dni'))->exists()) {
            $responsable=Responsable::where('dni','=',$request->get('dni'))->first();
            
            $equipos->responsable=$responsable->id;
            $responsable_equipo->responsable_id=$responsable->id;
        }
        else {
            $responsable=new Responsable();
            $responsable->nombre=$request->get('responsable');
            $responsable->dni=$request->get('dni');
            // $responsable->observacion=$request->get('observacion');
            $responsable->area=$request->get('area');
            $responsable->save();

            $responsable=Responsable::where('dni','=',$request->get('dni'))->first();
            // dd($responsable);

            $equipos->responsable=$responsable->id;
            $responsable_equipo->responsable_id=$responsable->id;

        }
        // dd($responsable=Responsable::where('dni','=',$request->get('dni'))->first());

        if (!Equipo::where('patrimonio','=',$request->get('patrimonio'))->exists()) {
            # code...
            $equipos->save();
        }
        
        $responsable_equipo->equipo_id=$equipos->id;


        $responsable_equipo->save();
        
        // dd($equipos->id);

        
        // $responsable_equipo->equipo_id=
        // $responsable_equipo->responsable_id=

        // $equipos->responsable=$aux2;



        // $aux1=$request->get('trabajador');
        
        // if($aux1=="TRABAJADOR"){
        //     $aux2=$request->get('lugar');
        //     $DNI=$request->get('DNI');
        //     $id_trabajador=0;
        //     $trabajador=DB::table('trabajadores')->where('DNI','=',$DNI)->get();
        //     foreach($trabajador as $trabajadores){
        //         $id_trabajador=$trabajadores->id;
        //     }
        //     if($id_trabajador==0){
        //         $trabajadores=new Trabajadore();
                
        //         $trabajadores->name=$request->get('trabajador');
        //         $trabajadores->DNI=$DNI;
        //         $trabajadores->lugar=$request->get('lugar');
        //         $trabajadores->observacion=$request->get('observacion');;
                
                

        //         $trabajadores->save();
        //         $id_trabajador=$trabajadores->id;
        //     }
        //     $tablas=DB::table('caracteristicas')->where('responsable','=',NULL)->get();
        //     foreach ($tablas as $tabla){
        //         $id=$tabla->id;
        //         $caracteristica=Caracteristica::find($id);
        //         $caracteristica->responsable=$id_trabajador;
        //         $caracteristica->save();
        //     }

        // }
        // else{
        //     $aux2=$request->get('marca');

        //     $equipos=new Equipo();            
        //     $equipos->tipo=$aux1;
        //     $equipos->name=$aux2;

        //     $equipos->save();

        //     $caracteristicas=new Caracteristica();

        //     $equipos_nuevos=DB::table('equipos')->where('name','=',$aux2)->get();
        //     foreach ($equipos_nuevos as $equipo_nuevo){
        //         $caracteristicas->marca=$equipo_nuevo->id;
        //     }

        //     if($aux1=="CPU"){
        //         $caracteristicas->patrimonio=$request->get('patrimonio');
        //         $caracteristicas->sistema=$request->get('sistema');
        //         $tipo_procesador=$request->get('aux1');
        //         if($tipo_procesador=="Intel"){
        //             $caracteristicas->procesador='Intel-'.$request->get('procesador1').'-'.$request->get('velocidad');
        //         }
        //         elseif($tipo_procesador=="AMD"){
        //             $caracteristicas->procesador='AMD-'.$request->get('procesador2').'-'.$request->get('velocidad');
        //         }
        //         $caracteristicas->placa=$request->get('placa');
        //         $caracteristicas->socket=$request->get('socket');
        //         $caracteristicas->RAM=$request->get('RAM');
        //         $tipo_disco=$request->get('aux2');
        //         if($tipo_disco=="GB"){
        //             $caracteristicas->disco=$request->get('disco12')." GB ".$request->get('disco1');
        //         }
        //         elseif($tipo_disco=="Teras"){
        //             $caracteristicas->disco=$request->get('disco11')." Teras ".$request->get('disco1');
        //         }
        //         if($request->get('aux3')==4){
        //             $caracteristicas->video=$request->get('video');
        //         }
        //         elseif($request->get('aux3')==5){
        //             $caracteristicas->video=0;
        //         }
        //         $IP=$request->get('red');
        //         if($IP!=null){
        //             $caracteristicas->red=$request->get('red');
        //         }
        //         $caracteristicas->lectora=$request->get('lectora');
        //     }
        //     elseif($aux1=="ESTABILIZADOR" or $aux1=="UPC"){
        //         $caracteristicas->patrimonio=$request->get('patrimonio');
        //         $caracteristicas->tipo=$request->get('tipo');
        //     }
        //     elseif($aux1=="IMPRESORA" or $aux1=="ESCANNER"){
        //         $caracteristicas->patrimonio=$request->get('patrimonio');
        //         $caracteristicas->tipo=$request->get('tipo');
        //     }
        //     elseif($aux1=="LAPTOP"){
        //         $caracteristicas->patrimonio=$request->get('patrimonio');
        //         $caracteristicas->sistema=$request->get('sistema');
        //         $tipo_procesador=$request->get('aux1');
        //         if($tipo_procesador=="Intel"){
        //             $caracteristicas->procesador='Intel-'.$request->get('procesador1').'-'.$request->get('velocidad');
        //         }
        //         elseif($tipo_procesador=="AMD"){
        //             $caracteristicas->procesador='AMD-'.$request->get('procesador2').'-'.$request->get('velocidad');
        //         }
        //         $caracteristicas->socket=$request->get('socket');
        //         $caracteristicas->RAM=$request->get('RAM');
        //         $tipo_RAM=$request->get('aux2');
        //         if($tipo_RAM=="GB"){
        //             $caracteristicas->disco=$request->get('disco12')." GB ".$request->get('disco1');
        //         }
        //         elseif($tipo_RAM=="Teras"){
        //             $caracteristicas->disco=$request->get('disco11')." Teras ".$request->get('disco1');
        //         }
        //         if($request->get('aux3')==4){
        //             $caracteristicas->video=0;
        //         }
        //         elseif($request->get('aux3')==5){
        //             $caracteristicas->video=$request->get('video');
        //         }
        //         $caracteristicas->placa=$request->get('placa');
        //         $IP=$request->get('red');
        //         if($IP!=null){
        //             $caracteristicas->red=$request->get('red');
        //         }
        //         $caracteristicas->tamaño=$request->get('tamaño');
        //         $caracteristicas->bateria=$request->get('bateria');
        //         $caracteristicas->lectora=$request->get('lectora');
        //     }
        //     elseif($aux1=="MONITOR"){
        //         $caracteristicas->patrimonio=$request->get('patrimonio');
        //         $caracteristicas->tipo=$request->get('tipo');
        //         $caracteristicas->tamaño=$request->get('tamaño');
        //     }
        //     elseif($aux1=="MOUSE"){
        //         $caracteristicas->patrimonio=$request->get('patrimonio');
        //         $caracteristicas->tipo=$request->get('tipo');
        //     }
        //     elseif($aux1=="PARLANTE"){
        //         $caracteristicas->patrimonio=$request->get('patrimonio');
        //     }
        //     elseif($aux1=="TECLADO"){
        //         $caracteristicas->patrimonio=$request->get('patrimonio');
        //         $caracteristicas->tipo=$request->get('tipo');
        //     }
            
        //     $caracteristicas->estado=$request->get('estado1').'|'.$request->get('estado2');
        //     $caracteristicas->save();
        // }

        return redirect('/equipos\create');
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
        $equipo=Equipo::find($id);
        // $equipos=Equipo::find($caracteristicas->marca);
        return view('equipo.edit')->with('equipo',$equipo);
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
        // dd($request->get('patrimonio'));
        $request['estado'] = ($request->get('estado')==1) ? 'OPERATIVO' : 'INOPERATIVO' ;
        // dd($request->get('estado'));
        $equipo=Equipo::find($id);
        $aux1=$request->get('equipo');
        // dd($aux1);
        if($aux1=="CPU"){
            // $equipo->codigo='CPU';
            $equipo->patrimonio=$request->get('patrimonio');
            $equipo->sistema=$request->get('sistema');
            // dd($request->get('aux1'));
            if($request->get('aux1')=="Intel"){
                $equipo->procesador=$request->get('aux1').'-'.$request->get('procesador1');
            }
            elseif($request->get('aux1')=="AMD"){
                $equipo->procesador=$request->get('aux1').'-'.$request->get('procesador2');
            }
            $equipo->placa=$request->get('placa');
            $equipo->socket=$request->get('socket');
            $equipo->RAM=$request->get('RAM');
            if($request->get('aux2')==2){
                $equipo->disco=$request->get('disco11')." ".$request->get('disco1');
            }
            elseif($request->get('aux2')==3){
                $equipo->disco=$request->get('disco12')." ".$request->get('disco1');
            }
            if($request->get('aux3')==4){
                $equipo->video=0;
            }
            elseif($request->get('aux3')==5){
                $equipo->video=$request->get('video');
            }
            $equipo->red=$request->get('red');
            $equipo->lectora=$request->get('lectora');
            $equipo->estado=$request->get('estado');
        }
        elseif($aux1=="ESTABILIZADOR"){
            // $equipo->codigo='EST';
            $equipo->patrimonio=$request->get('patrimonio');
            $equipo->tipo=$request->get('equipo');
            $equipo->estado=$request->get('estado');
        }
        elseif($aux1=="IMPRESORA"){
            // $equipo->codigo='IMP';
            $equipo->patrimonio=$request->get('patrimonio');
            $equipo->tipo=$request->get('tipo');
            $equipo->estado=$request->get('estado');
        }
        elseif($aux1=="LAPTOP"){
            // $equipo->codigo='LAP';
            $equipo->patrimonio=$request->get('patrimonio');
            $equipo->sistema=$request->get('sistema');
            if($request->get('aux1')==0){
                $equipo->procesador=$request->get('procesador1');
            }
            elseif($request->get('aux1')==1){
                $equipo->procesador=$request->get('procesador2');
            }
            $equipo->socket=$request->get('socket');
            $equipo->RAM=$request->get('RAM');
            if($request->get('aux2')==2){
                $equipo->disco=$request->get('disco11')." ".$request->get('disco1');
            }
            elseif($request->get('aux2')==3){
                $equipo->disco=$request->get('disco12')." ".$request->get('disco1');
            }
            if($request->get('aux3')==4){
                $equipo->video=0;
            }
            elseif($request->get('aux3')==5){
                $equipo->video=$request->get('video');
            }
            $equipo->placa=$request->get('placa');
            $equipo->red=$request->get('red');
            $equipo->tamaño_disco=$request->get('tamaño');
            $equipo->bateria=$request->get('bateria');
            $equipo->lectora=$request->get('lectora');
            $equipo->estado=$request->get('estado');
        }
        elseif($aux1=="MONITOR"){
            // $equipo->codigo='MON';
            $equipo->patrimonio=$request->get('patrimonio');
            $equipo->tipo=$request->get('tipo');
            $equipo->estado=$request->get('estado');
            $equipo->tamaño=$request->get('tamaño');
        }
        elseif($aux1=="MOUSE"){
            // $equipo->codigo='MOU';
            $equipo->patrimonio=$request->get('patrimonio');
            $equipo->tipo=$request->get('tipo');
            $equipo->estado=$request->get('estado');
        }
        elseif($aux1=="PARLANTE"){
            // $equipo->codigo='PAR';
            $equipo->patrimonio=$request->get('patrimonio');
            $equipo->estado=$request->get('estado');
        }
        elseif($aux1=="TECLADO"){
            // $equipo->codigo='MOU';
            $equipo->patrimonio=$request->get('patrimonio');
            $equipo->tipo=$request->get('tipo');
            $equipo->estado=$request->get('estado');
            // dd($aux1);
        }

        // dd($equipo);
        $equipo->save();

        return redirect('/equipos');
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
}
