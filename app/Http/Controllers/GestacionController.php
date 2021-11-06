<?php

namespace App\Http\Controllers;

use App\Gestacion;
use App\Vacas;
use App\Toros;
use Illuminate\Http\Request;

class GestacionController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gestacion = Gestacion::orderBy('id','DESC')->paginate(3);
        return view('gestacion.gestacion_index',compact('gestacion')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vacas = Vacas::all();
        $toros = Toros::all();
        return view('gestacion.gestacion_create',['vacas' => $vacas, 'toros' => $toros]);
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
        $this->validate($request,['fecha_gesta'=>'required', 'vaca_id'=>'required', 'toro_id'=>'required']);

        Gestacion::create($request->all());
        return redirect()->route('gestacion.index')->with('success','Registro creado satisfactoriamente');
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
        $gestacion = Gestacion::find($id);
        return  view('gestacion.show',compact('gestacion'));
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
        $gestacion=Gestacion::find($id);
        return view('gestacion.edit',compact('gestacion'));
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
        $this->validate($request,['fecha_gesta'=>'required', 'vaca_id'=>'required', 'toro_id'=>'required']);

        Gestacion::find($id)->update($request->all());
        return redirect()->route('gestacion.index')->with('success','Registro actualizado satisfactoriamente');
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
        Gestacion::find($id)->delete();
        return redirect()->route('gestacion.index')->with('success','Registro eliminado satisfactoriamente');
    }
}