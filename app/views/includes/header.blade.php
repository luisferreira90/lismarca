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
						<a href = 'language?lang=pt'><img class = 'language-flag' src = '/images/flag-icon-pt.svg'></a>
					@else
						<a href = 'language?lang=en'><img class = 'language-flag' src = '/images/flag-icon-en.svg'></a>
					@endif		
				</div>

				<div class = 'login'>
					<img src = '/images/lock.svg' class = 'marker'>
					@if(Auth::check() && User::isAdmin())
						<a href = 'admin'>Administração</a>
						<a href = 'logout'> / Logout</a>
					@elseif(Auth::check())
						<a href = 'profile'>{{Lang::get('strings.profile')}}</a>
						<a href = 'logout'> / Logout</a>
					@else
						<a href = 'login'>{{Lang::get('strings.login_registration')}}</a>
					@endif
				</div>	
			</div>
		</div>
	</div>

	<div class = 'header-lower'>
		<nav>
			<div class = 'logo'>
				<a href = '/'><img src = '/images/logo.svg' alt = 'Logo Lismarca' class = 'logo'></a>
			</div>
			<ul>
				<li>Empresa</li>
				<li>Produtos</li>
				<li>Contactos</li>
				<li>Novidades</li>
				<li>Portfolio</li>
				<li class = 'validate-budget'>
					<!--<img src = '/images/arrow-right-red.svg'>-->
					<a href = 'registo'>{{Lang::get('strings.validate_budget')}}</a>
				</li>
				<li class = 'search'>
					<img src='/images/search.svg' alt='Pesquisa'/>
				</li>
				<!--<li class = 'search'>
					<form class='search_field' method='GET' action='http://www.google.com/search'>
						<input name='search'/ placeholder="{{Lang::get('strings.search')}}" type = 'text'>
						<button type='submit'>
							<img src='/images/search.svg' alt='Pesquisa'/>
						</button>
					</form>
				</li>-->
			</ul>
		</nav>
	</div>

</header>	

<hr></hr>

<div class = 'clear-fix'></div>