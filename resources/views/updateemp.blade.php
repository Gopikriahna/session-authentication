<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <meta charset="utf-8"> 
</head>
<body>
@include("admindashboard");
<div class="container">
  <div  id='update'>
  <h3>Update Employee</h3>

  <select id='name'>
  	<option>Select Employee</option>
  	@foreach($data as $item)
  	<option>{{ ucfirst($item->FirstName)}}</option>
  	@endforeach
  </select><br><br>
  <!-- Button to Open the Modal -->
  <button type="button" id='edit' class="btn btn-primary" data-toggle="modal" data-target="#myModal">
   Edit
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Employee</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <form action="{{url('empUpdateDataSubmit')}}" class="form-group " id="myform" method='post'>
      
            {!!csrf_field()!!}
        <div class="form">
           <label for="id"class="label1">Employee-Id:</label>
           <input type="text" class="form-control" name='id' id='id' value="">
           <span>{{ $errors->first('id') }}</span>
           
        </div>
        <div class="form">
        <label for="FirstName" class="label1"> First-Name:</label>
        <input type="text" class="form-control " name='FirstName'id='FirstName' value="">
        <span>{{ $errors->first('FirstName') }}</span>

        
        </div>
        <div class="form">
            <label for="LastName" class="label1"> Last-Name:</label> 
           <input type="text" class="form-control" name='LastName' id='LastName' value="">
           <span>{{ $errors->first('LastName') }}</span>

          
        </div>
        <div class="form">
           <label for="skill" class="label1">Skill:</label>
           C-Language<input type="checkbox" class="#l" name='skill[]'  id='c'value="Clanguage">
           Java<input type="checkbox" class="skill1"  name='skill[]' id='java' value='java'>
           Php<input type="checkbox" class="skill1" name='skill[]' id='php'  value='php'>
           <span>{{ $errors->first('skill') }}</span>

           
        </div>
        <div class="form">
           <label for="StartDate" class="label1">Start-Date:</label>
           <input type="text" class="formcontrol" name='StartDate' id='StartDate' value=""><br>
           <span>{{ $errors->first('StartDate') }}</span>

           
        </div>
        <div class=form1>
           <input type="submit" class="btn btn-info pull-right" value="Save" id="submit">
        </div>
        </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
    </div>
  </div>
</div>
<style>
  #edit{
    margin-left:34%;
  }
  h3{
    background: gray;
    color:white;
    height:35px;
    width:40%;
  }
  #name{
    width:40%;
    height:25px;
  }
	#update{
		margin-top:-11%;
		margin-left:25%;
	}
  .skill1{
    margin-left:14%;
  }
</style>
</body>
<script>
      $("#StartDate").datepicker({ dateFormat: 'yy-mm-dd',
        showOn: "button",
      buttonImage: "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
      buttonImageOnly: true
       });

	$('#edit').on('click',function() {
    $('#c').prop('checked',false);          
           $('#java').prop('checked',false);          
           $('#php').prop('checked',false); 
	var name=$("#name").val();
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

		$.ajax({
	    type:"POST",
		url: "{{url('edit')}}",
		data:{name:name},
        dataType:'json',
		success: function(data){
			for(let item of data){
         

				var data1=item.Skills.split(',');
        //var data1="{{ json_decode($item->Skills)}}";

				
        var d=JSON.parse(item.Skills);
				var c=$('#c');
				var java=$('#java');
				var php=$('#php');
				var skill=[c,java,php]
            
            console.log(skill.length);
				for(let i=0;i<skill.length;i++){
           for(let j=0;j<skill.length;j++){
					if(d[j]==skill[i].val()){
            console.log(skill[i].val());
						skill[i].prop('checked',true);					
          }}
				}
				$("#id").val(item.EmployeeId);
				$("#FirstName").val(item.FirstName);
				$("#LastName").val(item.LastName);
				$("#StartDate").val(item.StartDate);
			}
		},
		error: function(data){
			console.log(data);
		}
		});
		})
</script>
</html>