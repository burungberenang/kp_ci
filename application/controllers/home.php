<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        
    }
    
    
    function index(){
        $this->load->model('front_model');
        $this->load->library('form_validation');
        $data['title']="Beranda - A+ Learning Guidance";
        $data['produk'] = $this->front_model->ambil_produk_terlaris();
        $this->load->view('front/f_head',$data);
        $this->load->view('front/f_body');
        $this->load->view('front/f_foot');
    }
    
    function contactus(){
        
        //load helper
        $this->load->helper(array('url'));
        $this->load->library('form_validation');
        
        //load model
        $this->load->model('front_model');
        
        //set validation rules and message
        $this->form_validation->set_rules('nama', 'Nama', 'required');
	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	$this->form_validation->set_rules('pesan', 'Pesan', 'required');
        
        $this->form_validation->set_message('required','%s harus diisi');
        $this->form_validation->set_message('valid_email','Masukkan email yang valid');

        //do something here
	if ($this->form_validation->run() == FALSE)
	{
            $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>".$this->upload->display_errors()."</strong> "
                        . "</div>";
            $this->session->set_flashdata('warning',$warning);
            redirect('','location');
	}
        else
	{
            // insert database, etc
            $data['nama']= $this->input->post('nama');
            $data['email']= $this->input->post('email');
            $data['pesan'] = $this->input->post('pesan');

            // send email
            //$message = "<html><body>Dear ".$data['name'].",<br/> We already received your message and we'll reply you soon within 24 hours. Thank you</body></html> ";

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' =>'ssl://smtp.gmail.com',
                'smtp_user' =>'oneweb.noreply@gmail.com',
                'smtp_pass' =>'cobatryuntukforoneweb',
                'smtp_port' => '465',
                'mailtype' =>'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE);

            $message = '<html><body>You got a new Message. Please check and reply immediately<br/><br/>'
                    . '<strong>Message Detail:</strong><br/>'
                    . 'Customer Name:'.$data['nama'].' <br/>'
                    . 'Email: '.$data['email'].'<br/>'
                    . 'Message: '.$data['pesan'].'<br/>'
                    . '</body>'
                    . '</html>' ;

            $this->load->library('email');
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $this->email->from('oneweb.noreply@gmail.com');
            $this->email->to('oneweb.noreply@gmail.com');// change it to yours
            $this->email->subject('A+ Learning Guidance - Pesan Baru');
            $this->email->message($message);
            
            if(!$this->email->send()){
                //echo $this->email->print_debugger();
                //exit;
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Email gagal terkirim</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('','location');
            }else
            {
                // redirect to contact page + notification
                $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Pesan telah berhasil dikirim</strong> "
                            . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('', 'location');
            }
	}
    }
    
    function cari(){
        $this->load->helper('text');
        $data['cari'] = $this->input->get('cari');
        $cari = str_replace(" ","%", $this->input->get('cari'));
        $this->load->model('front_model');
        
        $data['hasil'] = $this->front_model->ambil_hasil_pencarian($cari);
        
        $data['title']="Cari - A+ Learning Guidance";
        $this->load->view('front/f_head',$data);
        $this->load->view('front/f_cari',$data);
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
    
    function bayarMateri(){
        $this->load->model('front_model');
        $idMember = $this->front_model->get_member_id($this->session->userdata('username'));
        $data['materis'] = $this->front_model->ambil_paket_terbeli($idMember['id']);
        $data['title']="Konfirmasi Pembayaran Materi - A+ Learning Guidance";
        $this->load->view('front/f_head',$data);
        $this->load->view('front/f_bayar_materi',$data);
        $this->load->view('front/f_foot');
    }
    
    function buktiBayar($paket){
        $this->load->model('front_model');
        if(!$this->front_model->cek_member($this->session->userdata('username'),$paket)) redirect();
        $member = $this->front_model->get_member_id($this->session->userdata('username'));
        $this->load->helper('form');
        if ($this->input->post('simpan')) {
            $config['upload_path'] = './asset/transaksi/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('foto')) {
                $data = $this->upload->data();
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>".$this->upload->display_errors()."</strong> "
                            . "</div>";
                $this->session->set_flashdata('warning',$warning);
                redirect('/materi/bayar/'.$paket, 'location');
            } else {
                $data = $this->upload->data();
                
                // insert database, etc

                $status = $this->front_model->edit_gambar($member['id'], $paket, $data['file_name']);

                if ($status == "success")
                {
                    $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Foto telah berhasil diubah.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                    redirect('/materi/bayar/'.$paket, 'location');
                }
                else if ($status == "connection_failed")
                {
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                    redirect('/materi/bayar/'.$paket, 'location');
                }
                else
                {
                    $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>".$status."</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning',$warning);
                    redirect('/materi/bayar/'.$paket, 'location'); 
                }
            }
        }
        $gambar =  $this->front_model->ambil_foto($member['id'], $paket);
        if($gambar['gambar']==''){
            $data['foto'] = 'kosong.png';
        }else{
            $data['foto'] = $gambar['gambar'];
        }
        $data['idPaket'] = $paket;
        $data['title']="Upload Bukti Bayar Materi - A+ Learning Guidance";
        $this->load->view('front/f_head',$data);
        $this->load->view('front/f_bayar',$data);
        $this->load->view('front/f_foot');
    }
}
