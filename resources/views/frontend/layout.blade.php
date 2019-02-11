<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>
		@section('titulo')
			{{ $conf_web_titulo }}
		@show
	</title>

	<meta name="robots" content="index,follow"/>
	<meta name='googlebot' content='index,follow'/>
	<meta property="fb:app_id" content="255520401560154">
	<meta name="token" id="token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{ asset('favicon.png') }}">
	<link rel="icon" sizes="96x96" href="{{ asset('favicon.png') }}">

	{{-- Enlace externos --}}
	{!! Html::style('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700') !!}
	{!! Html::style('https://fonts.googleapis.com/css?family=Work+Sans:400,500,700') !!}
	{!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.1/css/font-awesome.min.css') !!}
	{!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css') !!}
	{!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css') !!}
	{!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.0.2/css/hover-min.css') !!}
	{!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.carousel.min.css') !!}
	{!! Html::style('https://s3.amazonaws.com/icomoon.io/114779/Socicon/style.css?9ukd8d') !!}

	{{-- Enlaces Internos --}}
	<link href="/css/style.css" rel="stylesheet">
	<link href="/css/responsive.css" rel="stylesheet">

	@yield('contenido_header')

	<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@id": "{{ $conf_web_dominio }}",
			"@type": "Organization",
			"name": "{{ $conf_web_titulo }}",
			"url": "{{ $conf_web_dominio }}",
			"logo": "{{ asset($conf_web_logo) }}",
			"email": "{{ $conf_web_email }}",
			"address": {
				"@type": "PostalAddress",
				"streetAddress": "{{ $conf_web_direccion }}"
			},
			"contactPoint": [
				{
					"@type": "ContactPoint",
					"telephone": "{{ $conf_web_telefono }}",
					"contactType": "customer support",
					"areaServed": [ "PE" ]
				}
			],
			"sameAs": [
				@php($data = [])
			@foreach($conf_redes as $social)
				@php($data[] = '"'.$social->enlace.'"')
			@endforeach
			{!! implode(',', $data) !!}
			]
		}
	</script>

</head>
<body>

	<div id="app" class="page-wrapper">

		<div class="preloader"></div>

		<header class="main-header">

			<!-- header top -->
			<div class="header-top light black-bg-3">
				<div class="container clearfix">
					<!--Top Left-->
					<div class="top-left pull-left">
						<ul class="links-nav clearfix">
							<li><i class="fa fa-envelope-o"></i>{{ $conf_web_email }}</li>
							<li><i class="fa fa-phone"></i>{{ $conf_web_telefono }}</li>
						</ul>
					</div>

					<!--Top Right-->
					<div class="top-right pull-right">
						<div class="social-links clearfix">
							<a href="https://www.facebook.com/BSGroup.Peru"><span class="fa fa-facebook-f"></span></a>
						</div>
					</div>
				</div>
			</div>

			<!--Header-Upper-->
			<div class="header-upper style-three dark-color">
				<div class="container clearfix">

					<div class="float-left logo-outer">
						<div class="logo"><a href="/"><img src="/images/logo.png" alt="" title=""></a></div>
					</div>

					<div class="float-right upper-right clearfix">

						<div class="nav-outer clearfix">
							<!-- Main Menu -->
							<nav class="main-menu navbar-expand-lg">
								<div class="navbar-header">
									<!-- Toggle Button -->
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>

								<div class="navbar-collapse collapse clearfix">
									<ul class="navigation clearfix">
										<li><a href="/">Inicio</a></li>
										<li><a href="/#nosotros">Nosotros</a></li>
										<li><a href="/#servicios">Servicios</a></li>
										<li><a href="/clientes">Clientes</a></li>
										<li><a href="/#contacto">Contacto</a></li>
										<li><a href="/blog">Blog</a></li>
									</ul>
								</div>
							</nav>
						</div>

					</div>

				</div>
			</div>
			<!--End Header Upper-->

			<!--Sticky Header-->
			<div class="sticky-header">
				<div class="container clearfix">
					<!--Logo-->
					<div class="logo float-left">
						<a href="/" class="img-responsive"><img src="/images/logo.png" alt="" title=""></a>
					</div>

					<!--Right Col-->
					<div class="right-col float-right">
						<!-- Main Menu -->
						<nav class="main-menu navbar-expand-lg">
							<div class="navbar-collapse collapse clearfix">
								<ul class="navigation clearfix">
									<li><a href="/">Inicio</a></li>
									<li><a href="/#nosotros">Nosotros</a></li>
									<li><a href="/#servicios">Servicios</a></li>
									<li><a href="/clientes">Clientes</a></li>
									<li><a href="/#contacto">Contacto</a></li>
									<li><a href="/blog">Blog</a></li>
								</ul>
							</div>
						</nav><!-- Main Menu End-->
					</div>

				</div>
			</div>
			<!--End Sticky Header-->
		</header>

		@yield('contenido_body')

		<footer class="main-footer">
			<div class="container">

				<!--Widgets Section-->
				<div class="widgets-section">
					<div class="row clearfix">
						<!--Big Column-->
						<div class="big-column col-lg-7">
							<div class="row clearfix">

								<!--Footer Column-->
								<div class="footer-column col-lg-8 col-md-8">
									<div class="footer-widget about-widget">
										<div class="footer-logo">
											<figure>
												<a href="/"><img src="/images/footer-logo.png" alt=""></a>
											</figure>
										</div>
										<div class="widget-content">
											<div class="text">
												Business Solutions Group es una firma de asesoría y consultoría empresarial, que brinda soluciones efectivas para la gestión exitosa de las empresas.
											</div>
											<ul class="social-icon-three">
												<li><a target="_blank" href="https://www.facebook.com/BSGroup.Peru"><i class="fa fa-facebook"></i></a></li>
											</ul>
										</div>
									</div>
								</div>

								<!--Footer Column-->
								<div class="footer-column col-lg-4 col-md-4">
									<div class="footer-widget services-widget">
										<h2 class="widget-title">Opciones</h2>
										<div class="widget-content">
											<ul class="list">
												<li><a href="/#nosotros">Nosotros</a></li>
												<li><a href="/#servicios">Servicios</a></li>
                                                <li><a href="/clientes">Clientes</a></li>
                                                <li><a href="/#contacto">Contacto</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!--Big Column-->
						<div class="big-column col-lg-5">
							<div class="row clearfix">

								<!--Footer Column-->
								<div class="footer-column col-lg-10 col-md-10">
									<div class="footer-widget services-widget">
										<h2 class="widget-title">Servicios</h2>
										<div class="widget-content">
											<ul class="list">
												@foreach($conf_servicios as $servicio)
												<li><a href="{{ $servicio->url }}">{{ $servicio->titulo }}</a></li>
												@endforeach
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--Footer Bottom-->
			<div class="footer-bottom">
				<div class="container">
					<div class="copyright-text">
						<p>&copy;  2018 Todos los derechos reservados.</p>
					</div>
				</div>
			</div>
		</footer>

	</div>

	<button class="scroll-top scroll-to-target" data-target="html">
		<span class="fa fa-angle-up"></span>
	</button>


{{-- Enlaces Externos --}}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js') !!}
{!! Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js') !!}
<script src="/js/popover.js"></script>
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/wow/1.0.1/wow.min.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/owl.carousel.min.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/mixitup/2.1.10/jquery.mixitup.min.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-appear/0.1/jquery.appear.min.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js') !!}

<!-- Custom script -->
<script src="/js/script.js"></script>
{!! Html::script(mix('js/forms.js')) !!}

{!! $conf_script !!}

@yield('contenido_footer')

</body>
</html>