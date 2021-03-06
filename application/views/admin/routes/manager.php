<!-- BEGIN: Content -->
<div class="content">

	<?php $this->load->view('admin/top_bar'); ?>

	<!-- END: Top Bar -->
	<h2 class="intro-y text-lg font-medium mt-10">
		Administrar Rutas
	</h2>

	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
			<a href="<?= base_url() . 'admin/routes/add' ?>" class="btn btn-primary shadow-md mr-2">Nueva ruta</a>
			<div class="dropdown">
				<button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
						<span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4"
																				   data-feather="plus"></i> </span>
				</button>
				<div class="dropdown-menu w-40">
					<div class="dropdown-menu__content box dark:bg-dark-1 p-2">
						<!--						<a href=""-->
						<!--						   class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">-->
						<!--							<i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a>-->
						<a href="<?= base_url('admin/routes/export_excel') ?>"
						   class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
							<i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
						<!--						<a href=""-->
						<!--						   class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">-->
						<!--							<i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>-->
					</div>
				</div>
			</div>


			<!--			<div class="hidden md:block mx-auto text-gray-600">Mostrando 1 a 10 de 150 entradas</div>-->
			<div class="hidden md:block mx-auto text-gray-600">
				<div class="hidden md:block mx-auto text-gray-600">Mostrando <?= $total_rows ?> registros encontrados
				</div>
			</div>
			<div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
				<div class="w-56 relative text-gray-700 dark:text-gray-300">
					<form method="post" action="<?= base_url('admin/routes') ?>">

						<input type="text" class="form-control w-56 box pr-10 placeholder-theme-13"
							   placeholder="Buscar..." id="search_text" name="search">
						<i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
					</form>
				</div>
			</div>

		</div>

		<!-- BEGIN: Data List -->
		<div class="intro-y col-span-12 overflow-x-auto lg:overflow-visible" id="app">
			<table class="table table-report -mt-2">
				<thead>
				<tr>
					<th class="whitespace-nowrap">IMAGEN</th>
					<th class="whitespace-nowrap">NOMBRE</th>
					<th class="whitespace-nowrap">PRECIO</th>
					<th class="whitespace-nowrap">DESTINOS</th>
					<th class="text-center whitespace-nowrap">ESTADO</th>
					<th class="text-center whitespace-nowrap">ACCI??N</th>
				</tr>
				</thead>
				<tbody id="display-data">
				<?php
				if (isset($routes) && !empty($routes)):
					foreach ($routes as $route):
						?>
						<tr class="intro-x">
							<td class="w-40">
								<div class="flex">
									<div class="image-fit zoom-in">
										<img alt="Tailwind" class="tooltip w-full rounded -intro-x" data-action="zoom"
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
									<a href="javascript:;" data-theme="light"
									   data-tooltip-content="#custom-content-tooltip"
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

												$i = 1;
												foreach ($des as $de):
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
									<?php
									$h = 0;
									if ($h != 0):
										?>
										<a class="flex items-center text-theme-10 mr-3"
										   href="<?= base_url() . 'admin/routes/itinerary/' . $route->id ?>">
											<i data-feather="server" class="w-4 h-4 mr-1"></i> Itenerario
										</a>
									<?php
									endif;
									?>
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
				else:
					?>
					<!-- END: Data List -->
					<tr class="intro-x">
						<td colspan="6">
							<div class="flex text-theme-6">
								??No se encontr?? ning??n registro!
							</div>
						</td>
					</tr>
				<?php
				endif;
				?>
				</tbody>
			</table>
		</div>

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

