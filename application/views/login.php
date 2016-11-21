<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container login">

<?php 
echo "<table align=center>
	<tr>
		<td><h2 class='form-signin-heading'>Login Administrator</h2></td>
	</tr>
</table><br>";
$attributes = array('class' => 'form-signin');
echo form_open('login/cekLogin',$attributes); 
?>
<h3 class="form-signin-heading">Username</h3>
<?php echo form_input('username', '', 'placeholder="Username"');
echo "<br>
<h3 class='form-signin-heading'>Username</h3>";
echo form_password('password', '', 'placeholder="Password"'); ?>
<br><br>
<table align="center">
	<tr>
		<td><input type="submit" value="Login" class="btn btn-large btn-primary"></td>
	</tr>
</table>

<?php echo form_close(); ?>
</div><!--container-->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</body>
</html>