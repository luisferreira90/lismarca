@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de utilizadores</h1>

<div id = 'wrapper'>
	<table id = 'keywords'>
		<thead>
			<tr>
				<th><span>ID</span></th>
				<th><span>Nome</span></th>
				<th><span>Email</span></th>
				<th><span>Telefone</span></th>
				<th><span>Localização</span></th>
				<th><span>Tipo de entidade</span></th>
				<th><span>Nome da empresa</span></th>
			</tr>
		</thead>
		<tbody>
	@foreach ($users as $user)
	<tr>
		<td><a href = '/admin/utilizadores/{{ $user->id }}'>{{ $user->id }}</a></td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>{{ $user->phone }}</td>
		<td>{{ $user->location }}</td>
		<td>{{ $user->entity_type }}</td>
		<td>{{ $user->company_name }}</td>
	</tr>
	@endforeach
	</tbody>
	</table>
</div>

@stop