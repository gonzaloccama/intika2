<!-- BEGIN: Content -->
<div class="content">

	<?php $this->load->view('admin/top_bar'); ?>

	<!-- END: Top Bar -->
	<h2 class="intro-y text-lg font-medium mt-10">
		Manual de usuario
	</h2>

	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="col-span-12 lg:col-span-12 xxl:col-span-12">
			<div class="intro-y box lg:mt-5 p-5">
				<object
						data="<?= base_url($manual) ?>"
						type="application/pdf"
						width="100%"
						height="550">
					<iframe
							src="<?= base_url($manual) ?>#page=1"
							width="100%"
							height="550"
							style="border: none;">
						<p>Your browser does not support PDFs.
							<a href="<?= base_url($manual) ?>">Download the PDF</a>.</p>
					</iframe>
				</object>
			</div>
		</div>
	</div>

</div>
<!-- END: Content -->
