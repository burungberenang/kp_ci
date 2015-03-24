<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_admin
 *
 * @author Ryannathan
 */
class Model_admin extends CI_Model {

    function  __construct(){
        parent::__construct();
    }
    
    //------------------------------------------------------------------------
    // Authentication
    //------------------------------------------------------------------------
    // cek login karyawan
    function checkkaryawan($username,$password){
        $sql = "SELECT username, nama, jabatan, foto FROM karyawan "
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
    
    //------------------------------------------------------------------------
    // User Registration
    //------------------------------------------------------------------------
    // return username_invalid if username registered
    // return connection_error if transaction failed
    // return success if it's success
    function registerkaryawan($username,$password,$noKTP,$nama,$alamat,$tglLahir,$jabatan,$foto){
        $sql = "INSERT INTO karyawan "
                . " (username,password,noKTP,nama,alamat,tglLahir,jabatan,foto) "
                . " VALUES (?,?,?,?,?,?,?,?)";
        
        $this->load->database('default');

        $this->db->trans_start();
        $this->db->query($sql,array($username,$password,$noKTP,$nama,$alamat,$tglLahir,$jabatan,$foto));
        $this->db->trans_complete();

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
        $sql = "SELECT * FROM karyawan"
                . " WHERE username=?";
        
        $this->load->database('default');
        if ($this->db->query($sql,array($username))->num_rows() > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    
    function get_all_karyawan(){
        $sql = "SELECT foto, nama, jabatan FROM karyawan";
                
        $this->load->database('default');
        $query = $this->db->query($sql);
        
        return $query;
    }
    
    function get_karyawan_byUsername($username){
        
    }
    
    function get_karyawan_byID($userID){
        
    }
    
    // return connection_error if transaction failed
    // return success if it's success
    function edit_data_karyawan($username,$noKTP,$nama,$alamat,$tglLahir,$jabatan,$foto){
        
        $sql = " UPDATE karyawan "
                . " SET noKTP=?,nama=?,alamat=?,tglLahir=?,jabatan=?,foto=? "
                . " WHERE username = ".$username;
        
        $this->load->database('default');
        
        $this->db->trans_start();
        $this->db->query($sql,array($username,$password,$noKTP,$nama,$alamat,$tglLahir,$jabatan,$foto));
        $this->db->trans_complete();
            
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
    
    function edit_password_karyawan($username,$oldpassword,$newpassword){
        
    }
    
}
