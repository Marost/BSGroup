<!-- BEGIN: Header -->
<header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
	<div class="m-container m-container--fluid m-container--full-height">
		<div class="m-stack m-stack--ver m-stack--desktop">
			@include('admin.layout.partials._header-brand')

			<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
				@include('admin.layout.partials._header-hor-menu')

				@include('admin.layout.partials._header-topbar')
			</div>
		</div>
	</div>
</header>
<!-- END: Header -->
