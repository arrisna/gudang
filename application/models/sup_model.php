<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Sup_model extends CI_Model {

	public $primary_key = 'kd_suplier';
	public $tabel = 'suplier';

	//konstruktor
	function __construct() {
		parent::__construct();
	}

	//menampilkan data tabel suplier
	function tampilSup() {
		$this->db->select("*")->from($this->tabel);
		$tampil = $this->db->get()->result_array();
		return $tampil;
	}

	//model total data
	function totalSup() {
		$total = $this->db->count_all($this->tabel);
		return $total;
	}

	//model tampil data per halaman
	function tampilData($limit,$offset) {
        $this->db->limit($limit,$offset);
        $this->db->from($this->tabel);
        $tampil = $this->db->get();
        if($tampil->num_rows() > 0) 
        	return $tampil->result_array();
        else
        	return $tampil->result_array();
    }

    //model pencarian data
    function cariData($cari) {
    	$this->db->from($this->tabel)->like('nama_suplier',$cari);
    	$hasil = $this->db->get();
    	if ($hasil->num_rows() > 0) {
    		return $hasil->result_array();
    	} else {
    		return result_array();
    	}
    }

	//mengambil data suplier
	function get_id($id) {
		$this->db->where($this->primary_key,$id);
		$get = $this->db->get($this->tabel);
		return $get->result();
	}

	//menambah data suplier
	function tambahData($data) {
		$tambah = $this->db->insert($this->tabel,$data);
		return $tambah;
	}

	//update data suplier
	function updateData($id,$data) {
		$this->db->where($this->primary_key,$id);
		$update = $this->db->update($this->tabel,$data);;
		return $update;
	}


	//hapus data suplier pada tabel
	function hapusData($id) {
		$this->db->where($this->primary_key,$id);
		$delete = $this->db->delete($this->tabel);
		return $delete;
	}

}

/* akhir dari script */