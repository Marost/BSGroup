@extends('admin.layout.index')

@section('contenido_titulo')
	Escritorio
@stop

@section('contenido_body')
	<div class="row">
		<div class="col-md-12">
			<!--begin:: Widgets/Support Tickets -->
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Acceso rápido
							</h3>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<div class="m-demo">
						<div class="m-demo__preview m-demo__preview--btn">
							<a href="/" target="_blank" class="btn btn-outline-primary btn-lg m-btn m-btn--icon m-btn--outline-2x">
						<span>
							<i class="flaticon-browser"></i>
							<span>Visitar mi web</span>
						</span>
							</a>
							<a href="{{ route('admin.usuario.perfil') }}" class="btn btn-outline-primary btn-lg m-btn m-btn--icon m-btn--outline-2x">
						<span>
							<i class="flaticon-user-settings"></i>
							<span>Mi Perfil</span>
						</span>
							</a>
							<a href="{{ route('admin.configuracion.opcion.edit', 'web') }}" class="btn btn-outline-primary btn-lg m-btn m-btn--icon m-btn--outline-2x">
						<span>
							<i class="flaticon-settings-1"></i>
							<span>Configuraciones Generales</span>
						</span>
							</a>
							<a href="{{ route('admin.blog.noticias.index') }}" class="btn btn-outline-primary btn-lg m-btn m-btn--icon m-btn--outline-2x">
						<span>
							<i class="flaticon-list-3"></i>
							<span>Blog - Ver todas las entradas</span>
						</span>
							</a>
							<a href="{{ route('admin.blog.noticias.create') }}" class="btn btn-outline-primary btn-lg m-btn m-btn--icon m-btn--outline-2x">
						<span>
							<i class="flaticon-add"></i>
							<span>Blog - Crear nueva entrada</span>
						</span>
							</a>
							<a href="{{ route('admin.formularios.mensajes.index', 'contacto') }}" class="btn btn-outline-primary btn-lg m-btn m-btn--icon m-btn--outline-2x">
						<span>
							<i class="flaticon-chat-1"></i>
							<span>Contacto - Revisar todos los mensajes</span>
						</span>
							</a>
							<a href="{{ route('admin.configuracion.url.items.index', 'redes-sociales') }}" class="btn btn-outline-primary btn-lg m-btn m-btn--icon m-btn--outline-2x">
						<span>
							<i class="flaticon-share"></i>
							<span>Redes Sociales - Configurar</span>
						</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!--end:: Widgets/Support Tickets -->
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<!--begin:: Widgets/Support Tickets -->
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Últimos mensajes de contacto
							</h3>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<div class="m-widget3">
						@foreach($mensajes as $item)
							<div class="m-widget3__item">
								<div class="m-widget3__header">
									<div class="m-widget3__user-img">
										<i class="flaticon-profile-1"></i>
									</div>
									<div class="m-widget3__info">
										<span class="m-widget3__username">{{ $item->nombres }}</span><br>
										<span class="m-widget3__time">{{ fechaHumano($item->created_at) }}</span>
									</div>
									<span class="m-widget3__status m--font-info">
									<a href="{{ route('admin.formularios.mensajes.show', ['contacto', $item->id]) }}" class="btn btn-outline-brand btn-sm">Ver mensaje completo</a>
								</span>
								</div>
								<div class="m-widget3__body">
									<p class="m-widget3__text">{{ getSubString($item->mensaje, 190) }}</p>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<!--end:: Widgets/Support Tickets -->
		</div>

		<div class="col-md-6">
			<!--begin::Portlet-->
			<div id="portlet-contenido" class="m-portlet m-portlet--tab">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Borrador rápido para entrada de Blog
							</h3>
						</div>
					</div>
				</div>
				<!--begin::Form-->
				{!! Form::open(['method' => 'post', 'class' => 'm-form m-form--fit m-form--label-align-right', 'id'=> 'blog_home_form']) !!}
					<div class="m-portlet__body">
						<div class="form-group m-form__group">
							<label>Titulo *</label>
							<input name="titulo" type="text" class="form-control m-input" placeholder="Ingresa el titulo" required>
						</div>
						<div class="form-group m-form__group">
							<label>Contenido</label>
							<textarea name="contenido" class="form-control m-input" rows="5"></textarea>
						</div>
					</div>
					<div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m-form__actions">
							<a href="#" id="blog_home" class="btn btn-primary">Solo guardar</a>
						</div>
					</div>
				{!! Form::close() !!}
				<!--end::Form-->
			</div>
			<!--end::Portlet-->
		</div>
	</div>
@stop