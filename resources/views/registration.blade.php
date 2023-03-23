<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
   
 <button class="btn-primary py-3" id="reg"><a href="{{url('login')}}" class="btn-primary py-3" >Login</a></button>
           
 <h3 class="bg-primary">Registration Page</h3>
	<form action="{{url('registartionSubmit')}}" id='myform' method='post'>
   @csrf
    @if (session()->get('message'))
  <div class="alert alert-warning">
    {{ session()->get('message') }}
  </div>
@endif
  <div class="form-outline mb-4">
    <input type="text" id="username" name='username' class="form-control" />
    <label class="form-label" for="form2Example1">UserName</label>
    <span id='uname'style='color:red'>{{ $errors->first('username') }}</span>
  </div>
   <div class="form-outline mb-4">
    <input type="text" id="eid" name='eid' class="form-control" />
    <label class="form-label" for="form2Example1">EmployeeId</label>
    <span id='eid'style='color:red'>{{ $errors->first('eid') }}</span>
  </div>
    <div class="form-outline mb-4">
    <input type="text" id="role" name='role' class="form-control" />
    <label class="form-label" for="form2Example1">Role</label>
    <span id='role'style='color:red'>{{ $errors->first('role') }}</span>
  </div>
  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" name='password' id="password" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
    <span id='pwd' style='color:red'>{{ $errors->first('password') }}</span>
  </div>
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary pull-right" id='submit'>Submit</button>
    </button>
  </div>
</form>
<style>
  #reg{
    width:10%;
    margin-left: 25%;
    margin-top:2%;
  }
  .submit{
    width:10%;
  }
  h3{
    background: blue;
    color: white;
    width:400px;
    height:40px;
    justify-content: center;
    margin-left: 25%;
    margin-top:2%;
  }
	form{
    /*color: white;*/
    /*background: gray;*/
		width:400px;
		justify-content: center;
		margin-left: 25%;
		margin-top:1%;
	}
   label.error{
            color:red;
            font-style:Serif;
            width:100%;
            margin-left:30%;
            font-size:10px;
        }
</style>
</body>
<script>
$(document).ready(function () {
$("#myform").validate({
  rules: {
    username: {
      required: true,
      minlength:3
    },
      required: true,
      minlength:3
    },
    password: {
      required: true,
      minlength:8
    }
  },
  messages: {
    
   username:{required:"This field is required",
    alphabetsnspace:"plase enter only letters"},
   role:{required:"This field is required",
    alphabetsnspace:"plase enter only letters"}
    password:{required:"This field is required",
    alphabetsnspace:"plase enter only letters"}
    
  },
  submitHandler: function (form) { // for demo
    alert('valid form');
    // Route::redirect("/student");
    // var form = $(form);
    // $form.submit();
    return true;
  }
});
 });
</script>
</html>