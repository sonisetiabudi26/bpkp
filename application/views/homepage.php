<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Login</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/font-awesome.css')?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet" />
</head>
<body class="body-1">
	<div class="col-lg-12 text-primary">
	<div class="col-lg-6 col-md-12 col-xs-12 par-center">
		<img class="img-logo-login" src="<?php echo base_url('assets/other/media/img/logo/bpkp.png') ?>" />
	</div>
		<!-- <h4 class="text-center">Form Login</h4> -->
		<div class="col-lg-6 col-md-12 col-xs-12 par-center text-danger"><h4><?php echo (isset($messages)) ? trim ($messages) : '';?></h4></div>
		<form class="form" id=form action="<?php echo base_url('login'); ?>" method=POST style="margin:0px auto;">
			<div class="col-lg-6 col-md-12 col-xs-12 par-center">
				<input type="text" class="form-control required" name="username" id="username" placeholder="Please input Username" required />
			</div>
			<div class="col-lg-12">&nbsp;</div>
			<div class="col-lg-6 col-md-12 col-xs-12 par-center">
				<input name="password" id="password" type="password" class="form-control required" placeholder="Your Password . . ." required />
			</div>
			<div class="col-lg-12">&nbsp;</div>
			<div class="col-lg-6 col-md-12 col-xs-12 par-center">
				<input type="submit" class="btn btn-primary" value="Login" />
			</div>
			<div class="col-lg-6 col-md-12 col-xs-12 par-center">
				<br><a href="#">Forgot Password?</a>
			</div>
		</form>
	</div>
	<footer class="footer">
      <div class="container">
        <p class="text-muted">Copyright @2017</p>
      </div>
    </footer>
<!-- INCLUDE JS -->
<script src="<?php echo base_url('assets/js/jquery-2.1.4.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>