<?php

namespace App\Http\Controllers;

use App\Mautas;
use App\Vacas;
use App\Toros;
use Illuminate\Http\Request;

class MautasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mautas = Mautas::orderBy('id','DESC')->paginate(3);
        return view('mautas.mautas_index',compact('mautas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       $vacas = Vacas::all();
        $toros = Toros::all();
        return view('mautas.mautas_create',['vacas' => $vacas, 'toros' => $toros]);
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
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_mauta'=>'required', 'edad_mauta'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'vaca_id'=>'required', 'toro_id'=>'required', 'tipo_animal_id'=>'required']);

        Becerros::create($request->all());
        return redirect()->route('mautas.index')->with('success','Registro creado satisfactoriamente');
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
        $mautas = Mautas::find($id);
        return  view('mautas.show',compact('mautas'));
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
        $mautas=Mautas::find($id);
        return view('mautas.edit',compact('mautas'));
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
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_mauta'=>'required', 'edad_mauta'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'vaca_id'=>'required', 'toro_id'=>'required', 'tipo_animal_id'=>'required']);

        Mautas::find($id)->update($request->all());
        return redirect()->route('mautas.index')->with('success','Registro actualizado satisfactoriamente');
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
        Mautas::find($id)->delete();
        return redirect()->route('mautas.index')->with('success','Registro eliminado satisfactoriamente');
    }
}