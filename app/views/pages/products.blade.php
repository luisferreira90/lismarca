{{ HTML::style('css/slick.css') }}
{{ HTML::style('css/slick-theme.css') }}
{{ HTML::style('css/bootstrap.css') }}
{{ HTML::style('css/products.css') }}

@extends('layouts.layout')

@section('content')

<h1>
    @if(isset($title))
        {{$title}}
    @else
        Produtos
    @endif
</h1>

<div class = 'filters'>
    {{ Form::open(array('url' => 'produtos', 'method' => 'GET', 'class' => 'form-inline')) }}
        <div class = 'form-group'>
            {{Form::label('section','Secção')}}   
            {{Form::select('section', [null=>'Escolha uma secção']+$sections, Input::get('section'), array('class' => 'form-control', 'onchange' => 'this.form.submit()'))}}
        </div>

        @if(isset($subsections))
            <div class = 'form-group'>
                {{Form::label('subsection','Sub-Secção')}}   
                {{Form::select('subsection', [null=>'Escolha uma sub-secção']+$subsections, Input::get('subsection'), array('class' => 'form-control', 'onchange' => 'this.form.submit()'))}}
            </div>
        @endif

        @if(isset($categories))
            <div class = 'form-group'>
                {{Form::label('category','Categoria')}}   
                {{Form::select('category', [null=>'Escolha uma categoria']+$categories, Input::get('category'), array('class' => 'form-control', 'onchange' => 'this.form.submit()'))}}
            </div>
        @endif

        @if(isset($subcategories))
            <div class = 'form-group'>
                {{Form::label('subcategory','Sub-Categoria')}}   
                {{Form::select('subcategory', [null=>'Escolha uma sub-categoria']+$subcategories, Input::get('subcategory'), array('class' => 'form-control', 'onchange' => 'this.form.submit()'))}}
            </div>
        @endif

        @if(isset($subsections))
            <div class = 'form-group-clear'>
                <a href = 'produtos/'>Limpar filtros</a>
            </div>  
        @endif

    {{ Form::close() }}    
    
</div>

<div class="gallery-list">

    <div class = 'gallery-list-inner'>
        @foreach ($products as $product)

            <div class="gallery-item">
                <div class='image'>
                    <a href={{'/produtos/' . $product->id . '-' . str_replace(' ','-',$product->name)}}>{{ HTML::image('images/produtos/icons/' . $product->icon) }}</a>
                </div>
                <h3>.{{ $product->name }}</h3>         
            </div>

        @endforeach
    </div>

</div>

<div class = 'pagination-div'>
    {{ $products->appends(Input::except('page'))->links() }}
</div>

<hr>

<h3 class = 'title red uppercase'>.Novidades</h3>
<div class="slideshow">
    @foreach ($new as $newitem)
        <div>
            <div class = 'slideshow-image'><a href = '/produtos/{{$newitem->id}}'><img src="/images/produtos/icons/{{$newitem->icon}}"></a></div>
            <p>{{$newitem->name}}</p>
        </div>
    @endforeach
</div>

{{ HTML::script('js/slick.min.js') }}
<script>

$(document).ready(function(){
  $('.slideshow').slick({
    infinite: true,
    slidesToShow: 7,
    slidesToScroll: 3,
    autoplay: true,
    autoplaySpeed: 5000,
    responsive: [
    {
      breakpoint: 1080,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
  ]
  });
});

</script>

@stop