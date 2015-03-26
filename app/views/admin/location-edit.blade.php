@extends('admin.layouts.layout')

@section('content')

<div class = 'form-wrap'>

<h1>Editar localização</h1>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

@if(isset($location))
  {{ Form::model($location, array('route' => array('admin.location.update', $location->id), 'method' => 'PUT')) }}
@else
  {{ Form::open(array('route' => array('admin.location.store'), 'method' => 'post', 'class' => 'form-horizontal')) }}
@endif

    <div class = 'form-group'>
        {{Form::label('name', 'Nome')}}
        {{Form::text('name', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::submit('Gravar',array('id' => 'submit', 'class' => 'btn btn-primary'))}}
    </div>

    {{ Form::close() }}

    @if(isset($location))

      {{ Form::open(array('method' => 'delete', 'class' => 'form-horizontal', 'route' => array('admin.location.destroy', $location->id), 'onsubmit' => 'return ConfirmDelete()')) }}
          
          <div class = 'form-group'>
              {{Form::submit('Apagar localização',array('id' => 'submit', 'class' => 'btn btn-danger'))}}
          </div>

      {{ Form::close() }}

    @endif

    <a href = '/admin/localizacoes'><button class="btn btn-warning">Cancelar</button></a>

</div>

@stop