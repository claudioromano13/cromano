$(document).ready(function(){
	$(".button-collapse").sideNav();

	// Animate loader off screen
	$(".loader").fadeOut("slow");

	$(function(){
		$("#edit").click(function(){
			$('#modal1').openModal();
		});
		$("#close-add-task").click(function(){
			$('#modal1').closeModal();
		});
	});
});