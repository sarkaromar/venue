<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Authon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class Dashboard extends Controller {
    
    public function index() {
        
        (new Authon)->check();
        
        $data['title'] = 'Dashboard';
        
        $data['menu'] = 'dash';
        
        return view('dashboard', $data);
      
    }
    
    public function logout() {
        
        (new Authon)->check();
        
        session::flush();
        return redirect('/login');
        
    }
    
    
    

}