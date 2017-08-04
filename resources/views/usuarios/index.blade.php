@extends('admin.template.main')

@section ('title')
   Usuarios
@endsection
@section('TituloBanner')
Usuarios
@endsection


@section('contenido')
<div class="container">
    <div class="row col-lg-2">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <p><a href="{{ url('usuarios/create') }}"><button class="btn btn-success">Nuevo Usuario</button></a></p>
            
        </div>

    </div>
    <div class="row col-lg-2">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <p><a href="{{url('role') }}"><button class="btn btn-success">Asignar Roles</button></a></p>
            
        </div>
                        
    </div>
    <!--@if ($message = Session::get('mensaje'))
    <div class="row">
    <div class="alert alert-success">
        <p>
            <strong>{{ $message }}</strong>
        </p>
    </div>
    </div>
    @endif-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Usuarios</div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Creación</th>
                                <th>Modificación</th>
                              
                                 
                              @foreach ($user as $usuario)
                             

                              
                                 <tr>
                                    <td>{{$usuario->id}}</td>
                                    <td>{{$usuario->name}}</td>
                                    <td>{{$usuario->email}}</td>
                                    <td>{{$usuario->created_at}}</td>
                                    <td>{{$usuario->updated_at}}</td>
                                    
                                 </tr>
                                    
                                     
                               
                             
                               @endforeach
                               
                                 
                            </table>
                        </div>
                        
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


