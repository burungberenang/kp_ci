<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchasing extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_purchasing');
    }
    
    function tambahPaket(){
        if($this->session->userdata('role'))
        {
            if($this->input->post('simpan')){
                $this->form_validation->set_rules('nama', 'Nama', 'required');
                $this->form_validation->set_rules('materi', 'Materi', 'required');
                $this->form_validation->set_rules('nominal', 'Harga', 'required|numeric');
                $this->form_validation->set_rules('masa', 'Masa berlaku', 'required|numeric');
                if($this->form_validation->run()==false){
                    $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
                    $this->session->set_flashdata('warning',validation_errors());
                    $this->session->set_flashdata('isiform',array('nama'=>$this->input->post('nama'),'nominal'=>$this->input->post('nominal'),'masa'=>$this->input->post('masa'),'materi'=>$this->input->post('materi')));
                    redirect('purchasing/tambahPaket', 'location');
                }else{
                    $hasil=$this->model_purchasing->tambah_materi($this->input->post('nama'),$this->input->post('nominal'),$this->input->post('masa'),$this->input->post('materi'));
                    if($hasil=="connection_error")
                    {
                        $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Maaf, ada kesalahan koneksi. Silahkan mendaftar ulang</strong> "
                            . "</div>";
                        $this->session->set_flashdata('warning',$warning);
                    }else if($hasil=="success"){
                        $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Akun berhasil didaftarkan</strong> "
                            . "</div>";
                        $this->session->set_flashdata('warning',$warning);
                    }
                    //echo '<script type="text/javascript">alert("Data telah diubah");</script>';
                    redirect('purchasing/tambahPaket','refresh');
                }
            }else if($this->input->post('kembali')){
                redirect('purchasing/lihatPaket');
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
            redirect('guidance/login', 'refresh');
        }
        
    }
    
    function lihatPaket(){
        if($this->session->userdata('role'))
        {
            $user=explode("|",$this->session->userdata('user'));
            $data['title']='Lihat Paket A+ Learning';
            $data['title2']='Lihat Paket';
            $data['user']=$user[0];
            
            $data['paket']=$this->model_purchasing->ambil_paket();
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_lihat_paket',$data);
            $this->load->view('back/b_footer',$data);
        } else {
            redirect('guidance/login', 'refresh');
        }
        
    }
    
    function editPaket($id){
        if($this->session->userdata('role'))
        {
            if($this->input->post('simpan')){
                $this->model_purchasing->update_materi($this->input->post('id'), $this->input->post('nama'),$this->input->post('nominal'),$this->input->post('masa'),$this->input->post('materi'));
                //echo '<script type="text/javascript">alert("Data telah diubah");</script>';
                redirect('purchasing/lihatPaket','refresh');
            }else if($this->input->post('kembali')){
                redirect('purchasing/lihatPaket');
            }
            $user=explode("|",$this->session->userdata('user'));
            $data['title']='Tambah Paket A+ Learning';
            $data['title2']='Tambah Paket';
            $data['user']=$user[0];
            
            $data['pilihan']=$this->model_purchasing->ambil_edit_materi();
            $temp=$this->model_purchasing->ambil_edit_paket($id);
            $data['idMateri']=$temp['idMateri'];
            $data['id']=$temp['id'];
            $data['nama']=$temp['nama'];
            $data['nominal']=$temp['nominal'];
            $data['masaBerlaku']=$temp['masaBerlaku'];
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_edit_paket',$data);
            $this->load->view('back/b_footer',$data);
        } else {
            redirect('guidance/login', 'refresh');
        }
    }
}
