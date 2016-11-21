<!DOCTYPE html>
<html>
<head>
	<title>Tambah Penjualan</title>
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
			<td><h2>Tambah Penjualan</h2></td>
		</tr>
	</table><br>

<?php
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open('penjualan/tambah', $attributes); ?>

<fieldset>
          <div class="control-group">
            <label>No Penjualan</label>
            <div class="controls">
              <label><input type="text" id="" name="no_penjualan" placeholder="nomor penjualan" value="<?php echo set_value('no_penjualan'); ?>" ></label>
              <label for="inputError" class="control-label"><?php echo form_error('no_penjualan','<div style="color:red">','</div>'); ?></label>
            </div>
          </div>
          <div class="control-group">
            <label>Nama Barang</label>
            <div class="controls">
              <label><select name="kd_brg" id="kd_brg" onchange="changeValue(this.value)">
            	<option value=0 selected>--Pilih Barang--</option>
            	<?php 
            	$jsArray = "var dtBrg = new Array();\n";
            	foreach ($barang as $brg): ?>
            		<option value="<?php echo $brg['kd_brg']; ?>"><?php echo $brg['nama_brg']; ?></option>";
            	<?php $jsArray .= "dtBrg['" . $brg['kd_brg'] . "'] = {harga:'" . addslashes($brg['harga_jual']) ."'};\n";  
            	endforeach; ?>
			</select></label>
              <label for="inputError" class="control-label"><?php echo form_error('nama_brg','<div style="color:red">','</div>'); ?></label>
            </div>
          </div> 
          <div class="control-group">
            <label>Harga</label>
            <div class="controls">
              <label><input type="text" id="harga" readonly="readonly" name="harga" placeholder="harga barang" value="<?php echo set_value('harga'); ?>"></label>
              <label for="inputError" class="control-label"><?php echo form_error('harga','<div style="color:red">','</div>'); ?></label>
            </div>
          </div>
          <div class="control-group">
            <label>Jumlah</label>
            <div class="controls">
              <label><input type="text" name="jumlah" placeholder="jumlah barang" value="<?php echo set_value('jumlah'); ?>"></label>
              <label for="inputError" class="control-label"><?php echo form_error('jumlah','<div style="color:red">','</div>'); ?></label>
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