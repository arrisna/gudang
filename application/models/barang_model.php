<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Barang_model extends CI_Model {

	public $primary_key = 'kd_brg';

	function __construct() {
		parent::__construct();
	}

	//menampilkan data barang
	function tampilBrg() {
		$this->db->from('barang');
		$this->db->join('kategori', 'barang.kategori=kategori.id_kat');
		$tampil = $this->db->get()->result_array();
		return $tampil;
	}

	//total barang
	public function totalBrg() {
		$total = $this->db->count_all('barang');
		return $total;
	}

	public function fetch_barang($limit,$offset) {
		$this->db->limit($limit,$offset);
		$this->db->from('barang');
		$this->db->join('kategori','barang.kategori=kategori.id_kat');
		$tampil = $this->db->get();
		if ($tampil->num_rows() > 0) {
			return $tampil->result_array();
		} else {
			return $tampil->result_array();
		}
	}

    //pencarian barang
    function cariBrg($keyword) {
    	$this->db->from('barang');
    	$this->db->join('kategori', 'barang.kategori=kategori.id_kat');
    	$this->db->like('nama_brg',$keyword);
    	$cari = $this->db->get();
    	if ($cari->num_rows() > 0) {
    		return $cari->result_array();
    	} else {
    		return $cari->result_array();
    	}
    }

    //membuat laporan excel
    function lapExcel() {
    	$this->db->from('barang');
    	$this->db->join('kategori', 'barang.kategori=kategori.id_kat');
    	$excel = $this->db->get();
    	return $excel->result_array();
    }

	//mengambil data barang
	function get_id($id) {
		$this->db->where($this->primary_key,$id);
		$get = $this->db->get('barang');
		return $get->result();
	}

	//menambah data barang
	function tambahBrg($data) {
		$tambah = $this->db->insert('barang',$data);
		return $tambah;
	}

	//update data barang
	function updateBrg($id,$data) {
		$this->db->where($this->primary_key,$id);
		$update = $this->db->update('barang',$data);;
		return $update;
	}


	//hapus data barang pada tabel
	function deleteBrg($id) {
		$this->db->where($this->primary_key,$id);
		$delete = $this->db->delete('barang');
		return $delete;
	}

	public function getListBrg($id){
		$this->db->from('barang');
		$this->db->join('kategori', 'barang.kategori=kategori.id_kat')->where('barang.kategori=$id');
		$tampil = $this->db->get()->result_array();
		return $tampil;
	}
}

/* akhir dari script */
