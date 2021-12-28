<!-- BEGIN: Content -->
<div class="content">

	<?php $this->load->view('admin/top_bar'); ?>

	<!-- END: Top Bar -->

	<div class="intro-y flex items-center mt-8">
		<h2 class="text-lg font-medium mr-auto">
			Agregar Nueva Ruta
		</h2>
	</div>

	<?php
	    $this->load->view('admin/routes/__form__');
	?>

</div>
<!-- END: Content -->

