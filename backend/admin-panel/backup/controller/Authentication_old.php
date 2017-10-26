<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class Authentication  extends Controller {
    
    // checking user validation
    public function __construct() {
        
        return session('ticket');

        // check from session
        if(session()->has('ticket')){
            
            $ticket =  session()->get('ticket');
            
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
            session()->flash('error', $msg);
            return redirect('/login');
            
        }
        
    }
    
    
}