<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Luís Ferreira">

<title>Lismarca - Sistemas de Sombreamento | Mobiliário para Hotelaria</title>

{{ HTML::style('css/normalize.css') }}
{{ HTML::style('css/home.css') }}
{{ HTML::style('css/base.css') }}
{{ HTML::style('css/header.css') }}
{{ HTML::style('css/footer.css') }}

{{ HTML::script('js/html5shiv-master/dist/html5shiv.js') }}
{{ HTML::script('js/html5shiv-master/dist/html5shiv-printshiv.js') }}

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

{{ HTML::script('js/bjqs.min.js') }}

{{ HTML::style('css/bjqs.css') }}

<script>

jQuery(document).ready(function($) {
	$('#slideshow').bjqs({
		// width and height need to be provided to enforce consistency
		// if responsive is set to true, these values act as maximum dimensions
		'width' : 1920,
		'height' : 1080,

		// animation values
		'animtype' : 'fade', // accepts 'fade' or 'slide'
		'animduration' : 550, // how fast the animation are
		'animspeed' : 3500, // the delay between each slide
		'automatic' : true, // automatic

		// control and marker configuration
		'showcontrols' : false, // show next and prev controls
		'centercontrols' : false, // center controls verically
		'nexttext' : '<img data-alt-src = "images/arrow-big-selected.png" src = "images/arrow-big-unselected.png">', // Text for 'next' button (can use HTML)
		'prevtext' : '<img data-alt-src = "images/arrow-big-selected.png" src = "images/arrow-big-unselected.png">', // Text for 'previous' button (can use HTML)
		'showmarkers' : false, // Show individual slide markers
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


</script>