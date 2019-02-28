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

	<style>{!! $row->css !!}</style>

	@if($sliders->count() > 1)
		<link rel="stylesheet" type="text/css" href="/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
		<link rel="stylesheet" type="text/css" href="/fonts/font-awesome/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="/css/settings.css">
		<style type="text/css">#rev_slider_93_1 .uranus.tparrows{width:50px; height:50px; background:rgba(255,255,255,0)}#rev_slider_93_1 .uranus.tparrows:before{width:50px; height:50px; line-height:50px; font-size:40px; transition:all 0.3s;-webkit-transition:all 0.3s}#rev_slider_93_1 .uranus.tparrows:hover:before{opacity:0.75}</style>
	@endif
@stop

@section('contenido_body')
	@if($sliders->count() > 1)
		<section class="main-slider2">
			<div id="rev_slider_93_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="bsgroup" data-source="gallery" style="background:transparent;padding:0px;">
				<!-- START REVOLUTION SLIDER 5.4.7.1 fullscreen mode -->
				<div id="rev_slider_93_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.7.1">
					<ul>
						@foreach($sliders as $slider)
						<li data-index="rs-{{ $slider->id }}" data-transition="parallaxhorizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="assets/100x50_31dd5-image-1.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Slide">
							<!-- MAIN IMAGE -->
							<img src="{{ $slider->imagen_contenido }}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
							<!-- LAYERS -->
							<div id="rrzm_{{ $slider->id }}" class="rev_row_zone rev_row_zone_middle" style="z-index: 5;">

								<!-- LAYER NR. 1 -->
								<div class="tp-caption  "
									 id="slide-{{ $slider->id }}-layer-1"
									 data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
									 data-y="['middle','middle','middle','middle']" data-voffset="['-426','-426','-426','-426']"
									 data-width="none"
									 data-height="none"
									 data-whitespace="nowrap"

									 data-type="row"
									 data-columnbreak="1"
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
										 id="slide-{{ $slider->id }}-layer-2"
										 data-x="['left','left','left','left']" data-hoffset="['0','100','0','0']"
										 data-y="['top','top','top','top']" data-voffset="['0','100','0','0']"
										 data-width="none"
										 data-height="none"
										 data-whitespace="nowrap"

										 data-type="column"
										 data-responsive_offset="on"
										 data-responsive="off"
										 data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
										 data-columnwidth="100%"
										 data-verticalalign="middle"
										 data-margintop="[0,0,0,0]"
										 data-marginright="[0,0,0,0]"
										 data-marginbottom="[0,0,0,0]"
										 data-marginleft="[0,0,0,0]"
										 data-textAlign="['center','center','center','center']"
										 data-paddingtop="[0,0,0,0]"
										 data-paddingright="[0,0,0,0]"
										 data-paddingbottom="[20,20,20,20]"
										 data-paddingleft="[0,0,0,0]"

										 style="z-index: 6; width: 100%;background-color:rgba(0,0,0,0.4);">
										<!-- LAYER NR. 3 -->
										<h2 class="tp-caption   tp-resizeme"
											id="slide-{{ $slider->id }}-layer-4"
											data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
											data-y="['top','top','top','top']" data-voffset="['0','0','0','0']"
											data-fontsize="['80','80','50','45']"
											data-lineheight="['100','100','70','60']"
											data-width="none"
											data-height="none"
											data-whitespace="normal"

											data-type="text"
											data-responsive_offset="on"

											data-frames='[{"delay":"+0","speed":1000,"frame":"0","from":"x:left;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":200,"frame":"999","to":"y:50px;opacity:0;","ease":"Power4.easeInOut"}]'
											data-margintop="[0,0,0,0]"
											data-marginright="[0,0,0,0]"
											data-marginbottom="[30,30,30,30]"
											data-marginleft="[0,0,0,0]"
											data-textAlign="['center','center','center','inherit']"
											data-paddingtop="[0,0,0,0]"
											data-paddingright="[20,20,0,20]"
											data-paddingbottom="[0,0,0,0]"
											data-paddingleft="[20,20,0,20]"

											style="z-index: 7; white-space: normal; font-size: 80px; line-height: 100px; font-weight: 700; color: #ffffff; letter-spacing: 0px; display: block;font-family:Montserrat;">{{ $slider->valor }}</h2>

										<!-- LAYER NR. 4 -->
										<a class="tp-caption rev-btn "
										   href="#servicios" target="_self"			 id="slide-{{ $slider->id }}-layer-6"
										   data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
										   data-y="['top','top','top','top']" data-voffset="['0','0','0','0']"
										   data-fontsize="['16','17','17','17']"
										   data-fontweight="['600','500','500','500']"
										   data-width="['210','210','210','166']"
										   data-height="['none','none','none','44']"
										   data-whitespace="normal"

										   data-type="button"
										   data-actions=''
										   data-responsive_offset="on"
										   data-responsive="off"
										   data-frames='[{"delay":"+990","speed":800,"frame":"0","from":"x:left;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":100,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"250","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(0,0,0);bg:rgba(255,255,255,1);bc:rgb(255,255,255);"}]'
										   data-margintop="[0,0,0,0]"
										   data-marginright="[10,10,10,10]"
										   data-marginbottom="[0,0,0,0]"
										   data-marginleft="[0,0,0,0]"
										   data-textAlign="['center','center','center','center']"
										   data-paddingtop="[12,12,12,12]"
										   data-paddingright="[50,50,50,0]"
										   data-paddingbottom="[12,12,12,12]"
										   data-paddingleft="[50,50,50,0]"

										   style="z-index: 8; white-space: normal; font-size: 16px; line-height: 17px; font-weight: 600; color: rgba(255,255,255,1); display: inline-block;font-family:Montserrat;text-transform:uppercase;background-color:rgb(12,60,96);border-color:rgb(12,60,96);border-style:solid;border-width:2px 2px 2px 2px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;text-decoration: none;">Servicios </a>

										<!-- LAYER NR. 5 -->
										<a class="tp-caption rev-btn "
										   href="#contacto" target="_self" rel="nofollow"			 id="slide-{{ $slider->id }}-layer-8"
										   data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
										   data-y="['top','top','top','top']" data-voffset="['0','0','0','0']"
										   data-width="['210','210','210','152']"
										   data-height="['none','none','none','44']"
										   data-whitespace="normal"

										   data-type="button"
										   data-actions=''
										   data-responsive_offset="on"
										   data-responsive="off"
										   data-frames='[{"delay":"+1260","speed":800,"frame":"0","from":"x:right;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":100,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"250","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);bg:rgb(12,60,96);bc:rgb(12,60,96);"}]'
										   data-margintop="[0,0,0,0]"
										   data-marginright="[0,0,0,0]"
										   data-marginbottom="[0,0,0,0]"
										   data-marginleft="[10,10,10,10]"
										   data-textAlign="['center','center','center','center']"
										   data-paddingtop="[12,12,12,12]"
										   data-paddingright="[50,50,50,0]"
										   data-paddingbottom="[12,12,12,12]"
										   data-paddingleft="[50,50,50,0]"

										   style="z-index: 9; min-width: 210px; max-width: 210px; white-space: normal; font-size: 17px; line-height: 17px; font-weight: 500; color: rgba(255,255,255,1); display: inline-block;font-family:Roboto;text-transform:uppercase;border-color:rgb(255,255,255);border-style:solid;border-width:2px 2px 2px 2px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;text-decoration: none;">Contáctanos </a>
									</div>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
					<div class="tp-bannertimer" style="height: 5px; background: rgba(0,0,0,0.15);"></div>
				</div>
			</div>
		</section>
	@endif

	{!! $row->html !!}

	<seccion-contacto></seccion-contacto>

	<seccion-blog></seccion-blog>
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
                try{ e.c=jQuery(e.c);var i=jQuery(window).width(),t=9999,r=0,n=0,l=0,f=0,s=0,h=0;
                    if(e.responsiveLevels&&(jQuery.each(e.responsiveLevels,function(e,f){f>i&&(t=r=f,l=e),i>f&&f>r&&(r=f,n=e)}),t>r&&(l=n)),f=e.gridheight[l]||e.gridheight[0]||e.gridheight,s=e.gridwidth[l]||e.gridwidth[0]||e.gridwidth,h=i/s,h=h>1?1:h,f=Math.round(h*f),"fullscreen"==e.sliderLayout){var u=(e.c.width(),jQuery(window).height());if(void 0!=e.fullScreenOffsetContainer){var c=e.fullScreenOffsetContainer.split(",");if (c) jQuery.each(c,function(e,i){u=jQuery(i).length>0?u-jQuery(i).outerHeight(!0):u}),e.fullScreenOffset.split("%").length>1&&void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0?u-=jQuery(window).height()*parseInt(e.fullScreenOffset,0)/100:void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0&&(u-=parseInt(e.fullScreenOffset,0))}f=u}else void 0!=e.minHeight&&f<e.minHeight&&(f=e.minHeight);e.c.closest(".rev_slider_wrapper").css({height:f})
                }catch(d){console.log("Failure at Presize of Slider:"+d)}
            };
        </script>
		<script type="text/javascript">
            var revapi93,
                tpj;
            (function() {
                if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded",onLoad)
                else
                    onLoad();

                function onLoad() {
                    if (tpj===undefined) {
                        tpj = jQuery;

                        if("off" == "on") tpj.noConflict();
                    }
                    if(tpj("#rev_slider_93_1").revolution == undefined){
                        revslider_showDoubleJqueryError("#rev_slider_93_1");
                    }else{
                        revapi93 = tpj("#rev_slider_93_1").show().revolution({
                            sliderType:"standard",
                            sliderLayout:"fullscreen",
                            dottedOverlay:"none",
                            delay:6000,
                            navigation: {
                                keyboardNavigation:"off",
                                keyboard_direction: "horizontal",
                                mouseScrollNavigation:"off",
                                mouseScrollReverse:"default",
                                onHoverStop:"off",
                                touch:{
                                    touchenabled:"on",
                                    touchOnDesktop:"off",
                                    swipe_threshold: 75,
                                    swipe_min_touches: 1,
                                    swipe_direction: "horizontal",
                                    drag_block_vertical: false
                                }
                                ,
                                arrows: {
                                    style:"uranus",
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
                            gridheight:[868,768,960,720],
                            lazyType:"none",
                            shadow:0,
                            spinner:"spinner0",
                            stopLoop:"off",
                            stopAfterLoops:-1,
                            stopAtSlide:-1,
                            shuffle:"off",
                            autoHeight:"off",
                            fullScreenAutoWidth:"off",
                            fullScreenAlignForce:"off",
                            fullScreenOffsetContainer: ".main-header",
                            fullScreenOffset: "",
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
                    };
                };
            }());
		</script>
	@endif
@stop