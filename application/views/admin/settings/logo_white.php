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


					<div class="w-52 mx-auto xl:mr-0 xl:ml-6">
						<div class="mt-5 mb-5">
							<label for="logo" class="form-label font-medium">LOGO</label>

							<div class="border-2 w-full shadow border-dashed shadow-sm border-gray-500 dark:border-dark-5 rounded-md p-5">
								<div class="h-16 relative image-fit cursor-pointer zoom-in mx-auto">
									<img class="rounded-md mx-auto" id="preview_logo" alt="Logo"
										 src="<?= (isset($settings->logo_white) && !empty($settings->logo_white))
											 ? base_url() . $settings->logo_white
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

					</div>

				</div>
				<hr class="mt-3">
				<button type="submit" class="btn btn-primary w-20 mt-3">Guardar</button>
			</div>
		</form>
	</div>
	<!-- END: Display Information -->

</div>

