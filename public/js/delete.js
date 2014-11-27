$(document).ready(function(){

	$('.delete_item').click(function(event){
		
		$('#btn_delete_item').prop('href',  event.target.id +'/delete');
	});

});