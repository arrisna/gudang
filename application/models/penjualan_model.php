<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Penjualan_model extends CI_Model {

	private $primary_key = 'no_penjualan';
	private $tabel = 'penjualan';

	//konstruktor
	function __construct() {
		parent::__construct();
	}

	//model tampil data penjualan
	function tampilData($limit,$offset) {
        $this->db->limit($limit,$offset);
        $this->db->from($this->tabel);
        $this->db->join('barang', 'penjualan.kd_brg = barang.kd_brg');
        $tampil = $this->db->get();
        if($tampil->num_rows() > 0) 
        	return $tampil->result_array();
        else
        	return $tampil->result_array();
    }

    //total data penjualan
    function totalData() {
    	$total = $this->db->count_all($this->tabel);
    	return $total;
    }

    //tanggal penjualan
	function tanggal($tgl_awal,$tgl_akhir) {
		$this->db->from($this->tabel)->join('barang', 'penjualan.kd_brg = barang.kd_brg');
		$this->db->where('tanggal >=', $tgl_awal);
		$this->db->where('tanggal <=', $tgl_akhir);
		$hasil = $this->db->get();
    	if ($hasil->num_rows() > 0) {
    		return $hasil->result_array();
    	} else {
    		return result_array();
    	}
	}

    //model pencarian data
    function cariData($cari) {
    	$this->db->from($this->tabel)->join('barang', 'penjualan.kd_brg = barang.kd_brg');
    	$this->db->like('nama_brg',$cari);
    	$hasil = $this->db->get();
    	if ($hasil->num_rows() > 0) {
    		return $hasil->result_array();
    	} else {
    		return result_array();
    	}
    }

	//mengambil data penjualan
	function get_id($id) {
		$this->db->where($this->primary_key,$id);
		$get = $this->db->get($this->tabel);
		return $get->result();
	}

	//menambah data penjualan
	function tambahData($data) {
		$tambah = $this->db->insert($this->tabel,$data);
		return $tambah;
	}

	//update data penjualan
	function updateData($id,$data) {
		$this->db->where($this->primary_key,$id);
		$update = $this->db->update($this->tabel,$data);;
		return $update;
	}


	//hapus data penjualan pada tabel
	function hapusData($id) {
		$this->db->where($this->primary_key,$id);
		$delete = $this->db->delete($this->tabel);
		return $delete;
	}

}

/* akhir dari script */