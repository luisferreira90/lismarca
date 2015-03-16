@extends('admin.layouts.layout')

@section('content')

<h1>Editar Secção</h1>

<div>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

{{ Form::model($section, array('route' => array('admin.section.update', $section->id), 'method' => 'PUT', 'files' => true)) }}

    <div class = 'form-element'>
        <div class = 'form-left'>
            {{Form::label('name', 'Nome')}}
            {{Form::text('name')}}
        </div>
    </div>

    <div class = 'form-element'>
        <div class = 'form-left'>
            {{Form::label('icon','Ícone')}}
            {{Form::file('icon')}}
        </div>
    </div>

    <div class = 'form-element'>
        {{Form::submit('Gravar',array('id' => 'submit'))}}
    </div>

    {{ Form::close() }}

    {{ Form::open(array('method' => 'delete', 'route' => array('admin.section.destroy', $section->id), 'onsubmit' => 'return ConfirmDelete()')) }}

        {{Form::submit('Apagar secção',array('id' => 'submit'))}}

    {{ Form::close() }}

</div>

<script>

  function ConfirmDelete() {
      var x = confirm("Tem a certeza que deseja apagar esta secção?");
      if (x)
        return true;
      else
        return false;
  }

</script>

@stop