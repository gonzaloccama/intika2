<!DOCTYPE html>

<html lang="en" class="light">
<!-- BEGIN: Head -->
<head>
	<meta charset="utf-8">
	<link href="dist/images/logo.svg" rel="shortcut icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		  content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
	<meta name="keywords"
		  content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
	<meta name="author" content="LEFT4CODE">
	<title>Intika | Admin | <?= $info['page_title'] ?></title>
	<!-- BEGIN: CSS Assets-->
	<link rel="stylesheet" href="<?= base_url('assets/css/all.min.css') ?>"/>
	<link rel="stylesheet" href="<?= base_url('assets/admin/dist/css/app.css') ?>"/>

	<script src="<?= base_url('assets/vue/vue.js') ?>"></script>

	<!-- END: CSS Assets-->

	<style>

		:root {
			--tw-text-opacity: 1;
		}

		.text-blue-300 {
			color: rgba(147, 197, 253, var(--tw-text-opacity));
		}

		.text-gray-400 {
			color: rgba(156, 163, 175, var(--tw-text-opacity));
		}

		.text-red-800 {
			color: rgba(153, 27, 27, var(--tw-text-opacity));
		}

		.img-attachment {
			margin: auto;
			box-shadow: 0 0 2px 0px #6B6B6B;
			padding: 2px;
		}
	</style>
</head>
<!-- END: Head -->
<body class="main">
<?php
$this->load->view('admin/mobile')
?>
<div class="flex">

	<?php
	$this->load->view('admin/side');
	$this->load->view($info['__content__']);
	?>
</div>

<!-- BEGIN: Delete Confirmation Modal -->
<div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body p-0">
				<div class="p-5 text-center">
					<i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
					<div class="text-3xl mt-5">¿Está seguro?</div>
					<div class="text-gray-600 mt-2 md:text-2xl">
						¿Realmente desea eliminar el registro?
						<br>
						Este proceso no se puede deshacer.
					</div>
				</div>
				<div class="px-5 pb-8 text-center">
					<button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancelar</button>
					<button type="button" class="btn btn-danger w-24 delete_">Eliminar</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END: Delete Confirmation Modal -->

<!-- BEGIN: JS Assets-->
<!--<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>-->
<!--<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>-->
<script src="<?= base_url('assets/admin/dist/js/app.js') ?>" id="myScript"></script>
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>


<script>
	const BASE_URL = "<?= base_url() ?>";
	const ADMIN_URL = BASE_URL + 'admin/';
</script>
<!-- END: JS Assets-->

<?php
$this->load->view($info['script']);
?>

</body>
</html>
