@extends('layouts.layout')

@section('content')

<h1>Categorias, subcategorias, seccoes e sub seccoes aqui</h1>

<div class="gallery-list">
    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/1.jpg" alt=""></a></div>
        <h3>.Mobiliário Interior</h3>       
    </div>
 
    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/2.jpg" alt=""></a></div>
        <h3>.Mobiliário Exterior</h3>        
    </div>

    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/3.jpg" alt=""></a></div>
        <h3>.Cadeiras e Sofás</h3>       
    </div>

    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/4.jpg" alt=""></a></div>
        <h3>.Mesas e Bases</h3>        
    </div>

    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/5.jpg" alt=""></a></div>
        <h3>.Tampos</h3>        
    </div>

    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/6.jpg" alt=""></a></div>
        <h3>.Mobiliário Piscina</h3>        
    </div>

    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/7.jpg" alt=""></a></div>
        <h3>.Cadeirões</h3>        
    </div>

    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/8.jpg" alt=""></a></div>
        <h3>.Materiais em Madeira</h3>        
    </div>

    <div class="gallery-item">
        <div class='image'><a href="produtos/categoria"><img src="/images/home/9.jpg" alt=""></a></div>
        <h3>.Mobiliário Interior</h3>        
    </div>
</div>

<hr>

<h3 class = 'title red uppercase'>.Novidades</h3>
<div class="slideshow">
    <div>
        <img src="/images/home/1.jpg">
        <p>Cadeira em madeira</p>
    </div>
    <div>
        <img src="/images/home/2.jpg">
        <p>Tapa-sol em polipropileno</p>
    </div>
    <div>
        <img src="/images/home/3.jpg">
        <p>Item de teste 3</p>
    </div>
    <div>
        <img src="/images/home/4.jpg">
        <p>Mobiliário de interior</p>
    </div>
    <div>
        <img src="/images/home/5.jpg">
        <p>Calhas PVC</p>
    </div>
    <div>
        <img src="/images/home/6.jpg">
        <p>Artigo de exposição de vinhos</p>
    </div>
    <div>
        <img src="/images/home/7.jpg">
        <p>Janela de correr em metal</p>
    </div>
    <div>
        <img src="/images/home/8.jpg">
        <p>Calhas triangulares</p>
    </div>
    <div>
        <img src="/images/home/9.jpg">
        <p>Item de teste</p>
    </div>
</div>

{{ HTML::style('css/slick.css') }}
{{ HTML::style('css/slick-theme.css') }}
{{ HTML::script('js/slick.min.js') }}

<script>

$(document).ready(function(){
  $('.slideshow').slick({
    dots: true,
    infinite: true,
    slidesToShow: 7,
    slidesToScroll: 3,
    autoplay: true,
    autoplaySpeed: 3000,
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

{{ HTML::style('css/products.css') }}

@stop