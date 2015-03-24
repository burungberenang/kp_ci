<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of material
 *
 * @author Ryannathan
 */
class Material extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('model_material');
    }
    

    function tambahbab(){
        
    }
    
    function tambahsubbab(){
        
    }
    
    function tambahaksesmateri(){
        
    
    }
        
    
    function tambahPelajaran(){
        if($this->session->userdata('role'))
        {
            if($this->input->post('simpan')){
                //buat rule form validation
                $this->form_validation->set_rules('nama', 'Nama', 'required');
                if($this->form_validation->run()==false){
                    
                    //munculkan error kalau validasi salah
                    $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
                    $this->session->set_flashdata('warning',validation_errors());
                    
                    //tampung pada flash data buat nampilin isi yang sebelumnya 
                    $this->session->set_flashdata('isiform',array('nama'=>$this->input->post('nama')));
                    redirect('guidance/pelajaran/tambah', 'location');
                }else{
                    $hasil=$this->model_material->tambah_pelajaran($this->input->post('nama'));
                    if($hasil=="connection_error")
                    {
                        //munculkan error kalau transaksi sql gagal
                        $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Maaf, ada kesalahan koneksi. Silahkan mendaftar ulang</strong> "
                            . "</div>";
                        $this->session->set_flashdata('warning',$warning);
                    }else if($hasil=="success"){
                        //munculkan pemberitahuan jika data telah berhasil ditambahkan
                        $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Akun berhasil didaftarkan</strong> "
                            . "</div>";
                        $this->session->set_flashdata('warning',$warning);
                    }
                    redirect('guidance/pelajaran/tambah','refresh');
                }
            }
            $data['title']='Tambah Pelajaran A+ Learning';
            $data['title2']='Tambah Pelajaran';
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_tambah_pelajaran');
            $this->load->view('back/b_footer');
        } else {
            redirect('guidance/login', 'refresh');
        }
        
    }
    
    function lihatPelajaran(){
        if($this->session->userdata('role'))
        {
            $data['title']='Lihat Pelajaran A+ Learning';
            $data['title2']='Lihat Pelajaran';
            
            $data['pelajaran']=$this->model_material->ambil_pelajaran();
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_lihat_pelajaran',$data);
            $this->load->view('back/b_footer');
        } else {
            redirect('guidance/login', 'refresh');
        }
        
    }
    
    function editPelajaran($id){
        if($this->session->userdata('role'))
        {
            if($this->input->post('simpan')){
                //buat rule form validation
                $this->form_validation->set_rules('nama', 'Nama', 'required');
                if($this->form_validation->run()==false){
                    
                    //munculkan error kalau validasi salah
                    $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
                    $this->session->set_flashdata('warning',validation_errors());
                    
                    redirect('guidance/pelajaran/edit/'.$id, 'location');
                }else{
                    $hasil=$this->model_material->update_pelajaran($this->input->post('id'), $this->input->post('nama'));
                    if($hasil=="connection_error")
                    {
                        //munculkan error kalau transaksi sql gagal
                        $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Maaf, ada kesalahan koneksi. Silahkan mendaftar ulang</strong> "
                            . "</div>";
                        $this->session->set_flashdata('warning',$warning);
                    }else if($hasil=="success"){
                        //munculkan pemberitahuan jika data telah berhasil ditambahkan
                        $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Akun berhasil didaftarkan</strong> "
                            . "</div>";
                        $this->session->set_flashdata('warning',$warning);
                    }
                    redirect('guidance/pelajaran/edit/'.$id,'refresh');
                }
            }
            $data['title']='Edit Pelajaran A+ Learning';
            $data['title2']='Edit Pelajaran';
            
            $temp=$this->model_material->ambil_edit_pelajaran($id);
            $data['id']=$temp['id'];
            $data['nama']=$temp['nama'];
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_edit_pelajaran',$data);
            $this->load->view('back/b_footer');
        } else {
            redirect('guidance/login', 'refresh');
        }
    }
        
        
        
    
    function tambahKelas(){
        if($this->session->userdata('role'))
        {
            if($this->input->post('simpan')){
                //buat rule form validation
                $this->form_validation->set_rules('nama', 'Nama', 'required');
                if($this->form_validation->run()==false){
                    
                    //munculkan error kalau validasi salah
                    $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
                    $this->session->set_flashdata('warning',validation_errors());
                    
                    //tampung pada flash data buat nampilin isi yang sebelumnya 
                    $this->session->set_flashdata('isiform',array('nama'=>$this->input->post('nama')));
                    redirect('guidance/kelas/tambah', 'location');
                }else{
                    $hasil=$this->model_material->tambah_kelas($this->input->post('nama'));
                    if($hasil=="connection_error")
                    {
                        //munculkan error kalau transaksi sql gagal
                        $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Maaf, ada kesalahan koneksi. Silahkan mendaftar ulang</strong> "
                            . "</div>";
                        $this->session->set_flashdata('warning',$warning);
                    }else if($hasil=="success"){
                        //munculkan pemberitahuan jika data telah berhasil ditambahkan
                        $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Akun berhasil didaftarkan</strong> "
                            . "</div>";
                        $this->session->set_flashdata('warning',$warning);
                    }
                    redirect('guidance/kelas/tambah','refresh');
                }
            }
            $data['title']='Tambah Kelas A+ Learning';
            $data['title2']='Tambah Kelas';
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_tambah_kelas');
            $this->load->view('back/b_footer');
        } else {
            redirect('guidance/login', 'refresh');
        }
        
    }
    
    function lihatKelas(){
        if($this->session->userdata('role'))
        {
            $data['title']='Lihat Kelas A+ Learning';
            $data['title2']='Lihat Kelas';
            
            $data['kelas']=$this->model_material->ambil_kelas();
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_lihat_kelas',$data);
            $this->load->view('back/b_footer');
        } else {
            redirect('guidance/login', 'refresh');
        }
        
    }
    
    function editKelas($id){
        if($this->session->userdata('role'))
        {
            if($this->input->post('simpan')){
                //buat rule form validation
                $this->form_validation->set_rules('nama', 'Nama', 'required');
                if($this->form_validation->run()==false){
                    
                    //munculkan error kalau validasi salah
                    $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
                    $this->session->set_flashdata('warning',validation_errors());
                    
                    redirect('guidance/kelas/edit/'.$id, 'location');
                }else{
                    $hasil=$this->model_material->update_kelas($this->input->post('id'), $this->input->post('nama'));
                    if($hasil=="connection_error")
                    {
                        //munculkan error kalau transaksi sql gagal
                        $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Maaf, ada kesalahan koneksi. Silahkan mendaftar ulang</strong> "
                            . "</div>";
                        $this->session->set_flashdata('warning',$warning);
                    }else if($hasil=="success"){
                        //munculkan pemberitahuan jika data telah berhasil ditambahkan
                        $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Akun berhasil didaftarkan</strong> "
                            . "</div>";
                        $this->session->set_flashdata('warning',$warning);
                    }
                    redirect('guidance/kelas/edit/'.$id,'refresh');
                }
            }
            $data['title']='Edit Kelas A+ Learning';
            $data['title2']='Edit Kelas';
            
            $temp=$this->model_material->ambil_edit_kelas($id);
            $data['id']=$temp['id'];
            $data['nama']=$temp['nama'];
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_edit_kelas',$data);
            $this->load->view('back/b_footer');
        } else {
            redirect('guidance/login', 'refresh');
        }

    }
}
