<!DOCTYPE html>
<html>
<head>
	<title>Tambah User</title>
	<link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <a class="brand">Project Name</a>
	      <ul class="nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Barang<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo base_url('kategori/') ?>">Kategori</a>
	            </li>
	            <li>
	            	<a href="<?php echo site_url("barang"); ?>/index">Barang</a>
	            </li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">User<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo base_url('user') ?>/index">User</a>
	            </li>
	            <li>
	            	<a href="<?php echo site_url("suplier"); ?>/index">Supplier</a>
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
			<td><h2>Tambah User</h2></td>
		</tr>
	</table><br>

<?php
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open('user/tambah',$attributes); ?>

<fieldset>
          <div class="control-group">
            <label>Username</label>
            <div class="controls">
            <label><input type="text" id="" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>" ></label>
              <label for="inputError" class="control-label"><?php echo form_error('username','<div style="color:red">','</div>'); ?></label>
            </div>
          </div>
          <div class="control-group">
            <label>Nama User</label>
            <div class="controls">
              <label><input type="text" id="" name="nama" placeholder="Nama User" value="<?php echo set_value('nama'); ?>"></label>
              <label for="inputError" class="control-label"><?php echo form_error('nama','<div style="color:red">','</div>'); ?></label>
            </div>
          </div>
          <div class="control-group">
            <label>Password</label>
            <div class="controls">
              <label><input type="text" id="" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>"></label>
              <label for="inputError" class="control-label"><?php echo form_error('password','<div style="color:red">','</div>'); ?></label>
            </div>
          </div>
          <div class="control-group">
            <label>Confirm Password</label>
            <div class="controls">
              <label><input type="text" id="" name="password1" placeholder="Confirm Password" value="<?php echo set_value('password'); ?>"></label>
              <label for="inputError" class="control-label"><?php echo form_error('password1','<div style="color:red">','</div>'); ?></label>
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
              <label><input type="text" id="" name="alamat" placeholder="Alamat" value="<?php echo set_value('alamat'); ?>"></label>
              <label for="inputError" class="control-label"><?php echo form_error('alamat','<div style="color:red">','</div>'); ?></label>
            </div>
          </div>
          <div class="control-group">
            <label>Email</label>
            <div class="controls">
              <label><input type="text" id="" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>"></label>
              <label for="inputError" class="control-label"><?php echo form_error('email','<div style="color:red">','</div>'); ?></label>
            </div>
          </div>
          <div class="control-group">
            <label>Level</label>
            <div class="controls">
              <label><select name="level">
			<option value="1">Admin</option>
			<option value="2">User</option></select></label>
              <label for="inputError" class="control-label"><?php echo form_error('level','<div style="color:red">','</div>'); ?></label>
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