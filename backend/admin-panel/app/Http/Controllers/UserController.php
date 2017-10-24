<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;

// for recv psot data
use Illuminate\Http\Request;
use App\Http\Requests;

// get table name
use App\Admin;

class UserController extends Controller {
    
    public function index() {
        
        // get list 
        $admin = new Admin();
        $data['lists'] = $admin->get();
        
        $data['title'] = 'user';
        return view('admin.user.list', $data);
        
    }
    
    
    
    public function add() {
        
        // load view
        $data['title'] = 'add user';
        return view('admin.user.add', $data);
        
    }
    
    
    public function do_add(Request $request) {
        
        //dd($request->all());
        //exit();
        
        // validate data
        $this->validate($request, [
            
            'name' => 'required|max:128',
            'email' => 'required|email|max:256|unique:users', // unique:users
            'password' => 'required|min:4',
            'level' => 'required|integer',
            'status' => 'required|integer'
            
        ]);
        
        // save
        $admin = new Admin();
        
        $user_date = [
            
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => sha1($request->input('password')),
            'level' => $request->input('level'),
            'status' => $request->input('status')
            
        ];
        
        // redirecting
        if($admin->insert($user_date)){
            
            $msg = "You are successfully registered!";
            $request->session()->flash('success', $msg);
            return redirect('user/');
            
        } else {
            
            $msg = "Data did not save in DB!";
            $request->session()->flash('error', $msg);
            return redirect('user/add_user/');
            
        }
        
    }
    
    
    
    public function edit(Request $request, $id) {
        
        // get user
        $admin = new Admin();
        $data['list'] = $admin->where('id', $id)->get();
        // view
        $data['title'] = 'Edit user';
        return view('admin.user.edit', $data);
        
    }
    
    
    public function do_edit(Request $request) {
  
        // unique eamil validation
        if($request->input('email') == $request->input('old_email')){
            
            // validate
            $this->validate($request, [
                
                'id' => 'required|integer',
                'name' => 'required|max:128',
                'email' => 'required|email|max:256',
                'password' => 'min:4',
                'level' => 'required|integer',
                'status' => 'required|integer'

            ]);
            
        } else {
            
            // unique email validate 
            $this->validate($request, [

                'id' => 'required|integer',
                'name' => 'required|max:128',
                'email' => 'required|email|max:256|unique:users',
                'password' => 'min:4',
                'level' => 'required|integer',
                'status' => 'required|integer'

            ]);
            
        }
        
        if(!$request->input('password')){
            
            // user data
            $user_date = [
            
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'level' => $request->input('level'),
                'status' => $request->input('status')
            
            ];
            
        } else {
            
            // user data
            $user_date = [
            
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => sha1($request->input('password')),
                'level' => $request->input('level'),
                'status' => $request->input('status')
            
            ];
            
        }
        
        // get id
        $user_id = $request->input('user_id');
        
        // save
        $admin = new Admin();
        
        $result = $admin->where('user_id', $user_id)->update($user_date);
        
        // redirecting
        if($result){
            
            $msg = "Successfully Updated!";
            $request->session()->flash('success', $msg);
            return redirect('user/');
            
        } else {
            
            $msg = "Data did not save in DB!";
            $request->session()->flash('error', $msg);
            return redirect('user/');
            
        }
        
    }
    
    
    public function delete(Request $request, $user_id) {
        
        // get user
        $admin = new Admin();
        
        // redirecting
        if($admin->where('user_id', $user_id)->delete()){
            
            $msg = "Successfully Deleted!";
            $request->session()->flash('success', $msg);
            return redirect('user/');
            
        } else {
            
            $msg = "Data did not Delete form DB!";
            $request->session()->flash('error', $msg);
            return redirect('user/');
            
        }
        
        
        
        
        
        
        
        
        // view
        $data['title'] = 'user';
        return view('admin.user.list', $data);
        
    }
    
    

       
}