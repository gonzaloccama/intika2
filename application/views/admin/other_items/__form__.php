<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- BEGIN: FAQ Content -->
<div class="intro-y col-span-12 lg:col-span-8 xl:col-span-9">
	<div class="intro-y box lg:mt-5">
		<div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
			<h2 class="font-medium text-base mr-auto">
				<?= $info['other_title'] ?>
			</h2>
		</div>
		<!-- BEGIN: Form Layout -->
		<form method="post" enctype="multipart/form-data">
			<div class="intro-y box p-5">
				<div class="flex">
					<label for="title" class="font-medium placeholder-elements"><?= $info['other_name'] ?></label>
				</div>
				<div hidden class="name-elements"><?= $info['column'] ?></div>
				<div class="add-elements">

					<div class="input-group mb-3 form-group">
						<input disabled type="text" class="form-control text-center w-20"
							   placeholder="1"
							   value="1">

						<input type="text" class="form-control" id="<?= $info['column'] ?>" name="<?= $info['column'] ?>[]"
							   placeholder="<?= $info['other_name'] ?> 1"
							   value="<?=
							   (isset($columns) && !empty($columns))
									   ? $columns[0]
									   : '';
							   ?>">

						<div class="">
							<button class="btn btn-outline-primary ml-1 add_form_elements h-full" type="button">
								<i
										class="fas fa-plus"></i></button>
						</div>
					</div>

					<?php
					if (isset($columns) && !empty($columns)):
					for ($i = 1; $i < count($columns); $i++):
						?>
						<div class="input-group mb-3 form-group">
							<input disabled type="text" class="form-control text-center w-20" placeholder="<?= ($i + 1) ?>" value="<?= ($i + 1) ?>">
							<input type="text" class="form-control" id="destinations<?= $i ?>"
								   name="<?= $info['column'] ?>[]"
								   placeholder="<?= $info['other_name'] ?> <?= ($i + 1) ?>" value="<?= $columns[$i] ?>">
							<div class="">
								<button class="btn btn-outline-danger ml-1 h-full delete_elements"
										type="button"><i class="fas fa-minus"></i></button>
							</div>
						</div>
					<?php
					endfor;
					endif;
					?>

				</div>

				<div class="text-right mt-5">
					<button type="submit" class="btn btn-primary w-24">GUARDAR</button>
				</div>
			</div>
			<!-- END: Form Layout -->
		</form>
	</div>
</div>
<!-- END: FAQ Content -->
