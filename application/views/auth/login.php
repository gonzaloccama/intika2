<section>
	<div class="w-100 pt-170 pb-100 dark-layer3 opc7 position-relative">
		<div class="fixed-bg" style='background-image: url("<?= base_url().'assets/images/resources/pagetop-bg.jpg' ?>");'></div>
		<div class="container">
			<div class="page-top-wrap w-100">
				<h1 class="mb-0 pt-5">Login</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url() ?>" title="">Inicio</a></li>
					<li class="breadcrumb-item active text-white">Login</li>
				</ol>
			</div><!-- Page Top Wrap -->
		</div>
	</div>
</section>

<section class="m-auto col-md-6 pt-5 pb-5">
	<div class="container">
		<div class="card card-body shadow" style="border-radius: 0;">
			<div class="border-0 px-4 py-5">

				<form action="<?= base_url() ?>auth/login/validate" novalidate method="post"
					  enctype="multipart/form-data"
					  id="form_login" class="needs-validation">

					<div class="form-group">

						<div class="field-box w-100 email">
							<label><h6>EMAIL</h6></label>
							<input type="text" id="email" name="email" class="form-control"
							value="<?php echo set_value("email"); ?>">
							<div class="invalid-feedback ml-1"></div>
						</div>

					</div>
					<div class="form-group">
						<div class="field-box w-100 password">
							<label><h6>CONTRASEÑA</h6></label>
							<input type="password" id="password" name="password" class="form-control"
							value="<?php echo set_value("password"); ?>">
							<div class="invalid-feedback ml-1"></div>
						</div>
					</div>
					<div class="row px-3 mb-5 mt-5">
						<a href="#" class="ml-auto mb-0"><b>¿Has olvidado tu contraseña?</b></a>
					</div>
					<hr>
					<div class="text-center">
						<button type="submit" class="thm-btn bg-color1 btn-loader" role="button" aria-disabled="true">Iniciar sesión</button>
					</div><!-- /.text-center -->
				</form>
				<div class="session-invalid"></div>
			</div>
		</div>

	</div><!-- /.container -->
</section><!-- /.contact-info-one -->

<section>
	<div class="w-100 position-relative">
		<div class="container">
			<div
					class="getin-touch-wrap overlap-99 brd-rd5 style2 thm-layer opc8 w-100 overflow-hidden position-relative">
				<div class="fixed-bg" style='background-image: url("<?= base_url().'assets/images/resources/pallarax2.jpg' ?>");'></div>
				<div class="row align-items-center justify-content-between">
					<div class="col-md-7 col-sm-12 col-lg-5">
						<div class="getin-touch-title w-100">
							<span class="text-color18 d-block">¿Listo para comenzar?</span>
							<h2 class="mb-0">Ponte en contacto con nosotros</h2>
						</div>
					</div>
					<div class="col-md-5 col-sm-12 col-lg-4">
						<div class="getin-touch-btn text-right">
							<a class="thm-btn bg-color1" href="contact.html" title="">Suscríbase ahora<i
										class="flaticon-arrow-pointing-to-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
