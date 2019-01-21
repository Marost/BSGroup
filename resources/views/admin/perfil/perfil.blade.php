@extends('admin.layout.index')

@section('contenido_titulo')
	Mi Perfil
@stop

@section('contenido_body')
	<div class="row">
		<div class="col-xl-3 col-lg-4">
			<div class="m-portlet m-portlet--full-height  ">
				<div class="m-portlet__body">
					<div class="m-card-profile">
						<div class="m-card-profile__title m--hide">
							Your Profile
						</div>
						<div class="m-card-profile__pic">
							<div class="m-card-profile__pic-wrapper">
								<img src="{{ $row->foto }}" alt=""/>
							</div>
						</div>
						<div class="m-card-profile__details">
							<span class="m-card-profile__name">
								{{ $row->nombre_completo }}
							</span>
							<a href="" class="m-card-profile__email m-link">
								{{ $row->email }}
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-9 col-lg-8">
			<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
				<div class="m-portlet__head">
					<div class="m-portlet__head-tools">
						<ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--left m-tabs-line--primary" role="tablist">
							<li class="nav-item m-tabs__item">
								<a class="nav-link m-tabs__link active" data-toggle="tab" href="#tab_datos" role="tab">
									<i class="flaticon-share"></i>
									Actualizar datos
								</a>
							</li>
							<li class="nav-item m-tabs__item">
								<a class="nav-link m-tabs__link" data-toggle="tab" href="#tab_foto" role="tab">
									<i class="flaticon-profile"></i>
									Cambiar foto
								</a>
							</li>
							<li class="nav-item m-tabs__item">
								<a class="nav-link m-tabs__link" data-toggle="tab" href="#tab_password" role="tab">
									<i class="flaticon-lock"></i>
									Cambiar contraseña
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="tab-content">
					<div class="tab-pane active" id="tab_datos">
						<form id="form_datos" class="m-form m-form--state m-form--fit m-form--label-align-right">
							{{ csrf_field() }}
							<div class="m-portlet__body">
								<div class="form-group m-form__group row" :class="{'has-danger': errors.nombres}">
									<label for="example-text-input" class="col-2 col-form-label">Nombres</label>
									<div class="col-7">
										<input class="form-control m-input" :class="{'form-control-danger': errors.nombres}" type="text" v-model="datos.nombres">
										<div v-if="errors.nombres" class="form-control-feedback m--font-bolder">
											@{{ errors.nombres[0] }}
										</div>
									</div>
								</div>
								<div class="form-group m-form__group row" :class="{'has-danger': errors.apellidos}">
									<label for="example-text-input" class="col-2 col-form-label">Apellidos</label>
									<div class="col-7">
										<input class="form-control m-input" :class="{'form-control-danger': errors.apellidos}" type="text" v-model="datos.apellidos">
										<div v-if="errors.apellidos" class="form-control-feedback m--font-bolder">
											@{{ errors.apellidos[0] }}
										</div>
									</div>
								</div>
								<div class="form-group m-form__group row" :class="{'has-danger': errors.email}">
									<label for="example-text-input" class="col-2 col-form-label">Email</label>
									<div class="col-7">
										<input class="form-control m-input" :class="{'form-control-danger': errors.email}" type="email" v-model="datos.email">
										<div v-if="errors.email" class="form-control-feedback m--font-bolder">
											@{{ errors.email[0] }}
										</div>
									</div>
								</div>
							</div>
							<div class="m-portlet__foot m-portlet__foot--fit">
								<div class="m-form__actions">
									<div class="row">
										<div class="col-2"></div>
										<div class="col-7">
											<a @@click.prevent="guardar" href="#" class="btn btn-accent m-btn m-btn--custom">
												Guardar cambios
											</a>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="tab_foto">
						<form id="form_foto" class="m-form m-form--state m-form--fit m-form--label-align-right">
							{{ csrf_field() }}
							<div class="m-portlet__body">
								<div class="form-group m-form__group" :class="{'has-danger': errors.imagen}">
									{!! Form::label('Dimensiones recomendadas: 300x300') !!}
									<div class="m-dropzone m-dropzone--brand dropzone" id="m-dropzone-one"></div>
									<div v-if="errors.imagen" class="form-control-feedback m--font-bolder">
										Seleccione una imagen
									</div>
									<input type="hidden" name="imagen" id="upload_imagen" v-model="datos.imagen">
									<input type="hidden" name="imagen_carpeta" id="upload_imagen_carpeta" v-model="datos.imagen_carpeta">
								</div>
							</div>
							<div class="m-portlet__foot m-portlet__foot--fit">
								<div class="m-form__actions">
									<div class="row">
										<div class="col-2"></div>
										<div class="col-7">
											<a @@click.prevent="guardar" href="#" class="btn btn-accent m-btn m-btn--custom">
												Guardar cambios
											</a>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="tab_password">
						<form id="form_password" class="m-form m-form--state m-form--fit m-form--label-align-right">
							{{ csrf_field() }}
							<div class="m-portlet__body">
								<div class="form-group m-form__group row">
									<label for="example-text-input" class="col-3 col-form-label">Contraseña</label>
									<div class="col-5">
										<div class="m-input-icon m-input-icon--left">
											<input type="password" class="form-control m-input" v-model="datos.password">
											<span class="m-input-icon__icon m-input-icon__icon--left">
												<span><i class="la la-unlock"></i></span>
											</span>
										</div>
										<div v-if="errors.password" class="form-control-feedback m--font-bolder">
											@{{ errors.password[0] }}
										</div>
									</div>
								</div>

								<div class="form-group m-form__group row">
									<label for="example-text-input" class="col-3 col-form-label">Repetir contraseña</label>
									<div class="col-5">
										<div class="m-input-icon m-input-icon--left">
											<input type="password" class="form-control m-input" v-model="datos.password_confirmation">
											<span class="m-input-icon__icon m-input-icon__icon--left">
												<span><i class="la la-unlock"></i></span>
											</span>
										</div>
										<div v-if="errors.password_confirmation" class="form-control-feedback m--font-bolder">
											@{{ errors.password_confirmation[0] }}
										</div>
									</div>
								</div>
							</div>
							<div class="m-portlet__foot m-portlet__foot--fit">
								<div class="m-form__actions">
									<div class="row">
										<div class="col-2"></div>
										<div class="col-7">
											<a @@click.prevent="guardar" href="#" class="btn btn-accent m-btn m-btn--custom">
												Guardar cambios
											</a>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('contenido_footer')
	{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js') !!}
	{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.min.js') !!}
	<script>
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

		if($("#tab_datos").length)
        {
	        var usuarioDatos = new Vue({
		        el: "#tab_datos",
		        data: {
			        errors: [],
			        datos: {
		                nombres: '',
				        apellidos: '',
				        email: ''
			        }
		        },
		        mounted: function() {
			        this.cargar();
		        },
		        methods: {
		            cargar() {
                        axios.get('/admin/usuario/perfil/datos')
                            .then(response => {
                                this.datos = response.data;
                            }).catch(error => {
	                            this.errors = error.response.data;
			            });
		            },
		            guardar() {
                        this.errors = [];
                        mApp.block('#tab_datos', {
                            overlayColor: '#000000',
                            type: 'loader',
                            state: 'brand',
                            message: 'Procesando...',
                            opacity: 0.1
                        });

                        axios.put('/admin/usuario/perfil/datos', this.datos)
                            .then(response => {
                                swal({
                                    type: 'success',
                                    title: 'El registro se actualizó con éxito',
	                                text: 'Recarga la página para ver los cambios',
                                    timer: 3000
                                });
                                mApp.unblock('#tab_datos');
                            }).catch(error => {
	                            this.errors = error.response.data.errors;
                                mApp.unblock('#tab_datos');
                        });
		            }
		        }
	        });
        }

        if($("#tab_foto").length)
        {
            var usuarioFoto = new Vue({
                el: "#tab_foto",
                data: {
                    errors: [],
                    datos: {
                        imagen: '',
                        imagen_carpeta: ''
                    }
                },
                methods: {
                    guardar() {
                        this.errors = [];
                        mApp.block('#tab_foto', {
                            overlayColor: '#000000',
                            type: 'loader',
                            state: 'brand',
                            message: 'Procesando...',
                            opacity: 0.1
                        });

                        axios.put('/admin/usuario/perfil/foto', this.datos)
                            .then(response => {
                                swal({
                                    type: 'success',
                                    title: 'El registro se actualizó con éxito',
                                    text: 'Recarga la página para ver los cambios',
                                    timer: 3000
                                });
                                mApp.unblock('#tab_foto');
                            }).catch(error => {
	                            this.errors = error.response.data.errors;
	                            mApp.unblock('#tab_foto');
                        });
                    }
                }
            });
        }

        if($("#tab_password").length)
        {
            var usuarioPass = new Vue({
	            el: "#tab_password",
	            data: {
	                errors: [],
		            datos: {
	                    password: '',
			            password_confirmation: ''
		            }
	            },
	            methods: {
                    guardar() {
                        this.errors = [];
                        mApp.block('#tab_password', {
                            overlayColor: '#000000',
                            type: 'loader',
                            state: 'brand',
                            message: 'Procesando...',
                            opacity: 0.1
                        });

                        axios.put('/admin/usuario/perfil/password', this.datos)
                            .then(response => {
                                swal({
                                    type: 'success',
                                    title: 'El registro se actualizó con éxito',
                                    timer: 3000
                                });
                                mApp.unblock('#tab_password');
                                this.datos = {password: '', password_confirmation: ''};
                            }).catch(error => {
                            this.errors = error.response.data.errors;
                            mApp.unblock('#tab_password');
                        });
                    }
	            }
            });
        }
	</script>
@stop