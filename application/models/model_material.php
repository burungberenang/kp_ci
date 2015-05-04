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
class Model_material extends CI_Model {

    function  __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    function hapus_aksesmateri($idKaryawan, $idMateri){
        $sql = " DELETE FROM aksesmateri "
                ." WHERE idKaryawan=? AND idMateri=? ";
        
        $this->load->database('default');
        
        $this->db->trans_start();
        $this->db->query($sql, array($idKaryawan,$idMateri));
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
    
    function hapus_bab($id){
        $sql = " DELETE FROM bab "
                ." WHERE id=? ";
        
        $this->load->database('default');
        
        $this->db->trans_start();
        $this->db->query($sql, array($id));
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
    
    function hapus_subbab($id){
        $sql = " DELETE FROM subbab "
                ." WHERE id=? ";
        
        $this->load->database('default');
        
        $this->db->trans_start();
        $this->db->query($sql, array($id));
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
    
    function edit_aksesmateri($idMateri,$idKaryawan){
        $sql = "UPDATE aksesmateri SET idMateri=?, idKaryawan=? WHERE id=?";
        
        $this->load->database('default');
        
        $this->db->trans_start();
        $this->db->query($sql, array($idMateri,$idKaryawan));
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
    
    function edit_bab($namaBab,$idMateri,$idBab){
        $sql = "UPDATE bab SET nama=?, idMateri=? WHERE id=?";
        
        $this->load->database('default');
        
        $this->db->trans_start();
        $this->db->query($sql, array($namaBab,$idMateri,$idBab));
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
    
    function edit_subbab($idSubbab,$nama,$link,$deskripsi,$idBab){
        $sql = "UPDATE subbab SET nama=?, link=? deskripsi=? idBab=? WHERE id=?";
        
        $this->load->database('default');
        
        $this->db->trans_start();
        $this->db->query($sql, array($nama,$link,$deskripsi,$idBab,$idSubbab));
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

    function get_detail_karyawan($id){
        $sql = "SELECT id, nama "
                . " FROM karyawan"
                . " WHERE id = ".$id;
                
        $this->load->database('default');
        $query = $this->db->query($sql);
        
        return $query->row();
    }
    
    function get_detail_materi($id){
        $sql = "SELECT m.id, p.nama as pelajaran, k.nama as kelas"
                . " FROM materi m"
                . " INNER JOIN pelajaran p on m.idPelajaran = p.id"
                . " INNER JOIN kelas k on k.id = m.idKelas"
                . " WHERE m.id = ".$id;
                
        $this->load->database('default');
        $query = $this->db->query($sql);
        
        return $query;
    }
    
    function get_detail_subbab($id){
        $sql = "SELECT id, nama, link, deskripsi idBab "
                . " FROM subbab"
                . " WHERE id = ".$id;
                
        $this->load->database('default');
        $query = $this->db->query($sql);
        
        return $query->row();
    }
    
    function get_detail_bab($id){
        $sql = "SELECT id, nama, idMateri "
                . " FROM bab"
                . " WHERE id = ".$id;
                
        $this->load->database('default');
        $query = $this->db->query($sql);
        
        return $query->row();
    }
    
    function get_all_aksesmateri_detail(){
        $sql = "SELECT k1.id as idKaryawan, m.id as idMateri, k1.nama as namaKaryawan,p.nama as namaPelajaran, k2.nama as namaKelas FROM aksesmateri a "
                . " INNER JOIN karyawan k1 on k1.id=a.idKaryawan "
                . " INNER JOIN materi m on m.id = a.idMateri "
                . " INNER JOIN pelajaran p on p.id = m.idPelajaran "
                . " INNER JOIN kelas k2 on k2.id = m.idKelas";
                
        $this->load->database('default');
        $query = $this->db->query($sql);
        
        return $query;
    }
    
    function get_all_bab_detail(){
        $sql = "SELECT b.id as id, b.nama as namaBab, p.nama as namaPelajaran, k.nama as namaKelas FROM bab b "
                . " INNER JOIN materi m ON m.id = b.idMateri "
                . " INNER JOIN pelajaran p ON p.id = m.idPelajaran"
                . " INNER JOIN kelas k ON k.id = m.idKelas";
                
        $this->load->database('default');
        $query = $this->db->query($sql);
        
        return $query;
    }
    
    function get_all_subbab_detail(){
        $sql = "SELECT s.id as id, s.nama as namaSubbab, s.link as link, s.deskripsi as deskripsi, b.nama as namaBab FROM subbab s "
                . " INNER JOIN bab b on s.idBab = b.id";
                
        $this->load->database('default');
        $query = $this->db->query($sql);
        
        return $query;
    }
    
    function get_all_bab(){
        $sql = "SELECT id,nama FROM bab ";
                
        $this->load->database('default');
        $query = $this->db->query($sql);
        
        return $query;   
    }
    
    function get_all_materi(){
        $sql = "SELECT m.id as idMateri, p.nama as namaPelajaran, k.nama as namaKelas FROM materi m"
                . " INNER JOIN pelajaran p on m.idPelajaran = p.id"
                . " INNER JOIN kelas k on k.id = m.idKelas ";
                
        $this->load->database('default');
        $query = $this->db->query($sql);
        
        return $query;   
    }    

    function registersubbab($nama,$link,$deskripsi,$idBab){
        $this->db->trans_start();
        $this->db->query("INSERT INTO subbab(nama,link,deskripsi,idBab) VALUES('".$nama."','".$link."','".$deskripsi."',".$idBab.")");
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
    
    function registerbab($nama,$idMateri){
        $this->db->trans_start();
        $this->db->query("INSERT INTO bab(nama,idMateri) VALUES('".$nama."',".$idMateri.")");
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
    
    function registeraksesmateri($idKaryawan,$idMateri){
        $this->db->trans_start();
        $this->db->query("INSERT INTO aksesmateri(idKaryawan,idMateri) VALUES('".$idKaryawan."','".$idMateri."')");
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
    
    function ambil_pelajaran(){
        $result = $this->db->query("SELECT id, nama FROM pelajaran");
        return $result->result_array();
    }
    
    function ambil_edit_pelajaran($id){
        $result = $this->db->query("SELECT id, nama FROM pelajaran WHERE id=".$id);
        return $result->row_array();
    }
    
    function tambah_pelajaran($nama){
        $this->db->trans_start();
        $this->db->query("INSERT INTO pelajaran(nama) VALUES('".$nama."')");
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
    
    function update_pelajaran($id, $nama){
        $this->db->trans_start();
        $this->db->query("UPDATE pelajaran SET nama='".$nama."' WHERE id=".$id);
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
    
    function ambil_kelas(){
        $result = $this->db->query("SELECT id, nama FROM kelas");
        return $result->result_array();
    }
    
    function ambil_edit_kelas($id){
        $result = $this->db->query("SELECT id, nama FROM kelas WHERE id=".$id);
        return $result->row_array();
    }
    
    function tambah_kelas($nama){
        $this->db->trans_start();
        $this->db->query("INSERT INTO kelas(nama) VALUES('".$nama."')");
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
    
    function update_kelas($id, $nama){
        $this->db->trans_start();
        $this->db->query("UPDATE kelas SET nama='".$nama."' WHERE id=".$id);
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
    
    function next_id_materi(){
        $result = $this->db->query("SELECT auto_increment as 'nextId' FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'materi' AND TABLE_SCHEMA = 'a_plus_learning'");
        return $result->row();
    }
    
    function cek_materi($pelajaran, $kelas){
        $result = $this->db->query("SELECT * FROM materi WHERE idPelajaran = '".$pelajaran."' AND idKelas = '".$kelas."' ");
        if($result->num_rows() > 0) return FALSE;
        else return TRUE;
    }
    
    function ambil_materi(){
        $result = $this->db->query("SELECT m.id, p.nama as 'pelajaran', k.nama as 'kelas' FROM materi m INNER JOIN pelajaran p ON p.id=m.idPelajaran INNER JOIN kelas k ON k.id=m.idKelas");
        return $result->result_array();
    }
    
    function ambil_edit_materi($id){
        $result = $this->db->query("SELECT m.id, p.id as 'pelajaran', k.id as 'kelas' FROM materi m INNER JOIN pelajaran p ON p.id=m.idPelajaran INNER JOIN kelas k ON k.id=m.idKelas WHERE m.id=".$id);
        return $result->row_array();
    }
    
    function tambah_materi($pelajaran, $kelas){
        $this->db->trans_start();
        $this->db->query("INSERT INTO materi(idPelajaran, idKelas) VALUES('".$pelajaran."', '".$kelas."')");
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
    
    function update_materi($id, $pelajaran, $kelas){
        $this->db->trans_start();
        $this->db->query("UPDATE materi SET idPelajaran='".$pelajaran."',  idKelas='".$kelas."' WHERE id=".$id);
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
}
