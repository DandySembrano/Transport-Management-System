$(document).ready(function(){

	$('.delete_vehicle').click(function(event){

		$('#btn_delete_vehicle').prop('href', 'vehicle/' + event.target.id +'/delete');
	});

	$('#btn_add_vehicle').click(function(){
		$('#add_vehicle_form').submit();
	});

	$('.edit_vehicle').click(function(event){

		var user_id = event.target.id;

		//console.log(event.target);

		$.ajax({

			url: 'vehicle/' + user_id + '/edit',

			success: function(data){

				var data = JSON.parse(data);

				//console.log(data);

				$('#numberPlate_edit').val(data.numberPlate);
				$('#capacity_edit').val(data.capacity);
				$('#id_edit').val(data.id);

			},
			error: function(error){
				console.log(error);
			}
		});

	});

	$('#btn_edit_vehicle').click(function(){
		$('#edit_vehicle_form').submit();
	});

});