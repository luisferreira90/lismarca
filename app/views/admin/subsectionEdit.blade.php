@extends('admin.layouts.layout')

@section('content')

<h1>Editar Sub-secção</h1>

<div>

@foreach ($errors->all() as $message)
    <br>
    {{$message}}
@endforeach

{{ Form::model($subsection, array('route' => array('admin.subsection.update', $subsection->id), 'method' => 'PUT', 'files' => true)) }}

    <div class = 'form-element'>
        <div class = 'form-left'>
            {{Form::label('name', 'Nome')}}
            {{Form::text('name')}}
        </div>
    </div>

    <div class = 'form-element'>
        <div class = 'form-left'>
            {{Form::label('section','Secção')}}
            {{Form::select('section', $sections)}}
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

    {{ Form::open(array('method' => 'delete', 'route' => array('admin.subsection.destroy', $subsection->id), 'onsubmit' => 'return ConfirmDelete()')) }}

        {{Form::submit('Apagar sub-secção',array('id' => 'submit'))}}

    {{ Form::close() }}

</div>

<script>

  function ConfirmDelete() {
      var x = confirm("Tem a certeza que deseja apagar esta sub-secção?");
      if (x)
        return true;
      else
        return false;
  }

</script>

@stop