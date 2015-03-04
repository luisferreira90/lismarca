<header>
	<div class = 'upper-header'>
		<div class = 'upper-header-content'>
			<div class = 'upper-header-left'>

				<div class = 'language'>
					@if(Session::get('language') === 'en') 
						<img class = 'language-flag' src = 'images/flag-icon-pt.png'>
						<p class = 'language-name'><a href = 'language?lang=pt'>Portuguese</a></p>
					@else
						<img class = 'language-flag' src = 'images/flag-icon-en.png'>
						<p class = 'language-name'><a href = 'language?lang=en'>English</a></p>
					@endif		
					<img src = 'images/arrow-down.png'>
				</div>

				<div class = 'phone'>
					<img src = 'images/phone.png'>
					<p>291 741 884</p>
				</div>

				<div class = 'mobile-phone'>
					<img src = 'images/mobile-phone.png'>
					<p>965 010 699</p>
				</div>

				<div class = 'facebook'>
					<img src = 'images/fb-icon.png'>
					<p class = 'blue'>gosto</p>
				</div>

				<div class = 'distribution'>
					<img class = 'arrow-right' src = 'images/arrow-right.png'>
					<p>Fornecemos para todo o país: Portugal Continental e Ilhas</p>
				</div>

			</div>

			<div class = 'login'>
				<div class = 'login-register'>
					<img class = 'arrow-right' src = 'images/arrow-right.png'>
					@if(Auth::check())
						<a href = 'profile'><p>{{Lang::get('strings.profile')}}</p></a>
					@else
						<a href = 'registo'><p>{{Lang::get('strings.registration')}}</p></a>
					@endif
				</div>
				<img src = 'images/lock.png'>	
				<div class = 'login-login'>
					<img class = 'arrow-right' src = 'images/arrow-right.png'>
					@if(Auth::check())
						<a href = 'logout'><p>Logout</p></a>
					@else
						<a href = 'login'><p>Login</p></a>
					@endif
				</div>
			</div>
		</div>
	</div>

	<div class = 'lower-header'>
		<div class = 'lower-header-left'>
			<a href = '/'><img src = 'images/logo.png' alt = 'Logo Lismarca' class = 'logo'></a>
		</div>

		<div class = 'lower-header-right'>
			<div class = 'validate-budget'>
				<img src = 'images/arrow-right-red.png'>
				<p>.VALIDAR ORÇAMENTO</p>
			</div>

			<div class = 'search'>
				<form class='search_field' method='GET' action='http://www.google.com/search'>
				    <input name='search'/ placeholder='Pesquisar...' type = 'text'>
				    <button type='submit'>
				    	<img src='images/search.png' alt='Pesquisa'/>
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