<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table1Model;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class AppController extends Controller
{


function login(){
	return view('login');

}


function regform(Request $request){


	$request->validate([
		'login'=>'required|min:3|max:12|unique:users',
		'password'=>'required|min:4|max:12'

	]);
	

$birthday = $request->year .'/'. $request->month .'/'.$request->day;

// return $birthday;

 $arr=UsersModel::where('login', $request->login)->first();

if(empty($arr)){


	$hashed = Hash::make($request->password);
	UsersModel::insert(['login'=>$request->login, 'password'=>$hashed, 'birthday'=>$birthday]);
	Session::flash('success', 'You have successfully registered');



}

return back();


}



function loginform(Request $request){

$arr=UsersModel::where('login', $request->login)->first();

if(!empty($arr)){

if(Hash::check($request->password, $arr->password)){

	$monthday=substr($arr->birthday, 5);
	if($arr->last_login_time!=date("Y/m/d") &&  date("m/d") == $monthday){
		$arr->points=$arr->points+500;
		$arr->save();
		Session::flash('birthday', 'Congratulations on your birthday, we have sent you 500 points');

	}else if($arr->points<100 && $arr->last_login_time!=date("Y/m/d")){
		$points = 100 - $arr->points;
		$arr->points=100;
		$arr->save();
		Session::flash('Points', "We have sent you " . $points . " points for login in");

	}

	Session::put('userId', $arr->id);
	$time = date("Y/m/d");
	$arr->last_login_time=$time;
	$arr->save();
	return redirect('/profile');


}else{

	Session::flash('error', 'Invalid data');
	return back();
}



}else{

	Session::flash('error', 'Invalid data');
	return back();
}



}

function profile(){



$users=UsersModel::where('id', '!=', Session::get('userId'))->get();
$me=UsersModel::where('id', Session::get('userId'))->first();


    return view('profile', compact('users','me'));



}


function sendP(Request $request){

	$id=$request->id;


	$arr=UsersModel::where('id', Session::get('userId'))->first();

	if($arr->points>=1){
	UsersModel::where('id', $id)->increment('points');
	UsersModel::where('id', Session::get('userId'))->decrement('points');

	}else{
		return 'my points 0';
	}

}




}
