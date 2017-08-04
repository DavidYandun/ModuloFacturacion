@extends('admin.template.main')

@section ('title')
   Roles de Usuario
@endsection
@section('TituloBanner')
Roles de Usuario
@endsection


@section('contenido')
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h3>Roles de Usuario</h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif
    </div>
  </div>
    {!!Form::open(['url'=>'role'])!!}    
                  
                        
                         <div class="form-group">
                           <select name="user_id" id="user_id" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                             
                             @foreach($user as $u)
                             <option value="{{$u->id}}" data-subtext="{{$u->email}}">{{$u->name}}</option>
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
  {!!Form::close()!!}
  <br>
    <div class=" col-lg-offset-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
              <a href="{{url('tipocliente')}}" class="form-control btn btn-danger">Cancelar</a>
        </div>
</div>
@endsection