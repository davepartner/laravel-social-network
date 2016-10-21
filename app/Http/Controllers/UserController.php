<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
        //

    public function postSignup(Request $request){
    	$this->validate($request, [
    		'email' => 'required|email|unique:users',
    		'password' => 'required|min:4',
    		'fullname' => 'required|min:4',
    	]);

    	$email = $request['email'];
    	$fullname = $request['fullname'];
    	$password = bcrypt($request['password']);

    	$user = new User();
    	$user->email = $email;
    	$user->fullname = $fullname;
    	$user->password = $password;
    	$user->save();
        //login the user
        if(Auth::login($user)){
        	return redirect()->route('dashboard');
        }

    	return redirect()->back();
    }
 		//if user signin
    public function postSignin(Request $request){

    		$this->validate($request, [
    		'email' => 'required|email|unique:users',
    		'password' => 'required|min:4'
    	]);

    	if(Auth::attempt([
    		'email' => $request['email'], 
    		'password' => $request['password']
    		])) {
    			return redirect()->route('dashboard');
		}
				return redirect()->back();
    }

    public function getLogout(){
    	Auth::logout();
    }

    public function getDashboard(){
    		return view('dashboard');
    }
}
