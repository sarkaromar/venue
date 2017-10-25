<?php

namespace App\Http\Controllers;

// for db work
use Illuminate\Support\Facades\DB;

// for recv psot data
use Illuminate\Http\Request; // eta post er jonno lage
use App\Http\Requests;

// for cookie
// use Illuminate\Http\Response;
// use Illuminate\cookie\cookieJar;

// use Cookie;
use Session;


class Login extends Controller {

    // login form --------------------------------------------------------------
    public function index() {
        
        $data = ['title' => 'Login'];
        return view('auth.login', $data);
        
    }
    
    // check login info cookieJar $cookieJar --------------------------------------------------------
    public function check(Request $request) {
        
        // email and pass validate kora
        
        
        // get info from post
        $email = $request->input('email');
        $password = sha1(md5($request->input('email') . $request->input('password')));
        // $token = $request->input('_token');
        
        // get user info from db
        $r = (new Common)->get_user('back_user', $email, $password);
        
        if(!empty($r->id)){
            
            if($r->status == '1'){
                
                // update user token into db
                DB::table('back_user')->where('id', $r->id)->update(['remember_token' => $request->input('_token')]);
                
                // put ticket
                if($request->input('remember')){
                    
                    // put ticket into cookie
                    echo 'This is Cookie';
                    exit();
                    
                    //Cookie::queue(Cookie::make('ticket', $token, 10));
                    //$a =  Cookie::get('ticket');
                    //$a = $request->cookie('ticket');
                    
                    
                }else{
                    
                    // put ticket into session
                    // Session::put('ticket', $request->input('_token'));
                    // $request->session()->put('ticket', $request->input('_token'));
                    
                    session()->put('ticket', $request->input('_token'));
                    
                    
                    $data = Session()->get('ticket');
                    
                    return redirect('/dashboard');
                    
                }
                
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
    
    
    
    // logout ------------------------------------------------------------------
    public function logout(Request $request) {

        $request->session()->flush();
        return redirect('/');
    }
    

}