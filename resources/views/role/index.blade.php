@extends('admin.template.main')

@section ('title')
   Usuarios
@endsection
@section('TituloBanner')
Usuarios
@endsection


@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Usuarios</div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                
                                <th>Nombre</th>
                                
                                
                                <th>rol</th>
                              
                                 
                              @foreach ($role_user as $ru)
                              <!--{{$u=App\User::find($ru->user_id)}}-->
                              <!--{{$r=App\Role::find($ru->role_id)}}-->

                              
                                 <tr>
                                    <td>{{$u->name}}</td>
                                    <td>{{$r->name}}</td>
                                    
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

