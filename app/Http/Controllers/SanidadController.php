<?php

namespace App\Http\Controllers;

use App\Sanidad;
use Illuminate\Http\Request;

class SanidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sanidad=Sanidad::orderBy('id','DESC')->paginate(3);
        return view('sanidad.sanidad_index',compact('sanidad')); 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sanidad.sanidad_create');
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
        $this->validate($request,[ 'fecha'=>'required', 'nombre_medica'=>'required', 'descripcion'=>'required']);
        Sanidad::create($request->all());
        return redirect()->route('sanidad.index')->with('success','Registro creado satisfactoriamente');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sanidad=Sanidad::find($id);
        return  view('sanidad.show',compact('sanidad'));
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
        $sanidad=Sanidad::find($id);
        return view('sanidad.edit',compact('sanidad'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)    {
        //
       $this->validate($request,[ 'fecha'=>'required', 'nombre_medica'=>'required', 'descripcion'=>'required']);
 
        Sanidad::find($id)->update($request->all());
        return redirect()->route('sanidad.index')->with('success','Registro actualizado satisfactoriamente');
 
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
        Sanidad::find($id)->delete();
        return redirect()->route('sanidad.index')->with('success','Registro eliminado satisfactoriamente');
    }
}