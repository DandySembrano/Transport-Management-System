$(document).ready(function(){

	$('.delete_expense').click(function(event){
		
		$('#btn_delete_expense').prop('href', 'expense/' + event.target.id +'/delete');
	});
	
	$('#add_new_expense').click(function(){
		$('#description').val('');
		$('#memo').val('');
		$('#amount').val('');
		$('#quantity').val('');
		$('#id').val('');
		
		var base_url = $('#base_url').val();
		$('form').prop('action', base_url + '/expenses');
		$('#btn_add_expense').html('Save');
	});

	
	$('#btn_add_expense').click(function(){
		$('#add_expense_form').submit();
	});

	$('.edit_expense').click(function(event){
		
		$('#btn_add_expense').html('Edit');
	

		var expense_id = event.target.id;

		//console.log(expense_id);
	
		$.ajax({

			url: 'expense/' + expense_id + '/edit',

			success: function(data){

				var data = JSON.parse(data);

				//console.log(data);
				
				$('#description').val(data.description);
				$('#memo').val(data.memo);
				$('#amount').val(data.amount);
				$('#quantity').val(data.quantity);
				$('#id').val(data.id);
				
				var base_url = $('#base_url').val();
				
				$('form').prop('action', base_url + '/expense/update');
	
			},
			error: function(error){
				console.log(error);
			}
		});
		

	});

});