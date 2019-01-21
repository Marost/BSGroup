@php
	$home5_titulo = $w_home->where('tipo','home-5')->where('nombre','titulo')->first()->valor;
	$home5_descripcion = $w_home->where('tipo','home-5')->where('nombre','titulo')->first()->descripcion;
	$home5_boton = $w_home->where('tipo','home-5')->where('nombre','titulo')->first()->boton;
@endphp

{{-- HOME 5 --}}
<section class="seccion-6">
	<div class="seccion-6__contenedor">
		<header class="contenedor-header3">
			<h3 class="header3-titulo">{{ $home5_titulo }}</h3>
		</header>
		<div class="contenedor-leyenda3">
			<p class="contenedor-leyenda3__texto">{{ $home5_descripcion }}</p>
		</div>
		<div class="contenedor-boton">
			<a class="contenedor-boton__link" href="/contacto#form">{{ $home5_boton }}</a>
		</div>
	</div>
</section>