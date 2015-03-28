@extends('admin.layouts.layout')

@section('content')

<div class = 'form-wrap'>
    
<h1>Editar categoria de portfólio</h1>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

@if(isset($category))
    {{ Form::model($category, array('route' => array('admin.portfoliocategory.update', $category->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) }}
@else
    {{ Form::open(array('route' => array('admin.portfoliocategory.store'), 'method' => 'post', 'files' => 'true', 'class' => 'form-horizontal')) }}
@endif

    <div class = 'form-group'>
        {{Form::label('name', 'Nome')}}
        {{Form::text('name', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('ordering', 'Ordem')}}
        {{Form::text('ordering', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::submit('Gravar',array('id' => 'submit', 'class' => 'btn btn-primary'))}}
    </div>

    {{ Form::close() }}

    @if(isset($category))

        {{ Form::open(array('method' => 'delete', 'class' => 'form-horizontal', 'route' => array('admin.portfoliocategory.destroy', $category->id), 'onsubmit' => 'return ConfirmDelete()')) }}
            
            <div class = 'form-group'>
                {{Form::submit('Apagar item',array('id' => 'submit', 'class' => 'btn btn-danger'))}}
            </div>

        {{ Form::close() }}

    @endif

    <a href = '/admin/portfolio-categoria'><button class="btn btn-warning">Cancelar</button></a>

</div>

@stop