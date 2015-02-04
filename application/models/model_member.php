<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of member
 *
 * @author Ryannathan
 */
class Model_member extends CI_Model {

    function  __construct(){
        parent::__construct();
    }
    
    //------------------------------------------------------------------------
    // Authentication
    //------------------------------------------------------------------------
    function checkmember($username,$password){
        $sql = "SELECT * FROM member "
                . " WHERE username=? AND "
                . " password=?";
        
        $npassword = md5($password);
        
        $this->load->database('default');
        $row = $this->db->query($sql,array($username, $npassword));
        if ($row->num_rows()==1)
        {
            //updatelastlogin($username);
            return $row;
        }
        else
        {
            return false;
        }
        
    }
    
    function updatelastlogin($username){
        $sql = "UPDATE member "
                . " set lastlogin=? "
                . " WHERE username=?";
        
        $this->db->query($sql, array(time(),$username));
    }
    //------------------------------------------------------------------------
    
    //------------------------------------------------------------------------
    // User Registration
    //------------------------------------------------------------------------
    // return username_invalid if username registered
    // return connection_error if transaction failed
    // return success if it's success
    function registeruser($email,$username,$password,$name){
        $sql = "INSERT INTO member (nama,email,username,password) "
                . " VALUES (?,?,?,?)";
        
        $this->load->database('default');
        
        if (checkusername){
            $this->db->trans_start();
            $this->db->query($sql,array($name,$email,$username,$password));
            $this->db->trans_complete();
        }
        else{
            return "username_invalid";
        }       
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->close();
            return "connection_error";
        }
        else
        {
            $this->db->close();
            return "success";
        }
        
        
    }
    
    // return true and false depends on the username records.
    // true if there is no username in the table and vice versa.
    function checkusername($username){
        $sql = "SELECT * FROM member"
                . " WHERE username=?";
        
        if ($this->db->query($sql,array($username))->num_rows() > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    //------------------------------------------------------------------------
}
