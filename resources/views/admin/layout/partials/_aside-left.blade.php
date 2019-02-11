<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
	<i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left m-aside-left--skin-dark">
	<!-- BEGIN: Aside Menu -->
	<div id="m_ver_menu" class="m-aside-menu m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark" data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500">
		<ul class="m-menu__nav m-menu__nav--dropdown-submenu-arrow">

			{{-- ESCRITORIO --}}
			<li class="m-menu__item {!! Request::is('admin') ? 'm-menu__item--active' : '' !!}" aria-haspopup="true">
				<a href="{{ route('admin.home') }}" class="m-menu__link">
					<i class="m-menu__link-icon flaticon-line-graph"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Escritorio</span>
						</span>
					</span>
				</a>
			</li>
			{{-- FIN ESCRITORIO --}}

			{{-- PAGINAS --}}
			<li class="m-menu__item {!! Request::is('*paginas*') ? 'm-menu__item--active' : '' !!}" aria-haspopup="true">
				<a href="{{ route('admin.paginas.index') }}" class="m-menu__link">
					<i class="m-menu__link-icon flaticon-layers"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Páginas</span>
						</span>
					</span>
				</a>
			</li>
			{{-- FIN PAGINAS --}}

			{{-- SERVICIOS --}}
			<li class="m-menu__item {!! Request::is('*servicios*') ? 'm-menu__item--active' : '' !!}" aria-haspopup="true">
				<a href="{{ route('admin.servicios.index') }}" class="m-menu__link">
					<i class="m-menu__link-icon flaticon-layers"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Servicios</span>
						</span>
					</span>
				</a>
			</li>
			{{-- FIN SERVICIOS --}}

			{{-- CLIENTES --}}
			<li class="m-menu__item {!! Request::is('*clientes*') ? 'm-menu__item--active' : '' !!}" aria-haspopup="true">
				<a href="{{ route('admin.clientes.img.list') }}" class="m-menu__link">
					<i class="m-menu__link-icon flaticon-tea-cup"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Clientes</span>
						</span>
					</span>
				</a>
			</li>
			{{-- FIN CLIENTES --}}

			{{-- BLOG --}}
			<li class="m-menu__item m-menu__item--submenu {!! Request::is('*blog*') ? 'm-menu__item--open m-menu__item--expanded' : '' !!}" aria-haspopup="true" data-menu-submenu-toggle="hover">
				<a href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-tabs"></i>
					<span class="m-menu__link-text">Blog</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item {!! Request::is('*noticias*') ? 'm-menu__item--active' : '' !!}" aria-haspopup="true">
							<a href="{{ route('admin.blog.noticias.index') }}" class="m-menu__link">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
								<span class="m-menu__link-text">Todas las entradas</span>
							</a>
						</li>

						<li class="m-menu__item {!! Request::is('*noticias/create') ? 'm-menu__item--active' : '' !!}" aria-haspopup="true">
							<a href="{{ route('admin.blog.noticias.create') }}" class="m-menu__link">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
								<span class="m-menu__link-text">Nueva entrada</span>
							</a>
						</li>

						<li class="m-menu__item {!! Request::is('*categorias*') ? 'm-menu__item--active' : '' !!}" aria-haspopup="true">
							<a href="{{ route('admin.blog.categorias.index') }}" class="m-menu__link">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
								<span class="m-menu__link-text">Categorías</span>
							</a>
						</li>

						<li class="m-menu__item {!! Request::is('*tags*') ? 'm-menu__item--active' : '' !!}" aria-haspopup="true">
							<a href="{{ route('admin.blog.tags.index') }}" class="m-menu__link">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
								<span class="m-menu__link-text">Etiquetas</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			{{-- FIN BLOG --}}

			{{-- FORMULARIO --}}
			<li class="m-menu__item m-menu__item--submenu {!! Request::is('*form*') ? 'm-menu__item--open m-menu__item--expanded' : '' !!}" aria-haspopup="true" data-menu-submenu-toggle="hover">
				<a href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-chat"></i>
					<span class="m-menu__link-text">Formularios</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item  m-menu__item--submenu {!! Request::is('*form*contacto*') ? 'm-menu__item--open m-menu__item--expanded' : '' !!}" aria-haspopup="true"  data-menu-submenu-toggle="hover">
							<a  href="#" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
								<span class="m-menu__link-text">Contacto</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item {!! Request::is('*form*mensaje*contacto*') ? 'm-menu__item--active' : '' !!}" aria-haspopup="true">
										<a  href="{{ route('admin.formularios.mensajes.index', 'contacto') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
											<span class="m-menu__link-text">Mensajes</span>
										</a>
									</li>

									<li class="m-menu__item {!! Request::is('*form*opcion*contacto*') ? 'm-menu__item--active' : '' !!}" aria-haspopup="true">
										<a  href="{{ route('admin.formularios.opcion.edit', 'contacto') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
											<span class="m-menu__link-text">Configuración</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</li>
			{{-- FIN FORMULARIO --}}

			{{-- CONFIGURACION --}}
			<li class="m-menu__item m-menu__item--submenu {!! Request::is('*conf*') ? 'm-menu__item--open m-menu__item--expanded' : '' !!}" aria-haspopup="true" data-menu-submenu-toggle="hover">
				<a href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-cogwheel"></i>
					<span class="m-menu__link-text">Configuración</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item {!! Request::is('*web*') ? 'm-menu__item--active' : '' !!}" aria-haspopup="true">
							<a href="{{ route('admin.configuracion.opcion.edit', 'web') }}" class="m-menu__link">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
								<span class="m-menu__link-text">Generales</span>
							</a>
						</li>

						<li class="m-menu__item {!! Request::is('*redes*') ? 'm-menu__item--active' : '' !!}" aria-haspopup="true">
							<a href="{{ route('admin.configuracion.url.items.index', 'redes-sociales') }}" class="m-menu__link">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
								<span class="m-menu__link-text">Redes sociales</span>
							</a>
						</li>

						<li class="m-menu__item {!! Request::is('*script*') ? 'm-menu__item--active' : '' !!}" aria-haspopup="true">
							<a href="{{ route('admin.configuracion.opcion.edit', 'script') }}" class="m-menu__link">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
								<span class="m-menu__link-text">Editor</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			{{-- FIN CONFIGURACION --}}

			<li class="m-menu__item m-menu__item--submenu {!! Request::is('*usuario*') ? 'm-menu__item--open m-menu__item--expanded' : '' !!}" aria-haspopup="true" data-menu-submenu-toggle="hover">
				<a href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-users"></i>
					<span class="m-menu__link-text">Usuarios</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item {!! Request::is('*usuarios*') ? 'm-menu__item--active' : '' !!}" aria-haspopup="true">
							<a href="{{ route('admin.usuarios.index') }}" class="m-menu__link">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
								<span class="m-menu__link-text">Todos los usuarios</span>
							</a>
						</li>

						<li class="m-menu__item {!! Request::is('*usuarios/create*') ? 'm-menu__item--active' : '' !!}" aria-haspopup="true">
							<a href="{{ route('admin.usuarios.create') }}" class="m-menu__link">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
								<span class="m-menu__link-text">Nuevo usuario</span>
							</a>
						</li>

						<li class="m-menu__item {!! Request::is('*usuario*perfil*') ? 'm-menu__item--active' : '' !!}" aria-haspopup="true">
							<a href="{{ route('admin.usuario.perfil') }}" class="m-menu__link">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
								<span class="m-menu__link-text">Mi Perfil</span>
							</a>
						</li>
					</ul>
				</div>
			</li>

			<li class="m-menu__item" aria-haspopup="true">
				<a href="{{ url('/logout') }}" class="m-menu__link"
				   onclick="event.preventDefault(); document.getElementById('logout-form-sideleft').submit();">
					<i class="m-menu__link-icon flaticon-cancel"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Cerrar sesión</span>
						</span>
					</span>
				</a>
				<form id="logout-form-sideleft" action="{{ url('/logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
			</li>
		</ul>
	</div>
	<!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->