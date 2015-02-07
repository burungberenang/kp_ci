<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    }
    
    function index(){
        
    }
    
    function login(){
        $this->load->model('model_member');
        
        $this->form_validation->set_rules('username', 'Username', 'required');
	$this->form_validation->set_rules('password', 'Password', 'required');
        
        $this->form_validation->set_message('required','%s harus diisi.');
        
	if ($this->form_validation->run() == FALSE)
	{
            $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
            $this->session->set_flashdata('warning',validation_errors());
            redirect('/masuk', 'location');
	}
        else
	{
            // check account, etc
            $username= $this->input->post('username');
            $password= $this->input->post('password');
            $logincheck = $this->model_member->checkmember($username, $password);
            
            if ($logincheck)
            {
                // set session
                
                $loginarray = array(
                    'username' => $logincheck->username,
                    'name' => $logincheck->nama,
                    'lastlogin' => $logincheck->lastlogin,
                    'role' => '1' // 0 admin, 1 member, 2,3 dst menyusul
                );
                $this->session->set_userdata($loginarray);
                
                // redirect to contact page + notification
                redirect('/home', 'location');
                
            }
            else
            {
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Username atau Password salah. Silahkan cek lagi.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/masuk', 'location');
                
            }
            
	}
    }
    
    function tambahuser(){
        //load model

        $this->load->model('model_member');
        
        //set validation rules and message
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	$this->form_validation->set_rules('password', 'Password', 'required|matches[repassword]');
        $this->form_validation->set_rules('repassword', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
	$this->form_validation->set_rules('user', 'Username', 'required');
        
        $this->form_validation->set_message('required','%s harus diisi.');
        $this->form_validation->set_message('numeric','%s harus dalam bentuk angka.');
        $this->form_validation->set_message('valid_email','E-mail tidak valid.');
        $this->form_validation->set_message('matches[repassword]','Password yang diulang tidak sesuai.');

        //do something here
	if ($this->form_validation->run() == FALSE)
	{
            $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
            $this->session->set_flashdata('warning',validation_errors());
            redirect('/daftar', 'location');
	}
        else
	{
            // insert database, etc
            $email = $this->input->post('email');
            $pass = $this->input->post('password');
            $nama = $this->input->post('nama');
            $username = $this->input->post('user');
            
            $registeruser = $this->model_member->registeruser($email, $username, $pass, $nama);
                    
            if ($registeruser == "success"){
                $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Akun berhasil didaftarkan</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/daftar', 'location');
            }
            else if ($registeruser == "connection_error")
            {
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Maaf, ada kesalahan koneksi. Silahkan mendaftar ulang</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/daftar', 'location');
            } 
            else if ($registeruser == "username_invalid"){
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Username telah terpakai. Silahkan mencoba username lain.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/daftar', 'location');
            }
	} 
    }
    
}
