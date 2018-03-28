<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>BPKP System</title>

	<!-- Bootstrap -->
	<link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?php echo base_url('assets/vendors/nprogress/nprogress.css')?>" rel="stylesheet">
	<!-- jQuery custom content scroller -->
	<link href="<?php echo base_url('assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')?>" rel="stylesheet"/>
	<!-- Custom Theme Style -->
	<link href="<?php echo base_url('assets/build/css/custom.css')?>" rel="stylesheet">

	<!-- <meta charset="utf-8">
	<title><?php //echo $title_page;?></title>
	<link href="<?php //echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" />
	<link href="<?php //echo base_url('assets/css/font-awesome.css')?>" rel="stylesheet" /> -->
	<!-- <link href="<?php //echo base_url('assets/css/style.css')?>" rel="stylesheet"> -->
</head>
<body class="nav-md">
	<div class="container body">
		<div class="main_container">
	<?php
		//$this->load->view('sertifikasi/content/loading-page.php');
		$this->load->view('sertifikasi/content/menu-page.php');
		$this->load->view('sertifikasi/content/header-page.php');
		$this->load->view('sertifikasi/content/content-page.php');
		$this->load->view('sertifikasi/content/footer-page.php');
		$this->load->view('sertifikasi/content/modal-page.php');
		?>
	</div>
</div>





<!-- INCLUDE JS -->
<!-- jQuery -->
<script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js')?>"></script>
<!-- NProgress -->
<script src="<?php echo base_url('assets/vendors/nprogress/nprogress.js')?>"></script>
<!-- jQuery custom content scroller -->
<script src="<?php echo base_url('assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url('assets/build/js/custom.min.js')?>"></script>
<!-- <script src="<?php //echo base_url('assets/js/function.process.js')?>"></script> -->
</body>
</html>
