<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Suplier extends CI_Controller {

	//konstruktor
	function __construct() {
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('sup_model');
		if (($this->session->userdata('status') != 'login')) {
			redirect('login');
		}
	}

	//halaman awal
	function index() {
		$config['base_url'] = site_url('suplier/index/');
		$config['total_rows'] = $this->sup_model->totalSup();
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
		$data['supplier'] = $this->sup_model->tampilData($config['per_page'],$page);
		$this->load->view('admin/suplier/view_suplier',$data);
	}

	//cari supplier
	function cari() {
		$keyword = $this->input->post('cari');
		if (isset($keyword) and !empty($keyword)) {
			$data['supplier'] = $this->sup_model->cariBrg($keyword);
			$data['halaman'] = '';
			$this->load->view('admin/suplier/tampil_barang',$data);
		} else {
			redirect('suplier');
		}
	}

	//tambah data
	function tambah() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kd_suplier','Kode Supplier','required');
		$this->form_validation->set_rules('nama_suplier','Nama Supplier','required');
		$this->form_validation->set_rules('no_hp','Nomor HP','required|integer');
		$this->form_validation->set_rules('alamat','Alamat','required|min_length[15]');
		if($this->form_validation->run() != FALSE) {
			$data = array('kd_suplier' => $this->input->post('kd_suplier'),
			'nama_suplier' => $this->input->post('nama_suplier'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat') );
			$this->sup_model->tambahData($data);
			redirect('suplier');
		} else {
			$this->load->view('admin/suplier/tambah_suplier');
		}
	}

	//update data
	function update() {
		if(isset($_POST['submit'])) {
			$kode = $this->input->post('kd_suplier');
			$data = array('nama_suplier' => $this->input->post('nama_suplier'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat') );
			$this->sup_model->updateData($kode,$data);
			redirect('suplier');
		} else {
			$id = $this->uri->segment(3);
			$data['data'] = $this->sup_model->get_id($id);
			$this->load->view('admin/suplier/edit_suplier',$data);
		}
	}

	//hapus data
	function hapus() {
		$id = $this->uri->segment(3);
		$this->sup_model->hapusData($id);
		redirect('suplier');
	}
}

/* akhir dari script */