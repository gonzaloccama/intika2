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
			attachment.trigger("click");
		});
		$('input[type="file"][name="attachment"]').change(function (e) {
			var fileName = e.target.files[0].name;
			$("#attachment").val(fileName);

			var reader = new FileReader();
			reader.onload = function (e) {
				document.getElementById("preview_attachment").src = e.target.result;
			};
			reader.readAsDataURL(this.files[0]);
		});

		$(document).ready(function () {
			$('.validation-name').html($('#name').val().length + '/35');
			$('.validation-description').html($('#description').val().length + `/100`);

			$('#name').on('keyup', function () {
				limitText(this, '.validation-name', 35);
			});
			$('#description').on('keyup', function () {
				limitText(this, '.validation-description', 100);
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
if (in_array('routes', $uri) && !in_array('edit', $uri)):
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
					// $('.delete_').css('display', 'none');
					$('body').removeClass('overflow-y-hidden').removeAttr('style');

					window.location.replace(res.url);
				}
			});
		}

	</script>

	<script>
		$(document).ready(function () {
			// var url = ADMIN_URL + 'routes/get_data';
			// get_data_display('#display-data', url, false, );
			//
			// $(document).on('keyup', '#search_text', function () {
			// 	get_data_display('#display-data', url, get_data(), false);
			// });
			//
			// $(document).on('click', ".pagination li a", function (event) {
			// 	var page_url = $(this).attr('href');
			// 	get_contents('#cdisplay-data', url, get_data(), page_url);
			// 	event.preventDefault();
			// });
		});

		function get_data_display(location, base_url = '', data = false, page_url = false) {

			if (!page_url) {
				var page_url = base_url;
			}

			$.ajax({
				url: page_url,
				method: 'POST',
				data: data,
				success: function (res) {
					reloadScript();
					$(location).html(res);

				},
				error: function () {

				},
			});
		}

		function get_data() {
			return {
				'search_text': $("#search_text").val(),
			};
		}

		function reloadScript() {
			$('script #myScript').remove();
			$.getScript(BASE_URL + "assets/admin/dist/js/app.js", function () {
				$('script:first').attr('id', '#myScript');
			});
		}

		// Init Vue js
		// var _app_ = new Vue({
		// 	el: '#app',
		// 	data() {
		// 		return {
		// 			search: '',
		// 		}
		// 	},
		//
		// 	created() {
		// 		this.fetchData();
		// 	},
		//
		// 	methods: {
		// 		fetchData() {
		// 			let ths = this;
		// 			// axios.post(BASE_URL + 'welcome/res_data',{
		// 			// 	search: ths.search,
		// 			// }).then(res => {
		// 			// 	ths.articulos = res.data;
		// 			// });
		// 			$.ajax({
		// 				url: ADMIN_URL + 'routes/getdata',
		// 				method: 'POST',
		// 				data: {
		// 					search: ths.search,
		// 				},
		// 				success: function (res) {
		// 					var res_ = JSON.parse(res);
		// 				}
		// 			});
		// 		},
		//
		// 	},
		// })
		// End Vue js
	</script>

<?php
endif;
?>

<?php
if ($this->uri->segment(3) === 'itinerary'):
	?>
	<script>
		$(document).ready(function () {
			var itinerary = 20;

			var itinerary_x = "<?php
					$itineraries = json_decode($routes->itinerary);
					echo is_item($routes->itinerary) ? count($itineraries->description) : 1;
					?>";

			$('.add_form_itinerary').click(function (e) {
				e.preventDefault();
				if (itinerary_x < itinerary) {
					itinerary_x++;
					form_button('.add-itinerary', 'itinerary', itinerary_x, 'Agrega Itinerario');
				} else {
					alert('!!')
				}
			});

			$('.add-itinerary').on("click", ".delete_itinerary", function (e) {
				e.preventDefault();
				$(this).parent('div').parent('div').remove();
				itinerary_x--;
			})
		});

		//add form with button
		function form_button(wrapper_ = '', name = '', i = 0, txt = '') {
			$(wrapper_).append(`
				<div class="input-group mb-3 form-group">
					<input type="text" class="form-control w-1/4" id="day-${i}" name="itinerary[day][]"
						placeholder="Dia 1" value="Dia 1">
					<input type="text" class="form-control" id="${name}-${i}" name="${name}[description][]"
						   placeholder="${txt} ${i}" value="">
					<input type="text" class="form-control w-20" id="itinerary_ho" name="${name}[hour][]"
										   placeholder="14:00 hs" value="">
					<div class="">
						<button class="btn btn-outline-danger ml-1 h-full delete_${name}" type="button"><i class="fas fa-minus"></i></button>
					</div>
				</div>
			`);
		}
	</script>
<?php
endif;
?>
