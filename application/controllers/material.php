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
    
    function edit_aksesmateri(){
        $this->load->model('model_material');
        
        $this->form_validation->set_rules('idMateriLama', 'ID Materi Lama', 'required');
	$this->form_validation->set_rules('idMateriBaru', 'ID Materi Baru', 'required');
        $this->form_validation->set_rules('idKaryawanLama','ID Karyawan Lama','required');
        $this->form_validation->set_rules('idKaryawanBaru','ID Karyawan Baru','required');
        
        $this->form_validation->set_message('required','%s harus diisi.');
        
        if ($this->form_validation->run() == FALSE)
	{
            $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
            $this->session->set_flashdata('warning',validation_errors());
            redirect('/guidance/bab/semua', 'location');
	}
        else
	{
            $idMateriLama = $this->input->post('idMateriLama');
            $idMateriBaru = $this->input->post('idMateriBaru');
            $idKaryawanLama = $this->input->post('idKaryawanLama');
            $idKaryawanBaru = $this->input->post('idKaryawanBaru');
            
            $status = $this->model_material->edit_aksesmateri($idMateriLama,$idMateriBaru,$idKaryawanLama,$idKaryawanBaru);

            if ($status == "success")
            {
                $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Data aksesmateri berhasil diubah.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/aksesmateri/semua', 'location');
            }
            else if ($status == "connection_failed")
            {
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/aksesmateri/semua', 'location');
            }
        }
    }
    
    function edit_bab(){
        $this->load->model('model_material');
        
        $this->form_validation->set_rules('nama', 'Nama', 'required');
	$this->form_validation->set_rules('idMateri', 'ID Materi', 'required');
        $this->form_validation->set_rules('idBab','ID Bab','required');
        
        $this->form_validation->set_message('required','%s harus diisi.');
        
        if ($this->form_validation->run() == FALSE)
	{
            $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
            $this->session->set_flashdata('warning',validation_errors());
            redirect('/guidance/bab/semua', 'location');
	}
        else
	{
            $nama = $this->input->post('nama');
            $idMateri = $this->input->post('idMateri');
            $idBab = $this->input->post('idBab');
            
            $status = $this->model_material->edit_bab($nama,$idMateri,$idBab);

            if ($status == "success")
            {
                $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Data bab berhasil diubah.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/bab/semua', 'location');
            }
            else if ($status == "connection_failed")
            {
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/bab/semua', 'location');
            }
        }
    }
    
    function edit_subbab(){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2)) redirect ('guidance/login','location');
        $this->load->model('model_material');
        
        $this->form_validation->set_rules('nama', 'Nama', 'required');
	$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
	$this->form_validation->set_rules('idBab', 'ID Bab', 'required');
        
        $config1['upload_path'] = './video/';
        $config1['allowed_types'] = 'mp4';
        $config1['remove_spaces'] = TRUE;
        $config1['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config1);
        
        $this->form_validation->set_message('required','%s harus diisi.');
        
        if ($this->form_validation->run() == FALSE)
	{
            $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
            $this->session->set_flashdata('warning',validation_errors());
            redirect('/guidance/subbab/semua', 'location');
	}
        else
	{
            if ($this->input->post('editvideo') == "true"){
            if (!$this->upload->do_upload('link')){
                $data = $this->upload->data();
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                                . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                                . "<span class='sr-only'>Close</span>"
                                . "</button><strong>".$this->upload->display_errors()."</strong> "
                                . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                    redirect('/guidance/subbab/tambah', 'location');
            }
            else {
            $nama = $this->input->post('nama');
            $deskripsi = $this->input->post('deskripsi');
            $idBab = $this->input->post('idBab');
            $idSubbab = $this->input->post('idSubbab');
            
            $data = $this->upload->data();
            $linkvideo = $data['file_name'];
            
            $status = $this->model_material->edit_subbab($idSubbab,$nama,$linkvideo,$deskripsi,$idBab);

            if ($status == "success")
            {
                $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Data Sub-Bab berhasil diubah.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/subbab/semua', 'location');
            }
            else if ($status == "connection_failed")
            {
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/subbab/semua', 'location');
            }
            }
            }
            else{
                $nama = $this->input->post('nama');
            $deskripsi = $this->input->post('deskripsi');
            $idBab = $this->input->post('idBab');
            $idSubbab = $this->input->post('idSubbab');

            $status = $this->model_material->edit_subbab_tanpavideo($idSubbab,$nama,$deskripsi,$idBab);

            if ($status == "success")
            {
                $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Data Sub-Bab berhasil diubah.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/subbab/semua', 'location');
            }
            else if ($status == "connection_failed")
            {
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/subbab/semua', 'location');
            }
            }
        }
    }
    
    function halaman_editbab($idBab){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2)) redirect ('guidance/login','location');
        $data['title']="Edit Bab - A+ Learning Guidance";
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->model('model_material');

        $data['bab'] = $this->model_material->get_detail_bab($idBab);
        $data['materi'] = $this->model_material->get_all_materi();
        
        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_edit_bab');
        $this->load->view('back/b_footer'); 
    }
    
    function halaman_editsubbab($idSubbab){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2)) redirect ('guidance/login','location');
        $data['title']="Edit Subbab - A+ Learning Guidance";
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->model('model_material');

        $data['subbab'] = $this->model_material->get_detail_subbab($idSubbab);
        $data['bab'] = $this->model_material->get_all_bab();
        
        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_edit_subbab');
        $this->load->view('back/b_footer'); 
    }
    
    function halaman_editaksesmateri($idKaryawan, $idMateri){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2)) redirect ('guidance/login','location');
        $data['title'] = "Edit Hak Akses Materi - A+ Learning Guidance";
        
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->model('model_material');
        $this->load->model('model_admin');
        
        $data['karyawan'] = $this->model_admin->get_all_karyawan();
        $data['materi'] = $this->model_material->get_all_materi();
        
        $data['karyawanlama'] = $this->model_material->get_detail_karyawan($idKaryawan);
        $data['materilama'] = $this->model_material->get_detail_materi($idMateri);
        
        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_edit_aksesmateri');
        $this->load->view('back/b_footer');
    }
    
    function halaman_lihatbab(){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2||$this->session->userdata('role')==3)) redirect ('guidance/login','location');
        $data['title']="Daftar Bab - A+ Learning Guidance";
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->model('model_material');
        if($this->session->userdata('role')==3){
            $data['bab'] = $this->model_material->get_bab_pembimbing($this->session->userdata('username'));
        }else{
            $data['bab'] = $this->model_material->get_all_bab_detail();
        }
        
        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_lihat_bab');
        $this->load->view('back/b_footer'); 
    }
    
    function halaman_lihatsubbab(){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2||$this->session->userdata('role')==3)) redirect ('guidance/login','location');
        $data['title']="Daftar Sub-Bab - A+ Learning Guidance";
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->model('model_material');
        if($this->session->userdata('role')==3){
            $data['subbab'] = $this->model_material->get_subbab_pembimbing($this->session->userdata('username'));
        }else{
            $data['subbab'] = $this->model_material->get_all_subbab_detail();
        }
        
        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_lihat_subbab');
        $this->load->view('back/b_footer'); 
    }
    
    function halaman_lihataksesmateri(){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2)) redirect ('guidance/login','location');
        $data['title']="Daftar Akses Materi - A+ Learning Guidance";
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->model('model_material');
        $data['materi'] = $this->model_material->get_all_aksesmateri_detail();
        
        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_lihat_aksesmateri');
        $this->load->view('back/b_footer'); 
    }
    
    function halaman_tambahbab(){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2)) redirect ('guidance/login','location');
        $data['title']="Tambah Bab - A+ Learning Guidance";
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->model('model_material');
        $data['materi'] = $this->model_material->get_all_materi();
        
        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_tambah_bab');
        $this->load->view('back/b_footer'); 
    }
    
    function halaman_tambahsubbab(){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2)) redirect ('guidance/login','location');
        $data['title']="Tambah Sub-Bab - A+ Learning Guidance";
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->model('model_material');
        $data['bab'] = $this->model_material->get_all_bab();
        
        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_tambah_subbab');
        $this->load->view('back/b_footer'); 
    }
    
    function halaman_tambahaksesmateri(){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2)) redirect ('guidance/login','location');
        $data['title']="Tambah Hak Akses Materi - A+ Learning Guidance";
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->model('model_material');
        $this->load->model('model_admin');
        $data['karyawan'] = $this->model_admin->get_all_karyawan();
        $data['materi'] = $this->model_material->get_all_materi();
        
        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_tambah_aksesmateri');
        $this->load->view('back/b_footer'); 
    }
    
    function hapus_aksesmateri($idKaryawan, $idMateri){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2)) redirect ('guidance/login','location');
        $this->load->model('model_material');
        
        $status = $this->model_material->hapus_aksesmateri($idKaryawan,$idMateri);
        if ($status == "success"){
            $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Hak akses materi telah sukses dihapus</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/aksesmateri/semua', 'location');
        }
        else if ($status == "connection_error"){
            $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Koneksi bermasalah. Silahkan coba lagi</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/aksesmateri/semua', 'location');
        }
    }
    
    function hapus_bab($id){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2)) redirect ('guidance/login','location');
        $this->load->model('model_material');
        
        $status = $this->model_material->hapus_bab($id);
        if ($status == "success"){
            $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Bab telah sukses dihapus</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/bab/semua', 'location');
        }
        else if ($status == "connection_error"){
            $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Koneksi bermasalah. Silahkan coba lagi</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/bab/semua', 'location');
        }
    }
    
    function hapus_subbab($id){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2)) redirect ('guidance/login','location');
        $this->load->model('model_material');
        
        $status = $this->model_material->hapus_subbab($id);
        if ($status == "success"){
            $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Sub-Bab telah sukses dihapus</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/subbab/semua', 'location');
        }
        else if ($status == "connection_error"){
            $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Koneksi bermasalah. Silahkan coba lagi</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/subbab/semua', 'location');
        }
    }
    
    function tambahBab(){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2)) redirect ('guidance/login','location');
        $this->load->model('model_material');
        
        $this->form_validation->set_rules('nama', 'Nama', 'required');
	$this->form_validation->set_rules('idMateri', 'ID Materi', 'required');
        
        $this->form_validation->set_message('required','%s harus diisi.');
        
        if ($this->form_validation->run() == FALSE)
	{
            $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
            $this->session->set_flashdata('warning',validation_errors());
            redirect('/guidance/bab/tambah', 'location');
	}
        else
	{
            $nama = $this->input->post('nama');
            $idMateri = $this->input->post('idMateri');
            
            $status = $this->model_material->registerbab($nama,$idMateri);

            if ($status == "success")
            {
                $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Data bab berhasil ditambahkan.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/bab/tambah', 'location');
            }
            else if ($status == "connection_failed")
            {
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/bab/tambah', 'location');
            }
        }
    }
    
    function tambahSubbab(){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2)) redirect ('guidance/login','location');
        $this->load->model('model_material');
        
        $this->form_validation->set_rules('nama', 'Nama', 'required');
	$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
	$this->form_validation->set_rules('idBab', 'ID Bab', 'required');
        
        $this->form_validation->set_message('required','%s harus diisi.');
        
        $config1['upload_path'] = './video/';
        $config1['allowed_types'] = 'mp4';
        $config1['remove_spaces'] = TRUE;
        $config1['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config1);
        
        if ($this->form_validation->run() == FALSE)
	{
            $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
            $this->session->set_flashdata('warning',validation_errors());
            redirect('/guidance/subbab/tambah', 'location');
	}
        else
	{
            if (!$this->upload->do_upload('link')){
                $data = $this->upload->data();
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                                . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                                . "<span class='sr-only'>Close</span>"
                                . "</button><strong>".$this->upload->display_errors()."</strong> "
                                . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                    redirect('/guidance/subbab/tambah', 'location');
            }
            else {
                $nama = $this->input->post('nama');
                $deskripsi = $this->input->post('deskripsi');
                $idBab = $this->input->post('idBab');
                
                $data = $this->upload->data();
                $linkvideo = $data['file_name'];
            
            $status = $this->model_material->registersubbab($nama,$linkvideo,$deskripsi,$idBab);

            if ($status == "success")
            {
                $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Data sub-bab berhasil ditambahkan.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/subbab/tambah', 'location');
            }
            else if ($status == "connection_failed")
            {
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/subbab/tambah', 'location');
            }
            }
        }
    }
    
    function tambahAksesMateri(){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2)) redirect ('guidance/login','location');
        $this->load->model('model_material');
        
        $this->form_validation->set_rules('idKaryawan', 'ID Karyawan', 'required');
	$this->form_validation->set_rules('idMateri', 'ID Materi', 'required');
        
        $this->form_validation->set_message('required','%s harus diisi.');
        
        if ($this->form_validation->run() == FALSE)
	{
            $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
            $this->session->set_flashdata('warning',validation_errors());
            redirect('/guidance/aksesmateri/tambah', 'location');
	}
        else
	{
            $idKaryawan = $this->input->post('idKaryawan');
            $idMateri = $this->input->post('idMateri');
            
            $status = $this->model_material->registeraksesmateri($idKaryawan,$idMateri);

            if ($status == "success")
            {
                $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Hak akses materi berhasil ditambahkan.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/aksesmateri/tambah', 'location');
            }
            else if ($status == "connection_failed")
            {
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/guidance/aksesmateri/tambah', 'location');
            }
        }
    }
        
    function tambahPelajaran(){
        if($this->session->userdata('role')==1||$this->session->userdata('role')==2)
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
                            . "</button><strong>Pelajaran berhasil didaftarkan</strong> "
                            . "</div>";
                        $this->session->set_flashdata('warning',$warning);
                    }
                    redirect('guidance/pelajaran/tambah','location');
                }
            }
            $data['title']='Tambah Pelajaran A+ Learning';
            $data['title2']='Tambah Pelajaran';
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_tambah_pelajaran');
            $this->load->view('back/b_footer');
        } else {
            redirect('guidance/login', 'location');
        }
        
    }
    
    function lihatPelajaran(){
        if($this->session->userdata('role')==1||$this->session->userdata('role')==2)
        {
            if($this->input->post('hapus')){
                $this->model_material->hapus_pelajaran($this->input->post('id'));
                redirect('guidance/pelajaran/semua', 'location');
            }
            $data['title']='Lihat Pelajaran A+ Learning';
            $data['title2']='Lihat Pelajaran';
            
            $data['pelajaran']=$this->model_material->ambil_pelajaran();
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_lihat_pelajaran',$data);
            $this->load->view('back/b_footer');
        } else {
            redirect('guidance/login', 'location');
        }
        
    }
    
    function editPelajaran($id){
        if($this->session->userdata('role')==1||$this->session->userdata('role')==2)
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
                            . "</button><strong>Pelajaran berhasil diubah</strong> "
                            . "</div>";
                        $this->session->set_flashdata('warning',$warning);
                    }
                    redirect('guidance/pelajaran/edit/'.$id,'location');
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
            redirect('guidance/login', 'location');
        }
    }
        
        
        
    
    function tambahKelas(){
        if($this->session->userdata('role')==1||$this->session->userdata('role')==2)
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
                            . "</button><strong>Kelas berhasil ditambahkan</strong> "
                            . "</div>";
                        $this->session->set_flashdata('warning',$warning);
                    }
                    redirect('guidance/kelas/tambah','location');
                }
            }
            $data['title']='Tambah Kelas A+ Learning';
            $data['title2']='Tambah Kelas';
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_tambah_kelas');
            $this->load->view('back/b_footer');
        } else {
            redirect('guidance/login', 'location');
        }
        
    }
    
    function lihatKelas(){
        if($this->session->userdata('role')==1||$this->session->userdata('role')==2)
        {
            if($this->input->post('hapus')){
                $this->model_material->hapus_kelas($this->input->post('id'));
                redirect('guidance/kelas/semua', 'location');
            }
            $data['title']='Lihat Kelas A+ Learning';
            $data['title2']='Lihat Kelas';
            
            $data['kelas']=$this->model_material->ambil_kelas();
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_lihat_kelas',$data);
            $this->load->view('back/b_footer');
        } else {
            redirect('guidance/login', 'location');
        }
        
    }
    
    function editKelas($id){
        if($this->session->userdata('role')==1||$this->session->userdata('role')==2)
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
                            . "</button><strong>Kelas berhasil diubah</strong> "
                            . "</div>";
                        $this->session->set_flashdata('warning',$warning);
                    }
                    redirect('guidance/kelas/edit/'.$id,'location');
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
            redirect('guidance/login', 'location');
        }

    }
    
    
    
    
    
    
    
    function tambahMateri(){
        if($this->session->userdata('role')==1||$this->session->userdata('role')==2)
        {
            if($this->input->post('simpan')){
                //cek ketersediaan materi
                if($this->model_material->cek_materi($this->input->post('pelajaran'),$this->input->post('kelas'))==FALSE){
                    
                    //munculkan error kalau sudah ada
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Maaf, data sudah ada sebelumnya</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                    
                    //tampung pada flash data buat nampilin isi yang sebelumnya 
                    $this->session->set_flashdata('isiform',array('idKelas'=>$this->input->post('kelas'),'idPelajaran'=>$this->input->post('pelajaran'),'id'=>$this->input->post('id')));
                    redirect('guidance/materi/tambah', 'location');
                }else{
                    $hasil=$this->model_material->tambah_materi($this->input->post('pelajaran'),$this->input->post('kelas'));
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
                            . "</button><strong>Materi berhasil didaftarkan</strong> "
                            . "</div>";
                        $this->session->set_flashdata('warning',$warning);
                    }
                    redirect('guidance/materi/tambah','location');
                }
            }
            $data['title']='Tambah Materi A+ Learning';
            $data['title2']='Tambah Materi';
            
            $data['pilihanp'] =  $this->model_material->ambil_pelajaran();
            $data['pilihank'] =  $this->model_material->ambil_kelas();
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_tambah_materi',$data);
            $this->load->view('back/b_footer');
        } else {
            redirect('guidance/login', 'location');
        }
        
    }
    
    function lihatMateri(){
        if($this->session->userdata('role')==1||$this->session->userdata('role')==2)
        {
            if($this->input->post('hapus')){
                $this->model_material->hapus_materi($this->input->post('id'));
                redirect('guidance/materi/semua', 'location');
            }
            $data['title']='Lihat Materi A+ Learning';
            $data['title2']='Lihat Materi';
            
            $data['materi']=$this->model_material->ambil_materi();
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_lihat_materi',$data);
            $this->load->view('back/b_footer');
        } else {
            redirect('guidance/login', 'location');
        }
        
    }
    
    function editMateri($id){
        if($this->session->userdata('role')==1||$this->session->userdata('role')==2)
        {
            if($this->input->post('simpan')){
                if($this->model_material->cek_materi($this->input->post('pelajaran'),$this->input->post('kelas'))==FALSE){
                    //munculkan error kalau sudah ada
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Maaf, data sudah ada sebelumnya</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                    
                    //tampung pada flash data buat nampilin isi yang sebelumnya 
                    $this->session->set_flashdata('isiform',array('idKelas'=>$this->input->post('kelas'),'idPelajaran'=>$this->input->post('pelajaran'),'id'=>$this->input->post('id')));
                    redirect('guidance/materi/edit/'.$id,'location');
                }else{
                    $hasil=$this->model_material->update_materi($this->input->post('id'), $this->input->post('pelajaran'), $this->input->post('kelas'));
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
                            . "</button><strong>Materi berhasil diubah</strong> "
                            . "</div>";
                        $this->session->set_flashdata('warning',$warning);
                    }
                    redirect('guidance/materi/edit/'.$id,'location');
                }
            }
            $data['title']='Edit Materi A+ Learning';
            $data['title2']='Edit Materi';
            
            $data['pilihanp'] =  $this->model_material->ambil_pelajaran();
            $data['pilihank'] =  $this->model_material->ambil_kelas();
            $data['data'] = $this->model_material->ambil_edit_materi($id);
            
            $this->load->view('back/b_header',$data);
            $this->load->view('back/b_edit_materi',$data);
            $this->load->view('back/b_footer');
        } else {
            redirect('guidance/login', 'location');
        }
    }
}
