<script>
	$(document).ready(function () {
		var name_elements = $(".name-elements").html();
		var placeholder_elements = $(".placeholder-elements").html();
		var elements = 100;
		var elements_x = "<?=
				(isset($columns) && !empty($columns))
						? count($columns)
						: 1;
				?>";

		$('.add_form_elements').click(function (e) {
			e.preventDefault();
			if (elements_x < elements) {
				elements_x++;
				form_button('.add-elements', name_elements, elements_x, placeholder_elements);
			} else {
				alert('!!')
			}
		});

		$('.add-elements').on("click", ".delete_elements", function (e) {
			e.preventDefault();
			$(this).parent('div').parent('div').remove();
			elements_x--;
		})
	});

	//add form with button
	function form_button(wrapper_ = '', name = '', i = 0, txt = '') {
		$(wrapper_).append(`
				<div class="input-group mb-3 form-group">
					<input disabled type="text" class="form-control text-center w-20" placeholder="${i}" value="${i}">
					<input type="text" class="form-control" id="${name}-${i}" name="${name}[]"
						   placeholder="${txt} ${i}" value="">
					<div class="">
						<button class="btn btn-outline-danger ml-1 h-full delete_elements" type="button"><i class="fas fa-minus"></i></button>
					</div>
				</div>
			`);
	}
</script>
