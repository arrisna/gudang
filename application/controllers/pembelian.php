<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Pembelian extends CI_Controller {

	//konstruktor
	function __construct() {
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model(array('sup_model','barang_model','pembelian_model'));
		if (($this->session->userdata('status') != 'login')) {
			redirect('login');
		}
	}

	//halaman awal
	function index() {
		$config['base_url'] = site_url('pembelian/index/');
		$config['total_rows'] = $this->pembelian_model->totalData();
		$config['per_page'] = 10;
		$config['num_links'] = 5;

		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = "</ul>";
		$config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>";
		$config['cur_tag_open'] = "<li class='disabled'><li class'active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tag_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tag_close'] = "</li>";

		$this->pagination->initialize($config);
		$data['halaman'] = $this->pagination->create_links();
		$page = $this->uri->segment(3);
		$data['message'] = '';
		$data['pembelian'] = $this->pembelian_model->tampilData($config['per_page'],$page);
		$this->load->view('admin/pembelian/tampil_beli',$data);
	}

	//cari pembelian
	function cari() {
		$cari = $this->input->post('cari');
		if (isset($cari) and !empty($cari)) {
			$data['pembelian'] = $this->pembelian_model->cariData($cari);
			$data['halaman'] = '';
			$this->load->view('admin/pembelian/tampil_beli',$data);
		} else {
			redirect('pembelian');
		}
	}

	function tanggal() {
     	$tgl1 = $this->input->post('tanggal1');
     	$tgl2 = $this->input->post('tanggal2');
     	if (isset($tgl1) and !empty($tgl1) or isset($tgl2) and !empty($tgl2)) {
     		$data['pembelian']  = $this->pembelian_model->tanggal($tgl1,$tgl2);
     		$this->load->view('admin/pembelian/lap_excel',$data);
     	} else {
     		redirect('pembelian/laporan');
     	}
     }

	//laporan pembelian
	function laporan() {
		$this->load->view('admin/pembelian/lap_beli');
	}

	//tambah data pembelian
	function tambah() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('no_pembelian','NoMOR Pembelian','required');
		$this->form_validation->set_rules('kd_brg','Kode Barang','required');
		$this->form_validation->set_rules('harga','Harga Barang','required|integer');
		$this->form_validation->set_rules('jumlah','Jumlah Barang','required|integer');
		$this->form_validation->set_rules('kd_suplier','Kode Suplier','required');
		if($this->form_validation->run() != FALSE) {
			$data = array('no_pembelian' => $this->input->post('no_pembelian'),
			'kd_brg' => $this->input->post('kd_brg'),
			'tanggal' => NOW(),
			'harga' => $this->input->post('harga'),
			'jumlah' => $this->input->post('jumlah'),
			'kd_suplier' => $this->input->post('kd_suplier'));
			$this->pembelian_model->tambahData($data);
			redirect('pembelian');
		} else {
			$data['barang'] = $this->barang_model->tampilBrg();
			$data['suplier'] = $this->sup_model->tampilSup();
			$this->load->view('admin/pembelian/tambah_beli',$data);
		}
	}

	//update data pembelian
	function update() {
		if(isset($_POST['submit'])) {
			$kode = $this->input->post('no_pembelian');
			$data = array('kd_brg' => $this->input->post('kd_brg'),
			'tanggal' => $this->input->post('tanggal'),
			'harga' => $this->input->post('harga'),
			'jumlah' => $this->input->post('jumlah'),
			'kd_suplier' => $this->input->post('kd_suplier'));
			$this->pembelian_model->updateData($kode,$data);
			redirect('pembelian');
		} else {
			$id = $this->uri->segment(3);
			$data['data'] = $this->pembelian_model->get_id($id);
			$data['barang'] = $this->barang_model->tampilBrg();
			$data['suplier'] = $this->sup_model->tampilSup();
			$this->load->view('admin/pembelian/edit_beli',$data);
		}
	}

	//hapus data pembelian
	function hapus() {
		$id = $this->uri->segment(3);
		$this->pembelian_model->hapusData($id);
		redirect('pembelian');
	}

	
}

/* akhir dari script */