@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de Items</h1>

<div id = 'wrapper'>
	<table id = 'keywords'>
		<thead>
			<tr>
				<th><span>ID</span></th>
				<th><span>Nome</span></th>
				<th><span>Secção</span></th>
				<th><span>Sub-Secção</span></th>
				<th><span>Categoria</span></th>
				<th><span>Sub-Categoria</span></th>
				<th><span>Publicado</span></th>
				<th><span>Ordem</span></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($items as $item)
				<tr>
					<td><a href = 'items/{{ $item->id }}'>{{ $item->id }}</a></td>
					<td>{{ $item->name }}</td>
					<td>{{ $item->section }}</td>
					<td>{{ $item->subsection }}</td>
					<td>{{ $item->category }}</td>
					<td>{{ $item->subcategory }}</td>
					<td>{{ $item->published }}</td>
					<td>{{ $item->ordering }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop