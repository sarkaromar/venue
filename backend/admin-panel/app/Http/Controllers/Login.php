<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();


class Login extends Controller {
    
    public function check_auth(){
        
        $id = session::get('id');
        if($id != null){
            return Redirect::to('/dashboard')->send(); 
        }
        
    }

    // login form --------------------------------------------------------------
    public function index() {
        
        $this->check_auth();
        $data = ['title' => 'Login'];
        return view('auth.login', $data);
        
    }
    
    // check login info --------------------------------------------------------
    public function check(Request $request) {
        
        // validate pass // rem(on) == cookie, rem(off) == session
        
        // get post data
        $email = $request->input('email');
        $password = sha1(md5($request->input('email') . $request->input('password')));
        
        // get user from db
        $r = (new Common)->get_user('back_user', $email, $password);
        
        if(!empty($r->id)){
            
            if($r->status == '1'){
                
                session()->put('id', $r->id);
                session()->put('name', $r->name);
                session()->put('email', $r->email);
                session()->put('level', $r->level);
                return redirect('/dashboard');
                
            }else{
                
                $msg = "Inactive user!";
                $request->session()->flash('error', $msg);
                return redirect('/login');
                
            }
            
        }else{
            
            $msg = "Incorrect email or password!";
            $request->session()->flash('error', $msg);
            return redirect('/login');
            
        }
        
    }
    

}