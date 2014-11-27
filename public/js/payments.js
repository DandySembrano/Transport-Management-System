$(document).ready(function(){

	$('.delete_payment').click(function(event){
		
		$('#btn_delete_payment').prop('href', 'payment/' + event.target.id +'/delete');
	});

	
	$('#btn_add_payment').click(function(){
		$('#add_payment_form').submit();
	});

	$('.edit_payment').click(function(event){
		
		//$('#btn_edit_payment').prop('href', 'client/' + event.target.id +'/delete');

		var payment_id = event.target.id;

		//console.log(payment_id);

		$.ajax({

			url: 'payment/' + payment_id + '/edit',

			success: function(data){

				var data = JSON.parse(data);

				//console.log(data);

				$('#clientName_edit').val(data.client_id);
				$('#amount_edit').val(data.amount);
				$('#mode_edit').val(data.mode);
				$('#chequeName_edit').val(data.chequeName);
				$('#chequeNumber_edit').val(data.chequeNumber);
				$('#id_edit').val(data.id);

			},
			error: function(error){
				console.log(error);
			}
		});

	});

	$('#btn_edit_payment').click(function(){
		$('#edit_payment_form').submit();
	});

});