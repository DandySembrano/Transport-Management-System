$(document).ready(function(){

	$('.delete_transport').click(function(event){

		$('#btn_delete_transport').prop('href', 'transport/' + event.target.id +'/delete');
	});

	$('#btn_add_transport').click(function(){
		$('#add_transport_form').submit();
	});

	$('.edit_transport').click(function(event){

		var transport_id = event.target.id;

		$.ajax({

			url: 'transport/' + transport_id + '/edit',

			success: function(data){

				var data = JSON.parse(data);

				//console.log(data);

				$('#destination_edit').val(data.destination);
				$('#description_edit').val(data.description);
				$('#tonnes_edit').val(data.tonnes);
				$('#charges_edit').val(data.charges);
				$('#memo_edit').val(data.memo);
				$('#id_edit').val(data.id);

				$('#client_id_edit').val(data.client_id);
				$('#vehicle_id_edit').val(data.vehicle_id);
				
			},
			error: function(error){
				console.log(error);
			}
		});

	});

	$('#btn_edit_transport').click(function(){
		$('#edit_transport_form').submit();
	});

});