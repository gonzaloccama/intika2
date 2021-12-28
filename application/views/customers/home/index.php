<section>
	<div class="w-100 position-relative">
		<div class="feat-wrap style2 position-relative w-100">
			<div class="feat-caro">
				<?php
				if (isset($sliders) && !empty($sliders)):
					foreach ($sliders as $slider):
						?>
						<div class="feat-item text-center">
							<div class="feat-img position-absolute"
								 style="background-image: url(<?= base_url() . $slider->attachment ?>);">
							</div>
							<div class="container">
								<div class="feat-cap">
									<h1 class="mb-0" style="height: 140px"><?= $slider->title ?></h1><br>
									<p class="mb-0" style="height: 60px"><?= $slider->description_short ?></p>
								</div>
							</div>
						</div>
					<?php
					endforeach;
				else:
					?>
					<div class="feat-item text-center">
						<div class="feat-img position-absolute"
							 style="background-image: url(<?= base_url() . 'assets/images/resources/slide1.jpg' ?>);">
						</div>
						<div class="container">
							<div class="feat-cap">
								<h1 class="mb-0" style="height: 140px"></h1><br>
								<p class="mb-0" style="height: 60px"></p>
							</div>
						</div>
					</div>
				<?php
				endif;
				?>
			</div>
		</div><!-- Featured Area Wrap -->
	</div>
</section>

<div class="w-100 position-relative">
	<div class="container">
		<!--		thm-layer opc8 -->
		<div
				class="getin-touch-wrap overlap-99 brd-rd5 overlap-100 style-gallery w-100 overflow-hidden position-relative"
				style="background-color: #f9f9f9"
		>

			<div class="row <?= (isset($routes) && !empty($routes)) ? count($routes) > 6 ?: 'pb-4' : 'pb-4' ?>">

				<div class="owl-carousel">

					<?php
					if (isset($routes) && !empty($routes)):
						foreach ($routes as $route):
							?>

							<div class="item">
								<a href="javascript:;" class="zebra_tooltips top"
								   title="
							   <?php
								   $_destinations = json_decode($route->destination);
								   $de = '';
								   $c = 1;
								   $opening = '';
								   $ending = '';
								   $_des_ = array();

								   foreach ($_destinations as $destination):
									   ($c == count($_destinations))
											   ? $de .= $destination . '.'
											   : $de .= $destination . ', ';
									   $c++;
								   endforeach;

								   echo "
									<div class='top'>
										<img class='card-img-top' src='" . base_url() . $route->attachment . "' alt='Bologna'>
										<div class='card-body'>
											<h6 class='card-title'>" . $route->name . "</h6>
											
											<hr class='mt-1 mb-1'>
											
											<b class='card-subtitle mb-2'>Trayectoria: </b><span class='text-muted'>" . $de . "</span>
											
											<hr class='mt-1 mb-1'>
											
											<div class=''>											
												<div><b>Origen : </b><b class='text-muted'>" . $route->opening . "</b></div>
												<div><b>Destino : </b><b class='text-muted'>" . $route->ending . "</b></div>
											</div>
											<hr class='mt-1 mb-1'>
											
											<p class='card-text'>" . $route->description . "</p>
											
											<div class='text-center'>
												<button type='button' class='btn btn-primary btn-darkblue info-model'
													data-id='" . $route->id . "'										
													data-toggle='modal' data-target='#exampleModalCenter'>
													<i class='fas fa-money-bill-wave'></i> Comprar
												</button>
											</div>																						
										</div>
									</div>
									<script>
										$(document).ready(function (){
											$('.info-model').click( function () {
												var data_id = $(this).attr('data-id');
												$('#route').val(data_id)
											});
										});							
									</script>
							       ";
								   ?>
							">
									<div class="card shadow">
										<img class="image card-img"
											 src="<?= base_url() . $route->attachment ?>"
											 alt="image"/>
									</div>
								</a>
							</div>

						<?php
						endforeach;
					else:
						?>
						<div class="item">
							<a href="javascript:;" class="zebra_tooltips top"
							   title="
							   <?php

							   echo "
									<div class='top'>
										<img class='card-img-top' src='" . base_url() . 'assets/images/resources/post-img1-1.jpg' . "' alt='Bologna'>
										<div class='card-body'>
											<h6 class='card-title'></h6>
											
											<hr class='mt-1 mb-1'>
											
											<b class='card-subtitle mb-2'>Trayectoria: </b><span class='text-muted'></span>
											
											<hr class='mt-1 mb-1'>
											
											<div class=''>											
												<div><b>Origen : </b><b class='text-muted'></b></div>
												<div><b>Destino : </b><b class='text-muted'></b></div>
											</div>
											<hr class='mt-1 mb-1'>
											
											<p class='card-text'></p>
											
											<div class='text-center'>
												<button type='button' class='btn btn-primary btn-darkblue info-model'
													data-id=''										
													data-toggle='modal' data-target='#exampleModalCenter'>
													<i class='fas fa-money-bill-wave'></i> Comprar
												</button>
											</div>																						
										</div>
									</div>
									<script>
										$(document).ready(function (){
											$('.info-model').click( function () {
												var data_id = $(this).attr('data-id');
												$('#route').val(data_id)
											});
										});							
									</script>
							       ";
							   ?>
							">
								<div class="card shadow">
									<img class="image card-img"
										 src="<?= base_url() . 'assets/images/resources/post-img1-1.jpg' ?>"
										 alt="image"/>
								</div>
							</a>
						</div>
					<?php
					endif;
					?>
				</div>
			</div>
		</div>
	</div>


	<section>
		<div class="w-100 pt-155 paralx-70 blue-layer opc7 position-relative">
			<div class="fixed-bg"
				 style="background-image: url(<?= base_url() . 'assets/images/resources/pallarax.jpg' ?>);"></div>
			<div class="container">
				<div class="sec-title pt-5 w-100">
					<div class="sec-title-inner d-inline-block">
						<h3 class="mb-0">Nuestro servicio de rutas</h3>
					</div>
				</div>
			</div>
			<div class="proj-wrap px-70 w-100">
				<div class="row proj-caro">
					<?php
					if (isset($routes) && !empty($routes)):
						foreach ($routes as $route):
							?>
							<div class="col-md-4 col-sm-6 col-lg-3">
								<div class="proj-box position-relative w-100">
									<div class="proj-thumb overflow-hidden w-100 thumb">
										<a href="project-detail.html" title="">
											<img class="img-fluid w-100" src="<?= $route->attachment ?>"
												 alt="Project Image 1">
										</a>
									</div>
									<div class="proj-info position-absolute">
										<i class="fas fa-globe-americas"></i>
										<h3 class="mb-3">
											<a href="project-detail.html" title="">
												<?= $route->name ?>
											</a>
										</h3>
									</div>
								</div>
							</div>
						<?php
						endforeach;
					else:
						?>
						<div class="col-md-4 col-sm-6 col-lg-3">
							<div class="proj-box position-relative w-100">
								<div class="proj-thumb overflow-hidden w-100 thumb">
									<a href="project-detail.html" title="">
										<img class="img-fluid w-100"
											 src="<?= base_url() . 'assets/images/resources/proj-img1-1.jpg' ?>"
											 alt="Project Image 1">
									</a>
								</div>
								<div class="proj-info position-absolute">
									<i class="fas fa-globe-americas"></i>
									<h3 class="mb-3">
										<a href="project-detail.html" title="">
											<?= 'Sin Contenido' ?>
										</a>
									</h3>
								</div>
							</div>
						</div>
					<?php
					endif;
					?>
				</div>
			</div><!-- Projects Wrap -->
		</div>
	</section>

	<section>
		<div class="w-100 pt-100 pb-50 position-relative">
			<div class="container">
				<div class="sec-title w-100">
					<div class="sec-title-inner d-inline-block">
						<h3 class="mb-0">Nuestros destinos</h3>
					</div>
				</div>
				<div class="blog-wrap w-100">
					<div class="row post-caro">


						<div class="col-md-6 col-sm-6 col-lg-4">
							<div class="post-box w-100 text-center">
								<div class="post-img overflow-hidden w-100">
									<a href="blog-detail.html" title="">
										<img class="img-fluid w-100" src="assets/images/resources/2.jpg"
											 alt="Post Image 1">
									</a>
								</div>
								<div class="post-info w-100">
									<h3 class="mb-0">
										<a href="blog-detail.html" title="">PUNO</a>
									</h3>
									<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
									<!--									<div class="post-info-bottom d-flex flex-wrap w-100">-->
									<!--										<span class="d-inline-block"><i class="far fa-user"></i><a-->
									<!--													href="javascript:void(0);" title="">Jibon Hasan</a></span>-->
									<!--										<ul class="post-meta mb-0 list-unstyled d-inline-flex">-->
									<!--											<li><i class="far fa-calendar-alt"></i>July 03, 2020</li>-->
									<!--											<li><i class="fas fa-comment-dots"></i>02</li>-->
									<!--										</ul>-->
									<!--									</div>-->
								</div>
							</div>
						</div>

						<div class="col-md-6 col-sm-6 col-lg-4">
							<div class="post-box w-100 text-center">
								<div class="post-img overflow-hidden w-100">
									<a href="blog-detail.html" title="">
										<img class="img-fluid w-100" src="assets/images/resources/1.jpg"
											 alt="Post Image 1">
									</a>
								</div>
								<div class="post-info w-100">
									<h3 class="mb-0">
										<a href="blog-detail.html" title="">CUSCO</a>
									</h3>
									<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
									<!--									<div class="post-info-bottom d-flex flex-wrap w-100">-->
									<!--										<span class="d-inline-block"><i class="far fa-user"></i><a-->
									<!--													href="javascript:void(0);" title="">Jibon Hasan</a></span>-->
									<!--										<ul class="post-meta mb-0 list-unstyled d-inline-flex">-->
									<!--											<li><i class="far fa-calendar-alt"></i>July 03, 2020</li>-->
									<!--											<li><i class="fas fa-comment-dots"></i>02</li>-->
									<!--										</ul>-->
									<!--									</div>-->
								</div>
							</div>
						</div>

						<div class="col-md-6 col-sm-6 col-lg-4">
							<div class="post-box w-100 text-center">
								<div class="post-img overflow-hidden w-100">
									<a href="blog-detail.html" title="">
										<img class="img-fluid w-100" src="assets/images/resources/4.jpg"
											 alt="Post Image 1">
									</a>
								</div>
								<div class="post-info w-100">
									<h3 class="mb-0">
										<a href="blog-detail.html" title="">LIMA</a>
									</h3>
									<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
									<!--									<div class="post-info-bottom d-flex flex-wrap w-100">-->
									<!--										<span class="d-inline-block"><i class="far fa-user"></i><a-->
									<!--													href="javascript:void(0);" title="">Jibon Hasan</a></span>-->
									<!--										<ul class="post-meta mb-0 list-unstyled d-inline-flex">-->
									<!--											<li><i class="far fa-calendar-alt"></i>July 03, 2020</li>-->
									<!--											<li><i class="fas fa-comment-dots"></i>02</li>-->
									<!--										</ul>-->
									<!--									</div>-->
								</div>
							</div>
						</div>

						<div class="col-md-6 col-sm-6 col-lg-4">
							<div class="post-box w-100 text-center">
								<div class="post-img overflow-hidden w-100">
									<a href="blog-detail.html" title="">
										<img class="img-fluid w-100" src="assets/images/resources/3.jpg"
											 alt="Post Image 1">
									</a>
								</div>
								<div class="post-info w-100">
									<h3 class="mb-0">
										<a href="blog-detail.html" title="">MOQUEGUA</a>
									</h3>
									<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
									<!--									<div class="post-info-bottom d-flex flex-wrap w-100">-->
									<!--										<span class="d-inline-block"><i class="far fa-user"></i><a-->
									<!--													href="javascript:void(0);" title="">Jibon Hasan</a></span>-->
									<!--										<ul class="post-meta mb-0 list-unstyled d-inline-flex">-->
									<!--											<li><i class="far fa-calendar-alt"></i>July 03, 2020</li>-->
									<!--											<li><i class="fas fa-comment-dots"></i>02</li>-->
									<!--										</ul>-->
									<!--									</div>-->
								</div>
							</div>
						</div>


					</div>
				</div><!-- Blog Wrap -->
				<div class="view-all w-100 text-center">
					<a class="thm-btn thm-bg" href="blog.html" title="">Ver todo<i
								class="flaticon-arrow-pointing-to-right"></i></a>
				</div><!-- View All -->
			</div>
		</div>
	</section>

	<?php
	if (0):
		?>
		<section>
			<div class="w-100 gray-layer pt-100 pb-100 opc1 overflow-hidden position-relative">
				<div class="fixed-bg zoom-anim back-blend-screen patern-bg gray-bg"
					 style="background-image: url(assets/images/pattern-bg2.jpg);"></div>
				<div class="container">
					<div class="testi-wrap position-relative w-100">
						<h2 class="mb-0">WHAT CLIENTS SAYS?</h2>
						<div class="testi-caro">
							<div class="testi-box-wrap">
								<div class="testi-box">
									<div class="testi-img">
										<img class="img-fluid" src="assets/images/resources/testi-img1-1.png"
											 alt="Testimonial Image 1">
									</div>
									<div class="testi-info">
										<h3 class="mb-0">“Jonspond Mendela”</h3>
										<p class="mb-0">Donec scelerisque dolor id nunc dictum, nterdum mauris rhoncus.
											Aliquam
											at ultrices nunc. In sem fermentum at lorem in, porta mauris.</p>
										<span class="d-inline-block text-color3"><i class="fas fa-star"></i><i
													class="fas fa-star"></i><i class="fas fa-star"></i><i
													class="fas fa-star"></i><i class="far fa-star"></i><span
													class="thm-clr">(07 Review)</span></span>
									</div>
								</div>
							</div>
							<div class="testi-box-wrap">
								<div class="testi-box">
									<div class="testi-img">
										<img class="img-fluid" src="assets/images/resources/testi-img1-2.png"
											 alt="Testimonial Image 2">
									</div>
									<div class="testi-info">
										<h3 class="mb-0">“Baris Jonson”</h3>
										<p class="mb-0">Donec scelerisque dolor id nunc dictum, nterdum mauris rhoncus.
											Aliquam
											at ultrices nunc. In sem fermentum at lorem in, porta mauris.</p>
										<span class="d-inline-block text-color3"><i class="fas fa-star"></i><i
													class="fas fa-star"></i><i class="fas fa-star"></i><i
													class="far fa-star"></i><i class="far fa-star"></i><span
													class="thm-clr">(07 Review)</span></span>
									</div>
								</div>
							</div>
							<div class="testi-box-wrap">
								<div class="testi-box">
									<div class="testi-img">
										<img class="img-fluid" src="assets/images/resources/testi-img1-3.png"
											 alt="Testimonial Image 3">
									</div>
									<div class="testi-info">
										<h3 class="mb-0">“Jonson Baris”</h3>
										<p class="mb-0">Donec scelerisque dolor id nunc dictum, nterdum mauris rhoncus.
											Aliquam
											at ultrices nunc. In sem fermentum at lorem in, porta mauris.</p>
										<span class="d-inline-block text-color3"><i class="fas fa-star"></i><i
													class="fas fa-star"></i><i class="far fa-star"></i><i
													class="far fa-star"></i><i class="far fa-star"></i><span
													class="thm-clr">(07 Review)</span></span>
									</div>
								</div>
							</div>
						</div>
					</div><!-- Tesyimonials Wrap -->
				</div>
			</div>
		</section>

	<?php
	endif;
	?>

	<section>
		<div class="w-100 position-relative">
			<div class="container">
				<div class="getin-touch-wrap overlap-99 brd-rd5 style2 thm-layer opc8 w-100 overflow-hidden position-relative">
					<div class="fixed-bg"
						 style='background-image: url("<?= base_url("assets/images/resources/pallarax2.jpg") ?>");'></div>
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
