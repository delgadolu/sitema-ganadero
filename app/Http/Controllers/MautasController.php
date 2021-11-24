<?php

namespace App\Http\Controllers;

use App\Mautas;
use App\TipoAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade as PDF;
use App\Vacas;
use App\Toros;

class MautasController extends Controller
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
        
        $tipoAnimal = TipoAnimal::all();
        $vacas = Vacas::all();
        $toros = Toros::all();
        return view('mautas.mautas_create',[
            'vacas'      => $vacas, 
            'toros'      => $toros,
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
        $this->validate($request,['num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_nobilla', 'edad_nobilla'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'num_registro_papa'=>'required','num_registro_mama'=>'required',  'tipo_animal_id'=>'required']);

        $Mautas = Mautas::create($request->all());

         if($request->hasFile('img_mauta')){
            $nameMauta        = $Mautas->id.'_'.time().'_'.time().$request->num_registro.'.jpg';
            $imgMauta         = $request->file('img_mauta');
            $destinationPath = public_path('uploads\mautas');
            $imgMauta->move($destinationPath, $nameMauta);

            Mautas::where('id',$Mautas->id)->update([
                'img_mauta'       => $nameMauta
            ]);
        }
        if($request->hasFile('img_padre_mauta') ){
            $nameMauta_padre  = $Mautas->id.'_'.time().'_'.$request->num_registro_papa.'.jpg';
            $imgPadre        = $request->file('img_padre_mauta');
            $destinationPath = public_path('uploads\mautas');
            $imgPadre->move($destinationPath, $nameMauta_padre);

            Mautas::where('id',$Mautas->id)->update([
                'img_padre_mauta' => $nameMauta_padre
            ]);
        }
        if ($request->hasFile('img_madre_mauta')) {
            $namemauta_madre  = $Mautas->id.'_'.time().'_'.time().$request->num_registro_mama.'.jpg'; 
            $imgMadre        = $request->file('img_madre_mauta');
            $destinationPath = public_path('uploads\mautas');
            $imgMadre->move($destinationPath, $nameMauta_madre);

            Mautas::where('id',$Mautas->id)->update([
                'img_madre_mauta' => $nameMauta_madre
            ]);
        }

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
        $mautas= Mautas::find($id);

        $tipoAnimal = TipoAnimal::all();

        return view('mautas.mautas_edit', [
            'tipoAnimal' => $tipoAnimal, 'mautas' => $mautas
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
        $this->validate($request,['num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_nobilla', 'edad_nobilla'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'num_registro_papa'=>'required','num_registro_mama'=>'required',  'tipo_animal_id'=>'required']);

        $mautas = Mautas::find($id);
        Mautas::find($id)->update($request->all());

        if($request->hasFile('img_mauta')){
            $dirimgs = public_path().'/uploads/'.$mautas->img_toro;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameMauta        = $id.'_'.time().$request->num_registro.'.jpg';
            $imgMauta         = $request->file('img_mauta');
            $destinationPath = public_path('uploads\mautas');
            $imgMauta->move($destinationPath, $nameMauta);
            Mautas::where('id',$id)->update([
                'img_mauta'       => $nameMauta
            ]);
    
        }
        if($request->hasFile('img_padre_mauta') ){
            $dirimgs = public_path().'/uploads/'.$mautas->img_padre_mauta;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameMauta_padre  = $id.'_'.time().'_'.$request->num_registro_papa.'.jpg';
            $imgPadre        = $request->file('img_padre_mauta');
            $destinationPath = public_path('uploads\mautas');
            $imgPadre->move($destinationPath, $nameMauta_padre);
            Mautas::where('id',$id)->update([
                'img_padre_mauta' => $nameMauta_padre
            ]);
    
        }
        if ($request->hasFile('img_madre_mauta')) {
            $dirimgs = public_path().'/uploads/'.$mautas->img_madre_mauta;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameMauta_madre  = $id.'_'.time().'_'.time().$request->num_registro_mama.'.jpg'; 
            $imgMadre        = $request->file('img_madre_mauta');
            $destinationPath = public_path('uploads\toros');
            $imgMadre->move($destinationPath, $nameMauta_madre);
            Mautas::where('id',$id)->update([
                'img_madre_mauta' => $nameMauta_madre
            ]);
    
        }

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

    public function download()
    {
        $mautas = Mautas::orderBy('id','DESC')->get(); 
        $pdf = PDF::loadView('mautas.mautas_report',['mautas'=>$mautas]);

        return $pdf->download('reporte_mautas.pdf');
       
      
    }
}