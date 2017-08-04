@extends('admin.template.main')

@section ('title')
   Roles de Usuario
@endsection
@section('TituloBanner')
Roles de Usuario
@endsection


@section('contenido')


 
    <form method="POST" action="http://localhost:8000/role/{{roles->user_id}}" accept-charset="UTF-8">                  
                        
                         <div class="form-group">
                           <select name="user_id" id="user_id" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                             
                             @foreach($roles as $u)
                             <option value="u->user_id">{{$u->name}}</option>
                             @endforeach
                           </select>
                         </div>

                         <div class="form-group">
                           <select name="role_id" id="role_id" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                             
                             @foreach($role as $r)
                             <option value="{{$r->id}}">{{$r->name}}</option>
                             @endforeach
                           </select>
                         </div>
        
    <div class="form-group">
      <div class="col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <input class="form-control btn btn-primary" type="submit" value="Añadir" />
          </div>
          
    </div>
    </form>
  <br>
    <div class=" col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <a href="{{url('role')}}" class="form-control btn btn-danger">Cancelar</a>
        </div>

@endsection