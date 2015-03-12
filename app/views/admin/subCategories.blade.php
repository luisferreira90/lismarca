@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de sub-categorias</h1>

<div id = 'wrapper'>
	<table id = 'keywords'>
		<thead>
			<tr>
				<th><span>ID</span></th>
				<th><span>Nome</span></th>
				<th><span>Categoria</span></th>
				<th><span>Publicado</span></th>
				<th><span>Ordem</span></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($subCategories as $subCategory)
				<tr>
					<td><a href = 'subcategorias/{{ $subCategory->id }}'>{{ $subCategory->id }}</a></td>
					<td>{{ $subCategory->name }}</td>
					<td>{{ $subCategory->category }}</td>
					<td>{{ $subCategory->published }}</td>
					<td>{{ $subCategory->ordering }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop