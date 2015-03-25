@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de items</h1>

<div class = 'filters'>
	{{ Form::open(array('url' => 'admin/items', 'method' => 'get', 'class' => 'form-inline')) }}
		<div class = 'form-group'>
			{{Form::label('subcategory','Subcategoria')}}	
			{{Form::select('subcategory', [null=>'Sem filtro']+$subcategories, Input::get('subcategory'), array('class' => 'form-control', 'onchange' => 'this.form.submit()'))}}
		</div>
    {{ Form::close() }}
</div>

<div class = 'novo'>
	<a href = 'items/criar'><button class="btn btn-primary">Novo</button></a>
</div>

<div id = 'wrapper'>
	<table id = 'keywords' class = 'table table-hover'>
		<thead>
			<tr>
				<th><span>ID</span></th>
				<th><span>Nome</span></th>
				<th><span>Sub-Categoria</span></th>
				<th><span>Publicar</span></th>
				<th><span>Apagar</span></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($items as $item)
				<tr>
					<td><a href = 'items/{{ $item->id }}'>{{ $item->id }}</a></td>
					<td>{{ $item->name }}</td>
					<td>{{ $subcategories[$item->subcategory] }}</td>
					<td>
						@if($item->published == 1)
							<a href = 'items/unpublish/{{ $item->id }}'><button class="btn btn-warning btn-sm">Despublicar</button></a>
						@else
							<a href = 'items/publish/{{ $item->id }}'><button class="btn btn-success btn-sm">Publicar</button></a>
						@endif
					</td>
					{{ Form::open(array('method' => 'delete', 'route' => array('admin.item.destroy', $item->id), 'onsubmit' => 'return ConfirmDelete()')) }} 
			        	<td>{{Form::submit('Apagar',array('id' => 'submit', 'class' => 'btn btn-danger btn-sm'))}}</td>
					{{ Form::close() }}
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ $items->appends(Input::except('page'))->links() }}

</div>

<script>

  function ConfirmDelete() {
      var x = confirm("Tem a certeza que deseja apagar o item?");
      if (x)
        return true;
      else
        return false;
  }

</script>

@stop