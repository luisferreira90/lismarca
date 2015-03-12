@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de categorias</h1>

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
					<td>{{ $category->subsection }}</td>
					<td>{{ $category->published }}</td>
					<td>{{ $category->ordering }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop