<!DOCTYPE html>
<html>
<head>
	<title>AdminDashboard</title>
      <meta name="csrf-token" content="{{ csrf_token() }}" />

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- jquery validaton -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<!-- bootstrap css cdn  -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- jquery datepiker cdns -->
    <link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'>

    <script src=
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
    </script>

</head>      

<body>


<li id="head"><h2 class='text-center'>Admin-Dashboard</h2></li>
 
<div id="ad">
<li class='list-group-item'>{{session()->get('name')}}</li>
<ul  class="list-group">
          <li class="list-group-item btn-primary py-1">
            <a href="{{url('logout')}}" class="text-reset">Logout</a>
          </li>
      </ul>
   </div>

<div id="admin">
		<ul  class="list-group">
          <li id='act' class="list-group-item py-1 {{ (request()->is('empcreate')) ? 'active' : '' }}">
            <a href="{{url('empcreate')}}" class="text-reset">EmployeeCreate</a>
          </li>
          <li class="list-group-item py-1 {{ (request()->is('emplist')) ? 'active' : '' }}">
            <a href="{{url('emplist')}}" class="text-reset">EmployeeList</a>
          </li>
          <li class="list-group-item py-1 {{ (request()->is('updateEmployee')) ? 'active' : '' }}">
            <a href="{{url('updateEmployee')}}" class="text-reset">Update</a>
          </li>
           <li class="list-group-item py-1 {{ (request()->is('nonUsers')) ? 'active' : '' }}">
            <a href="{{url('nonUsers')}}" class="text-reset">NonUsers</a>
          </li>
        </ul>
	</div>

	<style>
    .dropdown{
      margin-left:90%;
      color:black;
    }
    .list-group-item{
      background: gray;
      color:white;
    }
    #head{
      color:white;

      background: gray;
    }
    a{
      color:white;
    }
		#admin{
      color:white;
			margin-top:-8%;
			width:20%;
		}
		#ad{
			width:20%;
			margin-left:75%;
		}
	</style>
</body>
</html>