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
    
    // list --------------------------------------------------------------------
    public function index() {
        
        (new Authon)->check();
        
        $data['lists'] = (new Common)->getall('back_user');
        
        $data['title'] = 'User List';
        
        $data['menu'] = 'user';
        
        return view('user.list', $data);
        
    }
    
    // add ---------------------------------------------------------------------
    public function add(Request $request) {
        
        (new Authon)->check();
        
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
            'password' => sha1(md5($request->input('password'))),
            'level' => $request->input('level'),
            'admin' => $request->input('admin')
                
        ];
        
        // save 
        if((new Common)->save('back_user', $data)){
            
            $msg = "Successfully Added!";
            Session::flash('success', $msg);
            return redirect('/user');
            
        } else {
            
            $msg = "Not Saved!";
            Session::flash('error', $msg);
            return redirect('/user');
            
        }
        
    }
    
    // edit --------------------------------------------------------------------
    public function edit(Request $request) {
        
        (new Authon)->check();
        
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
                'password' => sha1(md5($request->input('password'))),
                'level' => $request->input('level'),
                'admin' => $request->input('admin')
                
            ];
            
        }
        
        // update
        if((new Common)->update('back_user', $request->input('id'), $data)){
            
            $msg = "Successfully Updated!";
            Session::flash('success', $msg);
            return redirect('/user');
            
        } else {
            
            $msg = "Not Updated!";
            Session::flash('error', $msg);
            return redirect('/user');
            
        }
        
   }
    
    // status ------------------------------------------------------------------
    public function status($id, $status) {
        
        (new Authon)->check();
        
        // status 
        if((new Common)->status('back_user', $id, $status)){
            
            $msg = "Successfully Updated!";
            Session::flash('success', $msg);
            return redirect('/user');
            
        }
                   
    }
    
    // delete ------------------------------------------------------------------
    public function delete($id) {
        
        (new Authon)->check();
        
        // delete 
        if((new Common)->delete('back_user', $id)){
            
            $msg = "Successfully Deleted!";
            Session::flash('success', $msg);
            return redirect('/user');
            
        } else {
            
            $msg = "Data did not Delete form DB!";
            Session::flash('error', $msg);
            return redirect('/user');
            
        }
        
    }
    
    

       
}