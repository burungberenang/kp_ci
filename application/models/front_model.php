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

} ?>

