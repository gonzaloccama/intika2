<script>
	$(document).on("click", ".browse", function () {
		var attachment = $(this).parents().find(".file");
		attachment.trigger("click");
	});
	$('input[type="file"][name="logo"]').change(function (e) {

		var reader = new FileReader();
		reader.onload = function (e) {
			document.getElementById("preview_logo").src = e.target.result;
		};
		reader.readAsDataURL(this.files[0]);
	});

	$(document).on("click", ".browse_white", function () {
		var attachment = $(this).parents().find(".file_white");
		attachment.trigger("click");
	});
	$('input[type="file"][name="logo_white"]').change(function (e) {

		var reader = new FileReader();
		reader.onload = function (e) {
			document.getElementById("preview_logo_white").src = e.target.result;
		};
		reader.readAsDataURL(this.files[0]);
	});
</script>
