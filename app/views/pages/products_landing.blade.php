{{ HTML::style('css/slick.css') }}
{{ HTML::style('css/slick-theme.css') }}
{{ HTML::style('css/bootstrap.css') }}
{{ HTML::style('css/products.css') }}

@extends('layouts.layout')

@section('content')

<h1>
    Secções
</h1>

<div class="gallery-list">

    <div class = 'gallery-list-inner'>
        @foreach ($sections as $section)

            <div class="gallery-item gallery-item-section">
                <div class='image'>
                    <a href={{'/produtos/?section=' . $section->id }}>{{ HTML::image('images/produtos/icons/' . $section->icon) }}</a>
                </div>
                <h3>.{{ $section->name }}</h3>         
            </div>

        @endforeach
    </div>

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