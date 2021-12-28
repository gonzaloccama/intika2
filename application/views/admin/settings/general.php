<div class="col-span-12 lg:col-span-8 xxl:col-span-9">
	<!-- BEGIN: Display Information -->
	<div class="intro-y box lg:mt-5">
		<div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
			<h2 class="font-medium text-base mr-auto">
				<?= $info['setting_title'] ?>
			</h2>
		</div>
		<form method="post" enctype="multipart/form-data">
			<div class="p-5">
				<div class="flex flex-col-reverse xl:flex-row flex-col">

					<div class="flex-1 mt-6 xl:mt-0">
						<div class="grid grid-cols-12 gap-x-5">
							<div class="col-span-12 xxl:col-span-6">
								<div>
									<label for="name" class="form-label font-medium">NOMBRE PARA MOSTRAR</label>
									<input id="name" type="text" name="name" class="form-control"
										   placeholder="Nombre de la página"
										   value="<?= set_value("name", isset($settings->name) ? $settings->name : ''); ?>">
								</div>
								<?= form_error("name",
										"<p class='text-red-800 p-1' style='font-size: 13px; font-style: italic;'>
											<i class='fas fa-exclamation-circle'></i> ",
										"</p>") ?>

								<div class="mt-5">
									<label for="name_up" class="form-label font-medium">DESCRIPCIÓN APPEND</label>
									<input id="name_up" type="text" name="name_up" class="form-control"
										   placeholder="Descipción append"
										   value="<?= set_value("name_up", isset($settings->name_up) ? $settings->name_up : ''); ?>">
								</div>
								<?= form_error("name_up",
										"<p class='text-red-800 p-1' style='font-size: 13px; font-style: italic;'>
											<i class='fas fa-exclamation-circle'></i> ",
										"</p>") ?>

								<?php
								$m = set_value("email");
								$p = set_value("phone");

								if (isset($settings->email) && !empty($settings->email)):
									$email = json_decode($settings->email);
								endif;

								if (isset($settings->phone) && !empty($settings->phone)):
									$phone = json_decode($settings->phone);
								endif;

								?>

								<div class="mt-5">
									<label for="email1" class="form-label font-medium">EMAILS</label>
									<input id="email1" type="text" name="email[]" class="form-control"
										   placeholder="example@example.com"
										   value="<?php
										   if (!isset($settings->email) || $m):
											   echo (isset($m) && !empty($m)) ? $m[0] : '';
										   else:
											   echo $email[0];
										   endif;
										   ?>">
									<input id="email2" type="text" name="email[]" class="form-control mt-3"
										   placeholder="example1@example.com"
										   value="<?php
										   if (!isset($settings->email) || $m):
											   echo (isset($m) && !empty($m)) ? $m[1] : '';
										   else:
											   echo $email[1];
										   endif;
										   ?>">
								</div>
								<?= form_error("email[]",
										"<p class='text-red-800 p-1' style='font-size: 13px; font-style: italic;'>
											<i class='fas fa-exclamation-circle'></i> ",
										"</p>") ?>

								<div class="mt-5">
									<label for="phone1" class="form-label font-medium">TELEFONOS</label>
									<input id="phone1" type="text" name="phone[]" class="form-control"
										   placeholder="(51) 987 654"
										   value="<?php
										   if (!isset($settings->phone) || $p):
											   echo (isset($p) && !empty($p)) ? $p[0] : '';
										   else:
											   echo $phone[0];
										   endif;
										   ?>">
									<input id="phone2" type="text" name="phone[]" class="form-control mt-3"
										   placeholder="987654159"
										   value="<?php
										   if (!isset($settings->phone) || $p):
											   echo (isset($p) && !empty($p)) ? $p[1] : '';
										   else:
											   echo $phone[1];
										   endif;
										   ?>">
									<input id="phone3" type="text" name="phone[]" class="form-control mt-3"
										   placeholder="987654159"
										   value="<?php
										   if (!isset($settings->phone) || $p):
											   echo (isset($p) && !empty($p)) ? $p[2] : '';
										   else:
											   echo $phone[2];
										   endif;
										   ?>">
								</div>

							</div>
							<div class="col-span-12">
								<div class="mt-5">
									<label for="address" class="form-label font-medium">DIRECCIÓN</label>
									<input id="address" type="text" name="address" class="form-control"
										   placeholder="Av. San Martin - N° 555, Central - Puno, Perú"
										   value="<?= set_value("address", isset($settings->address) ? $settings->address : ''); ?>">
								</div>
								<?= form_error("address",
										"<p class='text-red-800 p-1' style='font-size: 13px; font-style: italic;'>
											<i class='fas fa-exclamation-circle'></i> ",
										"</p>") ?>
								<div class="mt-3">
									<label for="postal_code" class="form-label font-medium">CÓDIGO POSTAL</label>
									<input id="postal_code" name="postal_code" type="text" class="form-control"
										   placeholder="Codigo postal"
										   value="<?= set_value("postal_code", isset($settings->postal_code) ? $settings->postal_code : ''); ?>">
								</div>
							</div>

						</div>

					</div>
					<div class="w-52 mx-auto xl:mr-0 xl:ml-6">
						<div class="mt-5">
							<label for="logo" class="form-label font-medium">LOGO</label>

							<div class="border-2 shadow border-dashed shadow-sm border-gray-500 dark:border-dark-5 rounded-md p-5">
								<div class="h-16 relative image-fit cursor-pointer zoom-in mx-auto">
									<img class="rounded-md" id="preview_logo" alt="Logo"
										 src="<?= (isset($settings->logo) && !empty($settings->logo))
												 ? base_url() . $settings->logo
												 : base_url('assets/images/resources/client-img1-1.png') ?>">
								</div>
								<div class="mx-auto cursor-pointer relative mt-5">
									<button type="button" class="btn btn-primary browse w-full">Seleccionar Imagen
									</button>
									<input type="file" name="logo"
										   class="file w-full h-full top-0 left-0 absolute opacity-0">
								</div>
							</div>
						</div>

<!--						<div class="mt-5">-->
<!--							<label for="logo_white" class="form-label font-medium">LOGO WHITE</label>-->
<!---->
<!--							<div class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5">-->
<!--								<div class="h-16 relative image-fit cursor-pointer zoom-in mx-auto">-->
<!--									<img class="rounded-md" id="preview_logo_white" alt="Logo White"-->
<!--										 src="--><?//= base_url('assets/images/resources/client-img1-1.png') ?><!--">-->
<!--								</div>-->
<!--								<div class="mx-auto cursor-pointer relative mt-5">-->
<!--									<button type="button" class="btn btn-primary browse_white w-full">Seleccionar Imagen-->
<!--									</button>-->
<!--									<input type="file" name="logo_white"-->
<!--										   class="file_white w-full h-full top-0 left-0 absolute opacity-0">-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
					</div>

				</div>
				<hr class="mt-3">
				<button type="submit" class="btn btn-primary w-20 mt-3">Guardar</button>
			</div>
		</form>
	</div>
	<!-- END: Display Information -->

</div>

