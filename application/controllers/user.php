<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class User extends CI_Controller {

	//konstruktor
	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	 	if (($this->session->userdata('status') != 'login')) {
			redirect('login');
		}
	}

	//halaman admin
	function index() {
		$this->load->view('member/index');
	}

	//ubah password
	function password() {
		$this->load->view('admin/user/ubah_password');
	}

	function ubahPass() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('npassword','Password Baru','required');
  		$this->form_validation->set_rules('cpassword','Konfirm Password','required|matches[npassword]');
    	if($this->form_validation->run() == FALSE)
  		{
   			$this->load->view('admin/user/ubah_password');
  		} else {
   			$cek_old = $this->user_model->cek_old();
   			if ($cek_old == False){
    			$this->session->set_flashdata('error','Password lama tidak cocok!' );
    			$this->load->view('admin/user/ubah_password');
   			} else {
    			$this->user_model->save();
    			$this->session->sess_destroy();
    			$this->session->set_flashdata('error','Password berhasil diubah, silahkan login kembali !' );
    			redirect('login');
   			}   //end if valid_user
  		}
	}
}

/* akhir dari script */