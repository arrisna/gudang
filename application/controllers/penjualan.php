<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Penjualan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model(array('barang_model','penjualan_model'));
		if (($this->session->userdata('status') != 'login')) {
			redirect('login');
		}
	}

	//halaman penjualan
	function index() {
		$config['base_url'] = site_url('penjualan/index/');
		$config['total_rows'] = $this->penjualan_model->totalData();
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
		$data['penjualan'] = $this->penjualan_model->tampilData($config['per_page'],$page);
		$this->load->view('admin/penjualan/tampil_jual',$data);
	}

	//cari penjualan
	function cari() {
		$cari = $this->input->post('cari');
		if (isset($cari) and !empty($cari)) {
			$data['penjualan'] = $this->penjualan_model->cariData($cari);
			$data['halaman'] = '';
			$this->load->view('admin/penjualan/tampil_jual',$data);
		} else {
			redirect('penjualan');
		}
	}

	function tanggal() {
     	$tgl1 = $this->input->post('tanggal1');
     	$tgl2 = $this->input->post('tanggal2');
     	if (isset($tgl1) and !empty($tgl1) or isset($tgl2) and !empty($tgl2)) {
     		$data['penjualan']  = $this->penjualan_model->tanggal($tgl1,$tgl2);
     		$this->load->view('admin/penjualan/lap_excel',$data);
     	} else {
     		redirect('penjualan/laporan');
     	}
     }

	//laporan penjualan
	function laporan() {
		$this->load->view('admin/penjualan/lap_jual');
	}

	//tambah data penjualan
	function tambah() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('no_penjualan','No Penjualan','required');
		$this->form_validation->set_rules('kd_brg','Kode Barang','required');
		$this->form_validation->set_rules('harga','Harga Barang','required|integer');
		$this->form_validation->set_rules('jumlah','Jumlah Barang','required|integer');

		$no_jual = $this->input->post('no_penjualan');
		$kode = $this->input->post('kd_brg');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');

		$data['stok'] = $this->barang_model->tampilBrg();
		foreach ($data['stok'] as $row):
			$stok = $row['stok'];
		endforeach;

		if($this->form_validation->run() != FALSE) {
			$data = array('no_penjualan' => $no_jual,
			'kd_brg' => $kode,
			'tanggal' => NOW(),
			'harga' => $harga,
			'jumlah' => $jumlah);

			if ($stok < $jumlah) {
				echo "<script>alert('stok tidak cukup!!!');
				history.go(-1); </script>";
			} else {
				$this->penjualan_model->tambahData($data);
				redirect('penjualan');
			}

		} else {
			$data['barang'] = $this->barang_model->tampilBrg();
			$this->load->view('admin/penjualan/tambah_jual',$data);
		}
	}

	//update data penjualan
	function update() {
		if(isset($_POST['submit'])) {
			$kode = $this->input->post('no_penjualan');
			$data = array('kd_brg' => $this->input->post('kd_brg'),
			'tanggal' => $this->input->post('tanggal'),
			'harga' => $this->input->post('harga'),
			'jumlah' => $this->input->post('jumlah') );
			$this->penjualan_model->updateData($kode,$data);
			redirect('penjualan');
		} else {
			$id = $this->uri->segment(3);
			$data['data'] = $this->penjualan_model->get_id($id);
			$data['barang'] = $this->barang_model->tampilBrg();
			$this->load->view('admin/penjualan/edit_jual',$data);
		}
	}

	//hapus data penjualan
	function hapus() {
		$id = $this->uri->segment(3);
		$this->penjualan_model->hapusData($id);
		redirect('penjualan');
	}
	
}

/* akhir dari script */