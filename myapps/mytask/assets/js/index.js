$(document).ready(function(){
	$(".button-collapse").sideNav();

$(function(){
	$("#edit").click(function(){

	$('#modal1').openModal();
	});

	$("#close-add-task").click(function(){
		$('#modal1').closeModal();
	});

});
});