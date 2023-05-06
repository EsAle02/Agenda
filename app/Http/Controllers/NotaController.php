<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Contacto;

class NotaController extends Controller
{
    public function index(){
        $notas = Nota::with('contacto')->paginate(10);
        return view('notas.IndexNotas', compact('notas'));
    }

    public function show($id){
        $nota = Nota::with('contacto')->findOrfail($id);
        $contactos = Contacto::orderBy('nombre')->get();
        return view('notas.notasIndividual', compact('contactos','nota'));
    }

    public function create()
    {
        $contactos = Contacto::orderBy('nombre')->get();
        return view('notas.formularioNotas', compact('contactos'));
    }

    public function store(Request $request){
        $request->validate([
            'texto'=>'required|max:250',
            
            'fecha'=>'required|date',

        ]);

        $nota= new Nota();
        $nota->Texto = $request->input('texto');
        $nota->Fecha = $request->input('fecha');
        $nota->contacto_id = $request->input('contacto_id');

        $creado = $nota->save();
        if($creado) {
            return redirect()->route('notas.index')->with('mensaje','La nota fue creado exitosamente');
        }
        else{
            return back();
        }
    }
    public function edit($id){
        $nota = Nota::FindOrfail($id);
        $contactos = Contacto::orderBy('nombre')->get();
        return view('notas.formularioNotas', compact('contactos','nota'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'texto'=>'required|max:250',
            
            'fecha'=>'required|date',

        ]);

        $nota = Nota::find($id);
        $nota= new Nota();
        $nota->Texto = $request->input('texto');
        $nota->Fecha = $request->input('fecha');
        $nota->contacto_id = $request->input('contacto_id');


        $creado = $nota->save();
        if($creado){
        return redirect()->route('notas.index')->with('mensaje', 'Nota actualizado exitosamente.');
        }
        else{
        return back();
        }
    }

    public function destroy($id){
        $nota = Nota::find($id);
        $nota->delete();
        return redirect()->route('notas.index')->with('mensaje', 'Nota eliminado exitosamente');
}
}
