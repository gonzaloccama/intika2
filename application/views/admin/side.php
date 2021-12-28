<!-- BEGIN: Side Menu -->
<nav class="side-nav">
	<a href="<?= base_url() ?>" class="intro-x flex items-center pl-5 pt-4">
		<!--			<img alt="Midone Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg">-->
		<span class="hidden xl:block text-white text-lg ml-3"> Intika<span class="font-medium">Travel</span> </span>
	</a>
	<div class="side-nav__devider my-6"></div>
	<ul>
		<!--	start dashboard -->
		<li>
			<a href="<?= base_url('admin/dashboard') ?>"
			   class="side-menu <?= $info['menu'] == 1 ? 'side-menu--active' : '' ?>">
				<div class="side-menu__icon"><i data-feather="home"></i></div>
				<div class="side-menu__title">
					Dashboard
					<div class="side-menu__sub-icon"></div>
				</div>
			</a>
		</li>
		<!--	end dashboard -->

		<!--	start settings -->
		<li>
			<a href="javascript:;.html" class="side-menu <?= ($info['menu'] == 8) ? 'side-menu--active' : '' ?>">
				<div class="side-menu__icon"><i data-feather="settings"></i></div>
				<div class="side-menu__title">
					Configuraciones
					<div class="side-menu__sub-icon"><i data-feather="chevron-down"></i></div>
				</div>
			</a>
			<ul class="<?= ($info['menu'] == 8) ? 'side-menu__sub-open' : '' ?>">

					<li>
						<a href="<?= base_url('admin/settings/general') ?>" class="side-menu
					<?= $info['menu'] == 8 && $info['sub_menu'] == 1 ? 'side-menu--active' : '' ?>">
							<div class="side-menu__icon"><i data-feather="activity"></i></div>
							<div class="side-menu__title"> Página</div>
						</a>
					</li>

				<li>
					<a href="<?= base_url('admin/settings/user_manual') ?>" class="side-menu
					<?= $info['menu'] == 8 && $info['sub_menu'] == 2 ? 'side-menu--active' : '' ?>">
						<div class="side-menu__icon"><i data-feather="activity"></i></div>
						<div class="side-menu__title"> Manual de usuario</div>
					</a>
				</li>

			</ul>

		</li>
		<!--	end settings -->


		<li class="side-nav__devider my-6"></li>

		<!--	start sliders -->
		<li>
			<a href="javascript:;.html" class="side-menu <?= ($info['menu'] == 4) ? 'side-menu--active' : '' ?>">
				<div class="side-menu__icon"><i data-feather="columns"></i></div>
				<div class="side-menu__title">
					Sliders
					<div class="side-menu__sub-icon"><i data-feather="chevron-down"></i></div>
				</div>
			</a>
			<ul class="<?= ($info['menu'] == 4) ? 'side-menu__sub-open' : '' ?>">
				<li>
					<a href="<?= base_url('admin/slider') ?>" class="side-menu
					<?= $info['menu'] == 4 && $info['sub_menu'] == 1 ? 'side-menu--active' : '' ?>">
						<div class="side-menu__icon"><i data-feather="activity"></i></div>
						<div class="side-menu__title"> Sliders</div>
					</a>
				</li>
				<li>
					<a href="<?= base_url('admin/slider/add') ?>" class="side-menu
					<?= $info['menu'] == 4 && $info['sub_menu'] == 2 ? 'side-menu--active' : '' ?>">
						<div class="side-menu__icon"><i data-feather="activity"></i></div>
						<div class="side-menu__title"> Nuevo</div>
					</a>
				</li>
			</ul>
		</li>
		<!--	end sliders -->

		<!--	start routes -->
		<li>
			<a href="javascript:;.html" class="side-menu <?= $info['menu'] == 5 ? 'side-menu--active' : '' ?>">
				<div class="side-menu__icon"><i data-feather="folder"></i></div>
				<div class="side-menu__title">
					Rutas
					<div class="side-menu__sub-icon"><i data-feather="chevron-down"></i></div>
				</div>
			</a>
			<ul class="<?= ($info['menu'] == 5) ? 'side-menu__sub-open' : '' ?>">
				<li>
					<a href="<?= base_url('admin/routes') ?>" class="side-menu
					<?= ($info['menu'] == 5 && $info['sub_menu'] == 1) ? 'side-menu--active' : '' ?>">
						<div class="side-menu__icon"><i data-feather="activity"></i></div>
						<div class="side-menu__title"> Rutas</div>
					</a>
				</li>
				<li>
					<a href="<?= base_url('admin/routes/add') ?>" class="side-menu
					<?= ($info['menu'] == 5 && $info['sub_menu'] == 2) ? 'side-menu--active' : '' ?>">
						<div class="side-menu__icon"><i data-feather="activity"></i></div>
						<div class="side-menu__title"> Nuevo</div>
					</a>
				</li>
			</ul>
		</li>
		<!--	end routes -->

			<!--	start other items -->
			<li>
				<a href="<?= base_url('admin/other_items/destinations') ?>"
				   class="side-menu <?= $info['menu'] == 7 ? 'side-menu--active' : '' ?>">
					<div class="side-menu__icon"><i data-feather="package"></i></div>
					<div class="side-menu__title">Otros</div>
				</a>
			</li>
			<!--	start other items -->

			<li class="side-nav__devider my-6"></li>

		<!--	start ask about -->
		<li>
			<a href="<?= base_url('admin/ask_about') ?>"
			   class="side-menu <?= $info['menu'] == 6 ? 'side-menu--active' : '' ?>">
				<div class="side-menu__icon"><i data-feather="server"></i></div>
				<div class="side-menu__title">Solicitudes</div>
			</a>
		</li>
		<!--	end ask about -->

		<li class="side-nav__devider my-6"></li>


	</ul>
</nav>
<!-- END: Side Menu -->
