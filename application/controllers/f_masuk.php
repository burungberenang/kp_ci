<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masuk extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
    }
    
    function index(){
        
        $data['title']= "Masuk - A+ Learning Guidance";
        
        $this->load->view('front/f_header',$data);
        $this->load->view('front/f_login_user');
        $this->load->view('front/f_footer');
    }
}