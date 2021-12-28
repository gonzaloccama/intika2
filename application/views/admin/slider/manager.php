<!-- BEGIN: Content -->
<div class="content">

	<?php $this->load->view('admin/top_bar'); ?>

	<!-- END: Top Bar -->
	<h2 class="intro-y text-lg font-medium mt-10">
		Administrar Sliders
	</h2>

	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
			<a href="<?= base_url() . 'admin/slider/add' ?>" class="btn btn-primary shadow-md mr-2">Nuevo slider</a>


			<div class="hidden md:block mx-auto text-gray-600">Mostrando <?= $total_rows ?> registros encontrados</div>

			<div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
				<div class="w-56 relative text-gray-700 dark:text-gray-300">
					<form method="post" action="<?= base_url('admin/slider') ?>">

						<input type="text" class="form-control w-56 box pr-10 placeholder-theme-13"
							   placeholder="Buscar..." id="search_text" name="search">
						<i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
					</form>
				</div>
			</div>
		</div>

		<!-- BEGIN: Data List -->
		<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
			<table class="table table-report -mt-2">
				<thead>
				<tr>
					<th class="whitespace-nowrap">IMAGEN</th>
					<th class="whitespace-nowrap">TITULO</th>
					<th class="text-center whitespace-nowrap">ESTADO</th>
					<th class="text-center whitespace-nowrap">ACCIÓN</th>
				</tr>
				</thead>
				<tbody>
				<?php
				if (isset($sliders) && !empty($sliders)):
					foreach ($sliders as $slider):
						?>
						<tr class="intro-x">
							<td class="w-40">
								<div class="flex">
									<div class="image-fit zoom-in">
										<img alt="Tailwind" class="tooltip w-full rounded -intro-x" data-action="zoom"
											 src="<?= $slider->attachment != ''
													 ? base_url() . $slider->attachment
													 : base_url() . 'assets/admin/dist/images/preview-4.jpg' ?>"
											 title="Subido <?= date_str_($slider->date_added); ?>">
									</div>
								</div>
							</td>

							<td>
								<a href="<?= base_url() . 'admin/slider/edit/' . $slider->id ?>"
								   class="font-medium whitespace-nowrap tooltip" data-theme="light"
								   title="<?= $slider->description_short ?>"><?= $slider->title ?></a>
							</td>

							<td class="w-40">
								<div class="flex items-center justify-center <?= $slider->status ? 'text-theme-9' : 'text-theme-12' ?>">
									<i data-feather="<?= $slider->status ? 'check-square' : 'alert-triangle' ?>"
									   class="w-4 h-4 mr-2"></i>
									<?= $slider->status ? 'activado' : 'pendiente' ?>
								</div>
							</td>
							<td class="table-report__action w-56">
								<div class="flex justify-center items-center">
									<a class="flex items-center mr-3"
									   href="<?= base_url() . 'admin/slider/edit/' . $slider->id ?>">
										<i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
									</a>
									<a class="flex items-center text-theme-6 delete-slider" href="javascript:;"
									   data-toggle="modal" data-target="#delete-confirmation-modal"
									   data-id="<?= $slider->id ?>" data-field="slider">
										<i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Eliminar </a>
								</div>
							</td>
						</tr>

					<?php
					endforeach;
				else:
					?>
					<tr class="intro-x">
						<td colspan="4">
							<div class="flex text-theme-6">
								¡No se encontró ningún registro!
							</div>
						</td>
					</tr>

				<?php
				endif;
				?>

				</tbody>
			</table>
		</div>
		<!-- END: Data List -->
		<!-- BEGIN: Pagination -->
		<div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
			<?= $pagelinks ?>

			<select class="w-20 form-select box mt-3 sm:mt-0">
				<option value="5">5</option>
				<option value="10">10</option>
				<option value="20">20</option>
				<option value="40">40</option>
			</select>


		</div>
		<!-- END: Pagination -->
	</div>

</div>
<!-- END: Content -->
