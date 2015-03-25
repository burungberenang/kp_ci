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