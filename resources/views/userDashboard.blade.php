<!DOCTYPE html>
<html>
<head>
	<title>userdashbord</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<h3 id='use' class="text-center">UserDashbord</h3>
	@if(session()->get('role')=='user')
	<div id='user'>
<li class='list-group-item'>{{session()->get('name')}}</li>
<ul id="collapseExample1" class="collapse show list-group list-group-flush">
          <li class="list-group-item py-1">
            <a href="{{url('logout')}}" class="text-reset">logout</a>
          </li>
      </ul>
  </div>

	<div class="container" id="emplist">
	<table class="table">
		<thead >
			<tr>
				<th>Employee-Id</th>
				<th>First-Name</th>
				<th>Last-Name</th>
				<th>Sklill</th>
				<th>Start-Date</th>
				<th>CreatedBy</th>
				<th>UpdatedBy</th>
			</tr>
		</thead>
		<tbody>
				@if(session()->get('role')=='user')
		 @foreach($data as $item)
			<tr>
				<td>{{$item->EmployeeId}}</td>
				<td>{{$item->FirstName}}</td>
				<td>{{$item->LastName}}</td>
				<td>{{$item->Skills}}</td>
				<td>{{$item->StartDate}}</td>
				<td>{{$item->createdBy}}</td>
				<td>{{$item->updatedBy}}</td>
			</tr>
			@endforeach
			@endif
		</tbody>
	</table>
	</div>
@endif
<style>
	#use{
		background: gray;
		color:white;
	}
	#user{
		/*width:5%;*/
		margin-left:75%;
		/*margin-top:-15%;
		margin-left:22%;*/
	}
</style>

</body>
</html>
</body>
</html>