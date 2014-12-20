<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OneStop extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('back_model');
    }

    //----------------------------------------Load View------------------------------------------------------

    public function index()
    {
        if($this->session->userdata('user')!=null)
        {
            $user=explode("|",$this->session->userdata('user'));
            $data['user']=$user[0];
            $data['title']="Dashboard A+ Learning";

            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_backend',$data);
            $this->load->view('back/b_footer',$data);
        } else {
            redirect('onestop/login', 'refresh');
        }
    }
    
    public function login()
    {
        if($this->session->userdata('user')!=null){
            redirect('onestop', 'refresh');
        }else{
            $data['title']="Login";
            $this->load->view('back/b_login',$data);
        }
    }

    //----------------------------------------Cek Login------------------------------------------------------
    
    public function checkLogin(){
        $user=$this->input->post('username');
        $pass=$this->input->post('password');
    	$hasil = $this->back_model->cek_login($user,$pass);
    	if(count($hasil)>0){
    		$this->session->set_userdata('user',$hasil['id'].'|'.$hasil['nama']);
    		redirect('onestop');
    	}else{
            ?>
    		<script type="text/javascript">alert("Username atau Password Salah");</script>
            <?php
            redirect('onestop/login', 'refresh');
    	}
    }

    //----------------------------------------Logout------------------------------------------------------
    public function doLogout(){
        $this->session->unset_userdata('user');
        redirect('onestop/login', 'refresh');
    }

}