<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Login_model extends CI_Model {

	//konstruktor
	function __construct() {
		parent::__construct();
	}

	//periksa login user dan password
	function cek_login($tabel,$where) {
		$login = $this->db->get_where('user',$where);
		return $login;
	}

}