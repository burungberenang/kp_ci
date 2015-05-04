<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author Ryannathan
 */
class Home extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    function index(){
        $data['title']="Beranda - A+ Learning Guidance";
        $this->load->view('front/f_head',$data);
        $this->load->view('front/f_body');
        $this->load->view('front/f_foot');
    }
    
    function info(){
        $data['title']="Info - A+ Learning Guidance";
        $this->load->view('front/f_head',$data);
        $this->load->view('front/f_info');
        $this->load->view('front/f_foot');
    }
    
    function masuk(){
        $data['title']="Masuk - A+ Learning Guidance";
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->view('front/f_head',$data);
        $this->load->view('front/f_login_user');
        $this->load->view('front/f_foot');        
    }
    
    function daftar(){
        $data['title']="Daftar - A+ Learning Guidance";
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->view('front/f_head',$data);
        $this->load->view('front/f_register_user');
        $this->load->view('front/f_foot');
    }
    
    function logincheck(){
        $this->load->model('model_member');
        if ($this->model_member->checkmember())
        {
            
        }
        else
        {
            
        }
    }
    
    function logout(){
        
    }
}
