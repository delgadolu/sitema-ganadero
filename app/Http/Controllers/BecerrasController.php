<?php

namespace App\Http\Controllers;

use App\Becerras;
use Illuminate\Http\Request;

class BecerrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $becerras = Becerras::orderBy('id','DESC')->paginate(3);
        return view('becerras.becerras_index',compact('becerras')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('becerras.becerras_create');
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
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_becerra'=>'required', 'edad_becerra'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'vaca_id'=>'required', 'toro_id'=>'required', 'tipo_animal_id'=>'required']);

        Becerras::create($request->all());
        return redirect()->route('becerras.index')->with('success','Registro creado satisfactoriamente');
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
        $becerras = Becerras::find($id);
        return  view('becerras.show',compact('becerras'));
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
        $becerras=Becerras::find($id);
        return view('becerras.edit',compact('becerras'));
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
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_becerra'=>'required', 'edad_becerra'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'vaca_id'=>'required', 'toro_id'=>'required', 'tipo_animal_id'=>'required']);

        Becerras::find($id)->update($request->all());
        return redirect()->route('becerras.index')->with('success','Registro actualizado satisfactoriamente');
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
        Becerras::find($id)->delete();
        return redirect()->route('becerras.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
