<div class="row">
	<div class="col-md-12">
		@if(session('estado'))
			<div class="m-alert m-alert--icon alert alert-success" role="alert">
				<div class="m-alert__icon">
					<i class="flaticon-interface-5"></i>
				</div>
				<div class="m-alert__text">
					@if(session('estado') == 'create')
						<strong>El registro se agregó satisfactoriamente.</strong>
					@endif

					@if(session('estado') == 'edit')
							<strong>El registro se actualizó satisfactoriamente.</strong>
					@endif
				</div>
				<div class="m-alert__actions" style="width: 220px;">
					<button type="button" class="btn btn-outline-light btn-sm m-btn m-btn--hover-brand" data-dismiss="alert" aria-label="Close">
						Cerrar
					</button>
				</div>
			</div>
		@endif

		@if (count($errors) > 0)
			<div class="m-alert m-alert--icon alert alert-danger" role="alert">
				<div class="m-alert__icon">
					<i class="flaticon-danger"></i>
				</div>
				<div class="m-alert__text">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				<div class="m-alert__actions" style="width: 220px;">
					<button type="button" class="btn btn-outline-light btn-sm m-btn m-btn--hover-brand" data-dismiss="alert" aria-label="Close">
						Cerrar
					</button>
				</div>
			</div>
		@endif
	</div>
</div>