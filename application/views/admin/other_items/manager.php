<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- BEGIN: Content -->
<div class="content">

	<?php $this->load->view('admin/top_bar'); ?>

	<!-- END: Top Bar -->
	<div class="intro-y flex items-center mt-8">
		<h2 class="text-lg font-medium mr-auto">
			Otras configuraciones
		</h2>
	</div>

	<div class="grid grid-cols-12 gap-6">
		<!-- BEGIN: FAQ Menu -->
		<div class="intro-y col-span-12 lg:col-span-4 xl:col-span-3">
			<div class="box mt-5">
				<div class="px-4 pb-3 pt-5">
					<a class="flex items-center px-4 py-2 <?= ($info['other_menu'] === 1) ? 'rounded-lg bg-theme-1 text-white font-medium' : 'mt-1' ?>"
					   href="<?= base_url('admin/other_items/destinations') ?>">
						<i data-feather="<?= ($info['other_menu'] === 1) ? 'activity' : 'git-merge' ?>"
						   class="w-4 h-4 mr-2"></i>
						<div class="flex-1 truncate">Destinos</div>
					</a>
					<a class="flex items-center px-4 py-2 <?= ($info['other_menu'] === 2) ? 'rounded-lg bg-theme-1 text-white font-medium' : 'mt-1' ?>"
					   href="<?= base_url('admin/other_items/findings') ?>">
						<i data-feather="<?= ($info['other_menu'] === 2) ? 'activity' : 'message-square' ?>"
						   class="w-4 h-4 mr-2"></i>
						<div class="flex-1 truncate">Recomendaciones</div>
					</a>
					<a class="flex items-center px-4 py-2 <?= ($info['other_menu'] === 3) ? 'rounded-lg bg-theme-1 text-white font-medium' : 'mt-1' ?>"
					   href="<?= base_url('admin/other_items/services') ?>">
						<i data-feather="<?= ($info['other_menu'] === 3) ? 'activity' : 'briefcase' ?>"
						   class="w-4 h-4 mr-2"></i>
						<div class="flex-1 truncate">Servicios</div>
					</a>
				</div>

			</div>
		</div>
		<!-- END: FAQ Menu -->

		<?php
		$this->load->view('admin/other_items/__form__');
		?>

	</div>

</div>
<!-- END: Content -->
