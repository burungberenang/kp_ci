<?php

Class front_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function cek_login($username,$password){
        $result = $this->db->query("SELECT id,nama FROM member WHERE username='$username' AND password='$password'");
        return $result->result_array();
    }
    
    function ambil_paket($member){
        $result = $this->db->query("SELECT p.nama AS 'materi', k.nama AS 'materi1', pkt.id, pkt.nama, pkt.nominal, pkt.masaBerlaku FROM paket pkt INNER JOIN materi m ON m.id=pkt.idMateri INNER JOIN pelajaran p ON p.id=m.idPelajaran INNER JOIN kelas k ON k.id=m.idKelas WHERE pkt.id NOT IN (SELECT idPaket FROM historybayar WHERE idMember = ".$member.")");
        return $result->result_array();
    }

    function get_member_id($username){
        $result = $this->db->query("SELECT id FROM member WHERE username='$username'");
        return $result->row_array();
    }
    
    function simpan_histori($member, $paket){
        $this->db->trans_start();
        $this->db->query("INSERT INTO historybayar(tanggal, idMember, idPaket, status) VALUES(NOW(),".$member." ,".$paket." , 0)");
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
} ?>

