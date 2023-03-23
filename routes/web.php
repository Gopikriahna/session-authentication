<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeController;
use App\Http\Middleware\employeeMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//login home pages routes
Route::get('login', [employeeController::class,'index']);
Route::get('registration', function () {
              return view('registration');
             });
Route::post('registrationSubmit', [employeeController::class,'registrationDataStore']);
Route::post('dashboard',[employeeController::class,'checklogin']);
Route::get('logout',[employeeController::class,'logout']);

//admin route add middleware 
Route::group(['middleware'=>'empmiddleware'],function(){
       Route::get('userdashbord', function () {
              return view('userDashboard')->name('userDashboard');
             });

       Route::get('updateEmployee', [employeeController::class,'updateEmployee'])->name('updateEmployee');
       Route::post('edit', [employeeController::class,'edit'])->name('edit');
       Route::post('empUpdateDataSubmit', [employeeController::class,'empUpdateDataStore'])->name('empUpdateDataStore');
       
       Route::get('empcreate', function () {return view('employeecreate');});
       Route::post('empDataSubmit',[employeeController::class,'empDataStore']);

       Route::get('emplist',[employeeController::class,'emplist']);
       Route::get('nonUsers',[employeeController::class,'nonUsers']);
     
       });
      Route::get('data',[employeeController::class,'qbuild']);
//   Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('qjob',[employeeController::class,'qjob']);