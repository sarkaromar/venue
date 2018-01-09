<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Authon;
use App\Http\Controllers\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;
use Session;
session_start();

class Profile extends Controller {
    
    // list --------------------------------------------------------------------
    public function index() {
        
        (new Authon)->check();
        
        $data['info'] = (new Common)->getone('back_user', session::get('id'));
        
        $data['title'] = 'Profile';
        
        $data['menu'] = 'user';
        
        return view('profile.view', $data);
        
    }
    
    // personal update ---------------------------------------------------------
    public function personal_update(Request $request) {
        
        (new Authon)->check();
        
        // exist or new eamil validation -----------------
        if($request->input('email') == $request->input('old_email')){
            
            // exist old email
            $this->validate($request, [
                
                'name' => 'required|max:256',
                'email' => 'required|email|max:256',
                
            ]);
            
        } else {
            
            // new email
            $this->validate($request, [

                'name' => 'required|max:256',
                'email' => 'required|email|max:256|unique:back_user',
                
            ]);
            
        }
        
        // make array
        $data = [
            
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'admin' => session::get('id')

        ];
        
        // update
        if((new Common)->update('back_user', session::get('id'), $data)){
            
            // reset session
            session::forget('name');
            session::forget('email');
            session::put('name', $request->input('name'));
            session::put('email', $request->input('email'));
            
            $msg = "Successfully Updated!";
            Session::flash('success', $msg);
            return redirect('/profile');
            
        } else {
            
            $msg = "Not Updated!";
            Session::flash('error', $msg);
            return redirect('/profile');
            
        }
        
   }
   
   // password update ----------------------------------------------------------
    public function password_update(Request $request) {
        
        (new Authon)->check();
        
        // validation -----------------
        $this->validate($request, [

            'old_password' => 'required|min:4',
            'password' => 'required|min:4|same:password_confirmation',
            'password_confirmation' => 'required'

        ]);
        
        // gen old pass
        $old_pass = sha1(md5($request->input('old_password')));
        
         // check old pass and update
        if((new Common)->check_user('back_user', session::get('email'), $old_pass)){
            
            // genrate new pass and make array
            $new_pass = sha1(md5($request->input('password')));
            $data = [ 'password' => $new_pass ];
            
            // update
            if((new Common)->update('back_user', session::get('id'), $data)){

                $msg = "Password Changed! Please, Logged in again!"; // dosesn't show because logout has flush session
                Session::flash('success', $msg);
                return redirect('/logout');

            } else {

                $msg = "Not Updated!";
                Session::flash('error', $msg);
                return redirect('/profile');

            }
        
        }else{
            
            $msg = "Wrong password!";
            Session::flash('error', $msg);
            return redirect('/profile');
            
        }
        
    }
    
    
    
    
    
   
    
}
