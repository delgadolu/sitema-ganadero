<?php

namespace App\Http\Controllers;

use App\Toretes;
use App\Vacas;
use App\Toros;
use Illuminate\Http\Request;

class ToretesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $toretes = Toretes::orderBy('id','DESC')->paginate(3);
        return view('toretes.toretes_index',compact('toretes')); 
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
        return view('toretes.toretes_create',['vacas' => $vacas, 'toros' => $toros]);
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
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_torete'=>'required', 'edad_torete'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'vaca_id'=>'required', 'toro_id'=>'required', 'tipo_animal_id'=>'required']);

        Toretes::create($request->all());
        return redirect()->route('toretes.index')->with('success','Registro creado satisfactoriamente');
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
        $toretes = Toretes::find($id);
        return  view('toretes.show',compact('toretes'));
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
        $toretes=Toretes::find($id);
        return view('toretes.edit',compact('toretes'));
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
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_torete'=>'required', 'edad_torete'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'vaca_id'=>'required', 'toro_id'=>'required', 'tipo_animal_id'=>'required']);

        Toretes::find($id)->update($request->all());
        return redirect()->route('toretes.index')->with('success','Registro actualizado satisfactoriamente');
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
        Toretes::find($id)->delete();
        return redirect()->route('toretes.index')->with('success','Registro eliminado satisfactoriamente');
    }
}