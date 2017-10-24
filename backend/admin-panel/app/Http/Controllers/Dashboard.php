<?php

namespace App\Http\Controllers;

// for recv psot data
use Illuminate\Http\Request;
use App\Http\Requests;

// get commont controller
use App\Http\Controllers\Common;

// get authentication controller
use App\Http\Controllers\Authentication; // may

use Session;


class Dashboard extends Controller {
    
    
    public function __construct(){
        
        
        $this->auth = new Authentication();
        
        if (!$this->auth->loggedin) {
            
            echo 'goto login page!';
             exit();
            
            // redirect(site_url("login"));
        }else{
            
            echo 'goto dashboard';
            exit();
            
        }
    }
    
    public function index() {
        
        
        
        $data = ['title' => 'Dashboard'];
        return view('dashboard', $data);
        //return redirect('dashboard/');
        
        
    }
    
    public function logout(Request $request) {
        
        $request->session()->flush();
        return redirect('/login');
        
    }
    
    

}