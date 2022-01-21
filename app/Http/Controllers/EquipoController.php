<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\Equipo;
use App\Models\Caracteristica;
use App\Models\Mantenimiento;
use App\Models\Trabajadore;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::all();
        $caracteristicas=DB::table('caracteristicas')->where('responsable','!=',NULL)->get();
        $trabajadores=DB::table('trabajadores')->get();
        return view('equipo.index')->with('caracteristicas',$caracteristicas)->with('trabajadores',$trabajadores)->with('equipos',$equipos);
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
        $aux1=$request->get('equipo');
        

        if($aux1=="TRABAJADOR"){
            $aux2=$request->get('lugar');
            $DNI=$request->get('DNI');
            $id_trabajador=0;
            $trabajador=DB::table('trabajadores')->where('DNI','=',$DNI)->get();
            foreach($trabajador as $trabajadores){
                $id_trabajador=$trabajadores->id;
            }
            if($id_trabajador==0){
                $trabajadores=new Trabajadore();
                $trabajadores->lugar=$request->get('lugar');
                $obs=$request->get('observacion');
                if($obs!=null){
                    $trabajadores->observacion=$obs;
                }
                $trabajadores->name=$request->get('trabajador');
                $trabajadores->DNI=$DNI;

                $trabajadores->save();
                $id_trabajador=$trabajadores->id;
            }
            $tablas=DB::table('caracteristicas')->where('responsable','=',NULL)->get();
            foreach ($tablas as $tabla){
                $id=$tabla->id;
                $caracteristica=Caracteristica::find($id);
                $caracteristica->responsable=$id_trabajador;
                $caracteristica->save();
            }

        }
        else{
            $aux2=$request->get('marca');

            $equipos=new Equipo();            
            $equipos->tipo=$aux1;
            $equipos->name=$aux2;

            $equipos->save();

            $caracteristicas=new Caracteristica();

            $equipos_nuevos=DB::table('equipos')->where('name','=',$aux2)->get();
            foreach ($equipos_nuevos as $equipo_nuevo){
                $caracteristicas->marca=$equipo_nuevo->id;
            }

            if($aux1=="CPU"){
                $caracteristicas->patrimonio=$request->get('patrimonio');
                $caracteristicas->sistema=$request->get('sistema');
                $tipo_procesador=$request->get('aux1');
                if($tipo_procesador=="Intel"){
                    $caracteristicas->procesador='Intel-'.$request->get('procesador1').'-'.$request->get('velocidad');
                }
                elseif($tipo_procesador=="AMD"){
                    $caracteristicas->procesador='AMD-'.$request->get('procesador2').'-'.$request->get('velocidad');
                }
                $caracteristicas->placa=$request->get('placa');
                $caracteristicas->socket=$request->get('socket');
                $caracteristicas->RAM=$request->get('RAM');
                $tipo_disco=$request->get('aux2');
                if($tipo_disco=="GB"){
                    $caracteristicas->disco=$request->get('disco12')." GB ".$request->get('disco1');
                }
                elseif($tipo_disco=="Teras"){
                    $caracteristicas->disco=$request->get('disco11')." Teras ".$request->get('disco1');
                }
                if($request->get('aux3')==4){
                    $caracteristicas->video=$request->get('video');
                }
                elseif($request->get('aux3')==5){
                    $caracteristicas->video=0;
                }
                $IP=$request->get('red');
                if($IP!=null){
                    $caracteristicas->red=$request->get('red');
                }
                $caracteristicas->lectora=$request->get('lectora');
            }
            elseif($aux1=="ESTABILIZADOR" or $aux1=="UPC"){
                $caracteristicas->patrimonio=$request->get('patrimonio');
                $caracteristicas->tipo=$request->get('tipo');
            }
            elseif($aux1=="IMPRESORA" or $aux1=="ESCANNER"){
                $caracteristicas->patrimonio=$request->get('patrimonio');
                $caracteristicas->tipo=$request->get('tipo');
            }
            elseif($aux1=="LAPTOP"){
                $caracteristicas->patrimonio=$request->get('patrimonio');
                $caracteristicas->sistema=$request->get('sistema');
                $tipo_procesador=$request->get('aux1');
                if($tipo_procesador=="Intel"){
                    $caracteristicas->procesador='Intel-'.$request->get('procesador1').'-'.$request->get('velocidad');
                }
                elseif($tipo_procesador=="AMD"){
                    $caracteristicas->procesador='AMD-'.$request->get('procesador2').'-'.$request->get('velocidad');
                }
                $caracteristicas->socket=$request->get('socket');
                $caracteristicas->RAM=$request->get('RAM');
                $tipo_RAM=$request->get('aux2');
                if($tipo_RAM=="GB"){
                    $caracteristicas->disco=$request->get('disco12')." GB ".$request->get('disco1');
                }
                elseif($tipo_RAM=="Teras"){
                    $caracteristicas->disco=$request->get('disco11')." Teras ".$request->get('disco1');
                }
                if($request->get('aux3')==4){
                    $caracteristicas->video=0;
                }
                elseif($request->get('aux3')==5){
                    $caracteristicas->video=$request->get('video');
                }
                $caracteristicas->placa=$request->get('placa');
                $IP=$request->get('red');
                if($IP!=null){
                    $caracteristicas->red=$request->get('red');
                }
                $caracteristicas->tamaño=$request->get('tamaño');
                $caracteristicas->bateria=$request->get('bateria');
                $caracteristicas->lectora=$request->get('lectora');
            }
            elseif($aux1=="MONITOR"){
                $caracteristicas->patrimonio=$request->get('patrimonio');
                $caracteristicas->tipo=$request->get('tipo');
                $caracteristicas->tamaño=$request->get('tamaño');
            }
            elseif($aux1=="MOUSE"){
                $caracteristicas->patrimonio=$request->get('patrimonio');
                $caracteristicas->tipo=$request->get('tipo');
            }
            elseif($aux1=="PARLANTE"){
                $caracteristicas->patrimonio=$request->get('patrimonio');
            }
            elseif($aux1=="TECLADO"){
                $caracteristicas->patrimonio=$request->get('patrimonio');
                $caracteristicas->tipo=$request->get('tipo');
            }
            
            $caracteristicas->estado=$request->get('estado1').'|'.$request->get('estado2');
            $caracteristicas->save();
        }

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
        $caracteristicas=Caracteristica::find($id);
        $equipos=Equipo::find($caracteristicas->marca);
        return view('equipo.edit')->with('caracteristicas',$caracteristicas)->with('equipos',$equipos);
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
        // dd($request->get('estado'));
        $request['estado'] = ($request->get('estado')==1) ? 'OPERATIVO' : 'INOPERATIVO' ;
        // dd($request->get('estado'));
        $caracteristicas=Caracteristica::find($id);
        $aux1=$request->get('equipo');
        // dd($aux1);
        if($aux1=="CPU"){
            // $caracteristicas->codigo='CPU';
            $caracteristicas->patrimonio=$request->get('patrimonio');
            $caracteristicas->sistema=$request->get('sistema');
            if($request->get('aux1')==0){
                $caracteristicas->procesador=$request->get('procesador1');
            }
            elseif($request->get('aux1')==1){
                $caracteristicas->procesador=$request->get('procesador2');
            }
            $caracteristicas->placa=$request->get('placa');
            $caracteristicas->socket=$request->get('socket');
            $caracteristicas->RAM=$request->get('RAM');
            if($request->get('aux2')==2){
                $caracteristicas->disco=$request->get('disco11')." ".$request->get('disco1');
            }
            elseif($request->get('aux2')==3){
                $caracteristicas->disco=$request->get('disco12')." ".$request->get('disco1');
            }
            if($request->get('aux3')==4){
                $caracteristicas->video=0;
            }
            elseif($request->get('aux3')==5){
                $caracteristicas->video=$request->get('video');
            }
            $caracteristicas->red=$request->get('red');
            $caracteristicas->lectora=$request->get('lectora');
            $caracteristicas->estado=$request->get('estado');
        }
        elseif($aux1=="ESTABILIZADOR"){
            // $caracteristicas->codigo='EST';
            $caracteristicas->patrimonio=$request->get('patrimonio');
            $caracteristicas->tipo=$request->get('tipo');
            $caracteristicas->estado=$request->get('estado');
        }
        elseif($aux1=="IMPRESORA"){
            // $caracteristicas->codigo='IMP';
            $caracteristicas->patrimonio=$request->get('patrimonio');
            $caracteristicas->tipo=$request->get('tipo');
            $caracteristicas->estado=$request->get('estado');
        }
        elseif($aux1=="LAPTOP"){
            // $caracteristicas->codigo='LAP';
            $caracteristicas->patrimonio=$request->get('patrimonio');
            $caracteristicas->sistema=$request->get('sistema');
            if($request->get('aux1')==0){
                $caracteristicas->procesador=$request->get('procesador1');
            }
            elseif($request->get('aux1')==1){
                $caracteristicas->procesador=$request->get('procesador2');
            }
            $caracteristicas->socket=$request->get('socket');
            $caracteristicas->RAM=$request->get('RAM');
            if($request->get('aux2')==2){
                $caracteristicas->disco=$request->get('disco11')." ".$request->get('disco1');
            }
            elseif($request->get('aux2')==3){
                $caracteristicas->disco=$request->get('disco12')." ".$request->get('disco1');
            }
            if($request->get('aux3')==4){
                $caracteristicas->video=0;
            }
            elseif($request->get('aux3')==5){
                $caracteristicas->video=$request->get('video');
            }
            $caracteristicas->placa=$request->get('placa');
            $caracteristicas->red=$request->get('red');
            $caracteristicas->tamaño=$request->get('tamaño');
            $caracteristicas->bateria=$request->get('bateria');
            $caracteristicas->lectora=$request->get('lectora');
            $caracteristicas->estado=$request->get('estado');
        }
        elseif($aux1=="MONITOR"){
            // $caracteristicas->codigo='MON';
            $caracteristicas->patrimonio=$request->get('patrimonio');
            $caracteristicas->tipo=$request->get('tipo');
            $caracteristicas->estado=$request->get('estado');
        }
        elseif($aux1=="MOUSE"){
            // $caracteristicas->codigo='MOU';
            $caracteristicas->patrimonio=$request->get('patrimonio');
            $caracteristicas->tipo=$request->get('tipo');
            $caracteristicas->estado=$request->get('estado');
        }
        elseif($aux1=="PARLANTE"){
            // $caracteristicas->codigo='PAR';
            $caracteristicas->patrimonio=$request->get('patrimonio');
            $caracteristicas->estado=$request->get('estado');
        }
        elseif($aux1=="TECLADO"){
            // $caracteristicas->codigo='MOU';
            $caracteristicas->patrimonio=$request->get('patrimonio');
            $caracteristicas->tipo=$request->get('tipo');
            $caracteristicas->estado=$request->get('estado');
            // dd($aux1);
        }

        // dd($caracteristicas);
        $caracteristicas->save();

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
