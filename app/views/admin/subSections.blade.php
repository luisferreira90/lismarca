@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de sub-secções</h1>

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
					<td>{{ $subSection->section }}</td>
					<td>{{ $subSection->published }}</td>
					<td>{{ $subSection->ordering }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop