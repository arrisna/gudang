<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
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
	              <a href="<?php echo base_url('kategori') ?>/index">Kategori</a>
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
			<td><h2>Edit User</h2></td>
		</tr>
	</table><br>

<?php
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open('user/update',$attributes);
foreach ($data as $row); ?>

<fieldset>
          <div class="control-group">
            <label>Username</label>
            <div class="controls">
              <label><input type="text" readonly="readonly" name="username" value="<?php echo $row->username; ?>" ></label>
            </div>
          </div>
          <div class="control-group">
            <label>Nama User</label>
            <div class="controls">
              <label><input type="text" id="" name="nama" value="<?php echo $row->nama; ?>"></label>
            </div>
          </div>
          <div class="control-group">
            <label>Password User</label>
            <div class="controls">
              <label><input type="text" id="" name="password" value="<?php echo $row->password; ?>"></label>
            </div>
          </div>
          <div class="control-group">
            <label>No. Handphone</label>
            <div class="controls">
              <label><input type="text" id="" name="no_hp" value="<?php echo $row->no_hp; ?>"></label>
            </div>
          </div>
          <div class="control-group">
            <label>Alamat</label>
            <div class="controls">
              <label><input type="text" id="" name="alamat" value="<?php echo $row->alamat; ?>"></label>
            </div>
          </div>
          <div class="control-group">
            <label>Email</label>
            <div class="controls">
              <label><input type="text" id="" name="email" value="<?php echo $row->email; ?>"></label>
            </div>
          </div>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit" name="submit">Update</button>
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