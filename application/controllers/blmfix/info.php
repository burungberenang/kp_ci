<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    
    function index(){
        
        $data['title']= "Info - A+ Learning Guidance";
        
        $this->load->view('front/f_header',$data);
        $this->load->view('front/f_info');
        $this->load->view('front/f_footer');
    }
}