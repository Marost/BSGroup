<!-- BEGIN: Horizontal Menu -->
<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
	<i class="la la-close"></i>
</button>
<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
	<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
		<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel">
			<a  href="/" class="m-menu__link" target="_blank">
				<i class="m-menu__link-icon flaticon-browser"></i>
				<span class="m-menu__link-text">
					Visitar sitio
				</span>
			</a>
		</li>

		<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true">
			<a  href="#" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-add"></i>
				<span class="m-menu__link-text">
					Añadir
				</span>
				<i class="m-menu__hor-arrow la la-angle-down"></i>
				<i class="m-menu__ver-arrow la la-angle-right"></i>
			</a>
			<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
				<span class="m-menu__arrow m-menu__arrow--adjust"></span>
				<ul class="m-menu__subnav">
					<li class="m-menu__item "  aria-haspopup="true">
						<a  href="{{ route('admin.blog.noticias.create') }}" class="m-menu__link ">
							<i class="m-menu__link-icon flaticon-file"></i>
							<span class="m-menu__link-text">
								Entrada de Blog
							</span>
						</a>
					</li>
					<li class="m-menu__item "  aria-haspopup="true">
						<a  href="{{ route('admin.usuarios.create') }}" class="m-menu__link ">
							<i class="m-menu__link-icon flaticon-user-add"></i>
							<span class="m-menu__link-text">
								Usuario
							</span>
						</a>
					</li>
				</ul>
			</div>
		</li>
	</ul>
</div>
<!-- END: Horizontal Menu -->
