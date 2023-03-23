<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
@include("admindashboard");
<div class="container">
<div id="empcreate">
	<h3 class='hd'>Create Employee</h3>
        <form action="{{url('empDataSubmit')}}" class="form-group " id="myform" method='post'>
            {!!csrf_field()!!}
        <div class="form">
           <label for="id"class="label1">Employee-Id:</label>
           <input type="text" class="form-control" name='id' id='id'>
           <span>{{ $errors->first('id') }}</span>
           
        </div>
        <div class="form">
        <label for="FirstName" class="label1"> First-Name:</label>
        <input type="text" class="form-control " name='FirstName'id='FirstName'>
        <span>{{ $errors->first('FirstName') }}</span>

        
        </div>
        <div class="form">
            <label for="LastName" class="label1"> Last-Name:</label> 
           <input type="text" class="form-control" name='LastName' id='LastName'>
           <span>{{ $errors->first('LastName') }}</span>

          
        </div>
        <div class="form1">
         <label for="skill[]"> Skills:</label> 
          <input type="checkbox" class="skill" name='skill[]' id='skill'value="Clanguage"> C-Language<br>
          <input type="checkbox" class="skill1" name='skill[]' id='skill1' value='java'> Java<br>
          <input type="checkbox" class="skill1" name='skill[]' id='skill2' value='php'> Php<br>
           <span>{{ $errors->first('skill') }}</span>
        </div>
      <!-- </div> -->
        <div class="form">
           <label for="StartDate" class="label1">Start-Date:</label>
           <input type="text" class="form-control" name='StartDate' id='StartDate'>
           <span>{{ $errors->first('StartDate') }}</span>
        </div>
        <div class=form1>
           <input type="submit" class="btn btn-primary pull-left" value="Save" id="submit">
        </div>

        </form>
      </div>
    
</div> 
<style>
  form{
    padding-top:5%;
  }
  #skill1,#skill2{
    margin-left:15%;

  }
  .form1{
    margin-left:20%;
  }
  .pull-left{
    margin-left:90%;
  }
	#empcreate{
		margin-top:-12%;
		margin-left:25%;
	}
  h3{
    width:500px;
    background: gray;
    color:white;
    height:35px;
  }
	.form-group{
            width:500px;
            color:white;
            height:470px;
            background:gray;
            /*margin-left:5%;*/
            /*margin-top:10%;*/
            padding-top:2%;
            /* color:white; */
           /* border:1px solid black;
            border-radius:5%*/;
        }
        .form-control{
            width:100%;
            margin-top:10%;

        }
        .form{
           margin-top:2%;
        }
        input[type="text"]{
            width:50%;
            margin-left:30%;
            margin-top:-5%;
            /* margin-right:15%; */
        }
        /*label:after{
            content:'*';
            color:red;
        }*/
        label.error{
            color:red;
            font-style:Serif;
            width:100%;
            margin-left:30%;
            font-size:10px;
        }
        .label1{
            display: inline-block;
            width: 140px;
            text-align: right;
        }
        .form1{
            margin-right:20%;
            margin-top:2%;
        }
        span{
            margin-left:20%;
            color:red;
        }
        .ui-datepicker-trigger{
          margin-left:75%; 
          margin-top:-10%; 
        }
    /*  label[id="skill[]-error"]{
            color:blue;
            margin-top:%;
            margin-top:30%;

        }*/
</style>
</body>

<script>
	 $(document).ready(function () {
      $("#StartDate").datepicker({ dateFormat: 'yy-mm-dd',
        // changeMonth: true,
        // changeYear: true,
        showOn: "button",
      buttonImage: "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
      buttonImageOnly: true
       });

$.validator.addMethod("alphabetsnspace", function(value, element) {
     return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
 });
$("#myform").validate({
  rules: {
  	 id:{
      required: true,
        number:true,  // <-- no such method called "matches"!
        minlength:3
    },
    FirstName: {
      required: true,
      minlength:3,
      alphabetsnspace: true

    },
    LastName: {
      required: true,
      minlength:3,
      alphabetsnspace: true

    },
    'skill[]':{
        required: true
    },
    StartDate:{
        required: true
    }
  },
  messages: {
  	id:{required:  "This field is required",
         length:"plase enter ten digits"},
    FirstName:{required:"This field is required",
    alphabetsnspace:"plase enter only letters"},
    FirstName:{required:"This field is required",
    alphabetsnspace:"plase enter only letters"},
   skill:{
        required: "This field is required",
    },
    StartDate:{ reqired:"This field is required",
    }
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