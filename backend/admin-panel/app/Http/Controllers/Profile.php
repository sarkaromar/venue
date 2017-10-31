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
    
    
    
    
    
    
   
    
}
