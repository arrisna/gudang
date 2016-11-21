<!DOCTYPE html> 
<html lang="en-US">
<head>
  <title>Data Supplier</title>
  <meta charset="utf-8">
  <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/css/admin/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	     <ul class="nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Barang<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo base_url('kategori') ?>/index">Kategori</a>
	            </li>
	            <li>
	            	<a href="<?php echo site_url("barang"); ?>/index">Barang</a>
	            </li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transaksi<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo site_url("penjualan"); ?>/index">Penjualan</a>
	            </li>
	            <li>
	            	<a href="<?php echo site_url("pembelian"); ?>/index">Pembelian</a>
	            </li>
	            <li>
	            	<a href="<?php echo site_url("suplier"); ?>/index">Supplier</a>
	            </li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	          	<li>
	            	<a href="<?php echo site_url("barang"); ?>/laporan">Barang</a>
	            </li>
	            <li>
	              <a href="<?php echo site_url("penjualan"); ?>/laporan">Penjualan</a>
	            </li>
	            <li>
	            	<a href="<?php echo site_url("pembelian"); ?>/laporan">Pembelian</a>
	            </li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('username'); ?><b class="caret"></b></a>
	          <ul class="dropdown-menu">
	          	<li>
	            	<a href="<?php echo site_url("user"); ?>/password">Ubah Password</a>
	            </li>
	            <li>
	              <a href="<?php echo site_url("login"); ?>/logout">Keluar</a>
	            </li>
	          </ul>
	        </li>
	        </ul>
        </div>
	  </div>
	</div>

	<div class="container top">
	<div class="page-header users-header">
	<h2 align="center">
    	Data <?php echo ucfirst($this->uri->segment(1));?> 
    </h2>
    <br><br>
    <form class="form-inline" method="post" action="<?php echo base_url().'suplier/cari'; ?>">
    
    Cari Supplier : <input type="text" class="form-control" id="supplier" placeholder="masukkan nama supplier" name="cari">
    <button type="submit" class="btn btn-default" name="submit">Submit</button>
    <a  href="<?php echo site_url("suplier"); ?>/tambah" class="btn btn-success">Tambah Data</a>
    </form>

     <div class="row">
        <div class="span12 columns">

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">No</th>
                <th class="yellow header headerSortDown">Kode Supplier</th>
                <th class="yellow header headerSortDown">Nama Supplier</th>
                <th class="yellow header headerSortDown">No. Handphone</th>
                <th class="yellow header headerSortDown">Alamat</th>
                <th colspan="2">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = $this->uri->segment(3) + 1;
              foreach($supplier as $row):
                echo '<tr>';
                echo '<td>'.$no++.'</td>';
                echo '<td>'.$row['kd_suplier'].'</td>';
                echo '<td>'.$row['nama_suplier'].'</td>';
                echo '<td>'.$row['no_hp'].'</td>';
                echo '<td>'.$row['alamat'].'</td>';
                echo '<td width=90px>'; ?>
                <?php echo anchor('suplier/update/'.$row['kd_suplier'],'Lihat & Edit',array('class' => 'btn btn-info')); ?>
                <?php echo '</td>
                <td width=60px>'; ?>
                <?php echo anchor('suplier/hapus/'.$row['kd_suplier'],'Hapus',array('onclick'=>'return confirm(\'Apakah Anda Yakin?\');', 'class' => 'btn btn-danger')); ?>
                <?php echo '</td>';
                echo '</tr>';
              endforeach;
              ?>      
            </tbody>
          </table>
          <table align="center">
          	<tr><td>
          		<?php echo $halaman; ?>
          	</td></tr>
          </table>

      </div>
    </div>

    <div id="footer">
		<hr>
		<div class="inner">
			<div class="container">
				<p class="right"><a href="#">Back to top</a></p>
				<p>
				</p>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/admin.min.js"></script>
</body>
</html>