@extends('admin.layouts.layout')

@section('content')

<div class = 'form-wrap'>
    
<h1>Editar Sub-categoria</h1>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

@if(isset($subcategory))
    {{ Form::model($subcategory, array('route' => array('admin.subcategory.update', $subcategory->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) }}
@else
    {{ Form::open(array('route' => array('admin.subcategory.store'), 'method' => 'post', 'files' => 'true', 'class' => 'form-horizontal')) }}
@endif

    <div class = 'form-group'>
        {{Form::label('name', 'Nome')}}
        {{Form::text('name', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
            {{Form::label('name_en', 'Nome (Inglês)')}}
            {{Form::text('name_en', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::label('category','Categoria')}}
        {{Form::select('category', $categories, null, array('class' => 'form-control'))}}
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
        {{Form::submit('Gravar',array('id' => 'submit', 'class' => 'btn btn-primary'))}}
    </div>

    {{ Form::close() }}

    @if(isset($subcategory))

        {{ Form::open(array('method' => 'delete', 'class' => 'form-horizontal', 'route' => array('admin.subcategory.destroy', $subcategory->id), 'onsubmit' => 'return ConfirmDelete()')) }}
            
            <div class = 'form-group'>
                {{Form::submit('Apagar sub-categoria',array('id' => 'submit', 'class' => 'btn btn-danger'))}}
            </div>

        {{ Form::close() }}

    @endif

    <a href = '/admin/subcategorias'><button class="btn btn-warning">Cancelar</button></a>

</div>

@if(isset($subcategory))

    <div class = 'form-icon'>

        <h2>Icone</h2>

        {{ HTML::image($subcategory->icon) }}

    </div>

@endif

@stop