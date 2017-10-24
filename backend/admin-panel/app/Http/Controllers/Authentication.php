<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use Illuminate\Support\Facades\DB;


class Authentication  extends Controller {
    
    // checking user validation
    public function __construct() {
        
        // check from session
        if(Session::has('ticket')){
            
            $ticket =  Session::get('ticket');
            
            $result = DB::table('back_user')->select('id', 'name', 'email', 'level', 'status')->where('remember_token', $ticket)->get();
            
            if(isset($result)){
                
               $loggedin = true;
               
            }else{
                
                $loggedin = false;
                
            }
            
        // elseif theke cookie check hobe    
        } else {
            
            echo 'seesion a ticket nai (authontication controller)';
            exit();
            
            // session and cookie reset hobe
            
            
            $msg = "Please, Logged in first!";
            $request->session()->flash('error', $msg);
            return redirect('/login');
            
        }
        
    }
    
    
}