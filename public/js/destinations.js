$(document).ready(function(){

	$('.delete_destination').click(function(event){

		$('#btn_delete_destination').prop('href', 'destination/' + event.target.id +'/delete');
	});

	$('#btn_add_destination').click(function(){
		$('#add_destination_form').submit();
	});

	$('.edit_destination').click(function(event){

		var user_id = event.target.id;

		$.ajax({

			url: 'destination/' + user_id + '/edit',

			success: function(data){

				var data = JSON.parse(data);

				//console.log(data);

				$('#destination_name_edit').val(data.destination_name);
				$('#id_edit').val(data.id);

			},
			error: function(error){
				console.log(error);
			}
		});

	});

	$('#btn_edit_destination').click(function(){
		$('#edit_destination_form').submit();
	});

});