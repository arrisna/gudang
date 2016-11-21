<!DOCTYPE html> 
<html lang="en-US">
<head>
  <title>Data User</title>
  <meta charset="utf-8">
  <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <a class="brand">Akun</a>
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
	      </ul>
	    </div>
	  </div>
	</div>

	<div class="container top">
	<div class="page-header users-header">
	<table align="center">
		<tr>
			<td><h2>Data User</h2></td>
		</tr>
	</table><br>
        <h2>
          <a  href="<?php echo site_url("user"); ?>/tambah" class="btn btn-success">Tambah Data</a>
        </h2>
     </div>

     <div class="row">
        <div class="span12 columns">

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">No</th>
                <th class="yellow header headerSortDown">Username</th>
                <th class="yellow header headerSortDown">Nama User</th>
                <th class="yellow header headerSortDown">No. Handphone</th>
                <th class="yellow header headerSortDown">Alamat</th>
                <th class="yellow header headerSortDown">Email</th>
                <th class="yellow header headerSortDown">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach($user as $row):
                echo '<tr>';
                echo '<td>'.$no++.'</td>';
                echo '<td>'.$row['username'].'</td>';
                echo '<td>'.$row['nama'].'</td>';
                echo '<td>'.$row['no_hp'].'</td>';
                echo '<td>'.$row['alamat'].'</td>';
                echo '<td>'.$row['email'].'</td>';
                echo '<td class="crud-actions">'; ?>
                <?php echo anchor('user/update/'.$row['username'],'Lihat & Edit',array('class' => 'btn btn-info')); ?>  
                <?php echo anchor('user/hapus/'.$row['username'],'Hapus',array('onclick'=>'return confirm(\'Apakah Anda Yakin?\');', 'class' => 'btn btn-danger')); ?>
                <?php echo '</td>';
                echo '</tr>';
              endforeach;
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

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