<?php

namespace App\Http\Controllers;

use App\Toros;
use App\TipoAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade as PDF;

class TorosController extends Controller
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
        $toros = Toros::orderBy('id','DESC')->paginate(10);
        return view('toros.toros_index',compact('toros')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoAnimal = TipoAnimal::all();

        return view('toros.toros_create', [
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
        $this->validate($request,['num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_toro', 'edad_toro'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'peso_inclu_servi'=>'required', 'hijas_provadas' ,'num_registro_papa'=>'required' ,'num_registro_mama'=>'required',  'tipo_animal_id'=>'required']);

       
        $Toros = Toros::create($request->all());

        if($request->hasFile('img_toro')){
            $nameToro        = $Toros->id.'_'.time().'_'.time().$request->num_registro.'.jpg';
            $imgToro         = $request->file('img_toro');
            $destinationPath = public_path('uploads\toros');
            $imgToro->move($destinationPath, $nameToro);
            Toros::where('id',$Toros->id)->update([
            'img_toro'       => $nameToro
        ]);
        }
        if($request->hasFile('img_padre_toro') ){
            $nameToro_padre  = $Toros->id.'_'.time().'_'.$request->num_registro_papa.'.jpg';
            $imgPadre        = $request->file('img_padre_toro');
            $destinationPath = public_path('uploads\toros');
            $imgPadre->move($destinationPath, $nameToro_padre);
            Toros::where('id',$Toros->id)->update([
            'img_padre_toro' => $nameToro_padre
        ]);
        }
        if ($request->hasFile('img_madre_toro')) {
            $nameToro_madre  = $Toros->id.'_'.time().'_'.time().$request->num_registro_mama.'.jpg'; 
            $imgMadre        = $request->file('img_madre_toro');
            $destinationPath = public_path('uploads\toros');
            $imgMadre->move($destinationPath, $nameToro_madre);

            Toros::where('id',$Toros->id)->update([
            'img_madre_toro' => $nameToro_madre
            ]);
        }

        return redirect()->route('toros.index')->with('success','Registro creado satisfactoriamente');

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
        $toros = Toros::find($id);
        return  view('toros.show',compact('toros'));
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
        $toros = Toros::find($id);

        $tipoAnimal = TipoAnimal::all();

        return view('toros.toros_edit', [
            'tipoAnimal' => $tipoAnimal, 'toros' => $toros
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
        $this->validate($request,['num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_toro', 'edad_toro'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'peso_inclu_servi'=>'required', 'hijas_provadas' ,'num_registro_papa'=>'required' ,'num_registro_mama'=>'required',  'tipo_animal_id'=>'required']);
       
        $toro = Toros::find($id);
        Toros::find($id)->update($request->all());

        if($request->hasFile('img_toro')){
            $dirimgs = public_path().'/uploads/'.$toro->img_toro;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameToro        = $id.'_'.time().$request->num_registro.'.jpg';
            $imgToro         = $request->file('img_toro');
            $destinationPath = public_path('uploads\toros');
            $imgToro->move($destinationPath, $nameToro);
            Toros::where('id',$id)->update([
                'img_toro'       => $nameToro,
            ]);
    
        }
        if($request->hasFile('img_padre_toro') ){
            $dirimgs = public_path().'/uploads/'.$toro->img_padre_toro;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameToro_padre  = $id.'_'.time().'_'.$request->num_registro_papa.'.jpg';
            $imgPadre        = $request->file('img_padre_toro');
            $destinationPath = public_path('uploads\toros');
            $imgPadre->move($destinationPath, $nameToro_padre);
            Toros::where('id',$id)->update([
                'img_padre_toro' => $nameToro_padre,
            ]);
    
        }
        if ($request->hasFile('img_madre_toro')) {
            $dirimgs = public_path().'/uploads/'.$toro->img_madre_toro;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameToro_madre  = $id.'_'.time().'_'.time().$request->num_registro_mama.'.jpg'; 
            $imgMadre        = $request->file('img_madre_toro');
            $destinationPath = public_path('uploads\toros');
            $imgMadre->move($destinationPath, $nameToro_madre);
            Toros::where('id',$id)->update([
                'img_madre_toro' => $nameToro_madre,
            ]);
    
        }

        return redirect()->route('toros.index')->with('success','Registro actualizado satisfactoriamente');
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
        Toros::find($id)->delete();
        return redirect()->route('toros.index')->with('success','Registro eliminado satisfactoriamente');
    }

    public function download()
    {
        $toros = Toros::orderBy('id','DESC')->get(); 
        $pdf = PDF::loadView('toros.toros_report',['toros'=>$toros]);

        return $pdf->download('reporte_toros.pdf');
       
      
    }
}
