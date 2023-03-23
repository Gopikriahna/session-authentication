<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
@include('admindashboard');
<div class="container">
	<div id="emplist">
	<h3>EmployeeList</h3>
	<table class="table table-striped table-hover  table-responsive table-bordered">
		<thead >
			<tr>
				<th>Employee-Id</th>
				<th>First-Name</th>
				<th>Last-Name</th>
				<th>Skills</th>
				<th>Start-Date</th>
				<th>CreatedBy</th>
				<th>UpdatedBy</th>
			</tr>
		</thead>
		<tbody>
			@if(session()->get('role')=='admin')
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
	</div>
<style>
	h3{
		background: gray;
		color:white;
		height:35px;
	}
	#emplist{
		margin-top:-11%;
		margin-left:22%;
	}
</style>

</body>
</html>