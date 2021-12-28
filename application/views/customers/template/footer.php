<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	 aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<form action="" novalidate method="post" id="register-information" class="needs-validation">
				<div class="modal-body">

					<div class="col-md-12">
						<div class="cart-data-box w-100">
							<h3 class="mb-0 pb-3 text-center">Solicitar información</h3>
							<input type="hidden" id="route" name="route">
							<div class="field-box w-100 names">
								<label>NOMBRES Y APELLIDOS</label>
								<input type="text" id="names" name="names" class="form-control">
								<div class="invalid-feedback ml-1"></div>
							</div>
							<div class="field-box w-100 email">
								<label>EMAIL</label>
								<input type="text" id="email" name="email" class="form-control">
								<div class="invalid-feedback ml-1"></div>
							</div>
							<div class="field-box w-100">
								<label>TELEFONO</label>
								<div class="input-group mb-3 celular">
									<div class="input-group-prepend">
										<select class="form-control pt-1 select2bs4 selectpicker"
												data-live-search="true" name="country_code" id="country_code"
										>
											<?php foreach ($ddis as $ddi): ?>
												<option value="<?= $ddi->code ?>"
														data-tokens="<?= $ddi->country ?>" <?= $ddi->code != '51' ?: 'selected' ?>>
													+<?= $ddi->code ?>
												</option>
											<?php endforeach; ?>
										</select>
									</div>
									<input type="text" id="celular" name="celular" class="form-control" placeholder="">
									<div class="invalid-feedback ml-1"></div>
								</div>
							</div>
							<div class="field-box w-100">
								<label>MENSAJE</label>
								<textarea name="message" id="message" class="form-control" cols="30"
										  rows="3"></textarea>
							</div>

						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary btn-loader">Enviar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<footer>
	<div class="w-100 bg-color5 pt-195 pb-10 position-relative">
		<div class="particles-js" id="prtcl2"></div>
		<div class="container">
			<div class="footer-data w-100">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-lg-3">
						<div class="widget w-100">
							<div class="logo w-100">
								<h1 class="mb-0"><a href="index.html" title="Home">
										<img class="img-fluid"
											 src="<?=
											 (isset($settings->logo) && !empty($settings->logo_white))
													 ? base_url() . $settings->logo_white
													 : base_url() . 'assets/images/resources/logo-white.png' ?>"
											 alt="Logo"
											 srcset="<?=
											 (isset($settings->logo) && !empty($settings->logo_white))
													 ? base_url() . $settings->logo_white
													 : base_url() . 'assets/images/resources/logo-white.png' ?>"></a>
								</h1>
							</div><!-- Logo -->
							<p class="mb-0">
								<b><?= isset($settings->name) && !empty($settings->name) ? $settings->name : '' ?>: </b>
								<?= isset($settings->abstract) && !empty($settings->abstract) ? $settings->abstract : '' ?></p>
							<div class="social-links2 d-inline-block">
								<a href="javascript:void(0);" title="Facebook" target="_blank"><i
											class="fab fa-facebook"></i></a>
								<a href="javascript:void(0);" title="Twitter" target="_blank"><i
											class="fab fa-twitter"></i></a>
								<a href="javascript:void(0);" title="Instagram" target="_blank"><i
											class="fab fa-instagram"></i></a>
								<a href="javascript:void(0);" title="WhatsApp" target="_blank"><i
											class="fab fa-whatsapp"></i></a>
							</div>
						</div>
					</div>
					<?php
					if (isset($settings) && !empty($settings)):
						$phones = json_decode($settings->phone);
						$emails = json_decode($settings->email);
					endif;
					?>
					<div class="col-md-6 col-sm-6 col-lg-3 order-lg-1">
						<div class="widget w-100">
							<div class="visitor-stats w-100">
								<div class="widget w-100">
									<h3>Contactanos</h3>
									<ul class="mb-0 list-unstyled w-100">
										<?php
										if (isset($phones)):
											foreach ($phones as $phone):
												if ($phone != ''):
													?>
													<li style="font-size: 14px;"><b>Telefono: </b>
														<a href="" title="">+51 <?= $phone ?></a>
													</li>
												<?php
												endif;
											endforeach;
										else:
											?>
											<li style="font-size: 14px;"><b>Telefono: </b>
												<a href="" title=""> Sin telefono </a>
											</li>
										<?php
										endif;
										if (isset($emails)):
											foreach ($emails as $email):
												if ($email != ''):
													?>
													<li style="font-size: 14px;"><b>Email: </b>
														<a href="" title=""><?= $email ?></a>
													</li>
												<?php
												endif;
											endforeach;
										else:
											?>
											<li style="font-size: 14px;"><b>Email: </b>
												<a href="" title=""> Sin Correo </a>
											</li>
										<?php
										endif;
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-lg-6">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-lg-4">
								<div class="widget w-100">
									<h3>Acerca de Nosotros</h3>
									<ul class="mb-0 list-unstyled w-100">
										<li><a href="" title="">Nuestros servicios</a></li>
									</ul>
								</div>
							</div>


						</div>
					</div>
				</div>
			</div><!-- Footer Data -->
		</div>
	</div>
</footer>
<div class="copyright w-100 text-center bg-color6 position-relative">
	<div class="container">
		<p class="mb-0">© Copyright <b
					class="text-white"><?= isset($settings->name) && !empty($settings->name) ? $settings->name : '' ?></b>
			Todos los derechos reservados - by:
			<a
					href="https://onelcn.com" title="">@Onelcn</a>.
		</p>
	</div>
</div><!-- Copyright -->
