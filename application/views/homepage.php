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
	<div class="outer">
		<div class="middle" >
			<div class="inner">
				<div class="row">
					 <div class="col-lg-12 col-md-12 col-xs-12 par-center">
							<img class="img-logo-login" src="<?php echo base_url('assets/other/media/img/logo/bpkp.png') ?>" />
					</div>
				</div>
					<!-- <h4 class="text-center">Form Login</h4> -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-xs-12 par-center">
							<?php
							if(isset($messages)){?>
							<div><div class="alert alert-danger">
							    <strong><?php echo trim($messages);?></strong><button type="button" class="close" data-dismiss="alert">x</button>
							  </div>
							</div>
						<?php }?>
							<form class="form" id=form action="<?php echo base_url('login'); ?>" method=POST style="margin:0px auto;border: 0.7px solid #999;">
								<div class="col-lg-12">
									<div class="row">
										<div class="form-group has-feedback">
											<i class="glyphicon glyphicon-user form-control-feedback"></i>
									    <input type="text" name="username" class="form-control" placeholder="Username" required/>
										</div>
									</div>
									<div class="row">
										<div class="form-group has-feedback">
											<i class="glyphicon glyphicon-lock form-control-feedback"></i>
									    <input type="password" name="password" class="form-control" placeholder="Password" required/>
										</div>
									</div>
									<div class="row">
										<br><a href="#" class="forgot">Forgot Password?</a>
									</div><br/>
									<div class="row">
										<input type="submit" class="btn btn-primary" value="Login" style="width:100%;" />
									</div>
								</div>
							</form>
						</div>
				</div>
			</div>
		</div>
	</div>
		<footer class="footer">
        <p class="text-muted" style="color:#ddd !important">Copyright @2017</p>
    </footer>
<!-- INCLUDE JS -->
<script src="<?php echo base_url('assets/js/jquery-2.1.4.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>


<script>
$(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
	$(".alert-danger").slideUp(500);
});
</script>
</body>
</html>
