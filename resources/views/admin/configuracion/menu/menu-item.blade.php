<ol class="{{ $class }} menu-id">
	@foreach($items as $key => $value)
		<li class="dd-item dd3-item" data-id="{{ $value['id'] }}">
			<div class="dd-handle dd3-handle">Drag</div>
			<div class="dd3-content">
				<span id="label_show{{ $value['id'] }}">{{ $value['titulo'] }}</span>

				<div class="opciones">
					<a href="{{ route('admin.configuracion.menu.edit', $value['id']) }}" title="Editar opción"><i class="la la-edit"></i></a>
					<a href="#" class="del-button" data-id="{{ $value['id'] }}" data-titulo="{{ $value['titulo'] }}" title="Eliminar opción"><i class="la la-trash"></i></a>
				</div>
			</div>

			@if(array_key_exists('child', $value))
				@include('admin.configuracion.menu.menu-item', ['items' => $value['child'], 'class' => 'child'])
			@endif
		</li>
	@endforeach
</ol>