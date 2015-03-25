@extends('admin.layouts.layout')

@section('content')

<h1>Novo Item</h1>

<div class = 'form-wrap form-items'>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

{{ Form::open(array('route' => array('admin.item.store'), 'method' => 'post', 'files' => 'true', 'class' => 'form-horizontal')) }}

    <div class = 'form-group'>
        {{Form::label('name', 'Nome')}}
        {{Form::text('name', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('subcategory','Sub-Categoria')}}
        {{Form::select('subcategory', $subcategories, null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('description', 'Descrição')}}
        {{Form::textarea('description', null, array('class' => 'form-control'))}}
    </div>

    <script>
        CKEDITOR.replace('description');
    </script>

    <div class = 'form-group'>
        {{Form::label('icon', 'Ícone')}}
        {{Form::file('icon', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::submit('Criar',array('id' => 'submit', 'class' => 'btn btn-primary'))}}
    </div>

{{ Form::close() }}

<a href = '/admin/items'><button class="btn btn-warning">Cancelar</button></a>

</div>

@stop

