<?php
$uri = array(
		$this->uri->segment(3),
		$this->uri->segment(2),
);
if (in_array('edit', $uri) || in_array('add', $uri)):
	?>
	<script type="text/javascript">
		$(document).on("click", ".browse", function () {
			var attachment = $(this).parents().find(".file");
			//console.log(thumbnail);
			attachment.trigger("click");
		});
		$('input[type="file"][name="attachment"]').change(function (e) {
			var fileName = e.target.files[0].name;
			$("#attachment").val(fileName);

			var reader = new FileReader();
			reader.onload = function (e) {
				// get loaded data and render thumbnail.
				document.getElementById("preview_attachment").src = e.target.result;
			};
			// read the image file as a data URL.
			reader.readAsDataURL(this.files[0]);
		});

		$(document).ready(function () {
			$('.validation-title').html($('#title').val().length + '/36');
			$('.validation-description').html($('#description').val().length + `/72`);

			$('#title').on('keyup', function () {
				limitText(this, '.validation-title', 36);
			});
			$('#description').on('keyup', function () {
				limitText(this, '.validation-description', 72);
			});
		});

		function limitText(field, field_change, maxChar) {
			var ref = $(field),
					val = ref.val();
			if (val.length >= maxChar + 1) {
				ref.val(function () {
					console.log(val.substr(0, maxChar))
					return val.substr(0, maxChar);
				});
			} else {
				$(field_change).html(val.length + '/' + maxChar);
			}
		}

	</script>
<?php
endif;
?>

<?php
if (in_array('slider', $uri) && !in_array('edit', $uri)):
	?>

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

					$('#delete-confirmation-modal')
							.removeClass('show')
							.removeClass('overflow-y-auto')
							.attr('aria-hidden', 'true').removeAttr('style');

					$('div[data-modal-replacer="delete-confirmation-modal"]').remove();
					$('body').removeClass('overflow-y-hidden').removeAttr('style');

					window.location.replace(res.url);
				}
			});
		}

	</script>
<?php
endif;
?>
