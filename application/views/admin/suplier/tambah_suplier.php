<!DOCTYPE html>
<html>
<head>
	<title>Tambah Supplier</title>
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
	<table align="center">
		<tr>
			<td><h2>Tambah Supplier</h2></td>
		</tr>
	</table><br>

<?php
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open('suplier/tambah',$attributes); ?>

<fieldset>
          <div class="control-group">
            <label>Kode Supplier</label>
            <div class="controls">
            <label><input type="text" id="" name="kd_suplier" placeholder="Kode Supplier" value="<?php echo set_value('kd_suplier'); ?>" ></label>
              <label for="inputError" class="control-label"><?php echo form_error('kd_suplier','<div style="color:red">','</div>'); ?></label>
            </div>
          </div>
          <div class="control-group">
            <label>Nama Supplier</label>
            <div class="controls">
              <label><input type="text" id="" name="nama_suplier" placeholder="Nama Supplier" value="<?php echo set_value('nama_suplier'); ?>"></label>
              <label for="inputError" class="control-label"><?php echo form_error('nama_suplier','<div style="color:red">','</div>'); ?></label>
            </div>
          </div>
          <div class="control-group">
            <label>No. Handphone</label>
            <div class="controls">
            <label><input type="text" id="" name="no_hp" placeholder="Nomor Handphone" value="<?php echo set_value('no_hp'); ?>" ></label>
              <label for="inputError" class="control-label"><?php echo form_error('no_hp','<div style="color:red">','</div>'); ?></label>
            </div>
          </div>
          <div class="control-group">
            <label>Alamat</label>
            <div class="controls">
              <label><input type="text" id="" name="alamat" placeholder="Alamat Supplier" value="<?php echo set_value('alamat'); ?>"></label>
              <label for="inputError" class="control-label"><?php echo form_error('alamat','<div style="color:red">','</div>'); ?></label>
            </div>
          </div>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <button class="btn" type="reset">Cancel</button>
          </div>
        </fieldset>

<?php echo form_close(); ?>

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