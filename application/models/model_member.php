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
            return $row->row();
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
            $this->db->close();
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
    
    // Hak akses materi //
    function ambilmateriuser($username){
        $sql = "SELECT pl.nama as namaPelajaran, k.nama as namaKelas, mt.id as idMateri FROM historybayar hb "
                . " INNER JOIN member m ON hb.idMember = m.id "
                . " INNER JOIN paket p ON p.id = hb.idPaket "
                . " INNER JOIN materi mt ON p.idMateri = mt.id "
                . " INNER JOIN pelajaran pl ON pl.id = mt.idPelajaran "
                . " INNER JOIN kelas k ON k.id = mt.idKelas "
                . " WHERE m.username ='".$username."' AND hb.tanggalNonAktif > NOW()";
                
        $this->load->database('default');
        $query = $this->db->query($sql);
        
        return $query;
    }
    
    function ambildetailuser($username){
        $sql = "SELECT * FROM member "
                . " WHERE username=? ";
        
        $this->load->database('default');
        $row = $this->db->query($sql,array($username));
        
        if ($row->num_rows()==1)
        {
            return $row->row();
        }
        else
        {
            return false;
        }
    }
    
    function ambildetailmateri($idMateri){
        $sql = "SELECT m.id as idMateri, p.nama as namaPelajaran, k.nama as namaKelas "
                . " FROM materi m "
                . " INNER JOIN pelajaran p ON m.idPelajaran = p.id "
                . " INNER JOIN kelas k ON k.id = m.idKelas "
                . " WHERE m.id = ? ";
        
        $this->load->database('default');
        $row = $this->db->query($sql,array($idMateri));
        
        if ($row->num_rows() > 0)
        {
            return $row->row();
        }
        else
        {
            return false;
        }
    }
    
    function ambildetailbab($idBab){
        $sql = "SELECT b.id as idBab, b.nama as namaBab "
                . " FROM bab b "
                . " WHERE b.id = ? ";
        
        $this->load->database('default');
        $row = $this->db->query($sql,array($idBab));
        
        if ($row->num_rows() > 0)
        {
            return $row->row();
        }
        else
        {
            return false;
        }
    }
    
    function ambildetailkelas($idKelas){
        $sql = "SELECT k.id as idKelas, k.nama as namaKelas "
                . " FROM kelas k "
                . " WHERE k.id = ? ";
        
        $this->load->database('default');
        $row = $this->db->query($sql,array($idKelas));
        
        if ($row->num_rows() > 0)
        {
            return $row->row();
        }
        else
        {
            return false;
        }
    }
    
    function ambilsemuapelajaran($idKelas){
        $sql = " SELECT m.id as idMateri, k.nama as namaKelas, p.nama as namaPelajaran "
                . " FROM kelas k "
                . " INNER JOIN materi m ON m.idKelas = k.id "
                . " INNER JOIN pelajaran p ON p.id = m.idPelajaran"
                . " WHERE k.id = ? ";
        
        $this->load->database('default');
        $row = $this->db->query($sql,array($idKelas));
        
        if ($row->num_rows() > 0)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    function ambilsemuabab($idMateri){
        $sql = " SELECT m.id as idMateri, b.nama as namaBab, b.id as idBab "
                . " FROM materi m "
                . " INNER JOIN bab b ON m.idPelajaran = b.id "
                . " WHERE m.id = ? ";
        
        $this->load->database('default');
        $row = $this->db->query($sql,array($idMateri));
        
        if ($row->num_rows() > 0)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    function ambilsemuasubbab($idBab){
        $sql = " SELECT sb.id as idSubbab, sb.nama as namaSubbab, sb.deskripsi as deskripsi, sb.link as link "
                . " FROM subbab sb "
                . " INNER JOIN bab b ON b.id = sb.idBab "
                . " WHERE b.id = ? ";
        
        $this->load->database('default');
        $row = $this->db->query($sql,array($idBab));
        
        if ($row->num_rows() > 0)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }
}
