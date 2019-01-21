@extends('admin.layout.index')

@php
	switch ($url){
		case 'web': $titulo = 'General'; break;
		case 'script': $titulo = 'Editor'; break;
	}
@endphp

@section('contenido_titulo')
	{{ $titulo }}
@stop

@section('contenido_header')
@stop

@section('contenido_body')
	@include('admin.layout.partials.mensaje-alert')

	{!! Form::open(['route' => ['admin.configuracion.opcion.update', $url], 'method' => 'PUT', 'files' => 'true', 'class' => 'row']) !!}
	<div class="col-md-9">
		<!--begin::Portlet-->
		<div class="m-portlet m-portlet--tab">
			<!--begin::Form-->
			<div class="m-form m-form--fit m-form--label-align-right">
				<div class="m-portlet__body">
					{!! Form::hidden('tipo', $url) !!}

					@foreach($post as $item)
						@if($item->input <> 'imagen')
							<div class="form-group m-form__group">
								@if($item->input == 'text')
									{!! Form::label($item->etiqueta) !!}
									{!! Form::text('valor['.$item->nombre.']', $item->valor, ['class' => 'form-control']) !!}
								@endif

								@if($item->input == 'textarea')
									@php($rows = ($item->nombre == 'script') ? '20' : '4')
									{!! Form::label($item->etiqueta) !!}
									@if($item->nombre == 'descripcion' )
										{!! Form::textarea('valor['.$item->nombre.']', $item->valor, ['class' => 'form-control contador-caracteres', 'maxlength' => '200', 'rows' => '3',]) !!}
									@else
										{!! Form::textarea('valor['.$item->nombre.']', $item->valor, ['id' => 'contenido','class' => 'form-control', 'rows' => $rows]) !!}
									@endif
								@endif
							</div>
						@endif
					@endforeach

				</div>
			</div>
			<!--end::Form-->
		</div>
		<!--end::Portlet-->
	</div>

	<div class="col-md-3">
		<!--begin::Portlet-->
		<div class="m-portlet m-portlet--tab">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Opciones
						</h3>
					</div>
				</div>
			</div>
			<div class="m-form m-form--fit m-form--label-align-right">

				<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
					<div class="m-form__actions m-form__actions--solid m-form__actions--right">
						<button type="submit" name="publicar" class="btn btn-brand">Guardar</button>
					</div>
				</div>
			</div>
		</div>
		<!--end::Portlet-->

		<!--begin::Portlet-->
		@foreach($post as $item)
			@if($item->input == 'imagen')
				<div class="m-portlet m-portlet--tab">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text">
									{{ $item->etiqueta }}
								</h3>
							</div>
						</div>
					</div>
					<div class="m-form m-form--fit m-form--label-align-right">

						<div class="m-portlet__body">
							@if($item->imagen <> "")
								<div class="form-group m-form__group">
									<img src="{{ $item->imagen_admin }}" alt="Imagen">
								</div>
							@endif

							<div class="form-group m-form__group">
								<div class="m-dropzone m-dropzone--primary dropzone" id="m-dropzone-one"></div>
								{!! Form::hidden('valor['.$item->nombre.']', $item->valor) !!}
								{!! Form::hidden('imagen', $item->imagen, ['id' => 'upload_imagen']) !!}
								{!! Form::hidden('imagen_carpeta', $item->carpeta, ['id' => 'upload_imagen_carpeta']) !!}
							</div>
						</div>
					</div>
				</div>
			@endif
		@endforeach
		<!--end::Portlet-->
	</div>
	{!! Form::close() !!}
@stop

@section('contenido_footer')
@stop