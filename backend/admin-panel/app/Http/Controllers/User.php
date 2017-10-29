<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Authon;
use App\Http\Controllers\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;
use Session;
session_start();


class User extends Controller {
    
    // user list ---------------------------------------------------------------
    public function index() {
        
        (new Authon)->check();
        
        $data['lists'] = (new Common)->getall('back_user');
        
        $data['title'] = 'User List';
        
        return view('user.list', $data);
        
    }
    
    // add user ----------------------------------------------------------------
    public function add(Request $request) {
        
        // validate
        $this->validate($request, [
            
            'name' => 'required|max:256',
            'email' => 'required|email|max:256|unique:back_user',
            'password' => 'required|min:4|same:password_confirmation',
            'password_confirmation' => 'required',
            'level' => 'required',
            'admin' => 'required'
            
        ]);
        
        // make array
        $data = [
            
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => sha1(md5($request->input('email').$request->input('password'))),
            'level' => $request->input('level'),
            'admin' => $request->input('admin')
                
        ];
        
        // save 
        if((new Common)->save('back_user', $data)){
            
            $msg = "Successfully Added!";
            $request->session()->flash('success', $msg);
            return redirect('/user');
            
        } else {
            
            $msg = "Not Saved!";
            $request->session()->flash('danger', $msg);
            return redirect('/user');
            
        }
        
    }
    
    // edit user ---------------------------------------------------------------
    public function edit(Request $request) {
        
        // exist or new eamil validation -----------------
        if($request->input('email') == $request->input('old_email')){
            
            // exist old email
            $this->validate($request, [
                
                'id' => 'required|integer',
                'name' => 'required|max:256',
                'email' => 'required|email|max:256',
                'level' => 'required|integer',
                'admin' => 'required|integer'
                
            ]);
            
        } else {
            
            // new email
            $this->validate($request, [

                'id' => 'required|integer',
                'name' => 'required|max:256',
                'email' => 'required|email|max:256|unique:back_user',
                'level' => 'required|integer',
                'admin' => 'required|integer'
                
            ]);
            
        }
        
        // exist password or not -----------------
        if(!$request->input('password')){
            
            // make array
            $data = [
            
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'level' => $request->input('level'),
                'admin' => $request->input('admin')
                
            ];
            
        } else {
            
            // make array
            $data = [
            
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => sha1(md5($request->input('email') . $request->input('password'))),
                'level' => $request->input('level'),
                'admin' => $request->input('admin')
                
            ];
            
        }
        
        // update
        if((new Common)->update('back_user', $request->input('id'), $data)){
            
            $msg = "Successfully Updated!";
            $request->session()->flash('success', $msg);
            return redirect('/user');
            
        } else {
            
            $msg = "Not Updated!";
            $request->session()->flash('error', $msg);
            return redirect('/user');
            
        }
        
        
        
    }
    
    // delete user -------------------------------------------------------------
    public function delete($id) {
        
        echo '<pre>';
        print_r($id);
        exit();
        
        
        
        // delete 
        if((new Common)->delete('back_user', $id)){
            
            $msg = "Successfully Deleted!";
            $request->session()->flash('success', $msg);
            return redirect('/user');
            
        } else {
            
            $msg = "Data did not Delete form DB!";
            $request->session()->flash('error', $msg);
            return redirect('/user');
            
        }
        
    }
    
    

       
}