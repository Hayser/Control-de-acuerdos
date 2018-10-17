$(document).ready(function () {
	$(".quitar").click(function () {
		$(".sufee-alert").hide();
	})
	setTimeout(function () {
		$(".sufee-alert").fadeOut("slow");
	}, 1000);

})