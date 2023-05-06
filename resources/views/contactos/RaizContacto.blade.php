@extends('layout')

@section('contenido')
<h1>Lista de Contactos</h1>
<a class="btn btn-primary mb-3" style="float:right" href="{{route('contactos.create')}}" >Nuevo contacto</a>
@if(session('mensaje'))
        <div class="alert alert-success" role="alert">
            {{ session('mensaje') }}
        </div>
 @endif



<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo Electrónico</th>
        <th scope="col">Teléfono</th>
        <th>Ver</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($contactos as $item=>$contacto)
        <tr>
            <th scope="row">{{$item +1}}</td>
            <td>{{$contacto->Nombre}} {{$contacto->Apellido}}</td>
            <td>{{$contacto->correo_electronico}}</td>
            <td>{{$contacto->Telefono}}</td>
            <td><a class="btn btn-warning" href="{{ route('contactos.show', $contacto->id) }}">Ver</a></td>
            <td><a class="btn btn-primary" href="{{ route('contactos.edit', $contacto->id) }}">Editar</a></td>
            <td>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$contacto->id}}">
                Eliminar
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal{{$contacto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>¿Esta seguro que desea eliminar este contacto?</p>
                    </div>
                    <form method="post" class="modal-footer"  action="{{ route("contactos.destroy", ["contacto"=>$contacto->id]) }}">
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
            <td colspan="4">No hay contactos</td>
        </tr>
        @endforelse
    </tbody>
    
</table>
<a class="btn btn-success align-items-ringt" href="{{('/')}}">Pagina de Inicio</a>
<div class="sidebar-brand d-flex align-items-center justify-content-center" >{{ $contactos->links() }}</div>



@endsection

