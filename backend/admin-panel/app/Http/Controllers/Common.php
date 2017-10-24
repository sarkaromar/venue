<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;



class Common extends Controller {

    
    // get all by table
    public function getall($table) {
        return DB::table($table)->get();
    }
    
    
    // get all with active(1) status by table
    public function getall_active($table) {
        $result = DB::table('users')->get();
    }
    
    
    // get all with inactive(1) status by table
    public function getall_inactive($table) {
        $result = DB::table('users')->get();
    }
    
    
    // get one by id and table
    public function getone($table) {
        
        $result = DB::table('users')->get();
        
    }
    
    
    
    
    // save 
    // update
    // status chenge

    
    // login area --------------------------------------------------------------
    
    // check user by email and password  (lagbena)
    public function check_user($table, $email, $password) {
        
        return DB::table($table)->where('email', $email)->where('password', $password)->count();
        
    }
    
    // get user info by email and password #
    public function get_user($table, $email, $password) {
        
        return DB::table($table)->where('email', $email)->where('password', $password)->first();
        
    }
    
    // check active/inactive by id (lagbena)
    public function is_active($table, $email) {
        
        return DB::table($table)->where('email', $email)->first();
        
    }
    
    
    
}