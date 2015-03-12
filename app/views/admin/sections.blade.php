@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de secções</h1>

<div id = 'wrapper'>
	<table id = 'keywords'>
		<thead>
			<tr>
				<th><span>ID</span></th>
				<th><span>Nome</span></th>
				<th><span>Publicado</span></th>
				<th><span>Ordem</span></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($sections as $section)
				<tr>
					<td><a href = 'seccoes/{{ $section->id }}'>{{ $section->id }}</a></td>
					<td>{{ $section->name }}</td>
					<td>{{ $section->published }}</td>
					<td>{{ $section->ordering }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop