<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('front_model');
    }

    public function index()
    {
        $data['title']="Home - A+ Learning";
        $this->load->view('front/f_header',$data);
        $this->load->view('front/f_home');
        $this->load->view('front/f_footer');
    }

    public function info()
    {
        $data['title']="Info - A+ Learning";
        $this->load->view('front/f_header',$data);
        $this->load->view('front/f_info');
        $this->load->view('front/f_footer');
    }

    public function login()
    {
        if($this->session->userdata('userf')){
            redirect('home');
        }else{
            $data['title']="Home - A+ Learning";
            $this->load->view('front/f_header',$data);
            $this->load->view('front/f_login_user');
            $this->load->view('front/f_footer');
        }
    }
    
    public function materi($materi)
    {
        if($this->session->userdata('userf')&&$materi!=NULL){
            $data['title']="Materi - A+ Learning";
            $this->load->view('front/f_header',$data);
            $this->load->view('front/f_info');
            $this->load->view('front/f_footer');
        } else {
            redirect('home');
        }
    }

    public function register()
    {
        if($this->session->userdata('userf')){
            redirect('home');
        }else{
            if($this->input->post('daftar')){
                $this->form_validation->set_rules('password', 'Password Confirmation', 'matches[repassword]');
                $this->form_validation->set_message('matches', 'Password tidak cocok');
                if($this->form_validation->run()){
                    $data['sukses']=true;
                }
            }
            $data['title']="Home - A+ Learning";
            $this->load->view('front/f_header',$data);
            $this->load->view('front/f_register_user');
            $this->load->view('front/f_footer');
        }
    }

    //----------------------------------------Cek Login------------------------------------------------------
    
    public function dologin(){
        $user=$this->input->post('username');
        $pass=$this->input->post('password');
    	$hasil = $this->front_model->cek_login($user,$pass);
    	if(count($hasil)>0){
            $this->session->set_userdata('userf',$hasil['id'].'|'.$hasil['nama']);
            redirect('home');
    	}else{
            ?>
    		<script type="text/javascript">alert("Username atau Password Salah");</script>
            <?php
            redirect('home/login', 'refresh');
    	}
    }

    //----------------------------------------Logout------------------------------------------------------
    
    public function dologout(){
        if($this->session->userdata('userf')){
            $this->session->unset_userdata('userf');
            redirect('home');
        }
    }
}