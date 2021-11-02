<?php

namespace App\Http\Controllers;

use App\Vacas;
use Illuminate\Http\Request;

class VacasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Vacas = Vacas::orderBy('id','DESC')->paginate(3);
        return view('Vacas.Vacas_index',compact('Vacas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Vacas.Vacas_create');
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
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_vaca'=>'required', 'edad_vaca'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'peso_pri_servi'=>'required', 'edad_servi'=>'required', 'num_partos'=>'required', 'hijas_provadas'=>'required', 'tipo_animal_id'=>'required']);

        Vacas::create($request->all());
        return redirect()->route('Vacas.index')->with('success','Registro creado satisfactoriamente');
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
        $Vacas = Vacas::find($id);
        return  view('Vacas.show',compact('Vacas'));
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
        $Vacas=Vacas::find($id);
        return view('Vacas.edit',compact('Vacas'));
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
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_vaca'=>'required', 'edad_vaca'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'peso_pri_servi'=>'required', 'edad_servi'=>'required', 'num_partos'=>'required', 'hijas_provadas'=>'required', 'tipo_animal_id'=>'required']);
 
        Vacas::find($id)->update($request->all());
        return redirect()->route('Vacas.index')->with('success','Registro actualizado satisfactoriamente');
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
        Vacas::find($id)->delete();
        return redirect()->route('Vacas.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
