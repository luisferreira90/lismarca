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

<div class="slideshow">
    @foreach ($photos as $photo)
    <div>
        <div class = 'slideshow-image'><a href = '/images/produtos/items/{{$photo->src}}'><img src="/images/produtos/items/thumbnails/{{$photo->src}}"></a></div>
    </div>
    @endforeach
</div>

<div class = 'product-main'>
    {{$product->description}}
</div>

<div class = 'product-file'>
    <a href = '/pdf/{{$product->id}}.pdf'><img src = '/images/pdf.svg'></a>
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
@endif
@stop