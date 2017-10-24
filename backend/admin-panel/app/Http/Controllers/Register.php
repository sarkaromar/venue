<?php

namespace App\Http\Controllers;

// for recv psot data
use Illuminate\Http\Request;
use App\Http\Requests;

// get table name
use App\Back_user;


class Register extends Controller {
    
    public function index() {

        $data = ['title' => 'Registration'];
        return view('auth.register', $data);
        
    }
    
    public function store(Request $request) {
        
        // get table
        $back_user = new Back_user();

        $this->validate($request, [
            
            'name' => 'required|max:256',
            'email' => 'required|email|max:256|unique:back_user',
            'password' => 'required|min:4|same:password_confirmation',
            'password_confirmation' => 'required'
            
        ]);
        
        // save
        $user_date = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => sha1(md5($request->input('password').$request->input('email')))
        ];
        
        if($back_user->insert($user_date)){
            
            $msg = "You are successfully registered!";
            $request->session()->flash('success', $msg);
            return redirect('login/');
            
        } else {
            
            $msg = "Opps! Somthing went wrong";
            $request->session()->flash('error', $msg);
            return redirect('register/');
            
        }
        
    }
  

    
    
}