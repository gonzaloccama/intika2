<!-- BEGIN: Content -->
<div class="content">

	<?php $this->load->view('admin/top_bar'); ?>

	<!-- END: Top Bar -->

	<div class="intro-y flex items-center mt-8">
		<h2 class="text-lg font-medium mr-auto">
			Editar <?= $slider->title ?>
		</h2>
	</div>
	<div class="grid grid-cols-12 gap-6 mt-5 ">
		<div class="intro-y col-span-12 lg:col-span-6">
			<!-- BEGIN: Form Layout -->
			<form method="post" enctype="multipart/form-data">
				<div class="intro-y box p-5">
					<div>
						<div class="flex">
							<label for="title" class="font-medium">TITULO</label>
							<span class="sm:ml-auto text-right text-gray-600 opacity-10 pr-1 validation-title"
								  style="font-size: 12px"></span>

						</div>
						<input id="title" name="title" type="text" class="form-control w-full"
							   placeholder="Nombre del slide" value="<?= set_value("title", "$slider->title"); ?>">
						<?= form_error("title",
								"<p class='text-red-800 p-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</p>") ?>
					</div>


					<div class="mt-5">
						<div class="flex">
							<label for="description" class="font-medium">DESCRIPCIÓN CORTA</label>
							<span class="sm:ml-auto text-right text-gray-600 opacity-10 pr-1 validation-description"
								  style="font-size: 12px"></span>
						</div>
						<textarea id="description" name="description" class="form-control w-full" cols="30"
								  rows="2"><?= set_value("description", "$slider->description_short"); ?></textarea>
						<?= form_error("description",
								"<p class='text-red-800 p-1' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</p>") ?>
					</div>

					<?php
					if (isset($slider->attachment) && !empty($slider->attachment)):
						$tmp = explode('/', $slider->attachment);
						$attachment = end($tmp);
					endif;
					?>

					<div class="mt-5">
						<label for="" class="font-medium">IMAGEN <span class="text-red-800">(1920 x 1080)</span></label>
						<div class="form-group">

							<div id="image-form">

								<div class="p-4 w-full zoom-in">
									<img class="img-attachment rounded -intro-x"
										 src="<?=
										 $slider->attachment != '' ? base_url() . $slider->attachment :
												 base_url() . 'assets/images/resources/slide1.jpg'
										 ?>"
										 alt="" id="preview_attachment" width="360">
								</div>

								<div class="input-group my-3">
									<input type="file" name="attachment" class="file" accept="image/*" hidden>
									<input type="text" class="form-control w-full" disabled placeholder="Cargar imagen"
										   id="attachment" value="<?= (isset($attachment) && !empty($attachment))
											? $attachment : '' ?>">
									<div class="input-group-append">
										<button type="button" class="browse btn btn-primary">Buscar...</button>
									</div>
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
									echo $slider->status ? 'checked="checked"' : '';
								endif;
								?>
							>

						</div>
					</div>

					<div class="text-right mt-5">
						<a href="<?= base_url('admin/slider') ?>" class="btn btn-outline-secondary w-24 mr-1">REGRESAR</a>
						<button type="submit" class="btn btn-primary w-24">GUARDAR</button>
					</div>
				</div>
				<!-- END: Form Layout -->
			</form>
		</div>
	</div>
</div>
<!-- END: Content -->
