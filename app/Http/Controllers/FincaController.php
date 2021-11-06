<?php

namespace App\Http\Controllers;

use App\Finca;
use Illuminate\Http\Request;

class FincaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $finca=Finca::orderBy('id','DESC')->paginate(3);
        return view('finca.finca_index',compact('finca')); 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('finca.finca_create');
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
        $this->validate($request,[ 'nombre'=>'required', 'cant_metros'=>'required', 'total_animales'=>'required', 'pasto_usado'=>'required']);
        Finca::create($request->all());
        return redirect()->route('finca.index')->with('success','Registro creado satisfactoriamente');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $finca=Finca::find($id);
        return  view('finca.show',compact('finca'));
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
        $finca=Finca::find($id);
        return view('finca.finca_edit',compact('finca'));
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
       $this->validate($request,[ 'nombre'=>'required', 'cant_metros'=>'required', 'total_animales'=>'required', 'pasto_usado'=>'required']);
 
        Finca::find($id)->update($request->all());
        return redirect()->route('finca.index')->with('success','Registro actualizado satisfactoriamente');
 
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
         Finca::find($id)->delete();
        return redirect()->route('finca.index')->with('success','Registro eliminado satisfactoriamente');
    }
}