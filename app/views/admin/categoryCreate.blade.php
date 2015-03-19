@extends('admin.layouts.layout')

@section('content')

<h1>Nova Sub-secção</h1>

<div>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

{{ Form::open(array('route' => array('admin.category.store'), 'method' => 'post', 'files' => 'true')) }}

    <div class = 'form-element'>
        <div class = 'form-left'>
            {{Form::label('name', 'Nome')}}
            {{Form::text('name')}}
        </div>
    </div>

    <div class = 'form-element'>
        <div class = 'form-left'>
            {{Form::label('subsection','Sub-Secção')}}
            {{Form::select('subsection', $subsections)}}
        </div>
    </div>

    <div class = 'form-element'>
        <div class = 'form-left'>
            {{Form::label('ordering','Ordem')}}
            {{Form::text('ordering')}}
        </div>
    </div>

    <div class = 'form-element'>
        <div class = 'form-left'>
            {{Form::label('icon', 'Ícone')}}
            {{Form::file('icon')}}
        </div>
    </div>

    <div class = 'form-element'>
        {{Form::submit('Criar',array('id' => 'submit'))}}
    </div>

{{ Form::close() }}

</div>

@stop