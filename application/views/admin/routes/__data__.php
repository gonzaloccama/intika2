<?php defined('BASEPATH') or exit('No direct script access allowed');

foreach ($routes as $route):
	?>
	<tr class="intro-x">
		<td class="w-40">
			<div class="flex">
				<div class="w-full my-5 image-fit">
					<img alt="Tailwind" class="w-full tooltip rounded-md -intro-x" data-action="zoom"
						 src="<?= $route->attachment != ''
								 ? base_url() . $route->attachment
								 : base_url() . 'assets/admin/dist/images/preview-4.jpg' ?>"
						 title="Subido <?= date_str_($route->date_added); ?>">
				</div>
			</div>
		</td>

		<td class="w-40">
			<a href="<?= base_url() . 'admin/routes/edit/' . $route->id ?>"
			   class="font-medium whitespace-nowrap tooltip" data-theme="light"
			   title="<?= $route->description ?>"><?= $route->name ?></a>
		</td>

		<td class="w-40">
			<div class="flex items-center justify-center text-theme-1 block font-bold">
				<i data-feather="dollar-sign" class="w-4 h-4 mr-2"></i>
				<?= $route->price ?>
			</div>
		</td>

		<td class="w-40">
			<div class="text-center">
				<a href="javascript:;" data-theme="light" data-tooltip-content="#custom-content-tooltip"
				   class="tooltip btn btn-rounded btn-secondary-soft w-24 mr-1 mb-2"
				   title="<?= $route->name ?>">Ver</a>
			</div>
			<!-- END: Custom Tooltip Toggle -->

			<!-- BEGIN: Custom Tooltip Content -->
			<div class="tooltip-content">
				<div id="custom-content-tooltip" class="relative flex items-center py-1">
					<div class="ml-4 mr-auto">
						<div class="font-medium dark:text-gray-300 leading-relaxed"><?= $route->name ?></div>
						<div class="text-gray-600"><?php
							$des = json_decode($route->destination);
							$_des_ = array();
							foreach ($destinations as $destination):
								if (in_array($destination->id, $des)):
									array_push($_des_, $destination->destination);
								endif;
							endforeach;

							$i = 1;
							foreach ($_des_ as $de):
								echo '<em class="block mt-1">' . $i++ . ' ' . $de . '</em>';
							endforeach;

							?></div>
					</div>
				</div>
			</div> <!-- END: Custom Tooltip Content -->
		</td>

		<td class="w-40">
			<div class="flex items-center justify-center <?= $route->status ? 'text-theme-9' : 'text-theme-12' ?>">
				<i data-feather="<?= $route->status ? 'check-square' : 'alert-triangle' ?>"
				   class="w-4 h-4 mr-2"></i>
				<?= $route->status ? 'activado' : 'pendiente' ?>
			</div>
		</td>

		<td class="table-report__action w-56">
			<div class="flex justify-center items-center">
				<a class="flex items-center mr-3"
				   href="<?= base_url() . 'admin/routes/edit/' . $route->id ?>">
					<i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
				</a>
				<a class="flex items-center text-theme-6 delete-slider" href="javascript:;"
				   data-toggle="modal" data-target="#delete-confirmation-modal"
				   data-id="<?= $route->id ?>" data-field="routes">
					<i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Eliminar </a>
			</div>
		</td>
	</tr>

<?php
endforeach;
?>
<!-- END: Data List -->

