<?php

namespace App\Http\Controllers;

// for recv psot data
use Illuminate\Http\Request;
use App\Http\Requests;

// get commont controller
use App\Http\Controllers\Common;

// get authentication controller
use App\Http\Controllers\Authentication;


class Dashboard extends Controller {
    
    
    public function __construct(){
        
        return session('ticket');
        
        $this->auth = new Authentication();
        
        if (!$this->auth->loggedin) {
            return redirect('/login');
        }
        
    }
    
    public function index() {
        
        
        
        $a = $this->auth->result;
        
        echo '<pre>';
print_r($a);
exit();
        
        $data = ['title' => 'Dashboard'];
        return view('dashboard', $data);
      
    }
    
    public function logout(Request $request) {
        
        $request->session()->flush();
        return redirect('/login');
        
    }
    
    

}