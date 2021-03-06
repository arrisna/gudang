<!DOCTYPE html>
<html>
<head>
	<title>Edit Barang</title>
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
			<td><h2>Edit Data Barang</h2></td>
		</tr>
	</table><br>

<?php
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open('barang/update', $attributes);
foreach ($data as $tampil); ?>

<fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">Kode Barang</label>
            <div class="controls">
              <input type="text" readonly="readonly" id="" name="kd_brg" value="<?php echo $tampil->kd_brg; ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Nama Barang</label>
            <div class="controls">
              <input type="text" id="" name="nama_brg" value="<?php echo $tampil->nama_brg; ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div> 
          <div class="control-group">
            <label for="inputError" class="control-label">Kategori Barang</label>
            <div class="controls">
              <select name="kategori">
              <?php foreach ($kategori as $kat) {
              echo "<option value='$kat[id_kat]'>$kat[nama_kat]</option>";
              } ?> </select>
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
            </div>       
          <div class="control-group">
            <label for="inputError" class="control-label">Harga Jual</label>
            <div class="controls">
              <input type="text" id="" name="harga_jual" value="<?php echo $tampil->harga_jual; ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Harga Beli</label>
            <div class="controls">
              <input type="text" name="harga_beli" value="<?php echo $tampil->harga_beli; ?>">
              <!--<span class="help-inline">OOps</span>-->
            </div>
          </div>
          <input type="hidden" name="stok" value="<?php echo $tampil->stok; ?>">
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