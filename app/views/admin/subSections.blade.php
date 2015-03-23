@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de sub-secções</h1>

<div>
	{{ Form::open(array('url' => 'admin/produtos/subseccoes', 'method' => 'post', 'class' => 'form-inline')) }}
		<div class = 'form-group'>
			{{Form::label('section','Secção')}}	
			{{Form::select('section', [null=>'Sem filtro']+$section, Input::get('section'), array('class' => 'form-control', 'onchange' => 'this.form.submit()'))}}
		</div>
    {{ Form::close() }}
</div>

<a href = 'subseccoes/criar'><button class="btn btn-primary">Novo</button></a>

<div id = 'wrapper'>
	<table id = 'keywords' class = 'table table-hover'>
		<thead>
			<tr>
				<th><span>ID</span></th>
				<th><span>Nome</span></th>
				<th><span>Secção</span></th>
				<th><span>Publicado</span></th>
				<th><span>Ordem</span></th>
				<th>Apagar</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($subSections as $subSection)
				<tr>
					<td><a href = 'subseccoes/{{ $subSection->id }}'>{{ $subSection->id }}</a></td>
					<td>{{ $subSection->name }}</td>
					<td>{{ $section[$subSection->section] }}</td>
					<td>{{ $subSection->published }}</td>
					<td>{{ $subSection->ordering }}</td>
					{{ Form::open(array('method' => 'delete', 'route' => array('admin.subsection.destroy', $subSection->id), 'onsubmit' => 'return ConfirmDelete()')) }} 
			        	<td>{{Form::submit('Apagar',array('id' => 'submit', 'class' => 'btn btn-danger btn-sm'))}}</td>
					{{ Form::close() }}
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

<script>

  function ConfirmDelete() {
      var x = confirm("Tem a certeza que deseja apagar a sub-secção?");
      if (x)
        return true;
      else
        return false;
  }

</script>

@stop