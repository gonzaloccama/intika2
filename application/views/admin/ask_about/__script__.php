<script>
	$(document).ready(function () {
		$('.send_email').click(function () {
			var data = {
				'id': $(this).attr('data-id'),
				'email': $(this).attr('data-email'),
			};
			$.ajax({
				url: BASE_URL + 'home/resend_email',
				data: data,
				type: "POST",
				success: function (res) {
					res = JSON.parse(res);
					console.log(res);

					window.location.replace(res.url);
				}
			});
		});
	});

</script>

<script>
	$(document).ready(function () {
		$('.delete-slider').click(function () {
			var id = $(this).attr('data-id');
			var field = $(this).attr('data-field');

			$('#delete-confirmation-modal')
					.attr('data-id', id)
					.attr('data-field', field)
					.css('display', 'block');
		});

		$('.delete_').click(function () {
			var id = $('#delete-confirmation-modal').attr('data-id');
			var field = $('#delete-confirmation-modal').attr('data-field');

			delete_(field, id);
		});

	});

	function delete_(field, id) {
		$.ajax({
			url: ADMIN_URL + field + '/delete' + '/' + id,
			type: "POST",
			success: function (res) {
				res = JSON.parse(res);
				// console.log(res);

				$('#delete-confirmation-modal')
						.removeClass('show')
						.removeClass('overflow-y-auto')
						.attr('aria-hidden', 'true').removeAttr('style');

				$('div[data-modal-replacer="delete-confirmation-modal"]').remove();
				// $('.delete_').css('display', 'none');
				$('body').removeClass('overflow-y-hidden').removeAttr('style');

				window.location.replace(res.url);
			}
		});
	}

</script>


