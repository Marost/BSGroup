@extends('frontend.layout')

@php
	$row_titulo = $row->titulo;
	$row_url = $row->url;
	$row_descripcion = $row->descripcion;
	$row_keywords = $row->keywords;
	$row_imagen_original = $row->imagen_original;
	$row_fecha_publicado = $row->created_at;
	$row_fecha_update = $row->updated_at;
@endphp

@section('titulo')
	@if(Request::is('/') OR Request::is('home'))
		@parent
	@else
		{{ $row_titulo }} | @parent
	@endif
@stop

@section('contenido_header')
	<link rel="canonical" href="{{ $row_url }}" />

	<meta name="description" content="{{ $row_descripcion }}">
	<meta name="keywords" content="{{ $row_keywords }}">

	<meta property="og:type" content="article" />
	<meta property="og:title" content="{{ $row_titulo }}" />
	<meta property="og:description" content="{{ $row_descripcion }}" />
	<meta property="og:url" content="{{ $row_url }}" />
	<meta property="og:image" content="{{ asset($row_imagen_original) }}" />

	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="{{ $row_titulo }}">
	<meta name="twitter:description" content="{{ $row_descripcion }}">
	<meta name="twitter:image" content="{{ asset($row_imagen_original) }}">

	<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "NewsArticle",
			"mainEntityOfPage": {
				"@type": "WebPage",
				"@id": "{{ $conf_web_dominio }}"
			},
			"headline": "{{ $row_titulo }}",
			"description": "{{ $row_descripcion }}",
			"image": [
				"{{ asset($row_imagen_original) }}"
			],
			"datePublished": "{{ $row_fecha_publicado }}",
			"dateModified": "{{ $row_fecha_update }}",
			"author": "{{ $conf_web_titulo }}",
			"publisher": {
				"@type": "Organization",
				"name": "{{ $conf_web_titulo }}",
				"logo": {
					"@type": "ImageObject",
					"url": "{{ asset($conf_web_logo) }}"
				}
			}
		}
	</script>

	<style>
		{!! $row->css !!}
	</style>

	@if(Request::is('precios'))
		{!! Html::style('/css/acorden.css') !!}
	@endif

	@if($sliders->count() > 1)
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300%2C400%2C600" rel="stylesheet" property="stylesheet" type="text/css" media="all">
		<link rel="stylesheet" type="text/css" href="/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
		<link rel="stylesheet" type="text/css" href="/fonts/font-awesome/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="/css/settings.css">
		<style type="text/css">	#rev_slider_24_1_wrapper .tp-loader.spinner3{ background-color: #93d0ec !important; } </style>
		<style type="text/css">.rev_slider .slotholder:after{width:100%;  height:100%;  content:"";  position:absolute;  left:0;  top:0;  pointer-events:none;  background:rgba(0,0,0,0.5); z-index:2}</style>
		<style type="text/css">.bullet-bar.tparrows{cursor:pointer;background:#000;background:rgba(0,0,0,0.5);width:40px;height:40px;position:absolute;display:block;z-index:100}.bullet-bar.tparrows:hover{background:#000}.bullet-bar.tparrows:before{font-family:"revicons";font-size:15px;color:#fff;display:block;line-height:40px;text-align:center}.bullet-bar.tparrows.tp-leftarrow:before{content:"\e824"}.bullet-bar.tparrows.tp-rightarrow:before{content:"\e825"}</style>
	@endif
@stop

@section('contenido_body')
	@if($sliders->count() == 1)
		@foreach($sliders as $slider)
			<section class="software_banner" style="background-image: url({{ $slider->imagen_contenido }})">
				<div class="software_banner__container">
					<div class="software_copy">
						<h1>{{ $slider->valor }}</h1>
						<p>{{ $slider->subtitulo }}</p>
						@if($slider->boton)
						<a href="{{ $slider->boton_enlace }}" class="link-banner">{{ $slider->boton }}</a>
						@endif
					</div>
				</div>
			</section>
		@endforeach
	@elseif($sliders->count() > 1)
		<div class="slider-pagina">
			<div id="rev_slider_24_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="Siscom" data-source="gallery" style="background:#ffffff;padding:0px;">
				<div id="rev_slider_24_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.5">
					<ul>
						@foreach($sliders as $slider)
							@if($slider->subtitulo)
								<li data-index="rs-{{ $slider->id }}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="500"  data-thumb="{{ $slider->imagen_contenido }}"  data-rotate="0"  data-saveperformance="off"  data-title="Slide">
									<!-- MAIN IMAGE -->
									<img src="{{ $slider->imagen_contenido }}"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Power1.easeOut" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>
									<!-- LAYERS -->
									<div id="rrzm_49" class="rev_row_zone rev_row_zone_middle" style="z-index: 5;">

										<!-- LAYER NR. 1 -->
										<div class="tp-caption  "
										     id="slide-{{ $slider->id }}-layer-9"
										     data-x="['left','left','left','left']" data-hoffset="['100','100','0','100']"
										     data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
										     data-width="none"
										     data-height="none"
										     data-whitespace="nowrap"

										     data-type="row"
										     data-columnbreak="2"
										     data-responsive_offset="on"
										     data-responsive="off"
										     data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
										     data-margintop="[0,0,0,0]"
										     data-marginright="[0,0,0,0]"
										     data-marginbottom="[0,0,0,0]"
										     data-marginleft="[0,0,0,0]"
										     data-textAlign="['inherit','inherit','inherit','inherit']"
										     data-paddingtop="[0,0,0,0]"
										     data-paddingright="[0,0,0,0]"
										     data-paddingbottom="[0,0,0,0]"
										     data-paddingleft="[0,0,0,0]"

										     style="z-index: 5; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;">
											<!-- LAYER NR. 2 -->
											<div class="tp-caption  "
											     id="slide-{{ $slider->id }}-layer-10"
											     data-x="['left','left','left','left']" data-hoffset="['0','100','0','100']"
											     data-y="['top','top','top','top']" data-voffset="['0','100','0','100']"
											     data-width="none"
											     data-height="none"
											     data-whitespace="nowrap"

											     data-type="column"
											     data-responsive_offset="on"
											     data-responsive="off"
											     data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
											     data-columnwidth="100%"
											     data-verticalalign="top"
											     data-margintop="[0,0,0,0]"
											     data-marginright="[0,0,0,0]"
											     data-marginbottom="[0,0,0,0]"
											     data-marginleft="[0,0,0,0]"
											     data-textAlign="['inherit','inherit','center','center']"
											     data-paddingtop="[0,0,0,0]"
											     data-paddingright="[50,50,50,20]"
											     data-paddingbottom="[0,0,0,0]"
											     data-paddingleft="[50,50,50,20]"

											     style="z-index: 6; width: 100%;">
												<!-- LAYER NR. 3 -->
												<div class="tp-caption   tp-resizeme"
												     id="slide-{{ $slider->id }}-layer-5"
												     data-x="['left','left','center','center']" data-hoffset="['0','73','0','0']"
												     data-y="['top','bottom','bottom','bottom']" data-voffset="['0','230','270','250']"
												     data-fontweight="['700','700','700','700']"
												     data-width="['740','60%','100%','100%']"
												     data-height="none"
												     data-whitespace="normal"

												     data-type="text"
												     data-responsive_offset="on"

												     data-frames='[{"delay":"+490","speed":1000,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:[100%];y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Linear.easeNone"},{"delay":"wait","speed":750,"frame":"999","to":"x:[-100%];opacity:1;","mask":"x:[100%];y:0;s:inherit;e:inherit;","ease":"Power4.easeInOut"}]'
												     data-margintop="[0,0,0,0]"
												     data-marginright="[0,0,0,0]"
												     data-marginbottom="[0,0,0,0]"
												     data-marginleft="[0,0,0,0]"
												     data-textAlign="['inherit','inherit','center','center']"
												     data-paddingtop="[10,10,10,10]"
												     data-paddingright="[20,20,0,20]"
												     data-paddingbottom="[0,0,0,0]"
												     data-paddingleft="[13,13,0,13]"

												     style="z-index: 7; min-width: 740px; max-width: 740px; white-space: normal; font-size: 2.5rem; line-height: 2.7rem; font-weight: 700; color: #ffffff; letter-spacing: 0px; display: block;font-family:Open Sans;">{{ $slider->valor }}</div>

												<!-- LAYER NR. 4 -->
												<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
												     id="slide-{{ $slider->id }}-layer-12"
												     data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
												     data-y="['top','top','top','top']" data-voffset="['0','0','0','0']"
												     data-width="full"
												     data-height="['20','20','10','30']"
												     data-whitespace="normal"

												     data-type="shape"
												     data-responsive_offset="on"

												     data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
												     data-margintop="[0,0,0,0]"
												     data-marginright="[0,0,0,0]"
												     data-marginbottom="[0,0,0,0]"
												     data-marginleft="[0,0,0,0]"
												     data-textAlign="['inherit','inherit','inherit','inherit']"
												     data-paddingtop="[0,0,0,0]"
												     data-paddingright="[0,0,0,0]"
												     data-paddingbottom="[0,0,0,0]"
												     data-paddingleft="[0,0,0,0]"

												     style="z-index: 10; display: block;background-color:rgba(0,0,0,0);"> </div>

												<!-- LAYER NR. 5 -->
												<div class="tp-caption   tp-resizeme"
												     id="slide-{{ $slider->id }}-layer-6"
												     data-x="['left','left','center','center']" data-hoffset="['0','0','0','0']"
												     data-y="['top','top','bottom','bottom']" data-voffset="['0','0','230','210']"
												     data-fontsize="['24','20','20','20']"
												     data-lineheight="['34','34','30','30']"
												     data-width="['700','55%','480','360']"
												     data-height="none"
												     data-whitespace="normal"

												     data-type="text"
												     data-responsive_offset="on"

												     data-frames='[{"delay":"+490","speed":2000,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:[-100%];y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":750,"frame":"999","to":"x:[-100%];opacity:1;","mask":"x:[100%];y:0;s:inherit;e:inherit;","ease":"Power4.easeInOut"}]'
												     data-margintop="[0,0,0,0]"
												     data-marginright="[0,0,0,0]"
												     data-marginbottom="[0,0,0,0]"
												     data-marginleft="[0,0,0,0]"
												     data-textAlign="['inherit','inherit','center','center']"
												     data-paddingtop="[5,5,5,5]"
												     data-paddingright="[20,20,20,20]"
												     data-paddingbottom="[0,0,0,0]"
												     data-paddingleft="[20,20,20,20]"

												     style="z-index: 8; min-width: 700px; max-width: 700px; white-space: normal; font-size: 24px; line-height: 34px; font-weight: 300; color: #ffffff; letter-spacing: 0px; display: inline-block;font-family:Open Sans;">{{ $slider->subtitulo }}</div>

												<!-- LAYER NR. 6 -->
												<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
												     id="slide-{{ $slider->id }}-layer-13"
												     data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
												     data-y="['top','top','top','top']" data-voffset="['0','0','0','0']"
												     data-width="full"
												     data-height="['20','20','30','30']"
												     data-whitespace="normal"

												     data-type="shape"
												     data-responsive_offset="on"

												     data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
												     data-margintop="[0,0,0,0]"
												     data-marginright="[0,0,0,0]"
												     data-marginbottom="[0,0,0,0]"
												     data-marginleft="[0,0,0,0]"
												     data-textAlign="['inherit','inherit','inherit','inherit']"
												     data-paddingtop="[0,0,0,0]"
												     data-paddingright="[0,0,0,0]"
												     data-paddingbottom="[0,0,0,0]"
												     data-paddingleft="[0,0,0,0]"

												     style="z-index: 11; display: block;background-color:rgba(0,0,0,0);"> </div>

												@if($slider->boton)
												<div class="tp-caption rev-btn  tp-resizeme"
												     id="slide-{{ $slider->id }}-layer-7"
												     data-x="['left','left','center','center']" data-hoffset="['0','93','0','0']"
												     data-y="['top','bottom','bottom','bottom']" data-voffset="['0','100','140','130']"
												     data-width="none"
												     data-height="none"
												     data-whitespace="['normal','nowrap','nowrap','nowrap']"

												     data-type="button"
												     data-actions='[{"event":"click","action":"simplelink","target":"_self","url":"{{ $slider->boton_enlace }}","delay":""}]'
												     data-responsive_offset="on"

												     data-frames='[{"delay":"+990","speed":1500,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0deg;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:[-100%];y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":750,"frame":"999","to":"x:[-100%];opacity:1;","mask":"x:[100%];y:0;s:inherit;e:inherit;","ease":"Power4.easeInOut"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);bg:rgb(59,102,137);bc:rgba(0,0,0,1);bs:solid;bw:0 0 0 0;"}]'
												     data-margintop="[0,0,0,0]"
												     data-marginright="[0,0,0,0]"
												     data-marginbottom="[0,0,0,0]"
												     data-marginleft="[20,20,0,0]"
												     data-textAlign="['center','inherit','inherit','inherit']"
												     data-paddingtop="[5,5,5,5]"
												     data-paddingright="[70,90,70,60]"
												     data-paddingbottom="[5,5,5,5]"
												     data-paddingleft="[70,90,70,60]"

												     style="border-radius: 50px; z-index: 9; white-space: normal; font-size: 25px; line-height: 46px; font-weight: 400; color: #ffffff; display: inline-block;font-family:Open Sans;background-color:#66aae5;border-color:#66aae5;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">{{ $slider->boton }}</div>
												@endif
											</div>
										</div>
									</div>
								</li>
							@else
								<li data-index="rs-{{ $slider->id }}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="500"  data-thumb="{{ $slider->imagen_contenido }}"  data-rotate="0"  data-saveperformance="off"  data-title="Slide">
									<!-- MAIN IMAGE -->
									<img src="{{ $slider->imagen_contenido }}"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Power1.easeOut" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>
									<!-- LAYERS -->
									<div id="rrzm_{{ $slider->id }}" class="rev_row_zone rev_row_zone_middle" style="z-index: 5;">

										<!-- LAYER NR. 1 -->
										<div class="tp-caption  "
										     id="slide-{{ $slider->id }}-layer-9"
										     data-x="['left','left','left','left']" data-hoffset="['0','100','0','100']"
										     data-y="['middle','middle','middle','middle']" data-voffset="['-187','0','0','0']"
										     data-width="none"
										     data-height="none"
										     data-whitespace="nowrap"

										     data-type="row"
										     data-columnbreak="2"
										     data-responsive_offset="on"
										     data-responsive="off"
										     data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
										     data-margintop="[0,0,0,0]"
										     data-marginright="[0,0,0,0]"
										     data-marginbottom="[0,0,0,0]"
										     data-marginleft="[0,0,0,0]"
										     data-textAlign="['inherit','inherit','inherit','inherit']"
										     data-paddingtop="[0,0,0,0]"
										     data-paddingright="[0,0,0,0]"
										     data-paddingbottom="[0,0,0,0]"
										     data-paddingleft="[0,0,0,0]"

										     style="z-index: 5; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;">
											<!-- LAYER NR. 2 -->
											<div class="tp-caption  "
											     id="slide-{{ $slider->id }}-layer-10"
											     data-x="['left','left','left','left']" data-hoffset="['0','100','0','100']"
											     data-y="['top','top','top','top']" data-voffset="['0','100','0','100']"
											     data-width="none"
											     data-height="none"
											     data-whitespace="nowrap"

											     data-type="column"
											     data-responsive_offset="on"
											     data-responsive="off"
											     data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
											     data-columnwidth="100%"
											     data-verticalalign="top"
											     data-margintop="[0,0,0,0]"
											     data-marginright="[0,0,0,0]"
											     data-marginbottom="[0,0,0,0]"
											     data-marginleft="[0,0,0,0]"
											     data-textAlign="['inherit','inherit','center','center']"
											     data-paddingtop="[0,0,0,0]"
											     data-paddingright="[50,50,50,20]"
											     data-paddingbottom="[0,0,0,0]"
											     data-paddingleft="[50,50,50,20]"

											     style="z-index: 6; width: 100%;">
												<!-- LAYER NR. 3 -->
												<div class="tp-caption   tp-resizeme"
												     id="slide-{{ $slider->id }}-layer-5"
												     data-x="['left','left','center','center']" data-hoffset="['0','73','0','0']"
												     data-y="['top','bottom','bottom','bottom']" data-voffset="['0','230','270','250']"
												     data-fontweight="['700','700','700','700']"
												     data-width="['600','60%','100%','100%']"
												     data-height="none"
												     data-whitespace="normal"

												     data-type="text"
												     data-responsive_offset="on"

												     data-frames='[{"delay":"+490","speed":1000,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:[100%];y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Linear.easeNone"},{"delay":"wait","speed":750,"frame":"999","to":"x:[-100%];opacity:1;","mask":"x:[100%];y:0;s:inherit;e:inherit;","ease":"Power4.easeInOut"}]'
												     data-margintop="[0,0,0,0]"
												     data-marginright="[0,0,0,0]"
												     data-marginbottom="[0,0,0,0]"
												     data-marginleft="[0,0,0,0]"
												     data-textAlign="['inherit','inherit','center','center']"
												     data-paddingtop="[10,10,10,10]"
												     data-paddingright="[20,20,0,20]"
												     data-paddingbottom="[0,0,0,0]"
												     data-paddingleft="[13,13,0,13]"

												     style="z-index: 7; min-width: 600px; max-width: 600px; white-space: normal; font-size: 2.5rem; line-height: 2.7rem; font-weight: 700; color: #ffffff; letter-spacing: 0px; display: block;font-family:Open Sans;">{{ $slider->valor }}</div>

												<!-- LAYER NR. 4 -->
												<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
												     id="slide-{{ $slider->id }}-layer-12"
												     data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
												     data-y="['top','top','top','top']" data-voffset="['0','0','0','0']"
												     data-width="full"
												     data-height="['20','20','10','30']"
												     data-whitespace="normal"

												     data-type="shape"
												     data-responsive_offset="on"

												     data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
												     data-margintop="[0,0,0,0]"
												     data-marginright="[0,0,0,0]"
												     data-marginbottom="[0,0,0,0]"
												     data-marginleft="[0,0,0,0]"
												     data-textAlign="['inherit','inherit','inherit','inherit']"
												     data-paddingtop="[0,0,0,0]"
												     data-paddingright="[0,0,0,0]"
												     data-paddingbottom="[0,0,0,0]"
												     data-paddingleft="[0,0,0,0]"

												     style="z-index: 8; display: block;background-color:rgba(0,0,0,0);"> </div>

												<!-- LAYER NR. 5 -->
												<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
												     id="slide-{{ $slider->id }}-layer-13"
												     data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
												     data-y="['top','top','top','top']" data-voffset="['0','0','0','0']"
												     data-width="full"
												     data-height="['20','20','30','30']"
												     data-whitespace="normal"

												     data-type="shape"
												     data-responsive_offset="on"

												     data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
												     data-margintop="[0,0,0,0]"
												     data-marginright="[0,0,0,0]"
												     data-marginbottom="[0,0,0,0]"
												     data-marginleft="[0,0,0,0]"
												     data-textAlign="['inherit','inherit','inherit','inherit']"
												     data-paddingtop="[0,0,0,0]"
												     data-paddingright="[0,0,0,0]"
												     data-paddingbottom="[0,0,0,0]"
												     data-paddingleft="[0,0,0,0]"

												     style="z-index: 9; display: block;background-color:rgba(0,0,0,0);"> </div>

												<!-- LAYER NR. 7 -->
												<div class="tp-caption rev-btn  tp-resizeme"
												     id="slide-{{ $slider->id }}-layer-7"
												     data-x="['left','left','center','center']" data-hoffset="['0','93','0','0']"
												     data-y="['top','bottom','bottom','bottom']" data-voffset="['0','100','140','130']"
												     data-width="none"
												     data-height="none"
												     data-whitespace="['normal','nowrap','nowrap','nowrap']"

												     data-type="button"
												     data-actions='[{"event":"click","action":"simplelink","target":"_self","url":"{{ $slider->boton_enlace }}","delay":""}]'
												     data-responsive_offset="on"

												     data-frames='[{"delay":"+990","speed":1500,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0deg;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:[-100%];y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":750,"frame":"999","to":"x:[-100%];opacity:1;","mask":"x:[100%];y:0;s:inherit;e:inherit;","ease":"Power4.easeInOut"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);bg:rgb(59,102,137);bc:rgba(0,0,0,1);bs:solid;bw:0 0 0 0;"}]'
												     data-margintop="[0,0,0,0]"
												     data-marginright="[0,0,0,0]"
												     data-marginbottom="[0,0,0,0]"
												     data-marginleft="[20,20,0,0]"
												     data-textAlign="['center','inherit','inherit','inherit']"
												     data-paddingtop="[5,5,5,5]"
												     data-paddingright="[70,90,70,60]"
												     data-paddingbottom="[5,5,5,5]"
												     data-paddingleft="[70,90,70,60]"

												     style="border-radius: 50px; z-index: 9; white-space: normal; font-size: 25px; line-height: 46px; font-weight: 400; color: #ffffff; display: inline-block;font-family:Open Sans;background-color:#66aae5;border-color:#66aae5;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">{{ $slider->boton }}</div>
											</div>
										</div>
									</div>
								</li>
							@endif
						@endforeach
					</ul>
					<div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
				</div>
			</div>
		</div>
	@endif

	{!! $row->html !!}
@stop

@section('contenido_footer')
	@if($sliders->count() > 1)
		<script type="text/javascript" src="/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="/js/jquery.themepunch.revolution.min.js"></script>
		<script type="text/javascript" src="/js/extensions/revolution.extension.actions.min.js"></script>
		<script type="text/javascript" src="/js/extensions/revolution.extension.carousel.min.js"></script>
		<script type="text/javascript" src="/js/extensions/revolution.extension.kenburn.min.js"></script>
		<script type="text/javascript" src="/js/extensions/revolution.extension.layeranimation.min.js"></script>
		<script type="text/javascript" src="/js/extensions/revolution.extension.migration.min.js"></script>
		<script type="text/javascript" src="/js/extensions/revolution.extension.navigation.min.js"></script>
		<script type="text/javascript" src="/js/extensions/revolution.extension.parallax.min.js"></script>
		<script type="text/javascript" src="/js/extensions/revolution.extension.slideanims.min.js"></script>
		<script type="text/javascript" src="/js/extensions/revolution.extension.video.min.js"></script>
		<script type="text/javascript">
            function setREVStartSize(e){
                try{ var i=jQuery(window).width(),t=9999,r=0,n=0,l=0,f=0,s=0,h=0;
                    if(e.responsiveLevels&&(jQuery.each(e.responsiveLevels,function(e,f){f>i&&(t=r=f,l=e),i>f&&f>r&&(r=f,n=e)}),t>r&&(l=n)),f=e.gridheight[l]||e.gridheight[0]||e.gridheight,s=e.gridwidth[l]||e.gridwidth[0]||e.gridwidth,h=i/s,h=h>1?1:h,f=Math.round(h*f),"fullscreen"==e.sliderLayout){var u=(e.c.width(),jQuery(window).height());if(void 0!=e.fullScreenOffsetContainer){var c=e.fullScreenOffsetContainer.split(",");if (c) jQuery.each(c,function(e,i){u=jQuery(i).length>0?u-jQuery(i).outerHeight(!0):u}),e.fullScreenOffset.split("%").length>1&&void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0?u-=jQuery(window).height()*parseInt(e.fullScreenOffset,0)/100:void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0&&(u-=parseInt(e.fullScreenOffset,0))}f=u}else void 0!=e.minHeight&&f<e.minHeight&&(f=e.minHeight);e.c.closest(".rev_slider_wrapper").css({height:f})
                }catch(d){console.log("Failure at Presize of Slider:"+d)}
            }
		</script>
		<script type="text/javascript">
            var revapi24,
                tpj=jQuery;
            tpj(document).ready(function() {
                if(tpj("#rev_slider_24_1").revolution == undefined){
                    revslider_showDoubleJqueryError("#rev_slider_24_1");
                }else{
                    revapi24 = tpj("#rev_slider_24_1").show().revolution({
                        sliderType:"standard",
                        sliderLayout:"fullscreen",
                        dottedOverlay:"none",
                        delay:9000,
                        navigation: {
                            keyboardNavigation:"off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation:"off",
                            mouseScrollReverse:"default",
                            onHoverStop:"on",
                            arrows: {
                                style:"bullet-bar",
                                enable:true,
                                hide_onmobile:false,
                                hide_onleave:true,
                                hide_delay:200,
                                hide_delay_mobile:1200,
                                tmp:'',
                                left: {
                                    h_align:"left",
                                    v_align:"center",
                                    h_offset:20,
                                    v_offset:0
                                },
                                right: {
                                    h_align:"right",
                                    v_align:"center",
                                    h_offset:20,
                                    v_offset:0
                                }
                            }
                        },
                        responsiveLevels:[1240,1024,778,480],
                        visibilityLevels:[1240,1024,778,480],
                        gridwidth:[1240,1024,778,480],
                        gridheight:[700,700,600,720],
                        lazyType:"none",
                        shadow:0,
                        spinner:"spinner3",
                        stopLoop:"off",
                        stopAfterLoops:-1,
                        stopAtSlide:-1,
                        shuffle:"off",
                        autoHeight:"off",
                        fullScreenAutoWidth:"off",
                        fullScreenAlignForce:"off",
                        fullScreenOffsetContainer: "",
                        fullScreenOffset: "60px",
                        disableProgressBar:"on",
                        hideThumbsOnMobile:"off",
                        hideSliderAtLimit:0,
                        hideCaptionAtLimit:0,
                        hideAllCaptionAtLilmit:0,
                        debugMode:false,
                        fallbacks: {
                            simplifyAll:"off",
                            nextSlideOnWindowFocus:"off",
                            disableFocusListener:false,
                        }
                    });
                }
            });
		</script>
	@endif
@stop