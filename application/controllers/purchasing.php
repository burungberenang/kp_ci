<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchasing extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_purchasing');
    }
    
    function lihatHistori(){
        if($this->session->userdata('role')!=1) redirect ('guidance/login','location');
        if($this->input->post('ubah')){
            $id = $this->input->post('id');
            $temp = $this->model_purchasing->ambil_status_paket_histori($id);
            $status = $temp->status;
            
            if($status==0){
                $status=1;
                $paket = $this->model_purchasing->ambil_masa_berlaku_paket($temp->idPaket)->masaBerlaku;
            }
            else{
                $status=0;
                $paket = 0;
            }
            $this->model_purchasing->ubah_histori($id, $status, $paket);
            redirect('guidance/transaksi','location');
        }
        $data['title']='Lihat Histori Transaksi A+ Learning';
        $data['title2']='Lihat Histori Transaksi';

        $data['histori']=$this->model_purchasing->ambil_histori();

        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_lihat_histori',$data);
        $this->load->view('back/b_footer');
    }
    
    function tambahPaket(){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2)) redirect ('guidance/login','location');
        if($this->input->post('simpan')){
            //buat rule form validation
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('materi', 'Materi', 'required');
            $this->form_validation->set_rules('nominal', 'Harga', 'required|numeric');
            $this->form_validation->set_rules('masa', 'Masa berlaku', 'required|numeric');
            if($this->form_validation->run()==false){

                //munculkan error kalau validasi salah
                $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                    . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                    . "<span class='sr-only'>Close</span>"
                    . "</button><strong>", "</strong> "
                    . "</div>");
                $this->session->set_flashdata('warning',validation_errors());

                //tampung pada flash data buat nampilin isi yang sebelumnya 
                $this->session->set_flashdata('isiform',array('nama'=>$this->input->post('nama'),'nominal'=>$this->input->post('nominal'),'masa'=>$this->input->post('masa'),'materi'=>$this->input->post('materi')));
                redirect('guidance/paket/tambah', 'location');
            }else{
                $hasil=$this->model_purchasing->tambah_paket($this->input->post('nama'),$this->input->post('nominal'),$this->input->post('masa'),$this->input->post('materi'));
                if($hasil=="connection_error")
                {
                    //munculkan error kalau transaksi sql gagal
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Maaf, ada kesalahan koneksi. Silahkan menginput paket ulang</strong> "
                        . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                }else if($hasil=="success"){
                    //munculkan pemberitahuan jika data telah berhasil ditambahkan
                    $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Paket berhasil didaftarkan</strong> "
                        . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                }
                redirect('guidance/paket/tambah','location');
            }
        }
        $data['title']='Tambah Paket A+ Learning';
        $data['title2']='Tambah Paket';

        //buat ambil materi di combobox (pada view)
        $data['pilihan']=$this->model_purchasing->ambil_materi();

        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_tambah_paket',$data);
        $this->load->view('back/b_footer',$data);

    }
    
    function lihatPaket(){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2)) redirect ('guidance/login','location');
        if($this->input->post('hapus')){
            $this->model_purchasing->hapus_paket($this->input->post('id'));
            redirect('guidance/paket/semua', 'location');
        }
        $data['title']='Lihat Paket A+ Learning';
        $data['title2']='Lihat Paket';

        $data['paket']=$this->model_purchasing->ambil_paket();

        $this->load->view('back/b_header',$data);
        $this->load->view('back/b_lihat_paket',$data);
        $this->load->view('back/b_footer',$data);
        
    }
    
    function editPaket($id){
        if(!($this->session->userdata('role')==1||$this->session->userdata('role')==2)) redirect ('guidance/login','location');
        if($this->input->post('simpan')){
            //buat rule form validation
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('materi', 'Materi', 'required');
            $this->form_validation->set_rules('nominal', 'Harga', 'required|numeric');
            $this->form_validation->set_rules('masa', 'Masa berlaku', 'required|numeric');
            if($this->form_validation->run()==false){

                //munculkan error kalau validasi salah
                $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                    . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                    . "<span class='sr-only'>Close</span>"
                    . "</button><strong>", "</strong> "
                    . "</div>");
                $this->session->set_flashdata('warning',validation_errors());

                redirect('guidance/paket/edit/'.$id, 'location');
            }else{
                $hasil=$this->model_purchasing->update_paket($this->input->post('id'), $this->input->post('nama'),$this->input->post('nominal'),$this->input->post('masa'),$this->input->post('materi'));
                if($hasil=="connection_error")
                {
                    //munculkan error kalau transaksi sql gagal
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Maaf, ada kesalahan koneksi. Silahkan menginput paket ulang</strong> "
                        . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                }else if($hasil=="success"){
                    //munculkan pemberitahuan jika data telah berhasil ditambahkan
                    $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Paket berhasil didaftarkan</strong> "
                        . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                }
                redirect('guidance/paket/edit/'.$id,'location');
            }
        }
        $data['title']='Edit Paket A+ Learning';
        $data['title2']='Edit Paket';

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

    }
}
