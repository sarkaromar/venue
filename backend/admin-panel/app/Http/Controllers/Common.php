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
        $result = DB::table($table)->get();
    }
    
    // get all with inactive(1) status by table
    public function getall_inactive($table) {
        $result = DB::table($table)->get();
    }
    
    // get one by id and table
    public function getone($table) {
        $result = DB::table($table)->get();
    }
    
    
    // save single row
    public function save($table, $data) {
        $r = DB::table($table)->insert($data);
        if($r){
            return TRUE;
        }  else {
            return FALSE;   
        }
    }
    
    // update single row
    public function update($table, $id, $data) {
        $r = DB::table($table)->where('id', $id)->update($data);
        
        if($r){
            return TRUE;
        }  else {
            return FALSE;   
        }
    }
    
    // delete a id from table
    public function delete($table, $id) {
        
        $r = DB::table($table)->where('id', $id)->delete();
        
        if($r){
            return TRUE;
        }  else {
            return FALSE;   
        }
    }
    
    
    
    
    
    
    
    
    // for status change ####
    public function status($table, $id, $status) {
        
        $value = array('status'=> $status);
        $r = $this->db->where('id', $id)->update($table, $value);
        if($r){
            return TRUE;
        }  else {
            return FALSE; 
        }
        
    }
    
  
 
    
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