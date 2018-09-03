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

	<!-- <link href="<?php //echo base_url('assets/vendors/bootstrap/dist/css/normalize.min.css')?>" rel="stylesheet"> -->
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
	<link href="<?php echo base_url('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')?>" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	<link href="<?php echo base_url('assets/css/develop.style.css')?>" rel="stylesheet">
	<!-- jQuery -->
	<script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js')?>"></script>
	<style>
	.mandatory{
	 	color:#f00 !important;
	 }
	</style>
</head>
<body class="nav-md">
	<div class="container body">
		<div class="main_container">
	<?php
		$this->load->view('sertifikasi/content/loading-page.php');
		$this->load->view('sertifikasi/content/menu-page.php');
		$this->load->view('sertifikasi/content/header-page.php');
		$this->load->view('sertifikasi/content/content-page.php');
		$this->load->view('sertifikasi/content/footer-page.php');
		$this->load->view('sertifikasi/content/modal-page.php');
		?>
	</div>
</div>
<!-- add function ajax process -->
<script src="<?php echo base_url('assets/js/function.process.js');?>"></script>
<!-- INCLUDE JS -->
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
<script src="<?php echo base_url('assets/vendors/echarts/dist/echarts.js')?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')?>"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
</body>
</html>
