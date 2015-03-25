@extends('admin.layouts.layout')

@section('content')

<h1>Novo tipo de entidade</h1>

<div class = 'form-wrap'>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

{{ Form::open(array('route' => array('admin.entity.store'), 'method' => 'post', 'class' => 'form-horizontal')) }}

    <div class = 'form-group'>
            {{Form::label('name_pt', 'Nome PT')}}
            {{Form::text('name_pt', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
            {{Form::label('name_en', 'Nome EN')}}
            {{Form::text('name_en', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::submit('Criar',array('id' => 'submit', 'class' => 'btn btn-primary'))}}
    </div>

{{ Form::close() }}

<a href = '/admin/entidades'><button class="btn btn-warning">Cancelar</button></a>

</div>

@stop