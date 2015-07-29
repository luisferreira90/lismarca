@extends('admin.layouts.layout')

@section('content')

<div class = 'form-wrap'>

<h1>Editar Secção</h1>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

@if(isset($section))
    {{ Form::model($section, array('route' => array('admin.section.update', $section->id), 'method' => 'PUT', 'files' => true)) }}
@else
    {{ Form::open(array('route' => array('admin.section.store'), 'method' => 'post', 'files' => 'true', 'class' => 'form-horizontal')) }}
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
            {{Form::label('ordering','Ordem')}}
            {{Form::text('ordering', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
            {{Form::label('icon', 'Ícone')}}
            {{Form::file('icon', null, array('class' => 'form-control'))}}
    </div>

    <div class = 'form-group'>
        {{Form::submit('Gravar',array('id' => 'submit','class' => 'btn btn-primary'))}}
    </div>

    {{ Form::close() }}

    @if(isset($section))

        {{ Form::open(array('method' => 'delete', 'class' => 'form-horizontal', 'route' => array('admin.section.destroy', $section->id), 'onsubmit' => 'return ConfirmDelete()')) }}
            
            <div class = 'form-group'>
                {{Form::submit('Apagar secção',array('id' => 'submit', 'class' => 'btn btn-danger'))}}
            </div>

        {{ Form::close() }}

    @endif

    <a href = '/admin/seccoes'><button class="btn btn-warning">Cancelar</button></a>

</div>

@if(isset($section))

<div class = 'form-icon'>

    <h2>Icone</h2>

    {{ HTML::image($section->icon) }}

</div>

@endif

@stop