<?php

Class back_model extends CI_Model
{
	function __construct() {
		parent::__construct();
		$this->load->database('default');
	}

	function cek_login($username,$password)
	{
            $result = $this->db->query("SELECT id,nama FROM member WHERE username='$username' AND password='$password'");
            $this->db->close();
            return $result->result_array();
	}
        
        /* User Management */
        function add_user($email,$password,$name,$username){
            $sql = "INSERT INTO member (email,password,name,username) VALUES(?,?,?,?)";
            
            $npassword = md5($password);
            $this->db->trans_start();
            $this->db->query($sql, array($email, $npassword, $name, $username));

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                $this->db->trans_complete();
                $this->db->close();
                return false;
            }
            else
            {
                $this->db->trans_commit();
                $this->db->trans_complete();
                $this->db->close();
                return true;
            }  
        }
        
        function edit_user($email,$password,$name){
            $sql = "UPDATE member SET name=?, phone=? WHERE email=?";

            $this->db->trans_start();
            $this->db->query($sql, array($name, $phone, $email));

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                $this->db->trans_complete();
                $this->db->close();
                return false;
            }
            else
            {
                $this->db->trans_commit();
                $this->db->trans_complete();
                $this->db->close();
                return true;
            }
        }
        
        function reset_password(){
            $sql = "";
        }
        
        function change_password($email,$password){
            $sql = "UPDATE member SET password=? WHERE email=?";

            $this->db->trans_start();
            $npassword = md5($password);
            $this->db->query($sql, array($npassword, $email));

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                $this->db->trans_complete();
                $this->db->close();
                return false;
            }
            else
            {
                $this->db->trans_commit();
                $this->db->trans_complete();
                $this->db->close();
                return true;
            }  
        }
        
        /* Data Management */
        
        
} ?>

