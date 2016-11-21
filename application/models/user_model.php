<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class User_model extends CI_Model {

	private $primary_key = 'username';
	private $tabel = 'user';

	//konstruktor
	function __construct() {
		parent::__construct();
	}

	//menampilkan data tabel user
	function tampilData() {
		$tampil = $this->db->get($this->tabel);
		if($tampil->num_rows()>0) {
			return $tampil->result_array();
		} else {
			return null;
		}
	}

	//mengambil data user
	function get_id($id) {
		$this->db->where($this->primary_key,$id);
		$get = $this->db->get($this->tabel);
		return $get->result();
	}

	//menambah data user
	function tambahData($data) {
		$tambah = $this->db->insert($this->tabel,$data);
		return $tambah;
	}

	//update data user
	function updateData($id,$data) {
		$this->db->where($this->primary_key,$id);
		$update = $this->db->update($this->tabel,$data);;
		return $update;
	}

	public function save() {
  		$pass = md5($this->input->post('npassword'));
  		$data = array ('password' => $pass);
  		$this->db->where('username', $this->session->userdata('username'));
  		$this->db->update($this->tabel, $data);
 	}

 	public function cek_old() {
   		$old = md5($this->input->post('opassword'));    
   		$this->db->where('password',$old);
   		$query = $this->db->get($this->tabel);
      	return $query->result();;
    }


	//hapus data user pada tabel
	function hapusData($id) {
		$this->db->where($this->primary_key,$id);
		$delete = $this->db->delete($this->tabel);
		return $delete;
	}

	function cekLogin($data) {
		$username = $this->input->POST('username', TRUE);
		$password = md5($this->input->POST('password', TRUE));
		$data = $this->db->query("SELECT * from user where username='$username' and password='$password' LIMIT 1 ");
		return $data->row();
	}

	function __destruct() {
		$this->db->close();
	}

}

/* akhir dari script */