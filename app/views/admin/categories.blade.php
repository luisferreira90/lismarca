@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de categorias</h1>

<div>
	{{ Form::open(array('url' => 'admin/produtos/categorias', 'method' => 'post')) }}

		{{Form::label('subsection','Sub-Secção')}}	
		{{Form::select('subsection', [null=>'Sem filtro']+$subsection, Input::get('subsection'), array('onchange' => 'this.form.submit()'))}}

    {{ Form::close() }}
</div>

<a href = 'categorias/criar'>Criar nova categoria</a>

<div id = 'wrapper'>
	<table id = 'keywords'>
		<thead>
			<tr>
				<th><span>ID</span></th>
				<th><span>Nome</span></th>
				<th><span>Sub-Secção</span></th>
				<th><span>Publicado</span></th>
				<th><span>Ordem</span></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($categories as $category)
				<tr>
					<td><a href = 'categorias/{{ $category->id }}'>{{ $category->id }}</a></td>
					<td>{{ $category->name }}</td>
					<td>{{ $subsection[$category->subsection] }}</td>
					<td>{{ $category->published }}</td>
					<td>{{ $category->ordering }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop