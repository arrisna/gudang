<!DOCTYPE html> 
<html lang="en-US">
<head>
  <title>Ubah Password</title>
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
    	Ubah Password
    </h2>
    <br><br>
    
    
     <div class="row">
        <div class="span12 columns">

<?php $attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open('user/ubahPass',$attributes); ?>
          <fieldset>
          <div class="control-group">
            <label>Password Lama</label>
            <div class="controls">
            <label><input type="password" id="" name="opassword" placeholder="Password Lama" value="<?php echo set_value('opassword'); ?>" ></label>
              <label for="inputError" class="control-label"><?php echo form_error('opassword','<div style="color:red">','</div>'); ?></label>
            </div>
          </div>
          <div class="control-group">
            <label>Password Baru</label>
            <div class="controls">
            <label><input type="password" id="" name="npassword" placeholder="Password Baru" value="<?php echo set_value('npassword'); ?>" ></label>
              <label for="inputError" class="control-label"><?php echo form_error('npassword','<div style="color:red">','</div>'); ?></label>
            </div>
          </div>
          <div class="control-group">
            <label>Konfirm Password</label>
            <div class="controls">
            <label><input type="password" id="" name="cpassword" placeholder="Confirm Password" value="<?php echo set_value('cpassword'); ?>" ></label>
              <label for="inputError" class="control-label"><?php echo form_error('cpassword','<div style="color:red">','</div>'); ?></label>
            </div>
          </div>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <button class="btn" type="reset">Cancel</button>
          </div>
        </fieldset>

     <?php echo form_close(); ?>

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