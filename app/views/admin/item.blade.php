@extends('admin.layouts.layout')

@section('content')

<h1>Gestão de items</h1>

<div class = 'filters'>
    {{ Form::open(array('url' => 'admin/items', 'method' => 'GET', 'class' => 'form-inline')) }}
        <div class = 'form-group'>
            {{Form::label('section','Secção')}}   
            {{Form::select('section', [null=>'Sem filtro']+$sections, Input::get('section'), array('class' => 'form-control', 'onchange' => 'this.form.submit()'))}}
        </div>

        @if(isset($subsections))
            <div class = 'form-group'>
                {{Form::label('subsection','Sub-Secção')}}   
                {{Form::select('subsection', [null=>'Sem filtro']+$subsections, Input::get('subsection'), array('class' => 'form-control', 'onchange' => 'this.form.submit()'))}}
            </div>
        @endif

        @if(isset($categories))
            <div class = 'form-group'>
                {{Form::label('category','Categoria')}}   
                {{Form::select('category', [null=>'Sem filtro']+$categories, Input::get('category'), array('class' => 'form-control', 'onchange' => 'this.form.submit()'))}}
            </div>
        @endif

        @if(isset($subcategories))
            <div class = 'form-group'>
                {{Form::label('subcategory','Sub-Categoria')}}   
                {{Form::select('subcategory', [null=>'Sem filtro']+$subcategories, Input::get('subcategory'), array('class' => 'form-control', 'onchange' => 'this.form.submit()'))}}
            </div>
        @endif

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
				<th><span>Publicar</span></th>
				<th><span>Apagar</span></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($items as $item)
				<tr>
					<td><a href = 'items/{{ $item->id }}'>{{ $item->id }}</a></td>
					<td>{{ $item->name }}</td>
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

@stop