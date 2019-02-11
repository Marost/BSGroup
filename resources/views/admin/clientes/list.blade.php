@extends('admin.layout.index')

@section('contenido_titulo')
	Clientes
@stop

@section('contenido_header')
@stop

@section('contenido_body')
	@include('admin.layout.partials.mensaje-alert')

	<div id="portlet-contenido" class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Clientes
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="m-section">
				<div class="m-section__content">
					<!--begin::Preview-->
					{!! Form::open(['route' => ['admin.clientes.img.order'], 'method' => 'POST', 'id' => 'FormOrder']) !!}
						<div class="m-demo">
							<div class="m-demo__preview">
								<div class="m-list-pics m-list-pics--rounded">
									<ul id="listFotos" class="unstyled">
										@foreach($rows as $item)
										<li class="imagen" data-id="{{ $item->id }}" data-title="{{ $item->titulo }}"
										    data-url="/admin/clientes/delete/{{ $item->id }}">
											<input type="hidden" name="listFoto[]" value="{{ $item->id }}">
											<img src="{{ $item->imagen_galeria }}" title="">

											<div class="opciones">
												<a class="handle" title="Mover"><i class="fa fa-arrows" aria-hidden="true"></i></a>
												{{--<a href="#" class="" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></a>--}}
												<a href="#" class="opcion-eliminar" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
											</div>
										</li>
										@endforeach
									</ul>
								</div>
							</div>
						</div>
					{!! Form::close() !!}
					<!--end::Preview-->
				</div>
			</div>
		</div>
	</div>
@stop

@section('contenido_footer')
@stop