<header>
	<div class = 'header-upper'>
		<div class = 'header-upper-inner'>
			<div class = 'social-networks'>
				<img src = '/images/arrow-right.svg' class = 'marker'>
				<a href = '#'><img src = '/images/social-youtube.svg'></a>
				<a href = '#'><img src = '/images/social-linkedin.svg'></a>
				<a href = '#'><img src = '/images/social-gplus.svg'></a>
				<a href = '#'><img src = '/images/social-pinterest.svg'></a>
				<a href = '#'><img src = '/images/social-facebook.svg'></a>
			</div>

			<div class = 'header-upper-right'>

				<div class = 'language'>
					<img src = '/images/arrow-right.svg' class = 'marker'>
					@if(Session::get('language') === 'en') 
						<a href = '/language?lang=pt'><img class = 'language-flag' src = '/images/flag-icon-pt.svg'></a>
					@else
						<a href = '/language?lang=en'><img class = 'language-flag' src = '/images/flag-icon-en.svg'></a>
					@endif		
				</div>

				<div class = 'login'>
					<img src = '/images/lock.svg' class = 'marker'>
					@if(Auth::check() && User::isAdmin())
						<a href = 'admin'>Administração</a>
						<a href = 'logout'> / Logout</a>
					@elseif(Auth::check())
						<a href = 'registo'>{{Lang::get('strings.profile')}}</a>
						<a href = 'logout'> / Logout</a>
					@else
						<a href = 'login'>{{Lang::get('strings.login_registration')}}</a>
					@endif
				</div>	
			</div>
		</div>
	</div>

	<div class = 'header-lower' id = 'headerLower'>
		<nav>
			<div class = 'logo'>
				<a href = '/'><img src = '/images/logo.svg' alt = 'Logo Lismarca' class = 'logo'></a>
			</div>
			<div id = 'hamburger' onclick = 'showMenu()'></div>
			<ul id = 'main-menu'>
				<li><a href = '/empresa'>Empresa</a></li>
				<li><a href = '/produtos'>Produtos</a></li>
				<li><a href = '/contactos'>Contactos</a></li>
				<li><a href = '/portfolio'>Portfolio</a></li>
				@if(Auth::check())
				<li class = 'validate-budget'>
					<a href = '/registo'>
						{{Lang::get('strings.validate_budget')}}
					</a>
				</li>
				@endif
				<li class = 'search'>
					<form class='search_field' method='GET' action='/produtos'>
						<input name='search'/ placeholder="{{Lang::get('strings.search')}}" type = 'text'>
						<button class = 'hover' type='submit'>
							<img class = 'hover' src='/images/search.svg'/>
						</button>
					</form>
				</li>
			</ul>
		</nav>
	</div>
</header>	



<div class = 'clear-fix'></div>

<script>

	$(window).scroll(function () {
	    if( $(window).scrollTop() > $('#headerLower').offset().top && !($('#headerLower').hasClass('fixed'))) {
	    	$('#headerLower').addClass('fixed');
	    	$('#main-menu').addClass('fixed-menu');
	    } 
	    else if ($(window).scrollTop() == 0) {
	    	$('#headerLower').removeClass('fixed');
	    	$('#main-menu').removeClass('fixed-menu');
	    }
	});

</script>