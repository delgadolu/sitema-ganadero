<?php

namespace App\Http\Controllers;

use App\Toretes;
use App\Vacas;
use App\Toros;
use App\TipoAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade as PDF;

class ToretesController extends Controller
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
        $toretes = Toretes::orderBy('id','DESC')->paginate(10);
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

        $tipoAnimal = TipoAnimal::all();
        $vacas = Vacas::all();
        $toros = Toros::all();
        return view('toretes.toretes_create',[
            'vacas' => $vacas, 
            'toros' => $toros,
            'tipoAnimal' => $tipoAnimal
        ]);
        
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
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_torete'=>'required', 'edad_torete'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'num_registro_papa'=>'required', 'num_registro_mama'=>'required', 'tipo_animal_id'=>'required']);

        $Toretes = Toretes::create($request->all());

        if($request->hasFile('img_torete')){
            $nameTorete        = $Toretes->id.'_'.time().'_'.time().$request->num_registro.'.jpg';
            $imgTorete         = $request->file('img_torete');
            $destinationPath = public_path('uploads\toretes');
            $imgTorete->move($destinationPath, $nameTorete);

            Toretes::where('id',$Toretes->id)->update([
                'img_torete'       => $nameTorete
            ]);
        }
        if($request->hasFile('img_padre_torete') ){
            $nameTorete_padre  = $Toretes->id.'_'.time().'_'.$request->num_registro_papa.'.jpg';
            $imgPadre        = $request->file('img_padre_torete');
            $destinationPath = public_path('uploads\toretes');
            $imgPadre->move($destinationPath, $nameTorete_padre);

            Toretes::where('id',$Toretes->id)->update([
                'img_padre_torete' => $nameTorete_padre
            ]);
        }
        if ($request->hasFile('img_madre_torete')) {
            $nameTorete_madre  = $Toretes->id.'_'.time().'_'.time().$request->num_registro_mama.'.jpg'; 
            $imgMadre        = $request->file('img_madre_toretes');
            $destinationPath = public_path('uploads\toretes');
            $imgMadre->move($destinationPath, $nameTorete_madre);

             Toretes::where('id',$Toretes->id)->update([
                'img_madre_torete' => $nameTorete_madre,
            ]);
        }

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
        $toretes = Toretes::find($id);
        $tipoAnimal = TipoAnimal::all();
        $vacas = Vacas::all();
        $toros = Toros::all();

        return view('toretes.toretes_edit', [
            'tipoAnimal' => $tipoAnimal, 
            'toretes'    => $toretes,
            'vacas'      => $vacas,
            'toros'      => $toros
        ]);

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
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_torete'=>'required', 'edad_torete'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'num_registro_papa'=>'required', 'num_registro_mama'=>'required', 'tipo_animal_id'=>'required']);

        $toretes = Toretes::find($id);
        Toretes::find($id)->update($request->all());

        if($request->hasFile('img_torete')){
            $dirimgs = public_path().'/uploads/'.$toretes->img_torete;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameTorete        = $id.'_'.time().$request->num_registro.'.jpg';
            $imgTorete         = $request->file('img_torete');
            $destinationPath = public_path('uploads\toretes');
            $imgTorete->move($destinationPath, $nameTorete);
            Toretes::where('id',$id)->update([
                'img_torete'       => $nameTorete,
            ]);
    
        }
        if($request->hasFile('img_padre_torete') ){
            $dirimgs = public_path().'/uploads/'.$toretes->img_padre_torete;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameTorete_padre  = $id.'_'.time().'_'.$request->num_registro_papa.'.jpg';
            $imgPadre        = $request->file('img_padre_torete');
            $destinationPath = public_path('uploads\toros');
            $imgPadre->move($destinationPath, $nameTorete_padre);
            Toretes::where('id',$id)->update([
                'img_padre_torete' => $nameTorete_padre,
            ]);
    
        }
        if ($request->hasFile('img_madre_torete')) {
            $dirimgs = public_path().'/uploads/'.$toretes->img_madre_torete;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameTorete_madre  = $id.'_'.time().'_'.time().$request->num_registro_mama.'.jpg'; 
            $imgMadre        = $request->file('img_madre_torete');
            $destinationPath = public_path('uploads\toretes');
            $imgMadre->move($destinationPath, $nameTorete_madre);
            Toretes::where('id',$id)->update([
                'img_madre_torete' => $nameTorete_madre,
            ]);
        }

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

    public function download()
    {
        $toretes = Toretes::orderBy('id','DESC')->get(); 
        $pdf = PDF::loadView('toretes.toretes_report',['toretes'=>$toretes]);

        return $pdf->download('reporte_toretes.pdf');
       
      
    }
}