<header>
	<div class = 'lower-header'>
		<div class = 'lower-header-left'>
			<a href = '/'><img src = '/images/logo.svg' alt = 'Logo Lismarca' class = 'logo'></a>
		</div>

		<div class = 'login'>
				<div class = 'login-register'>
					<img class = 'arrow-right' src = '/images/arrow-right.svg'>
					@if(Auth::check() && User::isAdmin())
						<a href = 'admin'><p>Administração</p></a>
					@elseif(Auth::check())
						<a href = 'profile'><p>{{Lang::get('strings.profile')}}</p></a>
					@else
						<a href = 'registo'><p>{{Lang::get('strings.registration')}}</p></a>
					@endif
				</div>
				<img src = '/images/lock.svg'>	
				<div class = 'login-login'>
					<img class = 'arrow-right' src = '/images/arrow-right.svg'>
					@if(Auth::check())
						<a href = 'logout'><p>Logout</p></a>
					@else
						<a href = 'login'><p>Login</p></a>
					@endif
				</div>
			</div>

		<div class = 'language'>
			@if(Session::get('language') === 'en') 
				<img class = 'language-flag' src = '/images/flag-icon-pt.svg'>
				<p class = 'language-name'><a href = 'language?lang=pt'>Portuguese</a></p>
			@else
				<img class = 'language-flag' src = '/images/flag-icon-en.svg'>
				<p class = 'language-name'><a href = 'language?lang=en'>English</a></p>
			@endif		
			<img src = '/images/arrow-down.svg'>
		</div>

		<div class = 'lower-header-right'>
			@if(Auth::check())
				<div class = 'validate-budget'>
					<img src = '/images/arrow-right-red.svg'>
					<p>.VALIDAR ORÇAMENTO</p>
				</div>
			@endif

			<div class = 'search'>
				<form class='search_field' method='GET' action='http://www.google.com/search'>
				    <input name='search'/ placeholder='Pesquisar...' type = 'text'>
				    <button type='submit'>
				    	<img src='/images/search.svg' alt='Pesquisa'/>
				    </button>
				</form>
			</div>	


			

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

	</div>

</header>	

<div class = 'clear-fix'></div>