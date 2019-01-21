@if ($item['submenu'] == [])
	<li>
		<a href="{{ url($item['url_enlace']) }}">{{ $item['titulo'] }} </a>
	</li>
@else
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $item['titulo'] }} <span class="caret"></span></a>
		<ul class="dropdown-menu sub-menu">
			@foreach ($item['submenu'] as $submenu)
				@if ($submenu['submenu'] == [])
					<li><a href="{{ url('menu',['id' => $submenu['id'], 'url' => $submenu['url']]) }}">{{ $submenu['titulo'] }} </a></li>
				@else
					@include('partials.menu-item', [ 'item' => $submenu ])
				@endif
			@endforeach
		</ul>
	</li>
@endif
