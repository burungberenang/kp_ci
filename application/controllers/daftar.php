<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
    }
    
    function index(){
        
        $data['title']= "Daftar - A+ Learning Guidance";
        
        $this->load->view('front/f_header',$data);
        $this->load->view('front/f_register_user');
        $this->load->view('front/f_footer');
    }
    
    function tambahuser(){
        //load model
        $this->load->model('model_member');
        
        //set validation rules and message
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	$this->form_validation->set_rules('pass', 'Password', 'required|matches[confpass]');
        $this->form_validation->set_rules('confpass', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
	$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('role', 'Role', 'required');
        
        $this->form_validation->set_message('required','%s is required');
        $this->form_validation->set_message('numeric','%s should be in numeric');
        $this->form_validation->set_message('valid_email','Please input valid email');
        $this->form_validation->set_message('matches[confpass]','Confirmation Password is not the same');

        //do something here
        $data['title'] = "One Web - Add New User";
	if ($this->form_validation->run() == FALSE)
	{
            $data['warning'] = "failed";
            
            $this->load->view('admin/vd_header.php',$data);
            $this->load->view('admin/vd_adduser.php',$data);
            $this->load->view('admin/vd_footer.php',$data);
	}
        else
	{
            // insert database, etc
            $data['email']= $this->input->post('email');
            $data['pass']= $this->input->post('pass');
            $data['name']= $this->input->post('name');
            $data['phone']= $this->input->post('phone');
            $data['role']= $this->input->post('role');
            
            if (!$this->md_admin->checkemail($data['email']))
            {
                if ($this->md_admin->adduser($data['email'], $data['pass'], $data['name'], $data['phone'], $data['role']))
                {
                    // redirect to contact page + notification
                    $data['warning'] = "success";
                    $this->load->view('admin/vd_header.php',$data);
                    $this->load->view('admin/vd_adduser.php',$data);
                    $this->load->view('admin/vd_footer.php',$data);
                }
                else
                {
                    $data['warning'] = "connectionfailed";
                    $this->load->view('admin/vd_header.php',$data);
                    $this->load->view('admin/vd_adduser.php',$data);
                    $this->load->view('admin/vd_footer.php',$data);
                }
            }
            else
            {
                $data['warning'] = "duplicateemail";
                $this->load->view('admin/vd_header.php',$data);
                $this->load->view('admin/vd_adduser.php',$data);
                $this->load->view('admin/vd_footer.php',$data);
            }
            
            
	}
    }
}