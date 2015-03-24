@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de secções</h1>

<div class = 'novo'>
	<a href = 'seccoes/criar'><button class="btn btn-primary">Novo</button></a>
</div>

<div id = 'wrapper'>
	<table id = 'keywords' class = 'table table-hover'>
		<thead>
			<tr>
				<th><span>ID</span></th>
				<th><span>Nome</span></th>
				<th><span>Publicado</span></th>
				<th><span>Ordem</span></th>
				<th>Apagar</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($sections as $section)
				<tr>
					<td><a href = 'seccoes/{{ $section->id }}'>{{ $section->id }}</a></td>
					<td>{{ $section->name }}</td>
					<td>{{ $section->published }}</td>
					<td>{{ $section->ordering }}</td>
					{{ Form::open(array('method' => 'delete', 'route' => array('admin.section.destroy', $section->id), 'onsubmit' => 'return ConfirmDelete()')) }} 
			        	<td>{{Form::submit('Apagar',array('id' => 'submit', 'class' => 'btn btn-danger btn-sm'))}}</td>
					{{ Form::close() }}
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

<script>

  function ConfirmDelete() {
      var x = confirm("Tem a certeza que deseja apagar a secção?");
      if (x)
        return true;
      else
        return false;
  }

</script>

@stop