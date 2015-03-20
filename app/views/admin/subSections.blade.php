@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de sub-secções</h1>

<div>
	{{ Form::open(array('url' => 'admin/produtos/subseccoes', 'method' => 'post')) }}

		{{Form::label('section','Secção')}}	
		{{Form::select('section', [null=>'Sem filtro']+$section, Input::get('section'), array('onchange' => 'this.form.submit()'))}}

    {{ Form::close() }}
</div>

<a href = 'subseccoes/criar'>Criar nova sub-secção</a>

<div id = 'wrapper'>
	<table id = 'keywords'>
		<thead>
			<tr>
				<th><span>ID</span></th>
				<th><span>Nome</span></th>
				<th><span>Secção</span></th>
				<th><span>Publicado</span></th>
				<th><span>Ordem</span></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($subSections as $subSection)
				<tr>
					<td><a href = 'subseccoes/{{ $subSection->id }}'>{{ $subSection->id }}</a></td>
					<td>{{ $subSection->name }}</td>
					<td>{{ $section[$subSection->section] }}</td>
					<td>{{ $subSection->published }}</td>
					<td>{{ $subSection->ordering }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop