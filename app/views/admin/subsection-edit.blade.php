@extends('admin.layouts.layout')

@section('content')

<div class = 'form-wrap'>

<h1>Editar Sub-secção</h1>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

@if(isset($subsection))
    {{ Form::model($subsection, array('route' => array('admin.subsection.update', $subsection->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal')) }}
@else
    {{ Form::open(array('route' => array('admin.subsection.store'), 'method' => 'post', 'files' => 'true', 'class' => 'form-horizontal')) }}
@endif

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

    <div class = 'form-group'>
        {{Form::submit('Gravar',array('id' => 'submit', 'class' => 'btn btn-primary'))}}
    </div>

    {{ Form::close() }}

    @if(isset($subsection))

        {{ Form::open(array('method' => 'delete', 'class' => 'form-horizontal', 'route' => array('admin.subsection.destroy', $subsection->id), 'onsubmit' => 'return ConfirmDelete()')) }}
            
            <div class = 'form-group'>
                {{Form::submit('Apagar sub-secção',array('id' => 'submit', 'class' => 'btn btn-danger'))}}
            </div>

        {{ Form::close() }}

    @endif

<a href = '/admin/subseccoes'><button class="btn btn-warning">Cancelar</button></a>

</div>

@if(isset($subsection))

    <div class = 'form-icon'>

        <h2>Icone</h2>

        {{ HTML::image($subsection->icon) }}

    </div>

@endif

@stop