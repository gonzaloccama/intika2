<form method="post" enctype="multipart/form-data">
	<div class="grid grid-cols-12 gap-6 mt-5">

		<div class="intro-y col-span-12 lg:col-span-6">
			<!-- BEGIN: Form Layout -->

			<div class="intro-y box p-5">
				<div>
					<div class="flex">
						<label for="name" class="font-medium">NOMBRE</label>
						<span class="sm:ml-auto text-right text-gray-600 opacity-10 pr-1 validation-name"
							  style="font-size: 12px"></span>

					</div>
					<input id="name" name="name" type="text" class="form-control w-full"
						   placeholder="Nombre del Tour"
						   value="<?= set_value("name", isset($routes->name) ? $routes->name : ''); ?>">
					<?= form_error("name",
							"<p class='text-red-800 p-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
							"</p>") ?>
				</div>


				<div class="mt-5">
					<div class="flex">
						<label for="description" class="font-medium">DESCRIPCIÓN</label>
						<span class="sm:ml-auto text-right text-gray-600 opacity-10 pr-1 validation-description"
							  style="font-size: 12px"></span>
					</div>
					<textarea id="description" name="description" class="form-control w-full" cols="30"
							  rows="6"><?= set_value("description", html_entity_decode(isset($routes->description) ? $routes->description : '')); ?></textarea>
					<?= form_error("description",
							"<p class='text-red-800 p-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
							"</p>") ?>
				</div>

				<div class="mt-5">
					<div class="flex">
						<label for="price" class="font-medium">PRECIO</label>

					</div>
					<input id="price" name="price" type="number" class="form-control w-full"
						   placeholder="Precio del Tour"
						   value="<?= set_value("price", isset($routes->price) ? $routes->price : ''); ?>"
						   min="0" value="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$">

					<?= form_error("price",
							"<p class='text-red-800 p-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
							"</p>") ?>
				</div>


				<?php


				$_destination = isset($routes->destination) ? json_decode($routes->destination) : array();
				$_services = isset($routes->services) ? json_decode($routes->services) : array();
				$_findings = isset($routes->findings) ? json_decode($routes->findings) : array();

				$_set_destinations = array();
				$_set_services = array();
				$_set_findings = array();
				$_set_ending = array();
				$_set_opening = array();

				if (isset($destinations) && !empty($destinations)):
					foreach ($destinations as $destination):
						if (set_select('destination[]', $destination)):
							array_push($_set_destinations, $destination);
						endif;
						if (set_select('ending', $destination)):
							array_push($_set_ending, $destination);
						endif;
						if (set_select('opening', $destination)):
							array_push($_set_opening, $destination);
						endif;
					endforeach;
				endif;

				if (isset($services) && !empty($services)):
					foreach ($services as $service):
						if (set_select('services[]', $service)):
							array_push($_set_services, $service);
						endif;
					endforeach;
				endif;

				if (isset($findings) && !empty($findings)):
					foreach ($findings as $finding):
						if (set_select('findings[]', $finding)):
							array_push($_set_findings, $finding);
						endif;
					endforeach;
				endif;
				?>

				<div class="mt-5">

					<div class="flex">
						<label for="destination" class="font-medium">DESTINO</label>
					</div>
					<select id="destination" name="destination[]" data-search="true" class="tail-select w-full"
							data-placeholder="Seleccione opciones" multiple>
						<?php
						if ($_set_destinations || !isset($routes)):
							foreach ($destinations as $destination):
								?>
								<option value="<?= $destination ?>"
										<?= in_array($destination, $_set_destinations) ? 'selected' : '' ?>>
									<?= $destination ?>
								</option>
							<?php
							endforeach;
						else:
							foreach ($destinations as $destination):
								?>
								<option value="<?= $destination ?>"
										<?= isset($_destination) ? in_array($destination, $_destination) ? 'selected' : '' : '' ?>>
									<?= $destination ?>
								</option>
							<?php
							endforeach;
						endif;
						?>

					</select>

					<?= form_error("destination[]",
							"<p class='text-red-800 p-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
							"</p>") ?>
				</div>


				<div class="mt-5">
					<div class="flex">
						<label for="findings" class="font-medium">RECOMENDACIONES</label>
					</div>
					<select id="findings" name="findings[]" data-search="true" class="tail-select w-full"
							data-placeholder="Seleccione opciones" multiple>
						<?php
						if ($_set_findings || !isset($routes)):
							foreach ($findings as $finding):
								?>
								<option value="<?= $finding ?>"
										<?= in_array($finding, $_set_findings) ? 'selected' : '' ?>>
									<?= $finding ?>
								</option>
							<?php
							endforeach;
						else:
							foreach ($findings as $finding):
								?>
								<option value="<?= $finding ?>"
										<?= isset($_findings) ? in_array($finding, $_findings) ? 'selected' : '' : '' ?>>
									<?= $finding ?>
								</option>
							<?php
							endforeach;
						endif;
						?>
					</select>
					<?= form_error("findings[]",
							"<p class='text-red-800 p-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
							"</p>") ?>
				</div>


				<div class="mt-5">
					<div class="flex">
						<label for="services" class="font-medium">SERVICOS</label>
					</div>
					<select id="services" name="services[]" data-search="true" class="tail-select w-full"
							data-placeholder="Seleccione opciones" multiple>
						<?php
						if ($_set_services || !isset($routes)):
							foreach ($services as $service):
								?>
								<option value="<?= $service ?>"
										<?= in_array($service, $_set_services) ? 'selected' : '' ?>>
									<?= $service ?>
								</option>
							<?php
							endforeach;
						else:
							foreach ($services as $service):
								?>
								<option value="<?= $service ?>"
										<?= isset($_services) ? in_array($service, $_services) ? 'selected' : '' : '' ?>>
									<?= $service ?>
								</option>
							<?php
							endforeach;
						endif;
						?>
					</select>
					<?= form_error("services[]",
							"<p class='text-red-800 p-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
							"</p>") ?>
				</div>


				<div class="mt-5">
					<div class="flex">
						<label for="opening" class="font-medium">LOCALIZACIÓN DE APTERTURA</label>
					</div>
					<select id="opening" name="opening" data-search="true" class="tail-select w-full">
						<option value="" selected>Selecciones una opción</option>
						<?php
						if ($_set_opening || !isset($routes)):
							foreach ($destinations as $destination):
								?>
								<option value="<?= $destination ?>"
										<?= set_select('opening', $destination) ?>>
									<?= $destination ?>
								</option>
							<?php
							endforeach;
						else:

							foreach ($destinations as $destination):
								?>
								<option value="<?= $destination ?>"
										<?= $routes->opening == $destination ? 'selected' : '' ?> >
									<?= $destination ?>
								</option>
							<?php
							endforeach;

						endif;
						?>
					</select>


					<?= form_error("opening",
							"<p class='text-red-800 p-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
							"</p>") ?>
				</div>


				<div class="mt-5">
					<div class="flex">
						<label for="ending" class="font-medium">LOCALIZACIÓN DE DESTINO FINAL</label>
					</div>
					<select id="ending" name="ending" data-search="true" class="tail-select w-full">
						<option value="" selected>Selecciones una opción</option>
						<?php
						if ($_set_ending || !isset($routes)):
							foreach ($destinations as $destination):
								?>
								<option value="<?= $destination ?>"
										<?= set_select('ending', $destination) ?>>
									<?= $destination ?>
								</option>
							<?php
							endforeach;
						else:

							foreach ($destinations as $destination):
								?>
								<option value="<?= $destination ?>"
										<?= $routes->ending == $destination ? 'selected' : '' ?> >
									<?= $destination ?>
								</option>
							<?php
							endforeach;

						endif;
						?>
					</select>
					<?= form_error("ending",
							"<p class='text-red-800 p-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
							"</p>") ?>
				</div>

			</div>
			<!-- END: Form Layout -->

		</div>

		<?php
		if (isset($routes->attachment) && !empty($routes->attachment)):
			$tmp = explode('/', $routes->attachment);
			$attachment = end($tmp);
		endif;

		if (isset($routes->attachment_detail) && !empty($routes->attachment_detail)):
			$tmp = explode('/', $routes->attachment_detail);
			$attachment_detail = end($tmp);
		endif;
		?>

		<div class="intro-y col-span-12 lg:col-span-6">
			<!-- BEGIN: Form Layout -->

			<div class="intro-y box p-5">

				<div class="">
					<label for="" class="font-medium">IMAGEN <span class="text-red-800">(1080 x 720)</span></label>


					<div id="image-form form-group">

						<div class="p-4 image-fit zoom-in">
							<img class="img-attachment rounded -intro-x"
								 src="<?=
								 (isset($routes->attachment) && !empty($routes->attachment))
										 ? base_url() . $routes->attachment
										 : base_url() . 'assets/images/resources/slide1.jpg' ?>"
								 alt="" id="preview_attachment" width="360">
						</div>

						<input type="file" name="attachment" class="file" accept="image/*" hidden>

						<div class="input-group w-full">
							<input type="text" class="form-control" disabled placeholder="Cargar imagen"
								   id="attachment" value="<?= (isset($attachment) && !empty($attachment))
									? $attachment : '' ?>">
							<div class="input-group-append">
								<button type="button" class="browse btn btn-outline-dark">Buscar...</button>
							</div>
						</div>
					</div>


				</div>


				<div class="mt-5">
					<label for="" class="font-medium">ESTADO</label>
					<div class="mt-2">
						<input type="checkbox" value="1" name="status" class="form-check-switch"
								<?php
								$chkd = set_checkbox('status', '1');
								if ($chkd):
									echo $chkd;
								else:
									echo isset($routes->status) && !empty($routes->status) ? 'checked="checked"' : '';
								endif;
								?>>
					</div>
				</div>

				<div class="text-right mt-5">
					<a href="<?= base_url('admin/routes') ?>" class="btn btn-outline-secondary w-24 mr-1">REGRESAR</a>
					<button type="submit" class="btn btn-primary w-24">GUARDAR</button>
				</div>
			</div>
			<!-- END: Form Layout -->
		</div>
	</div>
</form>
