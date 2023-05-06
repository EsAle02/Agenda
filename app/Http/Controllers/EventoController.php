<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Contacto;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(){
        $eventos = Evento::with('contacto')->paginate(10);
        return view('eventos.indexEvento', compact('eventos'));
    }

    public function show($id){
        $evento = Evento::with('contacto')->findOrfail($id);
        $contactos = Contacto::orderBy('nombre')->get();
        return view('eventos.EventoIndividual', compact('contactos','evento'));
    }

    public function create()
    {
        $contactos = Contacto::orderBy('nombre')->get();
        return view('eventos.FormularioEvento', compact('contactos'));
    }

    public function store(Request $request){
        $request->validate([
            'titulo'=>'required|alpha|max:250',
            'descripcion' => 'required|alpha',
            'fecha_ini'=>'required|date',
            'fecha_fin'=>'required|date'

        ]);

        $evento = new Evento();
        $evento->Titulo = $request->input('titulo');
        $evento->Descripcion = $request->input('descripcion');
        $evento->Fecha_inicio = $request->input('fecha_ini');
        $evento->Fecha_fin = $request->input('fecha_fin');
        $evento->contacto_id = $request->input('contacto_id');

        $creado = $evento->save();
        if($creado) {
            return redirect()->route('eventos.index')->with('mensaje','El evento fue creado exitosamente');
        }
        else{
            return back();
        }
    }
    public function edit($id){
        $evento = Evento::FindOrfail($id);
        $contactos = Contacto::orderBy('nombre')->get();
        return view('eventos.FormularioEvento', compact('contactos','evento'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'titulo'=>'required|max:250',
            'descripcion'=>'required',
            'fecha_ini'=>'required',
            'fecha_fin'=>'required'
        ]);

        $evento = Evento::find($id);
        $evento->Titulo = $request['titulo'];
        $evento->Descripcion = $request['descripcion'];
        $evento->Fecha_inicio = $request['fecha_ini'];
        $evento->Fecha_fin = $request['fecha_fin'];
        $evento->contacto_id = $request['contacto_id'];

        $creado = $evento->save();
        if($creado){
        return redirect()->route('eventos.index')->with('mensaje', 'Evento actualizado exitosamente.');
        }
        else{
        return back();
        }
    }

    public function destroy($id){
        $eventos = Evento::find($id);
        $eventos->delete();
        return redirect()->route('eventos.index')->with('mensaje', 'Evento eliminado exitosamente');
}
}
