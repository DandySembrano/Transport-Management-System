@if(Session::has('success'))
		 	<div class="alert alert-success">{{ Session::get('success')	}}</div>	
@elseif(Session::has('fail'))
			<div class="alert alert-danger">{{ Session::get('fail')	}}</div>
@endif