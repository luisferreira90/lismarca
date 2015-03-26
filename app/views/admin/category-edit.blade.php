@extends('admin.layouts.layout')

@section('content')

<div class = 'form-wrap'>

<h1>Editar Categoria</h1>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

@if(isset($category))
    {{ Form::model($category, array('route' => array('admin.category.update', $category->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) }}
@else
    {{ Form::open(array('route' => array('admin.category.store'), 'method' => 'post', 'files' => 'true', 'class' => 'form-horizontal')) }}
@endif

    <div class = 'form-group'>
        {{Form::label('name', 'Nome')}}
        {{Form::text('name', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('subsection','Sub-Secção')}}
        {{Form::select('subsection', $subsections, null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('ordering','Ordem')}}
        {{Form::text('ordering', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('icon','Ícone')}}
        {{Form::file('icon', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::submit('Gravar',array('id' => 'submit', 'class' => 'btn btn-primary'))}}
    </div>

    {{ Form::close() }}

    @if(isset($category))

    {{ Form::open(array('method' => 'delete', 'class' => 'form-horizontal', 'route' => array('admin.category.destroy', $category->id), 'onsubmit' => 'return ConfirmDelete()')) }}
        
        <div class = 'form-group'>
            {{Form::submit('Apagar categoria',array('id' => 'submit', 'class' => 'btn btn-danger'))}}
        </div>

    {{ Form::close() }}

    @endif

    <a href = '/admin/categorias'><button class="btn btn-warning">Cancelar</button></a>

</div>

@if(isset($category))

<div class = 'form-icon'>

    <h2>Icone</h2>

    {{ HTML::image($category->icon) }}

</div>

@endif

@stop