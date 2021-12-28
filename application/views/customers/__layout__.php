<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<link rel="icon" href="<?= base_url() . 'assets/images/resources/icon.png' ?>" sizes="35x35" type="image/png">
	<title>Intika | <?= $info['page_title'] ?></title>

	<link rel="stylesheet" href="<?= $this->config->item('assets') ?>css/all.min.css">
	<link rel="stylesheet" href="<?= $this->config->item('assets') ?>css/flaticon.css">
	<link rel="stylesheet" href="<?= $this->config->item('assets') ?>css/animate.min.css">
	<link rel="stylesheet" href="<?= $this->config->item('assets') ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= $this->config->item('assets') ?>css/bootstrap-select.min.css">
	<link rel="stylesheet" href="<?= $this->config->item('assets') ?>css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="<?= $this->config->item('assets') ?>css/perfect-scrollbar.css">
	<link rel="stylesheet" href="<?= $this->config->item('assets') ?>css/slick.css">
	<link rel="stylesheet" href="<?= $this->config->item('assets') ?>css/style.css">
	<link rel="stylesheet" href="<?= $this->config->item('assets') ?>css/responsive.css">
	<link rel="stylesheet" href="<?= $this->config->item('assets') ?>css/color.css">

	<link rel="stylesheet" href="<?= $this->config->item('assets') ?>tooltipz/css/mariner/zebra_tooltips.css">

	<link rel="stylesheet" href="<?= $this->config->item('assets') ?>css/customers.css">

	<link rel="stylesheet" href="<?= $this->config->item('assets') ?>owl/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= $this->config->item('assets') ?>owl/css/owl.theme.default.min.css">


	<link rel="stylesheet" href="<?= $this->config->item('assets') ?>toasty/toasty.css">

	<style>
		.logo .img-fluid {
			width: 148px;
		}
	</style>

	<style>

		.owl-carousel .item img {
			display: block;
			width: 100%;
		}

		.owl-carousel {
			margin-bottom: -25px;
			padding: 25px;
		}

		.item img {
			border-radius: 0px;
		}

		.image:hover {
			transform: scale(1.2);
		}

		.btn {
			box-shadow: 0 0 3px 0 #a7a7a7;
			border-radius: 0;
			border: none;
		}

		.btn-darkblue {
			background-color: #15224D;
		}

		.feat-img {
			height: 100%;
			width: 100%;
		}


		.thumb img {

			width: 270px; /* width of container */
			height: 320px; /* height of container */
			object-fit: cover;

			/*width: 270px; !* width of container *!*/
			/*height: 320px; !* height of container *!*/
			/*object-fit: cover;*/
			/*object-position: 20px 10px; !* try 20% 10% *!*/
		}

		.info-routes:hover {
			color: #c6c6c6;
		}

		.cart-data-box {
			margin-top: 15px;
			margin-bottom: 15px;
			border-radius: 0;
		}

		.field-box input,
		.field-box select,
		.field-box textarea {
			padding: 10px 12px 10px 12px;
			border: 1px solid lightgrey;
			border-radius: 0;
			margin-bottom: 5px;
			margin-top: 2px;
			width: 100%;
			box-sizing: border-box;
			color: #0b3158;
			font-size: 14px;
			letter-spacing: 1px
		}

		.field-box input,
		.field-box select {
			height: 40px;
		}

		.field-box input:focus,
		.field-box select:focus,
		.field-box textarea:focus {
			-moz-box-shadow: none !important;
			-webkit-box-shadow: none !important;
			box-shadow: none !important;
			border: 2px solid #053d60;
			outline-width: 0
		}

		.list-unstyled li a:hover {
			color: #0774b8;
		}

		.proj-info {
			margin-bottom:auto;
		}

	</style>

</head>
<body>
<main>

	<?php $this->load->view('customers/template/header'); ?>

	<?php $this->load->view($info['content']) ?>

	<?php $this->load->view('customers/template/footer'); ?>

</main><!-- Main Wrapper -->

<script src="<?= $this->config->item('assets') ?>js/jquery.min.js"></script>
<script src="<?= $this->config->item('assets') ?>js/popper.min.js"></script>
<script src="<?= $this->config->item('assets') ?>js/bootstrap.min.js"></script>
<script src="<?= $this->config->item('assets') ?>js/bootstrap-select.min.js"></script>
<script src="<?= $this->config->item('assets') ?>js/wow.min.js"></script>
<script src="<?= $this->config->item('assets') ?>js/counterup.min.js"></script>
<script src="<?= $this->config->item('assets') ?>js/jquery.fancybox.min.js"></script>
<script src="<?= $this->config->item('assets') ?>js/perfect-scrollbar.min.js"></script>
<script src="<?= $this->config->item('assets') ?>js/slick.min.js"></script>
<script src="<?= $this->config->item('assets') ?>js/particles.min.js"></script>
<script src="<?= $this->config->item('assets') ?>js/particle-int.js"></script>
<script src="<?= $this->config->item('assets') ?>js/custom-scripts.js"></script>

<script src="<?= $this->config->item('assets') ?>owl/owl.carousel.min.js"></script>

<script src="<?= $this->config->item('assets') ?>tooltipz/zebra_tooltips.min.js"></script>

<script src="<?= $this->config->item('assets') ?>toasty/toasty.js"></script>

<script>
	const BASE_URL = "<?= base_url() ?>";

	function notification_toast(mssg, type_mssg) {
		var options = {
			autoClose: true,
			progressBar: true,
		};

		var toast = new Toasty(options);
		toast.configure(options);

		let html_ = `
		<div class="row align-items-center">
			<span class="fas fa-exclamation-circle text-center fa-2x col-sm-2"></span>
			<span class="align-items-center col-sm-10">${mssg}</span>
		</div>
		`;

		switch (type_mssg) {
			case 'error':
				toast.error(html_);
				break;
			case 'success':
				toast.success(html_);
				break;
			case 'info':
				toast.info(html_);
				break;
			case 'warning':
				toast.warning(html_);
				break;
		}

	}

	function disabled_btn_(disabled, txt) {
		if (disabled) {
			$('.btn-loader').html(
					`<span class="spinner-grow spinner-grow-sm mr-2"></span>
					${txt}`
			).prop('disabled', disabled);
		} else {
			$('.btn-loader').html(
					`${txt}`
			).prop('disabled', false);
		}
	}
</script>

<?php $this->load->view($info['__script__']); ?>

</body>
</html>
