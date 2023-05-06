@extends('layout')

@section('contenido')
<br>
<br>
<br>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<title>ver Notas </title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Informacion del evento ') }}: {{$nota->id}} </div>

                    <div class="card">
        
        <div class="card-body">
            <form method="POST" >
              
                @csrf
                @if(isset($evento))
                    @method('put')
                @endif
                <div class="form-group">
                    <label for="titulo">Texto:</label>
                    <input type="text" require class="form-control" name="titulo" id="titulo" 
                     value="{{ isset($nota) ? $nota->Texto: old("Texto") }}" 
                     placeholder="Ingrese un titulo">
                    
		        </div>

                
               


                <div class="form-group">
                    <label for="fecha">Fecha de Inicio:</label>
                    <input type="datetime-local" value="{{$nota->Fecha }}" 
                    name="fecha" id="fecha" class="form-control @error('fecha') is-invalid @enderror"
                      required>
                    
                

                <div class="form-group">
                    <label for="contacto_id">Contacto al que pertenece la Nota:</label>
                    <input 
                    value="{{ isset($nota) ? $nota->Contacto_id: old("Contacto_id") }}"
                     name="contacto_id" id="contacto_id"
                      class="form-control "
                       required>
                    
                </div>

                
                
            </form>
        </div>
    </div>


                                <a class="btn btn-danger mb-3  align-items-center " style="float:center" href="{{route('notas.index')}}" >Regresar</a>



@endsection
