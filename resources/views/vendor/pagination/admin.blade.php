@if ($paginator->hasPages())
	<ul class="m-datatable__pager-nav">
		@if ($paginator->onFirstPage())
			<li><a title="Anterior" class="m-datatable__pager-link m-datatable__pager-link--prev m-datatable__pager-link--disabled" disabled="disabled"><i class="la la-angle-left"></i></a></li>
		@else
			<li><a href="{{ $paginator->previousPageUrl() }}" title="Anterior" class="m-datatable__pager-link m-datatable__pager-link--prev"><i class="la la-angle-left"></i></a></li>
		@endif

		@foreach ($elements as $element)
			{{-- "Three Dots" Separator --}}
			@if (is_string($element))
				<li><a class="m-datatable__pager-link m-datatable__pager-link--more-next"><i class="la la-ellipsis-h"></i></a></li>
			@endif

			{{-- Array Of Links --}}
			@if (is_array($element))
				@foreach ($element as $page => $url)
					@if ($page == $paginator->currentPage())
						<li><a class="m-datatable__pager-link m-datatable__pager-link-number m-datatable__pager-link--active">{{ $page }}</a></li>
					@else
						<li><a href="{{ $url }}" class="m-datatable__pager-link m-datatable__pager-link-number">{{ $page }}</a></li>
					@endif
				@endforeach
			@endif
		@endforeach

		@if ($paginator->hasMorePages())
			<li><a href="{{ $paginator->nextPageUrl() }}" title="Siguiente" class="m-datatable__pager-link m-datatable__pager-link--next"><i class="la la-angle-right"></i></a></li>
		@else
			<li><a title="Siguiente" class="m-datatable__pager-link m-datatable__pager-link--last m-datatable__pager-link--disabled"><i class="la la-angle-right"></i></a></li>
		@endif
	</ul>
@endif