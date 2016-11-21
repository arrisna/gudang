<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Pembelian_model extends CI_Model {

	private $primary_key = 'no_pembelian';
	private $tabel = 'pembelian';

	//konstruktor
	function __construct() {
		parent::__construct();
	}

	//menampilkan data pembelian
	function tampilData($limit,$offset) {
		$this->db->limit($limit,$offset);
        $this->db->from($this->tabel);
        $this->db->join('suplier', 'pembelian.kd_suplier = suplier.kd_suplier');
        $this->db->join('barang','pembelian.kd_brg = barang.kd_brg');
        $tampil = $this->db->get();
        if($tampil->num_rows() > 0) 
        	return $tampil->result_array();
        else
        	return $tampil->result_array();
	}

	//total data pembelian
    function totalData() {
    	$total = $this->db->count_all($this->tabel);
    	return $total;
    }

    //laporan pembelian
    function laporan() {
    	$this->db->from($this->tabel);
        $this->db->join('suplier', 'pembelian.kd_suplier = suplier.kd_suplier');
        $this->db->join('barang','pembelian.kd_brg = barang.kd_brg');
        $tampil = $this->db->get();
        if($tampil->num_rows() > 0) 
        	return $tampil->result_array();
        else
        	return $tampil->result_array();
    }

    //tanggal pembelian
    function tanggal($tgl_awal,$tgl_akhir) {
        $this->db->from($this->tabel)->join('barang', 'pembelian.kd_brg = barang.kd_brg');
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
    	$this->db->from($this->tabel);
    	$this->db->join('suplier', 'pembelian.kd_suplier = suplier.kd_suplier');
        $this->db->join('barang','pembelian.kd_brg = barang.kd_brg');
    	$this->db->like('nama_brg',$cari);
    	$hasil = $this->db->get();
    	if ($hasil->num_rows() > 0) {
    		return $hasil->result_array();
    	} else {
    		return result_array();
    	}
    }

	//mengambil data pembelian
	function get_id($id) {
		$this->db->where($this->primary_key,$id);
		$get = $this->db->get($this->tabel);
		return $get->result();
	}

	//menambah data pembelian
	function tambahData($data) {
		$tambah = $this->db->insert($this->tabel,$data);
		return $tambah;
	}

	//update data pembelian
	function updateData($id,$data) {
		$this->db->where($this->primary_key,$id);
		$update = $this->db->update($this->tabel,$data);;
		return $update;
	}


	//hapus data pembelian pada tabel
	function hapusData($id) {
		$this->db->where($this->primary_key,$id);
		$delete = $this->db->delete($this->tabel);
		return $delete;
	}

}

/* akhir dari script */