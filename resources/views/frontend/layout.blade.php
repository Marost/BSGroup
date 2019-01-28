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
	<link href="/css/bootstrap.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="/css/responsive.css" rel="stylesheet">

	{{-- Enlaces Internos --}}
	

	@yield('contenido_header')

	<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@id": "{{ $conf_web_dominio }}",
			"@type": "Organization",
			"name": "{{ $conf_web_titulo }}",
			"url": "{{ $conf_web_dominio }}",
			"logo": "{{ asset($conf_web_logo) }}",
			"email": "{{ $conf_web_email->valor }}",
			"address": {
				"@type": "PostalAddress",
				"streetAddress": "{{ $conf_web_direccion->valor }}"
			},
			"contactPoint": [
				{
					"@type": "ContactPoint",
					"telephone": "{{ $conf_web_telefono->valor }}",
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
							<li><i class="fa fa-envelope-o"></i>consultas@bsgroup.com.pe</li>
							<li><i class="fa fa-phone"></i>(51-1) 7156577 | (51-1) 7156578</li>
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
						<div class="logo"><a href="/"><img src="images/logo.png" alt="" title=""></a></div>
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
										<li><a href="#">Inicio</a></li>
										<li><a href="#nosotros">Nosotros</a></li>
										<li><a href="#servicios">Servicios</a></li>
										<li><a href="blog.html">Blog</a></li>
										<li><a href="#contacto">Contacto</a></li>
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
						<a href="/" class="img-responsive"><img src="images/logo.png" alt="" title=""></a>
					</div>

					<!--Right Col-->
					<div class="right-col float-right">
						<!-- Main Menu -->
						<nav class="main-menu navbar-expand-lg">
							<div class="navbar-collapse collapse clearfix">
								<ul class="navigation clearfix">
									<li><a href="#">Inicio</a></li>
									<li><a href="#nosotros">Nosotros</a></li>
									<li><a href="#servicios">Servicios</a></li>
									<li><a href="blog.html">Blog</a></li>
									<li><a href="#contacto">Contacto</a></li>
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
						<div class="big-column col-lg-8">
							<div class="row clearfix">

								<!--Footer Column-->
								<div class="footer-column col-lg-7 col-md-7">
									<div class="footer-widget about-widget">
										<div class="footer-logo">
											<figure>
												<a href="/"><img src="images/footer-logo.png" alt=""></a>
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
								<div class="footer-column col-lg-5 col-md-5">
									<div class="footer-widget services-widget">
										<h2 class="widget-title">Opciones</h2>
										<div class="widget-content">
											<ul class="list">
												<li><a href="#">Inicio</a></li>
												<li><a href="#">Nosotros</a></li>
												<li><a href="#">Servicios</a></li>
												<li><a href="#">Blog</a></li>
												<li><a href="#">Contacto</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!--Big Column-->
						<div class="big-column col-lg-4">
							<div class="row clearfix">

								<!--Footer Column-->
								<div class="footer-column col-lg-9 col-md-9">
									<div class="footer-widget services-widget">
										<h2 class="widget-title">Servicios</h2>
										<div class="widget-content">
											<ul class="list">
												<li><a href="#">Gestión Estratégica</a></li>
												<li><a href="#">Gestion Financiera y Tributaria</a></li>
												<li><a href="#">Gestión del Talento Humano</a></li>
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
<script src="/js/jquery.js"></script>
<script src="/js/popover.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script src="/js/wow.js"></script>
<script src="/js/owl.js"></script>
<script src="/js/validate.js"></script>
<script src="/js/mixitup.js"></script>
<script src="/js/isotope.js"></script>
<script src="/js/appear.js"></script>
<script src="/js/jquery.fancybox.js"></script>

<!-- Custom script -->
<script src="/js/script.js"></script>
{!! Html::script(mix('js/forms.js')) !!}

{!! $conf_script !!}

@yield('contenido_footer')

</body>
</html>