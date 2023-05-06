@extends('layout')

@section('contenido')
<br>
<br>
<br>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<title>ver evento </title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Informacion del evento ') }}: {{$evento->Titulo}} </div>

                    <div class="card">
        
        <div class="card-body">
            <form method="POST" action="{{ isset($evento) ? route("eventos.update", ["evento"=> $evento->id]): route("eventos.store") }}">
              
                @csrf
                @if(isset($evento))
                    @method('put')
                @endif
                <div class="form-group">
                    <label for="titulo">Titulo:</label>
                    <input type="text" require class="form-control" name="titulo" id="titulo" 
                     value="{{ isset($evento) ? $evento->Titulo: old("Titulo") }}" 
                     placeholder="Ingrese un titulo">
                    
		        </div>

                
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input name="descripcion" id="descripcion" 
                    value="{{ $evento->Descripcion}}"
                    height="1"
                    class="form-control @error('descripcion') is-invalid @enderror"></input>
                    
                </div>


                <div class="form-group">
                    <label for="fecha_ini">Fecha de Inicio:</label>
                    <input type="datetime-local" value="{{$evento->Fecha_inicio }}" 
                    name="fecha_ini" id="fecha_ini" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha') }}" required>
                    
                </div>
                <div class="form-group">
                    <label for="fecha_fin">Fecha de Finalizacion:</label>
                    <input type="datetime-local"
                    value="{{$evento->Fecha_fin}}" 
                     name="fecha_fin" id="fecha_fin" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha') }}" required>
                    
                </div>

                <div class="form-group">
                    <label for="contacto_id">Contacto al que pertenece el evento:</label>
                    <input 
                    @extends('layout')

@section('contenido')
<br>
<br>
<br>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<title>ver evento </title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Informacion del evento ') }}: {{$evento->Titulo}} </div>

                    <div class="card">
        
        <div class="card-body">
            <form method="POST" action="{{ isset($evento) ? route("eventos.update", ["evento"=> $evento->id]): route("eventos.store") }}">
              
                @csrf
                @if(isset($evento))
                    @method('put')
                @endif
                <div class="form-group">
                    <label for="titulo">Titulo:</label>
                    <input type="text" require class="form-control" name="titulo" id="titulo" 
                     value="{{ isset($evento) ? $evento->Titulo: old("Titulo") }}" 
                     placeholder="Ingrese un titulo">
                    
		        </div>

                
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input name="descripcion" id="descripcion" 
                    value="{{ $evento->Descripcion}}"
                    height="1"
                    class="form-control @error('descripcion') is-invalid @enderror"></input>
                    
                </div>


                <div class="form-group">
                    <label for="fecha_ini">Fecha de Inicio:</label>
                    <input type="datetime-local" value="{{$evento->Fecha_inicio }}" 
                    name="fecha_ini" id="fecha_ini" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha') }}" required>
                    
                </div>
                <div class="form-group">
                    <label for="fecha_fin">Fecha de Finalizacion:</label>
                    <input type="datetime-local"
                    value="{{$evento->Fecha_fin}}" 
                     name="fecha_fin" id="fecha_fin" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha') }}" required>
                    
                </div>

                <div class="form-group">
                    <label for="contacto_id">Contacto al que pertenece el evento:</label>
                    <input 
                    value="{{  $evento->contacto->Nombre}} {{  $evento->contacto->Apellido}}" 
                     name="contacto_id" id="contacto_id" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha') }}" required>
                    
                </div>

                
                
            </form>
        </div>
    </div>


                                <a class="btn btn-danger mb-3  align-items-center " style="float:center" href="{{route('eventos.index')}}" >Regresar</a>



@endsection

                     </div>

                
                
            </form>
        </div>
    </div>


                                <a class="btn btn-danger mb-3  align-items-center " style="float:center" href="{{route('eventos.index')}}" >Regresar</a>



@endsection
