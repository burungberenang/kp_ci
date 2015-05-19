<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    }
    
    function index(){
        
    }
    
    function materi($idBab){
        $data['title'] = "Materi - A+ Learning Guidance";
        $this->load->model('model_member');
        
        $data['databab'] = $this->model_member->ambildetailbab($idBab);
        $data['datasubbab'] = $this->model_member->ambilsemuasubbab($idBab);
        
        $this->load->view('front/f_head',$data);
        $this->load->view('front/f_detail_bab_new');
        $this->load->view('front/f_foot');
    }
    
    function kelas($idKelas){
        $data['title'] = "Materi - A+ Learning Guidance";
        $this->load->model('model_member');
        
        //foreach tiap data
        $datamateriku = $this->model_member->ambilsemuapelajaran($idKelas);
        $databab = array();
        $datasubbab = array();
        
        if ($datamateriku){
            foreach ($datamateriku->result() as $row1){
                $databab[$row1->idMateri] = $this->model_member->ambilsemuabab($row1->idMateri);
                if ($databab[$row1->idMateri]) {
                    foreach($databab[$row1->idMateri]->result() as $row2){
                        $datasubbab[$row1->idMateri][$row2->idBab] = $this->model_member->ambilsemuasubbab($row2->idBab);
                    }
                }
            }
        }
        
        $data['datakelas'] = $this->model_member->ambildetailkelas($idKelas);
        $data['datamateri'] = $datamateriku;
        $data['databab'] = $databab;
        $data['datasubbab'] = $datasubbab;
        
        $this->load->view('front/f_head',$data);
        $this->load->view('front/f_kelas');
        $this->load->view('front/f_foot');
    }
    
    function halaman_materiku(){
        $data['title']="Materiku - A+ Learning Guidance";
        $this->load->model('model_member');
        
        $data['dataku'] = $this->model_member->ambildetailuser($this->session->userdata('username'));
        $data['datamateri'] = $this->model_member->ambilmateriuser($this->session->userdata('username'));
        
        $this->load->view('front/f_head',$data);
        $this->load->view('front/f_materiku');
        $this->load->view('front/f_foot');
    }
    
    function lihatMateri($idMateri){
        $data['title']="Materiku - A+ Learning Guidance";
        $this->load->model('model_member');
        
        $data['datamateri'] = $this->model_member->ambildetailmateri($idMateri);
        $data['databab'] = $this->model_member->ambilsemuabab($idMateri);
        
        $this->load->view('front/f_head',$data);
        $this->load->view('front/f_detail_materiku');
        $this->load->view('front/f_foot');
    }
    
    function lihatBab($idBab){
        $data['title']="Materiku - A+ Learning Guidance";
        $this->load->model('model_member');
        
        $data['databab'] = $this->model_member->ambildetailbab($idBab);
        $data['datasubbab'] = $this->model_member->ambilsemuasubbab($idBab);
        
        $this->load->view('front/f_head',$data);
        $this->load->view('front/f_detail_bab');
        $this->load->view('front/f_foot');
    }
            
    function login(){
        $this->load->model('model_member');
        
        $this->form_validation->set_rules('username', 'Username', 'required');
	$this->form_validation->set_rules('password', 'Password', 'required');
        
        $this->form_validation->set_message('required','%s harus diisi.');
        
	if ($this->form_validation->run() == FALSE)
	{
            $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
            $this->session->set_flashdata('warning',validation_errors());
            redirect('/masuk', 'location');
	}
        else
	{
            // check account, etc
            $username= $this->input->post('username');
            $password= $this->input->post('password');
            $logincheck = $this->model_member->checkmember($username, $password);
            
            if ($logincheck)
            {
                // set session
                
                $loginarray = array(
                    'username' => $logincheck->username,
                    'name' => $logincheck->nama,
                    'role' => '4' // 1 admin, 2 editor, 3 guru,4 member
                );
                $this->session->set_userdata($loginarray);
                
                // redirect to contact page + notification
                redirect('/home', 'location');
                
            }
            else
            {
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Username atau Password salah. Silahkan cek lagi.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/masuk', 'location');
                
            }
	}
    }
    
    function tambahuser(){
        //load model

        $this->load->model('model_member');
        
        //set validation rules and message
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	$this->form_validation->set_rules('password', 'Password', 'required|matches[repassword]');
        $this->form_validation->set_rules('repassword', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
	$this->form_validation->set_rules('user', 'Username', 'required');
        
        $this->form_validation->set_message('required','%s harus diisi.');
        $this->form_validation->set_message('numeric','%s harus dalam bentuk angka.');
        $this->form_validation->set_message('valid_email','E-mail tidak valid.');
        $this->form_validation->set_message('matches[repassword]','Password yang diulang tidak sesuai.');

        //do something here
	if ($this->form_validation->run() == FALSE)
	{
            $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
            $this->session->set_flashdata('warning',validation_errors());
            redirect('/daftar', 'location');
	}
        else
	{
            // insert database, etc
            $email = $this->input->post('email');
            $pass = md5($this->input->post('password'));
            $nama = $this->input->post('nama');
            $username = $this->input->post('user');
            
            $registeruser = $this->model_member->registeruser($email, $username, $pass, $nama);
                    
            if ($registeruser == "success"){
                $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Akun berhasil didaftarkan</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/daftar', 'location');
            }
            else if ($registeruser == "connection_error")
            {
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Maaf, ada kesalahan koneksi. Silahkan mendaftar ulang</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/daftar', 'location');
            } 
            else if ($registeruser == "username_invalid"){
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Username telah terpakai. Silahkan mencoba username lain.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/daftar', 'location');
            }
	} 
    }
    
}
