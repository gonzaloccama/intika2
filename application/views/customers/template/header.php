<header class="stick style2 w-100">
	<!--	<div class="topbar bg-color5 w-100">-->
	<!--		<div class="container">-->
	<!--			<div class="topbar-inner d-flex flex-wrap justify-content-between align-items-center w-100">-->
	<!--				<ul class="topbar-info-list mb-0 list-unstyled d-inline-flex">-->
	<!--					<li><i class="thm-clr fas fa-map-marker-alt"></i>27 Division, mirpur-12, pallbi.</li>-->
	<!--					<li><i class="thm-clr far fa-envelope-open"></i>Email: <a href="javascript:void(0);" title="">bioxin0011@gmail.com</a>-->
	<!--					</li>-->
	<!--				</ul>-->
	<!--				<ul class="topbar-links mb-0 list-unstyled d-inline-flex">-->
	<!--					<li><a href="javascript:void(0);" title="">Careers</a></li>-->
	<!--					<li><a href="javascript:void(0);" title="">Help Desk</a></li>-->
	<!--					<li><a href="javascript:void(0);" title="">Login</a></li>-->
	<!--				</ul>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</div>-->
	<div class="logo-info-bar-wrap w-100">
		<div class="container">
			<div class="logo-info-bar-inner w-100 d-flex flex-wrap justify-content-between align-items-center">
				<div class="logo-social d-inline-flex flex-wrap justify-content-between align-items-center">
					<div class="logo">
						<h1 class="mb-0">
							<a href="<?= base_url() ?>" title="Home">
								<img class="img-fluid logo-img"
									 src="<?=
									 (isset($settings->logo) && !empty($settings->logo_white))
											 ? base_url() . $settings->logo_white
											 : base_url() . 'assets/images/resources/logo-white.png' ?>" alt="Logo"
									 srcset="<?=
									 (isset($settings->logo) && !empty($settings->logo_white))
											 ? base_url() . $settings->logo_white
											 : base_url() . 'assets/images/resources/logo-white.png' ?>">
							</a>
						</h1>
					</div><!-- Logo -->

					<div class="social-links">

						<?php
						   $socials =json_decode( $settings->social_media);
						?>

						<a href="<?= $socials->facebook ?>" title="Facebook" target="_blank">
							<i class="fab fa-facebook-f"></i>
						</a>

						<a href="<?= $socials->twitter ?>" title="Twitter" target="_blank">
							<i class="fab fa-twitter"></i>
						</a>

						<a href="https://api.whatsapp.com/send?phone=51<?= $socials->whatsapp ?>&text=Hola%20Intika%20Travel" title="WhatsApp" target="_blank">
							<i class="fab fa-whatsapp"></i>
						</a>

						<a href="<?= $socials->instagram ?>" title="Instagram" target="_blank">
							<i class="fab fa-instagram"></i>
						</a>
					</div>
				</div>
				<div class="top-info-wrap d-inline-flex flex-wrap justify-content-between align-items-center">
					<div class="call-us">
						<i class="text-white flaticon-phone-call"></i>
						<span>Telefono:</span>
						<strong><?php
							if (isset($settings) && !empty($settings)):
								$phone = json_decode($settings->phone);
								echo '+51 ' . $phone[0];
							else:
								echo 'Sin telefono';
							endif;

							?></strong>
					</div>
					<div class="add-cart">
						<?php
						if ($this->session->userdata('is_logged')):
							?>
							<a href="<?= base_url() . 'admin/routes' ?>" title="">
								<i class="thm-bg fas fa-user"></i>
								<?= $this->session->userdata('name') ?>
								<span class="d-block">(admin)</span>
							</a>
						<?php
						else:
							?>
							<a href="<?= base_url() . 'auth/login' ?>" title="">
								<i class="thm-bg fas fa-user"></i>
								Login
								<span class="d-block">(invitado)</span>
							</a>
						<?php
						endif;
						?>
					</div>

				</div>
			</div>
		</div>
	</div><!-- Logo Info Bar Wrap -->
	<div class="menu-wrap opc8">
		<div class="container">
			<nav class="d-inline-flex justify-content-between align-items-center w-100">
				<div class="header-left">
					<ul class="mb-0 list-unstyled d-inline-flex">
						<li class=""><a href="<?= base_url() ?>" title="">Inicio</a></li>
						<li><a href="javascript:;" title="">Nosotros</a></li>

						<li><a href="javascript:;" title="">Contactanos</a></li>
					</ul>
				</div>
				<div class="header-right-btns">
					<a class="get-quote info-model" href="javascript:void(0);" title="" data-id="0"
					   data-toggle="modal" data-target="#exampleModalCenter">
						<i class="far fa-comments"></i>
						Pedir información
						<i class="flaticon-arrow-pointing-to-right"></i>
					</a>
				</div>
			</nav>
		</div>
	</div><!-- Menu Wrap -->
</header><!-- Header -->
<div class="sticky-menu opc8" style="opacity: 0.9;">
	<div class="container">
		<div class="sticky-menu-inner d-flex flex-wrap align-items-center justify-content-between w-100">
			<div class="logo">
				<h1 class="mb-0">
					<a href="<?= base_url() ?>" title="Home">
						<img class="img-fluid" src="<?=
						(isset($settings->logo) && !empty($settings->logo))
								? base_url() . $settings->logo
								: base_url() . 'assets/images/resources/logo.png' ?>" alt="Logo"
							 srcset="<?=
							 (isset($settings->logo) && !empty($settings->logo))
									 ? base_url() . $settings->logo
									 : base_url() . 'assets/images/resources/logo.png' ?>">
					</a>
				</h1>
			</div><!-- Logo -->
			<nav class="d-inline-flex justify-content-between align-items-center">
				<div class="header-left">
					<ul class="mb-0 list-unstyled d-inline-flex">
						<li class=""><a href="<?= base_url() ?>" title="">Inicio</a>
						</li>
						<li><a href="javascript:;" title="">Nosotros</a></li>

						<li><a href="javascript:;" title="">Contactanos</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div><!-- Sticky Menu -->
<div class="rspn-hdr">
	<div class="rspn-mdbr">

		<div class="rspn-scil">
			<a href="<?= base_url() . 'admin/routes' ?>"><i class="fas fa-user"></i></a>
		</div>
		<form class="rspn-srch">
			<input type="text" placeholder="Buscar...">
			<button type="submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
	<div class="lg-mn">
		<div class="logo"><a href="<?= base_url() ?>" title="Home"><img
						src="<?=
						(isset($settings->logo) && !empty($settings->logo))
								? base_url() . $settings->logo
								: base_url() . 'assets/images/resources/logo.png' ?>" alt="Logo"></a></div>
		<div class="rspn-cnt">
			<span><i class="thm-clr far fa-envelope-open"></i><a href="javascript:void(0);"
																 title="">support@intika.com</a></span>
			<span><i class="thm-clr fas fa-map-marker-alt"></i>27 Division, Puno, Perú.</span>
		</div>
		<span class="rspn-mnu-btn"><i class="fa fa-list-ul"></i></span>
	</div>
	<div class="rsnp-mnu">
		<span class="rspn-mnu-cls"><i class="fa fa-times"></i></span>
		<ul class="mb-0 list-unstyled w-100">
			<li class="menu-item-has-children"><a href="<?= base_url() ?>" title="">Inicio</a></li>
			<li><a href="javascript:;" title="">Nosotros</a></li>

			<li><a href="javascript:;" title="">Contactanos</a></li>
		</ul>
	</div><!-- Responsive Menu -->
</div><!-- Responsive Header -->
