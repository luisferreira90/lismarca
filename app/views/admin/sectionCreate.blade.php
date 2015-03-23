@extends('admin.layouts.layout')

@section('content')

<h1>Nova secção</h1>

<div class = 'form-wrap'>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

{{ Form::open(array('route' => array('admin.section.store'), 'method' => 'post', 'files' => 'true', 'class' => 'form-horizontal')) }}

    <div class = 'form-group'>
            {{Form::label('name', 'Nome')}}
            {{Form::text('name', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
            {{Form::label('ordering','Ordem')}}
            {{Form::text('ordering', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
            {{Form::label('icon', 'Ícone')}}
            {{Form::file('icon', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::submit('Criar',array('id' => 'submit', 'class' => 'btn btn-primary'))}}
    </div>

{{ Form::close() }}

</div>

@stop