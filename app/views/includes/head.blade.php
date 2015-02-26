<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Scotch">

<title>Lismarca - Sistemas de Sombreamento | Mobiliário para Hotelaria</title>

<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/style.css">

<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>

<script src = "js/html5shiv-master/dist/html5shiv.js"></script>
<script src = "js/html5shiv-master/dist/html5shiv-printshiv.js"></script>

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script src="js/bjqs.min.js"></script>
<link type="text/css" rel="Stylesheet" href="css/bjqs.css" />

<script>

jQuery(document).ready(function($) {
	$('#slideshow').bjqs({
		// width and height need to be provided to enforce consistency
		// if responsive is set to true, these values act as maximum dimensions
		'width' : 960,
		'height' : 400,

		// animation values
		'animtype' : 'fade', // accepts 'fade' or 'slide'
		'animduration' : 450, // how fast the animation are
		'animspeed' : 3500, // the delay between each slide
		'automatic' : false, // automatic

		// control and marker configuration
		'showcontrols' : true, // show next and prev controls
		'centercontrols' : true, // center controls verically
		'nexttext' : '<img src = "images/arrow-big-unselected.png">', // Text for 'next' button (can use HTML)
		'prevtext' : '<img src = "images/arrow-big-unselected.png">', // Text for 'previous' button (can use HTML)
		'showmarkers' : true, // Show individual slide markers
		'centermarkers' : false, // Center markers horizontally

		// interaction values
		'keyboardnav' : true, // enable keyboard navigation
		'hoverpause' : true, // pause the slider on hover

		// presentational options
		'usecaptions' : false, // show captions for images using the image title tag
		'randomstart' : false, // start slider at random slide
		'responsive' : true // enable responsive capabilities (beta)
	});
});

</script>