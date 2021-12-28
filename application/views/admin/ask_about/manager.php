<!-- BEGIN: Content -->
<div class="content">

	<?php $this->load->view('admin/top_bar'); ?>

	<!-- END: Top Bar -->
	<h2 class="intro-y text-lg font-medium mt-10">
		Administrar Solicitudes
	</h2>


	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
			<!--			<a href="-->
			<? //= base_url() . 'admin/routes/add' ?><!--" class="btn btn-primary shadow-md mr-2">Nueva ruta</a>-->
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
						<a href="<?= base_url('admin/ask_about/export_excel') ?>"
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
					<form method="post" action="<?= base_url('admin/ask_about') ?>">
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
					<th class="">NRO</th>
					<th class="whitespace-nowrap">NOMBRES</th>
					<th class="whitespace-nowrap">EMAIL</th>
					<th class="whitespace-nowrap">CELULAR</th>
					<th class="text-center whitespace-nowrap">RUTA</th>
					<th class="text-center whitespace-nowrap">MENSAJE</th>
					<th class="text-center whitespace-nowrap">ESTADO</th>
					<th class="text-center whitespace-nowrap">ACCIÓN</th>
				</tr>
				</thead>
				<tbody>
				<?php
				$i = 1;
				if (isset($ask_abouts) && !empty($ask_abouts)):
					foreach ($ask_abouts as $ask_about):
						?>
						<tr class="intro-x">
							<td class="w-10">
								<div class="flex items-center justify-center text-theme-1 block font-bold">
									<?= $i++ ?>
								</div>
							</td>

							<td class="w-40">
								<a href="javascript:;"
								   class="font-medium tooltip" data-theme="light"
								   title="Registrado: <?= $ask_about->date_added ?>"><?= $ask_about->names ?></a>
							</td>

							<td class="w-20">

								<a href="mailto:<?= $ask_about->email ?>"
								   class="font-medium whitespace-nowrap tooltip" data-theme="light"
								   title="<?= $ask_about->email ?>">Email</a>

							</td>
							<td class="w-20">
								<a href="tel:<?= '+' . $ask_about->country_code . $ask_about->celular ?>"
								   class="font-medium whitespace-nowrap tooltip" data-theme="light"
								   title="<?= '+' . $ask_about->country_code . ' ' . $ask_about->celular ?>">
									Llamar
								</a>

							</td>

							<td class="w-40">
								<div class="flex items-center  justify-center text-theme-1 block font-bold">
									<?php
									if (isset($routes) && !empty($routes)):
										foreach ($routes as $route):
											if ($route->id == $ask_about->routes_id):
												echo $route->name;
											endif;
										endforeach;
									else:
										echo 'Sin Ruta';
									endif;
									?>
								</div>
							</td>

							<td class="w-20">
								<div class="text-center">
									<a href="javascript:;" data-theme="light"
									   data-tooltip-content="#custom-content-tooltip-<?= $ask_about->id ?>"
									   class="tooltip btn btn-rounded btn-secondary-soft mr-1 mb-2"
									   title="<?= $ask_about->names ?>">Mensaje</a>
								</div>
								<!-- END: Custom Tooltip Toggle -->

								<!-- BEGIN: Custom Tooltip Content -->
								<div class="tooltip-content">
									<div id="custom-content-tooltip-<?= $ask_about->id ?>"
										 class="relative flex items-center py-1">
										<div class="ml-4 mr-auto">
											<div class="font-medium dark:text-gray-300 leading-relaxed">Mensaje</div>
											<div class="text-gray-600"><?= $ask_about->message ?></div>
										</div>
									</div>
								</div> <!-- END: Custom Tooltip Content -->
							</td>

							<td class="w-20">
								<div class="flex items-center justify-center <?= $ask_about->send_email ? 'text-theme-9' : 'text-theme-6' ?>">
									<i data-feather="<?= $ask_about->send_email ? 'check-square' : 'minus-square' ?>"
									   class="w-4 h-4 mr-2"></i>
									<?= $ask_about->send_email ? 'Enviado' : 'No enviado' ?>
								</div>
							</td>

							<td class="table-report__action w-56">
								<div class="flex justify-center items-center">
									<a class="flex items-center mr-3 send_email"
									   data-id="<?= $ask_about->id ?>" data-email="<?= $ask_about->email ?>"
									   href="javascript:;">
										<i data-feather="send" class="w-4 h-4 mr-1"></i> Enviar
									</a>
									<a class="flex items-center text-theme-6 delete-slider" href="javascript:;"
									   data-toggle="modal" data-target="#delete-confirmation-modal"
									   data-id="<?= $ask_about->id ?>" data-field="ask_about">
										<i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Eliminar </a>
								</div>
							</td>
						</tr>

					<?php
					endforeach;
				else:
					?>

					<tr class="intro-x">
						<td colspan="8" class="">
							<div class="flex items-center text-theme-6 justify-center text-theme-1 block font-bold">
								¡No se ha encontrado ningún registro!
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

