{{ HTML::style('css/company_contacts.css') }}

@extends('layouts.layout')

@section('content')

<div class = 'contacts-left'>

	<div class = 'contacts-element'>
		<h2 class = 'red'>Localização</h2>
		<p>
			Rua Mestre Sidónio (Junto ao Continente/Modelo dos Viveiros)
			<br>9020 - 365
			<br>Funchal - Madeira - Portugal
		</p>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3358.935338080976!2d-16.920428299999998!3d32.66116219999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc605fdb9eb280a5%3A0x387a952b7ec11d3d!2sRua+Mestre+Sid%C3%B3nio%2C+9020+Funchal!5e0!3m2!1sen!2spt!4v1433929270748" frameborder="0" style="border:0">
		</iframe>
	</div>

	<div class = 'contacts-element'>
		<h2 class = 'red'>Contactos</h2>
		<p>
			<strong>Telefone:</strong> 291 741 884<br><strong>Telemóvel:</strong> 96 50 10 699<br><strong>E-mail:</strong> <a href = 'info@lismarca.pt'>info@lismarca.pt</a>
		</p>
	</div>

	<div class = 'contacts-element'>
		<h2 class = 'red'>Horário de Funcionamento</h2>
		<p>
			Segunda a Sexta das 9:00-13:00 e das 14:30-18:30
		</p>
	</div>

</div>



@stop