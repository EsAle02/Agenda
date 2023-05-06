@extends('layout')

@section('contenido')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva Nota</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	
</head>
@if(isset($nota))
        <h1>Editar nota: </h1>
    @else
        <h1>Crear una nueva nota</h1>
    @endif
@if($errors->any())
        <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
             <li>{{ $error }}</li>
        @endforeach
@endif

    <div class="card">
        
        <div class="card-body">
            <form method="POST" action="{{ isset($nota) ? route("notas.update", ["nota"=> $nota->id]): route("notas.store") }}">
              
                @csrf
                @if(isset($nota))
                    @method('put')
                @endif
                <div class="form-group">
                    <label for="titulo">Texto:</label>
                    <input type="text" require class="form-control" name="texto" id="texto" 
                     value="{{ isset($nota) ? $nota->Texto: old("Texto") }}" 
                     placeholder="Ingrese un titulo">
                    
		        </div>

                
                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="datetime-local"
                    value="{{ isset($nota) ? $nota->Fecha: old("Fecha") }}" 
                     name="fecha" id="fecha" class="form-control @error('fecha') is-invalid @enderror"
                       required>
                    
                </div>

                <div class="form-group">
                    <label for="contacto_id">Contacto:</label>
                    <select name="contacto_id" id="contacto_id" class="form-control @error('contacto_id') is-invalid @enderror" required>
                        <option value="{{ isset($nota) ? $nota->Contacto_id: old("Contacto_id") }}">Seleccionar contacto</option>
                        @foreach($contactos as $contacto)
                            <option value="{{$contacto->id}}" >{{ $contacto->Nombre }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('notas.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection