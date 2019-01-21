<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
	<a href="#" class="m-nav__link m-dropdown__toggle">
		<span class="m-topbar__userpic">
			<img src="{{ auth()->user()->foto }}" class="m--img-rounded m--marginless m--img-centered" alt=""/>
		</span>
		<span class="m-topbar__username m--hide">
			Nick
		</span>
	</a>
	<div class="m-dropdown__wrapper">
		<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
		<div class="m-dropdown__inner">
			<div class="m-dropdown__header m--align-center">
				<div class="m-card-user m-card-user--skin-dark">
					<div class="m-card-user__pic">
						<img src="{{ auth()->user()->foto }}" class="m--img-rounded m--marginless" alt=""/>
					</div>
					<div class="m-card-user__details">
						<span class="m-card-user__name m--font-weight-500">
							{{ auth()->user()->nombre_completo }}
						</span>
						<a href="" class="m-card-user__email m--font-weight-300 m-link">
							{{ auth()->user()->email }}
						</a>
					</div>
				</div>
			</div>
			<div class="m-dropdown__body">
				<div class="m-dropdown__content">
					<ul class="m-nav m-nav--skin-light">
						<li class="m-nav__section m--hide">
							<span class="m-nav__section-text">
								Section
							</span>
						</li>
						<li class="m-nav__item">
							<a href="{{ route('admin.usuario.perfil') }}" class="m-nav__link">
								<i class="m-nav__link-icon flaticon-share"></i>
								<span class="m-nav__link-text">
									Mi Perfil
								</span>
							</a>
						</li>
						<li class="m-nav__separator m-nav__separator--fit"></li>
						<li class="m-nav__item">
							<a href="{{ url('/logout') }}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder"
							   onclick="event.preventDefault(); document.getElementById('logout-form-sidetop').submit();">
								Cerrar sesión
							</a>
							<form id="logout-form-sidetop" action="{{ url('/logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</li>
