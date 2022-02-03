<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Equipo;
use App\Models\Caracteristica;
use App\Models\Mantenimiento;
use App\Models\Trabajadore;
Use Carbon\Carbon;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth'); 
    }
    public function show_x_date(Request $request)
    {
        // dd($request->get('fecha_inicio'));
        $fecha_inicio=$request->get('fecha_inicio');
        $fecha_fin= $request->get('fecha_fin');
        $mantenimientos=Mantenimiento::where('entregado','Entregado')->whereBetween('fecha_entrega', [(new Carbon($request->get('fecha_inicio')))->subDays(1)->toDateString(), (new Carbon($request->get('fecha_fin')))->addDays(1)->toDateString()])->get();
        
        return view('historial.index',compact('fecha_inicio','fecha_fin'))->with('mantenimientos',$mantenimientos);
    }

    public function index()
    {
        $fecha_inicio=(new Carbon('2022-01-01'))->toDateString();
        $fecha_fin=Carbon::now()->toDateString();
        $fecha_mañana=Carbon::tomorrow()->toDateString();
        // $mantenimientos=DB::table('mantenimientos')->where('fecha_entrega','!=',null)->get();
        $mantenimientos=Mantenimiento::where('entregado','Entregado')->whereBetween('fecha_entrega', [$fecha_inicio,$fecha_mañana])->get();
        // dd(Carbon::tomorrow()->toDateString());
        // $caracteristicas=DB::table('caracteristicas')->get();
        // $equipos=DB::table('equipos')->get();
        // dd($mantenimientos);
        return view('historial.index',compact('fecha_inicio','fecha_fin'))->with('mantenimientos',$mantenimientos);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $mantenimientos=Mantenimiento::find($id);
        return view('historial.edit')->with('mantenimientos',$mantenimientos);
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
        //
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
