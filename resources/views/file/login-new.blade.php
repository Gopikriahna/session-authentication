<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- <script src="~/Scripts/jquery-1.7.1.min.js"></script>
<script src="~/Scripts/jquery.validate.js"></script>  -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<!-- Latest compiled JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->


	<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->


<!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->


<!-- Latest compiled JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
</head>
<body>
	<form action="#" id='form' >
   
  <div class="form-outline mb-4">
    <input type="text" id="username" name='username' class="form-control" />
    <label class="form-label" for="form2Example1">username</label>
    <span id='uname'></span>
            

  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" name='password' id="password" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
    <span id='pwd'></span>

  </div>
  <!-- Submit button -->
  <button type="button" class="btn btn-primary btn-block mb-4" id='submit'>submit</button>
    </button>
  </div>
</form>
<style>
	form{
		width:400px;
		justify-content: center;
		margin-left: 25%;
		margin-top:5%;
	}
</style>


</body>

<script>

	 
//    $.validator.addMethod("alphabetsnspace", function(value, element) {
//     return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
// });
//$(document).ready(function () {

// $("#form").validate({
//   rules: {
//     userneme: {
//       required: true,
//       minlength:4,
//       alphabetsnspace: true
//     },
//     password:{
//       required: true,  // <-- no such method called "matches"!
//         minlength:8,
        
//     }, 
//   },
//   messages: {
//     username:{required:"This field is required",
//     alphabetsnspace:"plase enter only letters"},
   
//     password:{
//         required: "This field is required",
//         minlength:"plase enter min 8"
//     },
//   },
//   submitHandler: function (form) { // for demo
//     alert('valid form');
//     // Route::redirect("/student");
//     // var form = $(form);
//     // $form.submit();
//     return true;
//   }
// // $("#submit").isValid(){
// //     return true;
// // }
// });
//});

$('#submit').on('click',function(){
    var username=$('#username').val(); 
    var password=$('#password').val();

		$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

		$.ajax({
  type:"POST",
  url:"{{url('check')}}",
  data:{username:username,password:password},
  dataType:'json',
  success:function(data){
    for(let data1 of data){
      if(data1.Roll=='user'){
         window.location.replace("userdashbord.php");
      }
      if(data1.Roll=='admin'){
         window.location.assign("admindashbord");
      }
    }
 
  },
  error: function(data){
    console.log(data);
                 // for(let data of data){
                 //  console.log(data['username']);
                  // $('.uname').append(data->username);

                 }
            
});
	});
</script>
</html>