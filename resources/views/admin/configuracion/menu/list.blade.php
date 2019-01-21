@extends('admin.layout.index')

@section('contenido_titulo')
	Menú
@stop

@section('contenido_body')
	@include('admin.layout.partials.mensaje-alert')

	<div class="row">
		<div class="col-md-4">
			<div class="m-portlet m-portlet--mobile">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Agregar opciones
							</h3>
						</div>
					</div>
				</div>
				<div id="menu-lista" class="m-portlet__body">
					<!--begin::Section-->
					<div class="m-accordion m-accordion--bordered m-accordion--solid" id="menu-lista-tab" role="tablist">
						{{-- ENLACES PERSONALIZADOS --}}
						<div class="m-accordion__item">
							<div class="m-accordion__item-head collapsed"  role="tab" id="m_head_enlaces" data-toggle="collapse" href="#m_body_enlaces" aria-expanded="false">
								<span class="m-accordion__item-title">Enlaces personalizados</span>
								<span class="m-accordion__item-mode"><i class="la la-plus"></i></span>
							</div>
							<div class="m-accordion__item-body collapse" id="m_body_enlaces" role="tabpanel" aria-labelledby="m_head_enlaces" data-parent="#menu-lista-tab">
								<div class="m-form m-form--fit m-form--label-align-right pt-3">
									<form id="enlace">
										<div class="form-group m-form__group">
											<label>Titulo</label>
											<input type="text" name="titulo" class="form-control">
										</div>
										<div class="form-group m-form__group">
											<label>URL</label>
											<input type="text" name="url" class="form-control">
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--right">
												<input type="hidden" name="tipo" value="enlace">
												<a href="#" class="submit btn btn-brand" data-tipo="enlace">Añadir al menú</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						{{-- FIN ENLACES PERSONALIZADOS --}}

						{{-- PAGINAS --}}
						<div class="m-accordion__item">
							<div class="m-accordion__item-head collapsed" role="tab" id="m_head_paginas" data-toggle="collapse" href="#m_body_paginas" aria-expanded="false">
								<span class="m-accordion__item-title">Páginas</span>
								<span class="m-accordion__item-mode"><i class="la la-plus"></i></span>
							</div>
							<div class="m-accordion__item-body collapse" id="m_body_paginas" role="tabpanel" aria-labelledby="m_head_paginas" data-parent="#menu-lista-tab">
								<div class="m-form m-form--fit m-form--label-align-right pt-3">
									<form id="pagina">
										<div class="m-form__group form-group">
											<div class="m-checkbox-list">
												@foreach($paginas as $item)
													<label class="m-checkbox m-checkbox--bold m-checkbox--state-brand">
														<input type="checkbox" name="item[]" value="{{ $item->id }}" class="pagina">{{ $item->titulo }}<span></span>
													</label>
												@endforeach
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--right">
												<input type="hidden" name="tipo" value="pagina">
												<a href="#" class="submit btn btn-brand" data-tipo="pagina">Añadir al menú</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						{{-- FIN PAGINAS --}}

						{{-- BLOG ENTRADAS --}}
						<div class="m-accordion__item">
							<div class="m-accordion__item-head collapsed" role="tab" id="m_head_blog_entradas" data-toggle="collapse" href="#m_body_blog_entradas" aria-expanded="false">
								<span class="m-accordion__item-title">Blog - Entradas</span>
								<span class="m-accordion__item-mode"><i class="la la-plus"></i></span>
							</div>
							<div class="m-accordion__item-body collapse" id="m_body_blog_entradas" role="tabpanel" aria-labelledby="m_head_blog_entradas" data-parent="#menu-lista-tab">
								<div class="m-form m-form--fit m-form--label-align-right pt-3">
									<form id="blog_noticia">
										<div class="m-form__group form-group">
											<div class="m-checkbox-list">
												@foreach($entradas as $item)
													<label class="m-checkbox m-checkbox--bold m-checkbox--state-brand">
														<input type="checkbox" name="item[]" value="{{ $item->id }}" class="blog_noticia">{{ $item->titulo }}<span></span>
													</label>
												@endforeach
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--right">
												<input type="hidden" name="tipo" value="blog_noticia">
												<a href="#" class="submit btn btn-brand" data-tipo="blog_noticia">Añadir al menú</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						{{-- FIN BLOG ENTRADAS --}}

						{{-- BLOG CATEGORIAS --}}
						<div class="m-accordion__item">
							<div class="m-accordion__item-head collapsed" role="tab" id="m_head_blog_categorias" data-toggle="collapse" href="#m_body_blog_categorias" aria-expanded="false">
								<span class="m-accordion__item-title">Blog - Categorías</span>
								<span class="m-accordion__item-mode"><i class="la la-plus"></i></span>
							</div>
							<div class="m-accordion__item-body collapse" id="m_body_blog_categorias" role="tabpanel" aria-labelledby="m_head_blog_categorias" data-parent="#menu-lista-tab">
								<div class="m-form m-form--fit m-form--label-align-right pt-3">
									<form id="blog_categoria">
										<div class="m-form__group form-group">
											<div class="m-checkbox-list">
												@foreach($categorias as $item)
													<label class="m-checkbox m-checkbox--bold m-checkbox--state-brand">
														<input type="checkbox" name="item[]" value="{{ $item->id }}">{{ $item->titulo }}<span></span>
													</label>
												@endforeach
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--right">
												<input type="hidden" name="tipo" value="blog_categoria">
												<a href="#" class="submit btn btn-brand" data-tipo="blog_categoria">Añadir al menú</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						{{-- FIN BLOG CATEGORIAS --}}

						{{-- BLOG TAGS --}}
						<div class="m-accordion__item">
							<div class="m-accordion__item-head collapsed" role="tab" id="m_head_blog_tags" data-toggle="collapse" href="#m_body_blog_tags" aria-expanded="false">
								<span class="m-accordion__item-title">Blog - Etiquetas</span>
								<span class="m-accordion__item-mode"><i class="la la-plus"></i></span>
							</div>
							<div class="m-accordion__item-body collapse" id="m_body_blog_tags" role="tabpanel" aria-labelledby="m_head_blog_tags" data-parent="#menu-lista-tab">
								<div class="m-form m-form--fit m-form--label-align-right pt-3">
									<form id="blog_tag">
										<div class="m-form__group form-group">
											<div class="m-checkbox-list">
												@foreach($tags as $item)
													<label class="m-checkbox m-checkbox--bold m-checkbox--state-brand">
														<input type="checkbox" name="item[]" value="{{ $item->id }}">{{ $item->titulo }}<span></span>
													</label>
												@endforeach
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--right">
												<input type="hidden" name="tipo" value="blog_tag">
												<a href="#" class="submit btn btn-brand" data-tipo="blog_tag">Añadir al menú</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						{{-- FIN BLOG TAGS --}}
					</div>
					<!--end::Section-->
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div id="portlet-contenido" class="m-portlet m-portlet--mobile">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Menú principal
							</h3>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<div id="menu-sort" class="cf nestable-lists">
						<div id="nestable" class="dd">

							@php
								$ref = [];
								$items = [];
							@endphp

							@foreach($proser as $data)
								@php
									$thisRef = &$ref[$data->id];
									$thisRef['parent'] = $data->parent;
									$thisRef['titulo'] = $data->titulo;
									$thisRef['id'] = $data->id;

									if($data->parent == 0) {
										$items[$data->id] = &$thisRef;
									} else {
										$ref[$data->parent]['child'][$data->id] = &$thisRef;
									}
								@endphp
							@endforeach

							@include('admin.configuracion.menu.menu-item', ['items' => $items, 'class' => 'dd-list'])

							<input type="hidden" id="nestable-output">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('contenido_footer')
	{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/Nestable/2012-10-15/jquery.nestable.min.js') !!}
@stop