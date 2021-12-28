<script>
	$(document).ready(function () {
		$(".owl-carousel").owlCarousel({
			autoplay: true,
			autoplayTimeout: 2000,
			autoplayHoverPause: true,
			items: 4,
			margin: 25,
			center: false,
			loop: true,
			touchDrag: true,
			responsive: {
				600: {
					items: 6
				},
				360: {
					items: 3
				},
				144: {
					items: 2
				}
			}
		});
	});
</script>

<script>
	$(document).ready(function () {
		new $.Zebra_Tooltips($('.zebra_tooltips'));
	});
</script>

<script>
	$(document).ready(function () {
		$('#register-information').submit(function (e) {
			e.preventDefault();

			disabled_btn_(true, 'Cargando...');

			$(".names > input").removeClass("is-invalid");
			$(".email > input").removeClass("is-invalid");
			$(".celular > input").removeClass("is-invalid");


			$.ajax({
				url: BASE_URL + 'home/ask_information',
				type: 'post',
				data: $(this).serialize(),
				success: function (res) {

					$('#exampleModalCenter').modal('hide');

					$('#route').val('');
					$('#names').val('');
					$('#email').val('');
					$('#celular').val('');
					$('#message').val('');
					disabled_btn_(false, 'Enviar');

				},
				statusCode: {
					400: function (xhr) {

						disabled_btn_(false, 'Enviar');

						var json = JSON.parse(xhr.responseText);

						if (json.names.length) {
							$(".names .invalid-feedback").html(json.names);
							$(".names > input").addClass('is-invalid');
						}
						if (json.email.length) {
							$(".email .invalid-feedback").html(json.email);
							$(".email > input").addClass('is-invalid');
						}
						if (json.celular.length) {
							$(".celular .invalid-feedback").html(json.celular);
							$(".celular > input").addClass('is-invalid');
						}
					}
				}
			});
		});

		$('.cancel').click(function () {
			$('#route').val('');
			$('#names').val('');
			$('#email').val('');
			$('#celular').val('');
			$('#message').val('');

			$(".names > input").removeClass("is-invalid");
			$(".email > input").removeClass("is-invalid");
			$(".celular > input").removeClass("is-invalid");
		});

	});
</script>

