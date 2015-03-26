@extends('admin.layouts.layout')

@section('content')

<div class = 'form-wrap'>

<h1>Editar utilizador</h1>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

{{ Form::model($user, array('route' => array('admin.user.update', $user->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}

    <div class = 'form-group'>
        {{Form::label('name', 'Nome')}}
        {{Form::text('name', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('email','Email')}}
        {{Form::email('email', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('phone','Telefone')}}
        {{Form::text('phone', null, array('class' => 'form-control'))}}
    </div>

 	<div class = 'form-group'>
        {{Form::label('address', 'Morada')}}
        {{Form::text('address', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>       
        {{Form::label('location', 'Localização')}}
        {{Form::select('location', $locations, null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>       
        {{Form::label('entity_type', 'Tipo de entidade')}}
        {{Form::select('entity_type', $entities, null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>  
        {{Form::label('company_name', 'Nome da companhia')}}
        {{Form::text('company_name', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::submit('Gravar',array('id' => 'submit', 'class' => 'btn btn-primary'))}}
    </div>

    {{ Form::close() }}

    {{ Form::open(array('method' => 'delete', 'class' => 'form-horizontal', 'route' => array('admin.user.destroy', $user->id), 'onsubmit' => 'return ConfirmDelete()')) }}
        
        <div class = 'form-group'>
            {{Form::submit('Apagar utilizador',array('id' => 'submit', 'class' => 'btn btn-danger'))}}
        </div>

    {{ Form::close() }}

</div>

<script>

  function ConfirmDelete() {
      var x = confirm("Tem a certeza que deseja apagar o utilizador?");
      if (x)
        return true;
      else
        return false;
  }

</script>

@stop