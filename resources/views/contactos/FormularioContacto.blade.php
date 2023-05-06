<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Contacto</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	
</head>
@if(isset($Contacto))
        <h1>Editar el Contacto: {{$Contacto->Nombre}} {{$Contacto->Apellido}}</h1>
    @else
        <h1>Crear un nuevo Contacto</h1>
    @endif
@if($errors->any())
        <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
             <li>{{ $error }}</li>
        @endforeach
     @endif
<body>
	<div class="container mt-4">
		

     
		<hr>
		<form method="POST" action="{{ isset($Contacto) ? route("contactos.update", ["contacto"=> $Contacto->id]): route("contactos.store") }}" >
		@csrf
		@if(isset($Contacto))
            @method('put')
        @endif
			<div class="form-group">
				<label for="nombre">Nombre:</label>
				<input type="text" require class="form-control" name="nombre" id="nombre"  value="{{ isset($Contacto) ? $Contacto->Nombre: old("Nombre") }}" placeholder="Escriba su Nombre">
				
			</div>
			<div class="form-group">
				<label for="apellido">Apellido:</label>
				<input type="text" require class="form-control" name="apellido" value="{{ isset($Contacto) ? $Contacto->Apellido: old("Apelldio") }}" id="apellido" placeholder="Escriba su Apellido">
				
			</div>

			<div class="form-group">
				<label for="correo_electronico">Correo electrónico:</label>
				<input type="email" require name="correo_electronico" class="form-control"
				value="{{ isset($Contacto) ? $Contacto->correo_electronico: old("correo_electronico") }}" id="correo_electronico" placeholder="Corre electronico">
				
			</div>
			<div class="form-group">
				<label for="telefono">Teléfono:</label>
				<input type="tel" require class="form-control" value="{{ isset($Contacto) ? $Contacto->Telefono: old("Telefono") }}" id="telefono" name="telefono" placeholder="Teléfono">
				
			</div>
			<button type="submit" class="btn btn-primary mb-3">Guardar</button>
			<a class="btn btn-danger mb-3" style="text-aling:center" href="{{route('contactos.index')}}" >Cancelar</a>
		</form>
	</div>

</body>
</html>
