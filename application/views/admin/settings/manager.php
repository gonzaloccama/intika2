<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- BEGIN: Content -->
<div class="content">

	<?php $this->load->view('admin/top_bar'); ?>
	<!-- END: Top Bar -->

	<div class="intro-y flex items-center mt-8">
		<h2 class="text-lg font-medium mr-auto">
			Configuraciones
		</h2>
	</div>
	<div class="grid grid-cols-12 gap-6">
		<!-- BEGIN: Profile Menu -->
		<div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
			<div class="intro-y box mt-5">
				<div class="relative flex items-center p-5">
					<div class="w-4/5 h-10 image-fit cursor-pointer zoom-in mx-auto">
						<img alt="Midone Tailwind HTML Admin Template" class=""
							 src="<?= (isset($settings->logo) && !empty($settings->logo))
									 ? base_url() . $settings->logo
									 : base_url('assets/images/resources/client-img1-1.png') ?>">
					</div>
					<div class="ml-4 mr-auto">
						<div class="font-medium text-base"><?=
							(isset($settings) && !empty($settings))
									? $settings->name
									: 'Sin Nombre'
							?></div>
						<div class="text-gray-600"  style="font-style: italic;"><?=
							(isset($settings) && !empty($settings))
									? $settings->name_up
									: 'Sin Nombre append'
							?></div>
					</div>

				</div>
				<div class="p-5 border-t border-gray-200 dark:border-dark-5" style="font-style: italic;">
					<b>ACTUALIZADO: </b> <?=
					(isset($settings->date_added) && !empty($settings->date_added))
							? (isset($settings->last_modified) && !empty($settings->last_modified))
							? date_str_($settings->last_modified)
							: date_str_($settings->date_added)
							: 'Sin crear'
					?></div>
				<div class="p-5 border-t border-gray-200 dark:border-dark-5">
					<a class="flex items-center <?= $info['setting_menu'] === 1 ? 'text-theme-1 dark:text-theme-10 font-medium' : 'mt-5' ?>"
					   href="<?= base_url('admin/settings/general') ?>">
						<i data-feather="<?= $info['setting_menu'] === 1 ? 'activity' : 'edit' ?>"
						   class="w-4 h-4 mr-2"></i> Información General
					</a>
					<a class="flex items-center <?= $info['setting_menu'] === 4 ? 'text-theme-1 dark:text-theme-10 font-medium mt-5' : 'mt-5' ?>"
					   href="<?= base_url('admin/settings/logo') ?>">
						<i data-feather="<?= $info['setting_menu'] === 4 ? 'activity' : 'hexagon' ?>"
						   class="w-4 h-4 mr-2"></i> Logo blanco
					</a>
					<a class="flex items-center <?= $info['setting_menu'] === 2 ? 'text-theme-1 dark:text-theme-10 font-medium mt-5' : 'mt-5' ?>"
					   href="<?= base_url('admin/settings/social') ?>">
						<i data-feather="<?= $info['setting_menu'] === 2 ? 'activity' : 'box' ?>"
						   class="w-4 h-4 mr-2"></i> Media Social
					</a>
					<a class="flex items-center <?= $info['setting_menu'] === 3 ? 'text-theme-1 dark:text-theme-10 font-medium mt-5' : 'mt-5' ?>"
					   href="<?= base_url('admin/settings/other') ?>">
						<i data-feather="<?= $info['setting_menu'] === 3 ? 'activity' : 'maximize' ?>"
						   class="w-4 h-4 mr-2"></i> Otros </a>

				</div>

			</div>
		</div>
		<!-- END: Profile Menu -->
		<?php
		$this->load->view($info['settings_view']);
		?>
	</div>

</div>
<!-- END: Content -->
