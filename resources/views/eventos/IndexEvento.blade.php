@extends('layout')

@section('contenido')
<h1><strong>Lista de Eventos</strong></h1>
@if(session('mensaje'))
        <div class="alert alert-success" role="alert">
            {{ session('mensaje') }}
        </div>
 @endif

<a class="btn btn-primary mb-3" style="float:right" href="{{route('eventos.create')}}" >Nuevo Evento</a>

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">id</th>
        <th scope="col">Titulo</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Fecha de inicio</th>
        <th scope="col">Fecha de finalización</th>
        <th scope="col">Contacto_id</th>
        <th>Ver</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
        @forelse($eventos as $item=> $evento)
        <tr>
            <th scope="row">{{$item + 1}}</td>
            <td>{{$evento->Titulo}}</td>
            <td>{{$evento->Descripcion}}</td>
            <td>{{$evento->Fecha_inicio}}</td>
            <td>{{$evento->Fecha_fin}}</td>
            <td>{{$evento->contacto_id}}</td>
            <td><a class="btn btn-warning" href="{{ route('eventos.show', $evento->id) }}">Ver</a></td>
            <td><a class="btn btn-primary" href="{{ route('eventos.edit', $evento->id) }}">Editar</a></td>
            <td>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$evento->id}}">
                Eliminar
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal{{$evento->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>¿Esta seguro que desea eliminar este Evento?</p>
                    </div>
                    <form method="post" class="modal-footer"  action="{{ route("eventos.destroy", ["evento"=>$evento->id]) }}">
                      @method("delete")
                      @csrf
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>
                  </div>
                </div>
              </div>
            </td>
          </tr>

        @empty
        <tr>
            <td colspan="4">No hay eventos</td>
        </tr>
        @endforelse
    </tbody>
</table>
<a class="btn btn-success align-items-ringt" href="{{('/')}}">Pagina de Inicio</a>
<div class="sidebar-brand d-flex align-items-center justify-content-center" >{{ $eventos->links() }}</div>

@endsection
