<?php

Class Model_purchasing extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function ambil_materi(){
        $result = $this->db->query("SELECT m.id, p.nama as pelajaran, k.nama as kelas FROM materi m INNER JOIN pelajaran p ON p.id=m.idPelajaran INNER JOIN kelas k ON k.id=m.idKelas WHERE m.id NOT IN (SELECT idMateri FROM paket)");
        //$result = $this->db->query("SELECT m.id, p.nama as pelajaran, k.nama as kelas FROM materi m INNER JOIN pelajaran p ON p.id=m.idPelajaran INNER JOIN kelas k ON k.id=m.idKelas");
        return $result->result_array();
    }
    
    function ambil_paket(){
        $result = $this->db->query("SELECT * FROM paket");
        return $result->result_array();
    }
    
    function tambah_materi($nama, $nominal, $masa, $materi){
        $this->db->query("INSERT INTO paket(nama, nominal, masaBerlaku, idMateri) VALUES('".$nama."', ".$nominal.", ".$masa.", ".$materi.")");
    }

} ?>

