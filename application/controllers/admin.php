<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author Ryannathan
 */
class Admin extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    }
    
    function halaman_login(){
        $data['title'] = "Masuk - A+ Learning Guidance";
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->view('back/b_login',$data);
    }
    
    function login(){
        $this->load->model('model_admin');
        
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
            redirect('/guidance/login', 'location');
	}
        else
	{
            // check account, etc
            $username= $this->input->post('username');
            $password= $this->input->post('password');
            $logincheck = $this->model_admin->checkkaryawan($username, $password);
            
            if ($logincheck)
            {
                // set session
                
                $loginarray = array(
                    'username' => $logincheck->username,
                    'name' => $logincheck->nama,
                    'lastlogin' => $logincheck->lastlogin,
                    'role' => '0' // 0 admin, 1 member, 2,3 dst menyusul
                );
                $this->session->set_userdata($loginarray);
                
                // redirect to contact page + notification
                redirect('/guidance/home', 'location');
                
            }
            else
            {
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Username atau Password salah. Silahkan cek lagi.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/login', 'location');
                
            }
            
	} 
    }
    
    function halaman_tambahadmin(){
        $data['title']="Tambah Karyawan - A+ Learning Guidance";
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_backend');
        $this->load->view('back/b_footer');   
    }
    
    function tambahadmin(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->view('front/f_header',$data);
        $this->load->view('front/f_login_user');
        $this->load->view('front/f_footer');   
    }
    
    function halaman_backend(){
        $data['title']="Beranda - A+ Learning Guidance";
        
        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_backend');
        $this->load->view('back/b_footer');  
    }
        
}
