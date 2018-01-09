<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Session;

class Authon  extends Controller {
    
    public function check(){
        
        $id = session::get('id');
        
        if($id == null){
            return Redirect::to('/login')->send(); 
        }
        
    }
      
    
}