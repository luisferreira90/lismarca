{{ HTML::style('css/slick.css') }}
{{ HTML::style('css/slick-theme.css') }}
{{ HTML::style('css/bootstrap.css') }}
{{ HTML::style('css/products.css') }}

@extends('layouts.layout')

@section('content')

@if(isset($error))
    {{$error}}
@else

<p>PRODUTOS | MOBILIÁRIO | Mobiliário exterior | <b>Cadeira Alhambra</b></p>

<h1>{{$product->name}}</h1>

<h2>INFORMAÇÃO SOBRE O PRODUTO</h2>

<div class = 'product-main'>
  @if(App::getLocale() == 'en')
    {{$product->description_en}}
  @else
    {{$product->description}}
  @endif
</div>

<div class = 'slideshow-container'>
  <div id = 'currentPhoto'></div>
  <div class="slideshow product-slideshow">
    @foreach ($photos as $photo)
      <div id = '{{$photo->src}}'>
          <div class = 'slideshow-image'><img src="/images/produtos/items/{{$photo->src}}"></div>
      </div>
    @endforeach
  </div>
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
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    arrows: true,
    autoplaySpeed: 5000,
    swipeToSlide: true,
    prevArrow: '<div class="slick-prev-custom"></div>',
    nextArrow: '<div class="slick-next-custom"></div>',
    responsive: [
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
  });


});


$('.slideshow').on('init', function(event, slick){
    $('#currentPhoto').css('background-image', 'url(http://lismarcadev/images/produtos/items/' + slick.$slides[0].id + ')' );
});



$('.slideshow').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
  $('#currentPhoto').css('background-image', 'url(http://lismarcadev/images/produtos/items/' + $("[data-slick-index='" +nextSlide+ "']").attr('id') + ')' );
});


</script>
@endif
@stop
