{{ HTML::style('css/bootstrap.css') }}
{{ HTML::style('css/products.css') }}

@extends('layouts.layout')

@section('content')

<h1>Portfólio</h1>

<div class = 'filters'>
    {{ Form::open(array('url' => 'portfolio', 'method' => 'GET', 'class' => 'form-inline')) }}
        <div class = 'form-group'>
            {{Form::label('category','Categoria')}}   
            {{Form::select('category', [null=>'Sem filtro']+$categories, Input::get('category'), array('class' => 'form-control', 'onchange' => 'this.form.submit()'))}}
        </div>
    {{ Form::close() }}    
    
</div>

<div class="gallery-list more-items">

    @foreach ($portfolios as $portfolio)

        <div class="gallery-item">
            <div class='image'>
                <a href={{'/portfolio/' . $portfolio->id }}>{{ HTML::image('images/portfolio/icons/' . $portfolio->icon) }}</a>
            </div>
            <h3>.{{ $portfolio->name }}</h3>         
        </div>

    @endforeach

</div>

{{ $portfolios->appends(Input::except('page'))->links() }}

@stop