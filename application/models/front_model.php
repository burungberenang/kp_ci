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
    
    function ambil_paket_terbeli($member){
        $result = $this->db->query("SELECT p.nama AS 'materi', k.nama AS 'materi1', pkt.id, pkt.nominal, pkt.masaBerlaku FROM paket pkt INNER JOIN materi m ON m.id=pkt.idMateri INNER JOIN pelajaran p ON p.id=m.idPelajaran INNER JOIN kelas k ON k.id=m.idKelas INNER JOIN historybayar hb ON hb.idPaket = pkt.id WHERE hb.idMember = ".$member." AND status = 0");
        return $result->result_array();
    }
    
    function ambil_foto($member, $paket){
        $result = $this->db->query("SELECT gambar FROM historybayar WHERE idMember = ".$member." AND idPaket = ".$paket);
        return $result->row_array();
    }
    
    function cek_member($username, $paket){
        $member = $this->get_member_id($username);
        $result = $this->db->query("SELECT * FROM historybayar WHERE idMember = ".$member['id']." AND idPaket = ".$paket);
        if($result->num_rows()>0) return TRUE;
        else return FALSE;
    }
    
    function edit_gambar($member, $paket, $gambar){
        $this->db->trans_start();
        $this->db->query("UPDATE historybayar SET gambar = '".$gambar."' WHERE idMember = ".$member." AND idPaket = ".$paket);
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
    
    function ambil_hasil_pencarian($cari){
        $result = $this->db->query("SELECT b.id, s.nama, s.deskripsi FROM subbab s INNER JOIN bab b ON b.id=s.idBab WHERE s.nama LIKE '%".$cari."%' OR s.deskripsi LIKE '%".$cari."%' OR b.nama LIKE '%".$cari."%' ");
        return $result->result_array();
    }
    
    function ambil_produk_terlaris(){
        $result = $this->db->query("SELECT p.nama, pl.nama as 'materi2', k.nama as 'materi1', COUNT(*) as 'jumlah', h.idPaket FROM paket p INNER JOIN historybayar h ON h.idPaket = p.id INNER JOIN materi m ON m.id = p.idMateri INNER JOIN pelajaran pl ON pl.id = m.idPelajaran INNER JOIN kelas k ON k.id = m.idKelas GROUP BY h.idPaket ORDER BY jumlah DESC LIMIT 3");
        return $result->result_array();
    }
} ?>

