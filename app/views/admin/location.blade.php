@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de localizações</h1>

<div class = 'novo'>
	<a href = 'localizacoes/criar'><button class="btn btn-primary">Novo</button></a>
</div>

<div id = 'wrapper'>
	<table id = 'keywords' class = 'table table-hover'>
		<thead>
			<tr>
				<th><span>ID</span></th>
				<th><span>Nome</span></th>
				<th>Apagar</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($locations as $location)
				<tr>
					<td><a href = 'localizacoes/{{ $location->id }}'>{{ $location->id }}</a></td>
					<td>{{ $location->name }}</td>
					{{ Form::open(array('method' => 'delete', 'route' => array('admin.location.destroy', $location->id), 'onsubmit' => 'return ConfirmDelete()')) }} 
			        	<td>{{Form::submit('Apagar',array('id' => 'submit', 'class' => 'btn btn-danger btn-sm'))}}</td>
					{{ Form::close() }}
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop