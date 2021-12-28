<script>
	$(document).ready(function (){
		$('#form_login').submit(function (e) {
			e.preventDefault();

			data_ = $(this).serialize();
			url = "<?= base_url() ?>auth/login/validate";

			form_validation(url, data_, false, 'Iniciar sesión');
		});
	});

	function form_validation(url, data_, is_reg, txt) {

		$(".email > input").removeClass("is-invalid");
		$(".password > input").removeClass("is-invalid");

		disabled_btn_(true, 'Cargando...');

		$.ajax({
			url: url,
			type: 'POST',
			data: data_,
			success: function (data) {
				data = JSON.parse(data);

				window.location.replace(data.url);
			},

			statusCode: {

				400: function (xhr) {
					var json = JSON.parse(xhr.responseText);
					disabled_btn_(false, txt);

					if (json.email.length) {
						$(".email .invalid-feedback").html(json.email);
						$(".email > input").addClass('is-invalid');
					}

					if (json.password.length) {
						$(".password .invalid-feedback").html(json.password);
						$(".password > input").addClass('is-invalid');
					}
				},
				401: function (xhr) {
					disabled_btn_(false, txt);

					var json = JSON.parse(xhr.responseText);
					notification_toast(json.msg, 'error');
				},
				402: function (xhr) {
					disabled_btn_(false, txt);

					var json = JSON.parse(xhr.responseText);
					$("#password_val > div").html(json.msg);
					$("#password_val > input").addClass('is-invalid');
					notification_toast(json.msg, 'error');
				}
			}
		});
	}

</script>
