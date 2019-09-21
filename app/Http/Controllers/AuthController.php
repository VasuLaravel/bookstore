<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    
	public function index()
    {
    	return view('register', ['page' => 'register']);
    }

    public function showLogin()
    {
    	if (auth()->user()) {
    		return redirect()->intended('admin/catelog');
    	}
    	return view('login', ['page' => 'login']);
    }

    public function register(Request $request)
    {
    	$inputs = $request->all();
    	$errorList = [];

    	if (isset($inputs['email']) && !empty($inputs['email'])) {
    		if (!filter_var($inputs['email'], FILTER_VALIDATE_EMAIL)) {
			  array_push($errorList, "Invalid email format");
			}
    	}

    	if (isset($inputs['password']) && !empty($inputs['password']) &&
    		isset($inputs['confirm_password']) && !empty($inputs['confirm_password'])) {
    		if ($inputs['password'] !== $inputs['confirm_password']) {
			  array_push($errorList, "Password and confirm password should be matched");
			}
    	}

    	if (!empty($errorList)) {
    		return view('register', ['status'=> 'error', 'data'=> $errorList, 'page' => 'register']);
    	}

    	$resp = User::create($inputs);

    	return view('landing', ['status'=> 'success', 'page' => '/']);
    }


    public function login(Request $request)
    {
    	$email = $request->get('email');
    	$password = $request->get('password');

    	if (Auth::attempt(['email' => $email, 'password' => $password])) {
    		### Fetching the user data from table ###
		    $user = User::where('email', $email)->first();

		    ### keeping logged user data into session ###
		    Session::put('userId', $user->id);
		    Session::put('name', $user->name);
		    Session::put('email', $user->email);
		    Session::put('mobile', $user->mobile_number);
		    Session::put('age', $user->age);

		    return redirect()->intended('/admin/catelog');

		} else {
			return view('login', [
				'page' => 'login',
				'errors' => "The provided email and password is incorrect"
			]);
		}
    }

    public function logout()
    {
    	Session::flush();
    	return redirect()->intended('login');
    }
}
