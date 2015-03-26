@extends('admin.layouts.layout')

@section('content')

<div class = 'form-wrap'>

<h1>Editar tipo de entidade</h1>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

@if(isset($entity))
    {{ Form::model($entity, array('route' => array('admin.entity.update', $entity->id), 'method' => 'PUT')) }}
@else
    {{ Form::open(array('route' => array('admin.entity.store'), 'method' => 'post', 'class' => 'form-horizontal')) }}
@endif

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

    @if(isset($entity))

    {{ Form::open(array('method' => 'delete', 'class' => 'form-horizontal', 'route' => array('admin.entity.destroy', $entity->id), 'onsubmit' => 'return ConfirmDelete()')) }}
        
        <div class = 'form-group'>
            {{Form::submit('Apagar entidade',array('id' => 'submit', 'class' => 'btn btn-danger'))}}
        </div>

    {{ Form::close() }}

    @endif

    <a href = '/admin/entidades'><button class="btn btn-warning">Cancelar</button></a>

</div>

@stop