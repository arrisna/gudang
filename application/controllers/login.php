<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Login extends CI_Controller {

	//konstruktor
	function __construct() {
		parent::__construct();
	 	$this->load->model('login_model');
	}

	//halaman awal
	function index() {
		$this->load->view('login');
	}

	//cek login user
	function cekLogin() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$login = array('username' => $username,
		'password' => md5($password) );

		$cek = $this->login_model->cek_login('user',$login);
		if($cek->num_rows() > 0) {
			$dataUser = array('username' => $username,
			'status' => "login" );

			$this->session->set_userdata($dataUser);
			redirect('barang');
			
		} elseif (empty($username) || empty($password)) {
			echo "<script>alert('username atau password tidak boleh kosong!!!');
			history.go(-1); </script>";
		} else {
			echo "<script>alert('username atau password salah!!!');
			history.go(-1); </script>";
		}
	}

	//logout data user
	function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}

}

/* akhir dari script */