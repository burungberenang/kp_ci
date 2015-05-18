<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
        $this->session->sess_destroy();
        
        redirect('/', 'location');
    }
    
    function beliMateri(){
        $this->load->library('cart');
        $this->load->helper('form');
        if($this->input->post('tambah')){
            $cart = array(
               'id'      => $this->input->post('id'),
               'qty'     => 1,
               'price'   => $this->input->post('nominal'),
               'name'    => $this->input->post('nama'),
               'masa'    => $this->input->post('masa').' bulan'
            );
            $this->cart->insert($cart);
        }else if($this->input->post('hapus')){
            $cart = array(
               'rowid'  => $this->input->post('rowid'),
               'qty'    => 0
            );
            $this->cart->update($cart);
        }
        $temp = array();
        foreach ($this->cart->contents() as $items){
            $temp[$items['id']]=$items['rowid'];
        }
        $data['barangs'] = $temp;
        $this->load->model('front_model');
        $data['title']="Beli Materi - A+ Learning Guidance";
        $member = $this->front_model->get_member_id($this->session->userdata('username'));
        $data["materis"] = $this->front_model->ambil_paket($member['id']);
        $this->load->view('front/f_head',$data);
        $this->load->view('front/f_beli_materi',$data);
        $this->load->view('front/f_foot');
    }
    
    function cart(){
        $this->load->library('cart');
        if($this->input->post('hapus')){
            $cart = array(
               'rowid'  => $this->input->post('rowid'),
               'qty'    => 0
            );
            $this->cart->update($cart);
        }else if($this->input->post('hapussemua')){
            $this->cart->destroy();
        }else if($this->input->post('checkout')){
            redirect('materi/checkout');
        }
        $data['title']="Cart - A+ Learning Guidance";
        $this->load->view('front/f_head',$data);
        $this->load->view('front/f_cart',$data);
        $this->load->view('front/f_foot');
    }
    
    function checkout(){
        $this->load->library('cart');
        if(!$this->cart->contents()) redirect('materi/cart');
        if($this->input->post('submit')){
            foreach ($this->cart->contents() as $items){
                $this->load->model('front_model');
                $member = $this->front_model->get_member_id($this->session->userdata('username'));
                $this->front_model->simpan_histori($member['id'], $items['id']);
            }
            $this->cart->destroy();
            redirect();
        }
        $data['title']="Checkout - A+ Learning Guidance";
        $this->load->view('front/f_head',$data);
        $this->load->view('front/f_checkout',$data);
        $this->load->view('front/f_foot');
        
    }
}
