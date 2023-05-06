@extends('layout')

@section('contenido')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Contacto</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	
</head>
@if(isset($evento))
        <h1>Editar el Evento: </h1>
    @else
        <h1>Crear un nuevo Evento</h1>
    @endif
@if($errors->any())
        <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
             <li>{{ $error }}</li>
        @endforeach
@endif

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
                    value="{{ isset($evento) ? $evento->Descripcion: old("Descripcion") }}"
                    height="1"
                    class="form-control @error('descripcion') is-invalid @enderror"></input>
                    
                </div>


                <div class="form-group">
                    <label for="fecha_ini">Fecha de Inicio:</label>
                    <input type="datetime-local" value="{{ isset($evento) ? $evento->Fecha_inicio: old("Fecha_inicio") }}" 
                    name="fecha_ini" id="fecha_ini" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha') }}" required>
                    
                </div>
                <div class="form-group">
                    <label for="fecha_fin">Fecha de Finalizacion:</label>
                    <input type="datetime-local"
                    value="{{ isset($evento) ? $evento->Fecha_fin: old("Fecha_fin") }}" 
                     name="fecha_fin" id="fecha_fin" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha') }}" required>
                    
                </div>

                <div class="form-group">
                    <label for="contacto_id">Contacto:</label>
                    <select name="contacto_id" id="contacto_id" class="form-control @error('contacto_id') is-invalid @enderror" required>
                        <option value="{{ isset($evento) ? $evento->contacto_id: old("contacto_id") }}">Seleccionar contacto</option>
                        @foreach($contactos as $contacto)
                            <option value="{{$contacto->id}}" >{{ $contacto->Nombre }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('eventos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
