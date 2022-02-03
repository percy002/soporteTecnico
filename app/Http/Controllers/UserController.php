<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
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
        //
        $personas = User::all();
        return view('persona.index')->with('personas',$personas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('persona.create');

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
        // $personas=new Persona();
        // $personas->name=$request->get('name');
        // $personas->celular=$request->get('celular');
        // $personas->DNI=$request->get('dni');
        // $personas->usuario=$personas->DNI.'@gmail.com';
        // $personas->contraseña=$personas->DNI;
        // $personas->rol=$request->get('rol');
        // $personas->cuenta=1;

        User::create([
            'name' => $request->get('name'),
            'dni'=> $request->get('dni'),
            'email' => $request->get('dni').'@gmail.com',
            'rol' => $request->get('rol'),
            'password' =>  bcrypt($request->get('dni')),
        ])->assignRole($personas->rol);

        // $personas->save();

        return redirect('/personas');
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
        //
        $personas=User::find($id);
        return view('persona.edit')->with('personas',$personas);
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
        // $personas=Persona::find($id);
        // $aux=$personas->usuario;
        // $personas->celular=$request->get('celular');
        // $personas->usuario=$request->get('usuario');
        // $personas->contraseña=$request->get('contraseña');
        // $personas->rol=$request->get('rol');

        $users=User::find($id);
        $user->email= $request->get('usuario');;
        $user->rol= $request->get('rol');
        $user->password= bcrypt($request->get('contraseña'));
        $user->save();
        

        // $personas->save();

        return redirect('/personas');
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
        $personas=Persona::find($id);
        $personas->cuenta=1;
        $personas->save();
        User::create([
            'name' => $personas->name,
            'email' => $personas->usuario,
            'rol'=> $personas->rol,
            'password' => bcrypt($personas->contraseña),
        ])->assignRole($personas->rol);
        return redirect('/personas');
    }
    public function desabilitar($id)
    {
        $personas=Persona::find($id);
        $personas->cuenta=0;
        $personas->save();
        $aux=DB::table('users')->where('email','=',$personas->usuario)->get();
        
        
        $usuarios=User::find($aux[0]->id);
        $usuarios->active=0;
        $usuarios->save();
        return redirect('/personas');
    }
}
