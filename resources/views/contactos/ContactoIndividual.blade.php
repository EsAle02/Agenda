@extends('layout')

@section('contenido')
<br>
<br>
<br>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<title>Informacion del contacto {{$contactos->Nombre }} {{$contactos->Apellido}} </title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Informacion de Contacto ') }}: {{$contactos->Nombre}} {{$contactos->Apellido}}</div>

                    <div class="card-body">
                    <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                    name="nombre" disabled value="{{$contactos->Nombre}} " 
                                    required autocomplete="nombre" autofocus>

                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido:') }}</label>

                                <div class="col-md-6">
                                    <input id="apellido" type="text" class="form-control @error('apellido')
                                     is-invalid @enderror" disabled name="apellido" value="{{$contactos->Apellido}}" 
                                     required autocomplete="apellido" autofocus>

                                    @error('apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico:') }}</label>

                                  <div class="col-md-6">
                                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                      name="email" disabled value="{{ $contactos->correo_electronico }}" 
                                      required autocomplete="email"></input>
                                  </div>
                                </label>

                            </div>
                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono:') }}</label>

                                  <div class="col-md-6">
                                      <input id="telefono" type="telefono" class="form-control @error('telefono') is-invalid @enderror"
                                      name="telefono" disabled value="{{ $contactos->Telefono }}" 
                                      required autocomplete="email"></input>
                                  </div>
                                </label>

                            </div>


                                <a class="btn btn-danger mb-3  align-items-center " style="float:center" href="{{route('contactos.index')}}" >Regresar</a>



@endsection
