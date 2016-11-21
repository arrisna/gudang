<?php
if(!defined('BASEPATH')) exit ('No dirext script access allowed');

class Kategori extends CI_Controller {
	//konstruktor
	function __construct() {
		parent::__construct();
		$this->load->model('kategori_model');
		$this->load->helper(array('url','form'));
		if (($this->session->userdata('status') != 'login')) {
			redirect('login');
		}
	}

	//halaman awal kategori
	function index() {
		$config['base_url'] = site_url('kategori/index/');
		$config['total_rows'] = $this->kategori_model->totalKat();
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
		$data['kategori'] = $this->kategori_model->tampilData($config['per_page'],$page);
		$this->load->view('admin/kategori/view_kat',$data);
	}

	//cari kategori
	function cari() {
		$cari = $this->input->post('cari');
		if (isset($cari) and !empty($cari)) {
			$data['kategori'] = $this->barang_model->cariData($cari);
			$data['halaman'] = '';
			$this->load->view('admin/kategori/view_kat',$data);
		} else {
			redirect('kategori');
		}
	}

	//fungsi tambah kategori
	function tambahData() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_kat','ID Kategori','required');
		$this->form_validation->set_rules('nama_kat','Nama Kategori','required');
		if($this->form_validation->run() != FALSE) {
			$data = array('id_kat' => $this->input->post('id_kat'),
			'nama_kat' => $this->input->post('nama_kat') );
			$this->kategori_model->tambahKat($data);
			redirect('kategori');
		} else {
			$this->load->view('admin/kategori/tambah_kat');
		}
	}

	//fungsi update kategori
	function updateData() {
		if (isset($_POST['submit'])) {
			$id = $this->input->post('id_kat');
			$data = array('nama_kat' => $this->input->post('nama_kat') );
			$this->kategori_model->updateKat($id,$data);
			redirect('kategori');
		} else {
			$id = $this->uri->segment(3);
			$data['data'] = $this->kategori_model->get_id($id);
			$this->load->view('admin/kategori/edit_kat',$data);
		}		
	}

	//fungsi hapus kategori
	function hapusData() {
		$id = $this->uri->segment(3);
		$this->kategori_model->hapusKat($id);
		redirect('kategori');
	}
}

/* akhir dari script */