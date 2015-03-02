<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Scotch">

<title>Lismarca - Sistemas de Sombreamento | Mobiliário para Hotelaria</title>

<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/style.css">

<script src = "js/html5shiv-master/dist/html5shiv.js"></script>
<script src = "js/html5shiv-master/dist/html5shiv-printshiv.js"></script>

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script src="js/bjqs.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          center: new google.maps.LatLng(32.660536,-16.920736),
          zoom: 17,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)

        var marker = new google.maps.Marker({
	      position: new google.maps.LatLng(32.660536,-16.920736),
	      map: map,
	      title: 'Lismarca'
});

      }
      google.maps.event.addDomListener(window, 'load', initialize);
</script>

<link type="text/css" rel="Stylesheet" href="css/bjqs.css" />



<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css"/>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>

<script>

jQuery(document).ready(function($) {
	$('#slideshow').bjqs({
		// width and height need to be provided to enforce consistency
		// if responsive is set to true, these values act as maximum dimensions
		'width' : 960,
		'height' : 400,

		// animation values
		'animtype' : 'fade', // accepts 'fade' or 'slide'
		'animduration' : 550, // how fast the animation are
		'animspeed' : 3500, // the delay between each slide
		'automatic' : true, // automatic

		// control and marker configuration
		'showcontrols' : true, // show next and prev controls
		'centercontrols' : true, // center controls verically
		'nexttext' : '<img data-alt-src = "images/arrow-big-selected.png" src = "images/arrow-big-unselected.png">', // Text for 'next' button (can use HTML)
		'prevtext' : '<img data-alt-src = "images/arrow-big-selected.png" src = "images/arrow-big-unselected.png">', // Text for 'previous' button (can use HTML)
		'showmarkers' : true, // Show individual slide markers
		'centermarkers' : false, // Center markers horizontally

		// interaction values
		'keyboardnav' : false, // enable keyboard navigation
		'hoverpause' : true, // pause the slider on hover

		// presentational options
		'usecaptions' : false, // show captions for images using the image title tag
		'randomstart' : false, // start slider at random slide
		'responsive' : true // enable responsive capabilities (beta)
	});
});

var sourceSwap = function () {
        var $this = $(this);
        var newSource = $this.data('alt-src');
        $this.data('alt-src', $this.attr('src'));
        $this.attr('src', newSource);
    }

    $(function() {
        $('img[data-alt-src]').each(function() { 
            new Image().src = $(this).data('alt-src'); 
        }).hover(sourceSwap, sourceSwap); 
    });


</script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.four-columns').slick({
        	  infinite: true,
	  slidesToShow: 4,
	  slidesToScroll: 1,
   	  lazyLoad: 'ondemand',
   	  mobileFirst: true,
   	  nextArrow: '<img class ="carousel-next" data-alt-src = "images/arrow-big-selected.png" src = "images/arrow-big-unselected.png">',
   	  prevArrow: '<img class ="carousel-previous" data-alt-src = "images/arrow-big-selected.png" src = "images/arrow-big-unselected.png">'
      });
    });
  </script>