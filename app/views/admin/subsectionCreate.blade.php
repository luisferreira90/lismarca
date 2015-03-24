@extends('admin.layouts.layout')

@section('content')

<h1>Nova Sub-secção</h1>

<div class = 'form-wrap'>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

{{ Form::open(array('route' => array('admin.subsection.store'), 'method' => 'post', 'files' => 'true', 'class' => 'form-horizontal')) }}

    <div class = 'form-group'>
            {{Form::label('name', 'Nome')}}
            {{Form::text('name', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
            {{Form::label('section','Secção')}}
            {{Form::select('section', $sections, null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
            {{Form::label('ordering','Ordem')}}
            {{Form::text('ordering', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
            {{Form::label('icon','Ícone')}}
            {{Form::file('icon', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-element'>
        {{Form::submit('Criar',array('id' => 'submit', 'class' => 'btn btn-primary'))}}
    </div>

{{ Form::close() }}

<a href = '/admin/produtos/subseccoes'><button class="btn btn-warning">Cancelar</button></a>

</div>

@stop