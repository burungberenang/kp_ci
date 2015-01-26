<?php

Class Model_purchasing extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function ambil_materi(){
        $result = $this->db->query("SELECT m.id, p.nama as pelajaran, k.nama as kelas FROM materi m INNER JOIN pelajaran p ON p.id=m.idPelajaran INNER JOIN kelas k ON k.id=m.idKelas WHERE m.id NOT IN (SELECT idMateri FROM paket)");
        return $result->result_array();
    }
    
    function ambil_edit_materi(){
        $result = $this->db->query("SELECT m.id, p.nama as pelajaran, k.nama as kelas FROM materi m INNER JOIN pelajaran p ON p.id=m.idPelajaran INNER JOIN kelas k ON k.id=m.idKelas");
        return $result->result_array();
    }
    
    function ambil_paket(){
        $result = $this->db->query("SELECT p.nama AS 'materi', k.nama AS 'materi1', pkt.id, pkt.nama, pkt.nominal, pkt.masaBerlaku FROM paket pkt INNER JOIN materi m ON m.id=pkt.idMateri INNER JOIN pelajaran p ON p.id=m.idPelajaran INNER JOIN kelas k ON k.id=m.idKelas");
        return $result->result_array();
    }
    
    function ambil_edit_paket($id){
        $result = $this->db->query("SELECT pkt.idMateri, pkt.id, pkt.nama, pkt.nominal, pkt.masaBerlaku FROM paket pkt WHERE pkt.id=".$id);
        return $result->row_array();
    }
    
    function tambah_materi($nama, $nominal, $masa, $materi){
        $this->db->query("INSERT INTO paket(nama, nominal, masaBerlaku, idMateri) VALUES('".$nama."', ".$nominal.", ".$masa.", ".$materi.")");
    }
    function update_materi($id,$nama,$nominal,$masa,$materi){
        $this->db->query("UPDATE paket SET nama='".$nama."', nominal=".$nominal.", masaBerlaku=".$masa.", idMateri=".$materi." WHERE id=".$id);
    }
} ?>

