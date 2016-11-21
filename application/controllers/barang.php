<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Barang extends CI_Controller {

	//konstruktor
	function __construct() {
		parent::__construct();
		$this->load->model(array('kategori_model','barang_model'));
		if (($this->session->userdata('status') != 'login')) {
			redirect('login');
		}
	}

	//halaman barang
	function index() {
		$config['base_url'] = site_url('barang/index/');
		$config['total_rows'] = $this->barang_model->totalBrg();
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
		$data['barang'] = $this->barang_model->fetch_barang($config['per_page'],$page);
		$this->load->view('admin/barang/tampil_barang',$data);
	}

	//cari barang
	function cari() {
		$keyword = $this->input->post('cari');
		if (isset($keyword) and !empty($keyword)) {
			$data['barang'] = $this->barang_model->cariBrg($keyword);
			$data['halaman'] = '';
			$this->load->view('admin/barang/tampil_barang',$data);
		} else {
			redirect('barang');
		}
	}

	//laporan barang excel
	function excel() {
		$data['barang'] = $this->barang_model->lapExcel();
		$this->load->view('admin/barang/lap_excel',$data);
	}

	function laporan() {
		$config['base_url'] = site_url('barang/index/');
		$config['total_rows'] = $this->barang_model->totalBrg();
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
		$data['barang'] = $this->barang_model->fetch_barang($config['per_page'],$page);
		$this->load->view('admin/barang/laporan_barang',$data);
	}

	//lapooran barang pdf
	function pdf() {
		tcpdf();
		$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$obj_pdf->SetCreator(PDF_CREATOR);
		$title = "PDF Report";
		$obj_pdf->setTitle($title);
		$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
		$obj_pdf->SetHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$obj_pdf->SetFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$obj_pdf->SetDefaultMonospacedFont('helvetica');
		$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$obj_pdf->SetFont('helvetica', '', 9);
		$obj_pdf->setFontSubsetting(false);
		$obj_pdf->AddPage();
		ob_start();

		$data['barang'] = $this->barang_model->lapExcel();
		$this->load->view('admin/barang/laporan_barang',$data);

		ob_end_clean();
		$obj_pdf->writeHML($content, true, false, true, false, '');
		$obj_pdf->Output('output.pdf', 'I');
	}

	//halaman tambah barang
	function tambah() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kd_brg','Kode Barang','required');
		$this->form_validation->set_rules('nama_brg','Nama Barang','required');
		$this->form_validation->set_rules('kategori','Kategori Barang','required');
		$this->form_validation->set_rules('harga_beli','Harga Beli','required');
		$this->form_validation->set_rules('harga_jual','Harga Jual','required');
		$this->form_validation->set_rules('stok','Stok Barang','required');
		if($this->form_validation->run() != FALSE) {
			$data = array('kd_brg' => $this->input->post('kd_brg'),
			'nama_brg' => $this->input->post('nama_brg'),
			'kategori' => $this->input->post('kategori'),
			'harga_beli' => $this->input->post('harga_beli'),
			'harga_jual' => $this->input->post('harga_jual'),
			'stok' => $this->input->post('stok') );
			$this->barang_model->tambahBrg($data);
			redirect('barang');
		} else {
			$data['kategori'] = $this->kategori_model->tampilKat();
			$this->load->view('admin/barang/tambah_barang',$data);
		}
	}

	//update data barang
	function update() {
		if(isset($_POST['submit'])) {
			$kode = $this->input->post('kd_brg');
			$data = array('nama_brg' => $this->input->post('nama_brg'),
			'kategori' => $this->input->post('kategori'),
			'harga_beli' => $this->input->post('harga_beli'),
			'harga_jual' => $this->input->post('harga_jual'),
			'stok' => $this->input->post('stok') );
			$this->barang_model->updateBrg($kode,$data);
			redirect('barang');
		} else {
			$id = $this->uri->segment(3);
			$data['data'] = $this->barang_model->get_id($id);
			$data['kategori'] = $this->kategori_model->tampilKat();
			$this->load->view('admin/barang/edit_barang',$data);
		}
	}

	//hapus data barang
	function hapus() {
		$id = $this->uri->segment(3);
		$this->barang_model->deleteBrg($id);
		redirect('barang');
	}
}

/* akhir dari script */