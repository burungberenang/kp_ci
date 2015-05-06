<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author Ryannathan
 */
class Admin extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    function logout() {
        $this->session->sess_destroy();

        redirect('/guidance/login', 'location');
    }

    function profile() {
        if (!$this->session->userdata('role'))
            redirect('/guidance/home', 'location');
        $this->load->model('model_admin');
        $this->load->library('upload');
        $this->load->library('image_lib');
        if ($this->input->post('ganti')) {
            if (!$this->upload->do_upload('foto')) {
                $data = $this->upload->data();
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>" . $this->upload->display_errors() . "</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning', $warning);
                redirect('/guidance/profile', 'location');
            } else {
                $data = $this->upload->data();
                $config = array();

                // CREATE THUMBNAIL
                $config['image_library'] = 'gd2';
                $config['source_image'] = './foto/' . $data['file_name'];
                $config['create_thumb'] = TRUE;
                $config['thumb_marker'] = "_thumb";
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 75;
                $config['height'] = 50;
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>" . $this->image_lib->display_errors() . "</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/profile', 'location');
                }

                // insert database, etc
                $username = $this->session->userdata('username');
                $linkfoto = $data['raw_name'] . '_thumb' . $data['file_ext'];

                $status = $this->model_admin->edit_foto($username, $linkfoto);

                if ($status == "success") {
                    $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Foto telah berhasil diubah.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/profile', 'location');
                } else if ($status == "connection_failed") {
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/profile', 'location');
                } else {
                    $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>" . $status . "</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/profile', 'location');
                }
            }
        }

        $data['title'] = "Profil - A+ Learning Guidance";
        $data['user'] = $this->model_admin->get_profile($this->session->userdata('username'));

        $this->load->view('back/b_header', $data);
        $this->load->view('back/b_profile', $data);
        $this->load->view('back/b_footer');
    }

    function editProfile() {
        if (!$this->session->userdata('role'))
            redirect('/guidance/home', 'location');
        $this->load->model('model_admin');
        if ($this->input->post('simpan')) {
            //buat rule form validation
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('noktp', 'No KTP', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'required');
            if ($this->form_validation->run() == false) {

                //munculkan error kalau validasi salah
                $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
                $this->session->set_flashdata('warning', validation_errors());

                redirect('guidance/profile/edit/' . $id, 'location');
            } else {
                // insert database, etc
                $user = $this->session->userdata('username');
                $nama = $this->input->post('nama');
                $noKTP = $this->input->post('noktp');
                $alamat = $this->input->post('alamat');
                $tglLahir = $this->input->post('tgllahir');

                $status = $hasil = $this->model_admin->edit_profile($user, $nama, $noKTP, $alamat, $tglLahir);

                if ($status == "success") {
                    $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Profil Anda berhasil diubah.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/profile/edit', 'location');
                } else if ($status == "connection_failed") {
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/profile/edit', 'location');
                } else {
                    $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>" . $status . "</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/profile/edit', 'location');
                }
            }
        }
        $data['title'] = "Edit Profil - A+ Learning Guidance";
        $this->load->model('model_admin');

        $data['user'] = $this->model_admin->get_profile($this->session->userdata('username'));

        $this->load->view('back/b_header', $data);
        $this->load->view('back/b_edit_profile', $data);
        $this->load->view('back/b_footer');
    }

    function editPassword() {
        if (!$this->session->userdata('role'))
            redirect('/guidance/home', 'location');
        $this->load->model('model_admin');
        $this->load->helper('security');
        if ($this->input->post('simpan')) {
            //buat rule form validation
            $this->form_validation->set_rules('lama', 'Password Lama', 'required');
            $this->form_validation->set_rules('baru', 'Password Baru', 'required|matches[ulangi]');
            $this->form_validation->set_rules('ulangi', 'Ulangi Password Baru', 'required');
            if ($this->form_validation->run() == false) {

                //munculkan error kalau validasi salah
                $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>", "</strong> "
                        . "</div>");
                $this->session->set_flashdata('warning', validation_errors());

                redirect('guidance/profile/password/' . $id, 'location');
            } else {
                $user = $this->session->userdata('username');
                // insert database, etc
                $lama = do_hash($this->input->post('lama'), 'md5');
                $baru = do_hash($this->input->post('baru'), 'md5');
                $ulangi = do_hash($this->input->post('ulangi'), 'md5');

                //cek password lama
                if ($this->model_admin->cek_password($user, $lama)) {
                    $status = $hasil = $this->model_admin->edit_password($user, $baru);

                    if ($status == "success") {
                        $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                                . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                                . "<span class='sr-only'>Close</span>"
                                . "</button><strong>Password telah berhasil diubah.</strong> "
                                . "</div>";
                        $this->session->set_flashdata('warning', $warning);
                        redirect('/guidance/profile/password', 'location');
                    } else if ($status == "connection_failed") {
                        $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                                . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                                . "<span class='sr-only'>Close</span>"
                                . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                                . "</div>";
                        $this->session->set_flashdata('warning', $warning);
                        redirect('/guidance/profile/password', 'location');
                    } else {
                        $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                                . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                                . "<span class='sr-only'>Close</span>"
                                . "</button><strong>" . $status . "</strong> "
                                . "</div>";
                        $this->session->set_flashdata('warning', $warning);
                        redirect('/guidance/profile/password', 'location');
                    }
                } else {
                    $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Password Lama salah</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/profile/password', 'location');
                }
            }
        }

        $data['title'] = "Ganti Password - A+ Learning Guidance";
        $this->load->view('back/b_header', $data);
        $this->load->view('back/b_edit_password');
        $this->load->view('back/b_footer');
    }

    function halaman_login() {
        if ($this->session->userdata('role'))
            redirect('/guidance/home', 'location');
        $data['title'] = "Masuk - A+ Learning Guidance";
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->load->view('back/b_login', $data);
    }

    function login() {
        $this->load->model('model_admin');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_message('required', '%s harus diisi.');

        if ($this->form_validation->run() == FALSE) {
            $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                    . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                    . "<span class='sr-only'>Close</span>"
                    . "</button><strong>", "</strong> "
                    . "</div>");
            $this->session->set_flashdata('warning', validation_errors());
            redirect('/guidance/login', 'location');
        } else {
            // check account, etc
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $logincheck = $this->model_admin->checkkaryawan($username, $password);

            if ($logincheck) {
                $role = 0; // 1 admin, 2 editor, 3 guru,4 member dst menyusul
                $jabatan = $logincheck->jabatan;
                if ($jabatan == 'Administrator')
                    $role = 1;
                else if ($jabatan == 'Editor')
                    $role = 2;
                else if ($jabatan == 'Pembimbing')
                    $role = 3;

                $loginarray = array(
                    'username' => $logincheck->username,
                    'name' => $logincheck->nama,
                    'role' => $role
                );
                $this->session->set_userdata($loginarray);

                // redirect to contact page + notification
                $this->session->set_flashdata('home', true);
                redirect('/guidance/home', 'location');
            }
            else {
                $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                        . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                        . "<span class='sr-only'>Close</span>"
                        . "</button><strong>Username atau Password salah. Silahkan cek lagi.</strong> "
                        . "</div>";
                $this->session->set_flashdata('warning', $warning);
                redirect('/guidance/login', 'location');
            }
        }
    }

    function halaman_tambahpembimbing() {
        $data['title'] = "Tambah Pembimbing - A+ Learning Guidance";
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->load->view('back/b_header', $data);
        $this->load->view('back/b_tambah_pembimbing');
        $this->load->view('back/b_footer');
    }

    function tambahpembimbing() {
        //load model
        $this->load->model('model_admin');

        $config1['upload_path'] = './foto/';
        $config1['allowed_types'] = 'gif|jpg|png';
        $config1['remove_spaces'] = TRUE;
        $config1['encrypt_name'] = TRUE;

        $this->load->library('upload', $config1);

        //set validation rules and message
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[confpass]');
        $this->form_validation->set_rules('confpass', 'Ulang Password', 'required');
        $this->form_validation->set_rules('noKTP', 'Nomor KTP', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        //$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        //$this->form_validation->set_rules('noHP', 'Nomor HP', 'required');

        $this->form_validation->set_message('required', '%s harus diisi.');
        $this->form_validation->set_message('numeric', '%s harus dalam angka (0-9)');
        $this->form_validation->set_message('valid_email', 'Masukkan alamat e-mail Anda');
        $this->form_validation->set_message('matches[confpass]', 'Ulang Password tidak sesuai dengan password Anda.');

        //do something here
        if ($this->form_validation->run() == FALSE) {
            $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                    . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                    . "<span class='sr-only'>Close</span>"
                    . "</button><strong>", "</strong> "
                    . "</div>");
            $this->session->set_flashdata('warning', validation_errors());
            redirect('/guidance/pembimbing/tambah', 'location');
        } else {
            if (!$this->upload->do_upload('link') && !$this->model_admin->checkusername($this->input->post('username'))) {
                if (!$this->model_admin->checkusername($this->input->post('username'))) {
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Username telah terpakai</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/pembimbing/tambah', 'location');
                } else {
                    $data = $this->upload->data();
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>" . $this->upload->display_errors() . "</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/pembimbing/tambah', 'location');
                }
            } else {

                // insert database, etc
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));
                $noKTP = $this->input->post('noKTP');
                $nama = $this->input->post('nama');
                $alamat = $this->input->post('alamat');
                $tglLahir = $this->input->post('tglLahir');
                $jabatan = $this->input->post('jabatan');

                $data = $this->upload->data();
                $linkfoto = $data['file_name'];

                $config['image_library'] = 'gd2';
                $config['create_thumb'] = TRUE;
                $config['width'] = 100;
                $config['height'] = 100;
                $config['source_image'] = "./foto/" . $linkfoto;
                $config['maintain_ratio'] = TRUE;

                $this->load->library('image_lib');
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                $this->image_lib->clear();

                $pisah = explode('.', $linkfoto);
                $linkfotobaru = $pisah[0] . "_thumb." . $pisah[1];

                $status = $this->model_admin->registerkaryawan($username, $password, $noKTP, $nama, $alamat, $tglLahir, $jabatan, $linkfotobaru);

                if ($status == "success") {
                    $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Data karyawan berhasil ditambahkan.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/pembimbing/tambah', 'location');
                } else if ($status == "connection_failed") {
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/pembimbing/tambah', 'location');
                } else if ($status == "username_invalid") {
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Username telah terpakai, silahkan coba username lain.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/pembimbing/tambah', 'location');
                } else {
                    $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>" . $status . "</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/pembimbing/tambah', 'location');
                }
            }
        }
    }

    function halaman_lihatpembimbing() {
        $data['title'] = "Daftar Pembimbing - A+ Learning Guidance";
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->load->model('model_admin');
        $data['karyawan'] = $this->model_admin->get_all_karyawan();

        $this->load->view('back/b_header', $data);
        $this->load->view('back/b_lihat_pembimbing');
        $this->load->view('back/b_footer');
    }

    function halaman_editpembimbing($idPembimbing) {
        $data['title'] = "Edit Pembimbing - A+ Learning Guidance";
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->load->model('model_admin');

        $data['pembimbing'] = $this->model_admin->get_detail_karyawan($idPembimbing);

        $this->load->view('back/b_header', $data);
        $this->load->view('back/b_edit_pembimbing');
        $this->load->view('back/b_footer');
    }

    function editpembimbing() {
        $this->load->model('model_admin');
        
        $config1['upload_path'] = './foto/';
        $config1['allowed_types'] = 'gif|jpg|png';
        $config1['remove_spaces'] = TRUE;
        $config1['encrypt_name'] = TRUE;

        $this->load->library('upload', $config1);
        
        $this->form_validation->set_rules('password', 'Password', 'required|matches[confpass]');
        $this->form_validation->set_rules('confpass', 'Ulang Password', 'required');
        $this->form_validation->set_rules('noKTP', 'Nomor KTP', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

        $this->form_validation->set_message('required', '%s harus diisi.');
        $this->form_validation->set_message('numeric', '%s harus dalam angka (0-9)');
        $this->form_validation->set_message('valid_email', 'Masukkan alamat e-mail Anda');
        $this->form_validation->set_message('matches[confpass]', 'Ulang Password tidak sesuai dengan password Anda.');

        if ($this->form_validation->run() == FALSE) {
            $this->form_validation->set_error_delimiters("<div class='alert alert-warning alert-dismissible' role='alert'>"
                    . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                    . "<span class='sr-only'>Close</span>"
                    . "</button><strong>", "</strong> "
                    . "</div>");
            $this->session->set_flashdata('warning', validation_errors());
            redirect('/guidance/pembimbing/edit/' . $this->input->post('idPembimbing'), 'location');
        } else {
            if ($this->input->post('editfoto') == "true") {
                if (!$this->upload->do_upload('link')) {
                    $data = $this->upload->data();
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>" . $this->upload->display_errors() . "</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/pembimbing/edit/' . $this->input->post('idPembimbing'), 'location');
                } else {
                    // insert database, etc
                    $id = $this->input->post('idPembimbing');
                    $password = $this->input->post('password');
                    $noKTP = $this->input->post('noKTP');
                    $nama = $this->input->post('nama');
                    $alamat = $this->input->post('alamat');
                    $tglLahir = $this->input->post('tglLahir');
                    $jabatan = $this->input->post('jabatan');
                    $data = $this->upload->data();
                    $linkfoto = $data['file_name'];

                    $config['image_library'] = 'gd2';
                    $config['create_thumb'] = TRUE;
                    $config['width'] = 100;
                    $config['height'] = 100;
                    $config['source_image'] = "./foto/" . $linkfoto;
                    $config['maintain_ratio'] = TRUE;

                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    $this->image_lib->clear();

                    $pisah = explode('.', $linkfoto);
                    $linkfotobaru = $pisah[0] . "_thumb." . $pisah[1];

                    $status = $this->model_admin->edit_data_karyawan($id, $noKTP, $nama, $alamat, $password, $tglLahir, $jabatan, $linkfotobaru);

                    if ($status == "success") {
                        $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                                . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                                . "<span class='sr-only'>Close</span>"
                                . "</button><strong>Data karyawan berhasil diubah.</strong> "
                                . "</div>";
                        $this->session->set_flashdata('warning', $warning);
                        redirect('/guidance/pembimbing/edit/' . $this->input->post('idPembimbing'), 'location');
                    } else if ($status == "connection_error") {
                        $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                                . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                                . "<span class='sr-only'>Close</span>"
                                . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                                . "</div>";
                        $this->session->set_flashdata('warning', $warning);
                        redirect('/guidance/pembimbing/edit/' . $this->input->post('idPembimbing'), 'location');
                    } else {
                        $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                                . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                                . "<span class='sr-only'>Close</span>"
                                . "</button><strong>" . $status . "</strong> "
                                . "</div>";
                        $this->session->set_flashdata('warning', $warning);
                        redirect('/guidance/pembimbing/edit/' . $this->input->post('idPembimbing'), 'location');
                    }
                }
            } else {
                $id = $this->input->post('idPembimbing');
                $password = $this->input->post('password');
                $noKTP = $this->input->post('noKTP');
                $nama = $this->input->post('nama');
                $alamat = $this->input->post('alamat');
                $tglLahir = $this->input->post('tglLahir');
                $jabatan = $this->input->post('jabatan');

                $status = $this->model_admin->edit_data_karyawan_tanpafoto($id, $noKTP, $nama, $alamat, $password, $tglLahir, $jabatan);

                if ($status == "success") {
                    $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Data karyawan berhasil diubah.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/pembimbing/edit/' . $this->input->post('idPembimbing'), 'location');
                } else if ($status == "connection_error") {
                    $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>Terjadi kesalahan, silahkan coba lagi.</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/pembimbing/edit/' . $this->input->post('idPembimbing'), 'location');
                } else {
                    $warning = "<div class='alert alert-success alert-dismissible' role='alert'>"
                            . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                            . "<span class='sr-only'>Close</span>"
                            . "</button><strong>" . $status . "</strong> "
                            . "</div>";
                    $this->session->set_flashdata('warning', $warning);
                    redirect('/guidance/pembimbing/edit/' . $this->input->post('idPembimbing'), 'location');
                }
            }
        }
    }

    function halaman_tambahadmin() {
        $data['title'] = "Tambah Administrator - A+ Learning Guidance";
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->load->view('back/b_header', $data);
        $this->load->view('back/b_backend');
        $this->load->view('back/b_footer');
    }

    function tambahadmin() {
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->load->view('front/f_header', $data);
        $this->load->view('front/f_login_user');
        $this->load->view('front/f_footer');
    }

    function halaman_backend() {

        $data['title'] = "Beranda - A+ Learning Guidance";

        if (!$this->session->userdata('role')) { // not set
            $warning = "<div class='alert alert-warning alert-dismissible' role='alert'>"
                    . "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>"
                    . "<span class='sr-only'>Close</span>"
                    . "</button><strong>Lakukan proses login dahulu.</strong> "
                    . "</div>";
            $this->session->set_flashdata('warning', $warning);
            redirect('/guidance/login', 'location');
        } else if ($this->session->userdata('role') != '4') { // not normal member
            $this->session->set_flashdata('home', true);
            $this->load->view('back/b_header', $data);
            $this->load->view('back/b_backend');
            $this->load->view('back/b_footer');
        } else { // member
            redirect('/home', 'location');
        }
    }

}
