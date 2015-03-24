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
}