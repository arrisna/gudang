<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Kategori_model extends CI_Model {

	private $primary_key = 'id_kat';
	private $tabel = 'kategori';

	//konstruktor
	function __construct() {
		parent::__construct();
	}

	//model tampil kategori
	function tampilKat() {
		$this->db->select("*")->from($this->tabel);
		$tampil = $this->db->get()->result_array();
		return $tampil;
	}

	//model total data
	function totalKat() {
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
    	$this->db->from($this->tabel)->like('nama_kat',$cari);
    	$hasil = $this->db->get();
    	if ($hasil->num_rows() > 0) {
    		return $hasil->result_array();
    	} else {
    		return result_array();
    	}
    }

	//model mengambil data kkategori
	function get_id($id) {
		$this->db->where($this->primary_key,$id);
		$get = $this->db->get($this->tabel);
		return $get->result();
	}

	//model tambah kategori
	function tambahKat($data) {
		$tambah = $this->db->insert($this->tabel,$data);
		return $tambah;
	}

	//model update kategori
	function updateKat($id,$data) {
		$this->db->where($this->primary_key,$id);
		$update = $this->db->update($this->tabel,$data);
		return $update;
	}

	//model hapus kategori
	function hapusKat($id) {
		$this->db->where($this->primary_key,$id);
		$hapus = $this->db->delete($this->tabel);
		return $hapus;
	}
}

/* akhir dari script */