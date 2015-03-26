@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de tipos de entidade</h1>

<div class = 'novo'>
	<a href = 'entidades/criar'><button class="btn btn-primary">Novo</button></a>
</div>

<div id = 'wrapper'>
	<table id = 'keywords' class = 'table table-hover'>
		<thead>
			<tr>
				<th><span>ID</span></th>
				<th><span>Nome PT</span></th>
				<th><span>Nome EN</span></th>
				<th>Apagar</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($entities as $entity)
				<tr>
					<td><a href = 'entidades/{{ $entity->id }}'>{{ $entity->id }}</a></td>
					<td>{{ $entity->name_pt }}</td>
					<td>{{ $entity->name_en }}</td>
					{{ Form::open(array('method' => 'delete', 'route' => array('admin.entity.destroy', $entity->id), 'onsubmit' => 'return ConfirmDelete()')) }} 
			        	<td>{{Form::submit('Apagar',array('id' => 'submit', 'class' => 'btn btn-danger btn-sm'))}}</td>
					{{ Form::close() }}
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop