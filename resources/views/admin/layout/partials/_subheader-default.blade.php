<!-- BEGIN: Subheader -->
<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="m-subheader__title ">
				@yield('contenido_titulo')
			</h3>
		</div>
		<div>
			@if(Request::is('*blog/noticias*'))
				<a href="{{ route('admin.blog.noticias.index') }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-list"></i><span>Lista registros</span></span>
				</a>

				<a href="{{ route('admin.blog.noticias.create') }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-plus-circle"></i><span>Nuevo registro</span></span>
				</a>
			@endif

			@if(Request::is('*blog/noticias/imagenes*'))
				<a href="{{ route('admin.blog.noticias.img.list', $post->id) }}" class="btn btn-info m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-list"></i><span>Lista de imagenes</span></span>
				</a>

				<a href="{{ route('admin.blog.noticias.img.create', $post->id) }}" class="btn btn-info m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-plus-circle"></i><span>Nuevas imagenes</span></span>
				</a>
			@endif

			@if(Request::is('*blog/categorias*'))
				<a href="{{ route('admin.blog.categorias.index') }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-list"></i><span>Lista registros</span></span>
				</a>

				<a href="{{ route('admin.blog.categorias.create') }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-plus-circle"></i><span>Nuevo registro</span></span>
				</a>
			@endif

			@if(Request::is('*blog/tags*'))
				<a href="{{ route('admin.blog.tags.index') }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-list"></i><span>Lista registros</span></span>
				</a>

				<a href="{{ route('admin.blog.tags.create') }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-plus-circle"></i><span>Nuevo registro</span></span>
				</a>
			@endif

			@if(Request::is('*conf*items*'))
				<a href="{{ route('admin.configuracion.url.items.index', $url) }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-list"></i><span>Lista registros</span></span>
				</a>

				<a href="{{ route('admin.configuracion.url.items.create', $url) }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-plus-circle"></i><span>Nuevo registro</span></span>
				</a>

				<a href="{{ route('admin.configuracion.url.items.order.get', $url) }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-reorder"></i><span>Ordenar</span></span>
				</a>
			@endif

			@if(Request::is('*conf*menu*'))
				<a href="{{ route('admin.configuracion.menu.index') }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-list"></i><span>Lista de menú</span></span>
				</a>
			@endif

			@if(Request::is('*usuarios*'))
				<a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-list"></i><span>Lista registros</span></span>
				</a>

				<a href="{{ route('admin.usuarios.create') }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-plus-circle"></i><span>Nuevo registro</span></span>
				</a>
			@endif

			@if(Request::is('*paginas*'))
				<a href="{{ route('admin.paginas.index') }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-list"></i><span>Lista de páginas</span></span>
				</a>

				<a href="{{ route('admin.paginas.create') }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-plus-circle"></i><span>Nueva Página</span></span>
				</a>
			@endif

			@if(Request::is('*paginas/imagenes*'))
				<a href="{{ route('admin.paginas.img.list', $post->id) }}" class="btn btn-info m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-list"></i><span>Lista de imagenes</span></span>
				</a>

				<a href="{{ route('admin.paginas.img.create', $post->id) }}" class="btn btn-info m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-plus-circle"></i><span>Nuevas imagenes</span></span>
				</a>
			@endif

			@if(Request::is('*paginas*items*'))
				<a href="{{ route('admin.paginas.items.index', $pagina) }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-list"></i><span>Lista de items de página</span></span>
				</a>

				<a href="{{ route('admin.paginas.items.create', $pagina) }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-plus-circle"></i><span>Nuevo item de página</span></span>
				</a>

				<a href="{{ route('admin.paginas.items.order.get', $pagina) }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-reorder"></i><span>Ordenar</span></span>
				</a>
			@endif

			@if(Request::is('*servicios*'))
				<a href="{{ route('admin.servicios.index') }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-list"></i><span>Listar registros</span></span>
				</a>

				<a href="{{ route('admin.servicios.create') }}" class="btn btn-outline-brand m-btn m-btn--icon m-btn--outline-2x">
					<span><i class="la la-plus-circle"></i><span>Nuevo registro</span></span>
				</a>
			@endif
		</div>
	</div>
</div>
<!-- END: Subheader -->