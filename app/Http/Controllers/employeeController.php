<?php

namespace App\Http\Controllers;
use App\Jobs\empjob;
//use Request;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use App\Models\userdata;
use App\Models\User;
use App\Models\Employees;
use App\Http\Models\Admindata;
use App\Models\Empdata;
use Illuminate\Support\Facades\Redirect;
// use Validator;
use Response;
use Auth;
use DB;
 //use Illuminate\Http\Response;
// use Illuminate\Http\Request;


class employeeController extends Controller
{
	public function index(){
		return view('login');
	}
	public function registrationDataStore(Request $request){
		$validatior=$request->validate([
			'username' => 'required|alpha|max:10',
			'role' => 'required|alpha|max:10',
			'eid' => 'required|Numeric',
            'password' => 'required|min:8',
		]);
		$data=new userdata;
		$data->username=$request->username;
		$data->EmployeeId=$request->eid;
		$data->Roll=$request->role;
		$data->password=$request->password;
		$data->save();
		  return  redirect('login');
	}
	//check login details from database
	public function checklogin(Request $request){
	

		$validator=$request->validate([
            'username' => 'required|alpha|max:10',
            'password' => 'required|min:8',
        ]);
         // if (auth::attempt(['email' => $request->userneme, 'password' => $request->password])){
        // $credentials = $request->only('email', 'password');
        // if(Auth::attempt($credentials)){
		// if(Auth::user()){
  //       	return view('employeecreate');
		// }
  //       else{
  //       	// dd(auth::user()->);
  //       	return redirect('employeelist');
  //       }}
		$data=userdata::select('*')->where('username',$request->username)->where('password',$request->password)->get();
		if(count($data)!=0){
			$request->session()->put('name',$request->username);
			$request->session()->put('role',$data[0]->Roll);
		if($data[0]->Roll=='admin'){
		  return  redirect('empcreate');
			}
			else
			{
			$data=Employees::select('*')->where('EmployeeId',$data[0]->EmployeeId)->get();

		  return  view('userdashboard')->with('data',$data);
	}}
	else{
		return back()->with('message', 'please enter currect details.');
		}
	}

	//logout function
	public function logout(Request $req){
		$req->session()->forget('name');
		$req->session()->forget('role');
		return redirect('login');
	}

	//employee create form data storein databade
	public function empDataStore(Request $req){
		$validator=$req->validate([
            'id' => 'required|Numeric',
            'FirstName' => 'required|alpha|max:10',
            'LastName' => 'required|alpha|max:10',
            'skill'  => 'required',
            'StartDate'  => 'required',
        ]);
		$data=new Employees;
		$data->EmployeeId=$req->id;
		$data->FirstName= ucfirst($req->FirstName);
		$data->LastName=$req->LastName;
		$data->Skills=json_encode($req->skill);
		$data->StartDate=$req->StartDate;
		$data->createdBy=session()->get('name');
		$data->updatedBy=session()->get('name');
		$data->save();
		return redirect('emplist');
	}

	//employee list display in admin dashboard
	public function emplist(Request $req){
			 // dd(Auth::guard('web')->user());
		if(session()->get('role')=='admin'){
			$data=Employees::select('*')->get();
			return view('employeelist')->with('data',$data);
		}
		else{
			return redirect('login');
		}
	}

	//in admin update drapdown employee names
	public function updateEmployee(){
		$data=Employees::select('FirstName')->get();
	return view('updateemp')->with('data',$data);
	}

	//edit data form database
	public function edit(Request $request){
		$data=Employees::select('*')->where('FirstName',$request->name)->get();
	        return response()->json($data);
	}

	//update data store in database
	public function empUpdateDataStore(Request $request){
		$validator=$request->validate([
            'id' => 'required|Numeric',
            'FirstName' => 'required|alpha|max:10',
            'LastName' => 'required|alpha|max:10',
            'skill'  => 'required',
            'StartDate'  => 'required',
        ]);
		// dd($request->id);
		$data=Employees::where('EmployeeId',$request->id)->first();
		$data->EmployeeId=$request->id;
		$data->FirstName=$request->FirstName;
		$data->LastName=$request->LastName;
		$data->Skills=json_encode($request->skill);
		$data->StartDate=$request->StartDate;
		$data->updatedBy=session()->get('name');
		$data->update();
		return redirect('emplist');
		
	}

	public function nonUsers(Request $req){
		if(session()->get('role')=='admin')
		{
			$eid=userdata::pluck('EmployeeId');
			$data=Employees::whereNotIn('EmployeeId',$eid)->get();
			return view('nonUsers')->with('data',$data);
		}
		else{
			return view('login');
		}
	}
	public function qbuild(){
		$data=User::find(3)->userdata;
		print_r($data);
		// $data=DB::table('employees')->orderby('id')->chunk(1,function($name){
		// 	print_r($name);
		// 	 return false;
		// });
		
	}
	public function qjob(){
		$g=new empjob();
		$this->dispatch($g);
	}
}
