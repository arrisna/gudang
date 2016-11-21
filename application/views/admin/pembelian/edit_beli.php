<!DOCTYPE html>
<html>
<head>
	<title>Edit Pembelian</title>
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
			<td><h2>Edit Data Pembelian</h2></td>
		</tr>
	</table><br>

<?php
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open('pembelian/update', $attributes);
foreach ($data as $tampil); ?>

<fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">No Pembelian</label>
            <div class="controls">
              <input type="text" readonly="readonly" id="" name="no_penjualan" value="<?php echo $tampil->no_pembelian; ?>" >
            </div>
          </div>
          <div class="control-group">
            <label>Nama Barang</label>
            <div class="controls">
            <label>
            <select name="kd_brg" id="kd_brg" onchange="changeValue(this.value)">
            	<option value=0 selected>--Pilih Barang--</option>
            	<?php 
            	$jsArray = "var dtBrg = new Array();\n";
            	foreach ($barang as $brg): ?>
            		<option value="<?php echo $brg['kd_brg']; ?>"><?php echo $brg['nama_brg']; ?></option>";
            	<?php $jsArray .= "dtBrg['" . $brg['kd_brg'] . "'] = {harga:'" . addslashes($brg['harga_beli']) ."'};\n";  
            	endforeach; ?>
			</select>
			</label>
              <label for="inputError" class="control-label"><?php echo form_error('nama_brg','<div style="color:red">','</div>'); ?></label>
            </div>
          </div>
          <div class="control-group">
            <label>Harga</label>
            <div class="controls">
              <label><input type="text" id="harga" name="harga" readonly="readonly" placeholder="harga barang" value="<?php echo set_value('harga'); ?>"></label>
              <label for="inputError" class="control-label"><?php echo form_error('harga','<div style="color:red">','</div>'); ?></label>
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Tanggal</label>
            <div class="controls">
              <input type="date" id="" name="tanggal" value="<?php echo $tampil->tanggal; ?>">
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Jumlah</label>
            <div class="controls">
              <input type="text" id="" name="jumlah" value="<?php echo $tampil->jumlah; ?>">
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Nama Suplier</label>
            <div class="controls">
            <select name="kd_suplier">
			<?php foreach ($suplier as $sup): ?>
				<option value="<?php echo $sup['kd_suplier']; ?>"><?php echo $sup['nama_suplier']; ?></option>
			<?php endforeach; ?>
			</select>
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

<script type="text/javascript">    
    <?php echo $jsArray; ?>  
    function changeValue(kd_brg){  
    document.getElementById('harga').value = dtBrg[kd_brg].harga;
    };  
</script> 

</body>
</html>