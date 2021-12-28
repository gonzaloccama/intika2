<div class="col-span-12 lg:col-span-8 xxl:col-span-9">
	<!-- BEGIN: Personal Information -->
	<div class="intro-y box mt-5">
		<div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
			<h2 class="font-medium text-base mr-auto">
				<?= $info['setting_title'] ?>
			</h2>
		</div>
		<form method="post" enctype="multipart/form-data">
			<div class="p-5">
				<div class="grid grid-cols-12 gap-x-5">
					<div class="col-span-12 xl:col-span-12">
						<?php
						$fields = array('abstract' => 'Resumen', 'mission' => 'Misión', 'vision' => 'Visión');
						if (isset($settings) && !empty($settings)):
							$others['abstract'] = $settings->abstract;
							$others['mission'] = $settings->mission;
							$others['vision'] = $settings->vision;
						endif;

						$i = 0;
						foreach ($others as $key => $other):
							?>
							<div class="mt-3">
								<label for="<?= $key ?>"
									   class="form-label font-medium uppercase"><?= $fields[$key] ?></label>
								<textarea id="<?= $key ?>" name="<?= $key ?>" rows="4" class="form-control"
										  placeholder="<?= $fields[$key] ?>"><?= set_value("$key", isset($other) ? $other : ''); ?></textarea>
							</div>
							<?= form_error($key,
								"<p class='text-red-800 p-1' style='font-size: 13px; font-style: italic;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</p>") ?>
						<?php
						endforeach;
						?>
					</div>


				</div>
				<hr class="mt-4">
				<div class="flex justify-end mt-4">
					<button type="submit" class="btn btn-primary w-20 mr-auto">Guardar</button>
				</div>
			</div>
		</form>
	</div>
	<!-- END: Personal Information -->
</div>
