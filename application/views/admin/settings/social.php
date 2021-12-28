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
						$socials = array('facebook', 'whatsapp', 'youtube', 'twitter', 'telegram', 'instagram');
						if (isset($settings) && !empty($settings)):
							$social_media = json_decode($settings->social_media, true);
						endif;

						$i = 0;
						foreach ($socials as $social):
							?>
							<div class="<?= !$i++ ? '' : 'mt-3' ?>">
								<label for="<?= $social ?>"
									   class="form-label font-medium uppercase"><?= $social ?></label>
								<input id="<?= $social ?>" type="text" class="form-control"
									   name="social_media[<?= $social ?>]" placeholder="<?= $social ?>"
									   value="<?= isset($social_media[$social]) && !empty($social_media[$social])
											   ? $social_media[$social]
											   : ''
									   ?>">
							</div>
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
