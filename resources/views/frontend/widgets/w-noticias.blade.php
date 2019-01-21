@php
	$home7_titulo = $w_home->where('tipo','home-7')->where('nombre','titulo')->first()->valor;
@endphp
{{-- HOME 7 --}}
<section class="seccion-8">
	<div class="seccion-8__contenedor">
		<header class="contenedor-header5">
			<h3 class="contenedor-header5__texto">{{ $home7_titulo }}</h3>
		</header>

		<div class="contenedor-sector">

			@foreach($w_noticias as $row)
				<div class="sector sector-derecha">
					<div class="sector-izquierda__img"><img src="{{ $row->imagen_home }}" alt="{{ $row->titulo }}"></div>
					<div class="sector-izquierda__informacion">
						<h3 class="sector-titulo">
							<a href="{{ $row->url }}">
								{{ $row->titulo }}
							</a>
						</h3>
						<div class="sector-fecha">
							<span class="icon-clock"></span>
							<span>{{ $row->fecha }}</span>
						</div>
						<p class="sector-texto">{{ $row->descripcion }}</p>
					</div>
				</div>
			@endforeach

		</div>
	</div>
</section>