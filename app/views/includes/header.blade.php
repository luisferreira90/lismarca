<header>
	<div class = 'logo'>
		<a href = '/'><img src = '/images/logo.svg' alt = 'Logo Lismarca' class = 'logo'></a>
	</div>

	<div class = 'header-upper'>

		<div class = 'social-networks'>
			<img src = '/images/arrow-right.svg'>
			<img src = '/images/social-youtube.svg'>
			<img src = '/images/social-linkedin.svg'>
			<img src = '/images/social-gplus.svg'>
			<img src = '/images/social-pinterest.svg'>
			<img src = '/images/social-facebook.svg'>
		</div>

		<div class = 'language'>
			<img src = '/images/arrow-right.svg'>
			@if(Session::get('language') === 'en') 
			<a href = 'language?lang=pt'><img class = 'language-flag' src = '/images/flag-icon-pt.svg'></a>
			@else
			<a href = 'language?lang=en'><img class = 'language-flag' src = '/images/flag-icon-en.svg'></a>
			@endif		
		</div>

		<div class = 'login'>
			<div class = 'login-register'>
				<img class = 'arrow-right' src = '/images/arrow-right.svg'>
				@if(Auth::check() && User::isAdmin())
				<a href = 'admin'>Administração</a>
				@elseif(Auth::check())
				<a href = 'profile'>{{Lang::get('strings.profile')}}</a>
				@else
				<a href = 'registo'>{{Lang::get('strings.registration')}}</a>
				@endif
			</div>
			<img src = '/images/lock.svg'>	
			<div class = 'login-login'>
				<img class = 'arrow-right' src = '/images/arrow-right.svg'>
				@if(Auth::check())
				<a href = 'logout'>Logout</a>
				@else
				<a href = 'login'>Login</a>
				@endif
			</div>
		</div>
	</div>

	<div class = 'header-middle'>
		<div class = 'validate-budget'>
			<img src = '/images/arrow-right-red.svg'>
			<a href = 'registo'>.VALIDAR ORÇAMENTO</a>
		</div>

		<div class = 'search'>
			<form class='search_field' method='GET' action='http://www.google.com/search'>
				<input name='search'/ placeholder='Pesquisar...' type = 'text'>
				<button type='submit'>
					<img src='/images/search.svg' alt='Pesquisa'/>
				</button>
			</form>
		</div>	
	</div>

	<div class = 'header-lower'>
		<nav>
			<ul>
				<li>.Empresa</li>
				<li>.Produtos</li>
				<li>.Contactos</li>
				<li>.Novidades</li>
				<li>.Portfolio</li>
			</ul>
		</nav>
	</div>

</header>	

<div class = 'clear-fix'></div>