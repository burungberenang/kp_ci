<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keluar extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    
    function index(){
        $this->load->view('front/f_header',$data);
        $this->load->view('front/f_login_user');
        $this->load->view('front/f_footer');
    }
}