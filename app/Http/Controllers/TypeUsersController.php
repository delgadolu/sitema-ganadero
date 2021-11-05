<?php

namespace App\Http\Controllers;

use App\TypeUser;
use Illuminate\Http\Request;

class TypeUsersController extends Controller
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
    
        $audits = TypeUser::all();

        return view('type_user.type_user_index', [
            'users' => $audits
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("type_user.type_user_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typeUser = new TypeUser($request->input());
        $typeUser->saveOrFail();
        return redirect()->route('type_user.index')->with(['mensaje' => 'Tipo de Usuario creado']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeUser  $typeUser
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeUser $typeUser)
    {
        return view("type_user.type_user_edit", ["typeUsers" => $typeUser]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeUser  $typeUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeUser $typeUser)
    {
        $typeUser->fill($request->input())->saveOrFail();
        return redirect()->route("type_user.index")->with(["mensaje" => "Tipo de Usuario actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeUser  $typeUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeUser $typeUser)
    {
        $typeUser->delete();
        return redirect()->route("type_user.index")->with(["mensaje" => "Tipo de Usuario eliminado"]);
    }
}
