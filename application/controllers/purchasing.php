<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchasing extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('model_purchasing');
    }
    
    function tambahPaket(){
        if($this->session->userdata('user')==null)
        {
            if($this->input->post('simpan')){
                $this->model_purchasing->tambah_materi($this->input->post('nama'),$this->input->post('nominal'),$this->input->post('masa'),$this->input->post('materi'));
            }
            $user=explode("|",$this->session->userdata('user'));
            $data['title']='Tambah Paket A+ Learning';
            $data['title2']='Tambah Paket';
            $data['user']=$user[0];
            
            $data['pilihan']=$this->model_purchasing->ambil_materi();
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_tambah_paket',$data);
            $this->load->view('back/b_footer',$data);
        } else {
            redirect('login', 'refresh');
        }
        
    }
    
    function lihatPaket(){
        if($this->session->userdata('user')==null)
        {
            $user=explode("|",$this->session->userdata('user'));
            $data['title']='Lihat Paket A+ Learning';
            $data['title2']='Lihat Paket';
            $data['user']=$user[0];
            
            $data['pilihan']=$this->model_purchasing->ambil_paket();
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_lihat_paket',$data);
            $this->load->view('back/b_footer',$data);
        } else {
            redirect('login', 'refresh');
        }
        
    }
}
