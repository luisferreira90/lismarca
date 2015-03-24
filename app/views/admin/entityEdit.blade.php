@extends('admin.layouts.layout')

@section('content')

<h1>Editar tipo de entidade</h1>

<div>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

{{ Form::model($entity, array('route' => array('admin.entity.update', $entity->id), 'method' => 'PUT')) }}

    <div class = 'form-group'>
            {{Form::label('name_pt', 'Nome PT')}}
            {{Form::text('name_pt', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
            {{Form::label('name_en', 'Nome EN')}}
            {{Form::text('name_en', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::submit('Gravar',array('id' => 'submit', 'class' => 'btn btn-primary'))}}
    </div>

    {{ Form::close() }}

    {{ Form::open(array('method' => 'delete', 'class' => 'form-horizontal', 'route' => array('admin.entity.destroy', $entity->id), 'onsubmit' => 'return ConfirmDelete()')) }}
        
        <div class = 'form-group'>
            {{Form::submit('Apagar entidade',array('id' => 'submit', 'class' => 'btn btn-danger'))}}
        </div>

    {{ Form::close() }}

    <a href = '/admin/entidades'><button class="btn btn-warning">Cancelar</button></a>

</div>

<script>

  function ConfirmDelete() {
      var x = confirm("Tem a certeza que deseja apagar esta entidade?");
      if (x)
        return true;
      else
        return false;
  }

</script>

@stop