<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
	<div class="mobile-menu-bar">
		<a href="<?= base_url() ?>" class="flex mr-auto">
			<!--			<img alt="Midone Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg">-->
			<span class="xl:block text-white text-lg ml-3"> Intika<span class="font-medium">Travel</span> </span>
		</a>
		<a href="javascript:;" id="mobile-menu-toggler">
			<i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i>
		</a>
	</div>
	<ul class="border-t border-theme-29 py-5 hidden">
		<!--	start dashboard -->
		<li>
			<a href="<?= base_url('admin/dashboard') ?>" class="menu <?= $info['menu'] == 1 ? 'menu--active' : '' ?>">
				<div class="menu__icon"><i data-feather="home"></i></div>
				<div class="menu__title"> Dashboard</div>
			</a>
		</li>
		<!--	end dashboard -->

		<!--	start sliders -->
		<li>
			<a href="javascript:;.html" class="menu <?= $info['menu'] == 4 ? 'menu--active' : '' ?>">
				<div class="menu__icon"><i data-feather="settings"></i></div>
				<div class="menu__title"> Configuraciones <i data-feather="chevron-down" class="menu__sub-icon"></i>
				</div>
			</a>
			<ul class="<?= ($info['menu'] == 4) ? 'menu__sub-open' : '' ?>">

					<li>
						<a href="<?= base_url('admin/settings/general') ?>" class="menu
					<?= $info['menu'] == 4 && $info['sub_menu'] == 1 ? 'menu--active' : '' ?>">
							<div class="menu__icon"><i data-feather="activity"></i></div>
							<div class="menu__title"> Página</div>
						</a>
					</li>

				<li>
					<a href="<?= base_url('admin/settings/user_manual') ?>" class="menu
					<?= $info['menu'] == 4 && $info['sub_menu'] == 2 ? 'menu--active' : '' ?>">
						<div class="menu__icon"><i data-feather="activity"></i></div>
						<div class="menu__title"> Manual de usuario</div>
					</a>
				</li>

			</ul>

		</li>
		<!--	end sliders -->


		<li class="menu__devider my-6"></li>
		<!--	start sliders -->
		<li>
			<a href="javascript:;.html" class="menu <?= $info['menu'] == 4 ? 'menu--active' : '' ?>">
				<div class="menu__icon"><i data-feather="columns"></i></div>
				<div class="menu__title"> Slider <i data-feather="chevron-down" class="menu__sub-icon"></i></div>
			</a>
			<ul class="<?= ($info['menu'] == 4) ? 'menu__sub-open' : '' ?>">
				<li>
					<a href="<?= base_url('admin/slider') ?>" class="menu
					<?= $info['menu'] == 4 && $info['sub_menu'] == 1 ? 'menu--active' : '' ?>">
						<div class="menu__icon"><i data-feather="activity"></i></div>
						<div class="menu__title"> Slider</div>
					</a>
				</li>
				<li>
					<a href="<?= base_url('admin/slider/add') ?>" class="menu
					<?= $info['menu'] == 4 && $info['sub_menu'] == 2 ? 'menu--active' : '' ?>">
						<div class="menu__icon"><i data-feather="activity"></i></div>
						<div class="menu__title"> Nuevo</div>
					</a>
				</li>
			</ul>
		</li>
		<!--	end sliders -->

		<!--	start routes -->
		<li>
			<a href="javascript:;.html" class="menu <?= $info['menu'] == 5 ? 'menu--active' : '' ?>">
				<div class="menu__icon"><i data-feather="folder"></i></div>
				<div class="menu__title"> Rutas <i data-feather="chevron-down" class="menu__sub-icon"></i></div>
			</a>
			<ul class="<?= ($info['menu'] == 5) ? 'menu__sub-open' : '' ?>">
				<li>
					<a href="<?= base_url('admin/routes') ?>" class="menu
					<?= $info['menu'] == 5 && $info['sub_menu'] == 1 ? 'menu--active' : '' ?>">
						<div class="menu__icon"><i data-feather="activity"></i></div>
						<div class="menu__title"> Rutas</div>
					</a>
				</li>
				<li>
					<a href="<?= base_url('admin/routes/add') ?>" class="menu
					<?= $info['menu'] == 5 && $info['sub_menu'] == 2 ? 'menu--active' : '' ?>">
						<div class="menu__icon"><i data-feather="activity"></i></div>
						<div class="menu__title"> Nuevo</div>
					</a>
				</li>
			</ul>
		</li>
		<!--	end routes -->

			<!--	start other about -->
			<li>
				<a href="<?= base_url('admin/other_items/destinations') ?>"
				   class="menu <?= $info['menu'] == 7 ? 'menu--active' : '' ?>">
					<div class="menu__icon"><i data-feather="package"></i></div>
					<div class="menu__title"> Otros</div>
				</a>
			</li>
			<!--	end other about -->

		<!--	start ask about -->
		<li>
			<a href="<?= base_url('admin/ask_about') ?>" class="menu <?= $info['menu'] == 6 ? 'menu--active' : '' ?>">
				<div class="menu__icon"><i data-feather="folder"></i></div>
				<div class="menu__title"> Solicitudes</div>
			</a>
		</li>
		<!--	end ask about -->


		<li class="menu__devider my-6"></li>

	</ul>
</div>
<!-- END: Mobile Menu -->
