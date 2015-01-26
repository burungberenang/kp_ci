<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    
    function login(){
        if($this->session->userdata('user')!=null){
            redirect('onestop', 'refresh');
        }else{
            $data['title']="Login";
            $this->load->view('back/b_login',$data);
        }
    }
}
