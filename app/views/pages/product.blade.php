{{ HTML::style('css/slick.css') }}
{{ HTML::style('css/slick-theme.css') }}
{{ HTML::style('css/bootstrap.css') }}
{{ HTML::style('css/products.css') }}

@extends('layouts.layout')

@section('content')

@if(isset($error))
    {{$error}}
@else

<h1>{{$product->name}}</h1>

<h2>INFORMAÇÃO SOBRE O PRODUTO</h2>

<div class = 'product-main'>
  @if(App::getLocale() == 'en')
    {{$product->description_en}}
  @else
    {{$product->description}}
  @endif
</div>

<div class="slideshow">
    @foreach ($photos as $photo)
    <div>
        <div class = 'slideshow-image'><a href = '/images/produtos/items/{{$photo->src}}'><img src="/images/produtos/items/thumbnails/{{$photo->src}}"></a></div>
    </div>
    @endforeach
</div>

<div class = 'other-info'>

  <div class = 'colors-dimensions'>
    <h4>CORES DISPONÍVEIS:</h4>
    <img src="/images/produtos/colors/{{$product->colors}}">
  </div>

  <div class = 'colors-dimensions'>
    <h4>DIMENSÕES:</h4>
    <img src="/images/produtos/dimensions/{{$product->dimensions}}">
  </div>

  <div class = 'product-file'>
    <a href = '/pdf/{{$product->id}}.pdf'><img src = '/images/pdf.svg'></a>
</div>

</div>

@if(Auth::check())
<div class = 'cart'>
  <h4>Adicionar ao carrinho</h4>
  {{ Form::open(array('route' => array('cart.store'), 'method' => 'post')) }}

      <div class = 'form-group'>
          {{Form::label('quantity', 'Quantidade')}}
          {{Form::number('quantity', 1, array('min' => '1'))}}
      </div>

      <div class = 'form-group'>
          {{Form::submit(Lang::get('strings.submit'), array('id' => 'submit', 'class' => 'form-control btn btn-primary'))}}
      </div>

      {{ Form::hidden('product_item', $product->id) }}

      {{ Form::hidden('user', Auth::id()) }}

  {{ Form::close() }}
</div>
@endif

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
@endif
@stop
