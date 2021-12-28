<!-- BEGIN: Content -->
<div class="content">

	<?php
	$this->load->view('admin/top_bar');
	?>

	<div class="intro-y flex items-center mt-8">
		<h2 class="text-lg font-medium mr-auto">
			Editar Itinerario
		</h2>
	</div>

	<div class="grid grid-cols-12 gap-6 mt-5 ">
		<div class="intro-y col-span-12 lg:col-span-6">

			<!-- BEGIN: Form Layout -->
			<form method="post" enctype="multipart/form-data">
				<div class="intro-y box p-5">
					<div class="add-itinerary">
						<div class="flex">
							<label for="title" class="font-medium">ITINERARIO</label>
							<span class="sm:ml-auto text-right text-gray-600 opacity-10 pr-1 validation-title"
								  style="font-size: 12px"></span>
						</div>

						<?php
						if (is_item($routes->itinerary)):
							$itineraries = json_decode($routes->itinerary);
						endif;
						?>

						<div class="input-group mb-3 form-group">
							<input type="text" class="form-control w-1/4" id="itinerary_day" name="itinerary[day][]"
								   placeholder="Dia 1"
								   value="<?php if (is_item($routes->itinerary)) {
									   echo $itineraries->day[0];
								   } else {
									   echo 'Dia 1';
								   } ?>">
							<input type="text" class="form-control" id="itinerary_des" name="itinerary[description][]"
								   placeholder="Itinerario 1"
								   value="<?php if (is_item($routes->itinerary)) {
									   echo $itineraries->description[0];
								   } else {
									   echo '';
								   } ?>">

							<input type="text" class="form-control w-20" id="itinerary_ho" name="itinerary[hour][]"
								   placeholder="8:00 hs" value="<?php if (is_item($routes->itinerary)) {
								echo $itineraries->hour[0];
							} else {
								echo '';
							} ?>">

							<div class="">
								<button class="btn btn-outline-primary ml-1 add_form_itinerary h-full" type="button"><i
											class="fas fa-plus"></i></button>
							</div>
						</div>

						<?php
						if (is_item($routes->itinerary)):
							for ($i = 1; $i < count($itineraries->description); $i++):
								?>
								<div class="input-group mb-3 form-group">
									<input type="text" class="form-control w-1/4" id="$itinerary-<?= $i ?>" name="itinerary[day][]"
										   placeholder="Dia 1"
										   value="<?= $itineraries->day[$i] ?>">
									<input type="text" class="form-control" id="$itinerary-<?= $i ?>"
										   name="itinerary[description][]"
										   placeholder="Agregar Itinerario <?= $i ?>"
										   value="<?= $itineraries->description[$i] ?>">
									<input type="text" class="form-control w-20" id="itinerary_ho"
										   name="itinerary[hour][]"
										   placeholder="14:00 hs" value="<?= $itineraries->hour[$i] ?>">
									<div class="">
										<button class="btn btn-outline-danger ml-1 h-full delete_itinerary"
												type="button">
											<i class="fas fa-minus"></i></button>
									</div>
								</div>
							<?php
							endfor;
						endif;
						?>

					</div>

					<div class="text-right mt-5">
						<a href="<?= base_url('admin/routes') ?>" class="btn btn-outline-secondary w-24 mr-1">REGRESAR</a>
						<button type="submit" class="btn btn-primary w-24">GUARDAR</button>
					</div>
				</div>
				<!-- END: Form Layout -->
			</form>
		</div>
	</div>

</div>
<!-- END: Content -->
