<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title_page;?></title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/font-awesome.css')?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
</head>
<body>
	<?php
		$this->load->view('sertifikasi/content/loading-page.php');
		$this->load->view('sertifikasi/content/header-page.php');
	?>
<!-- THIS IS FOR CONTAINER EXTERNAL -->
	<div id="container" style="margin-top:-60px;">>
		<?php
			$this->load->view('sertifikasi/content/content-page.php');
		?>
	</div>
	<?php
		$this->load->view('sertifikasi/content/footer-page.php');
		$this->load->view('sertifikasi/content/modal-page.php');
	?>
<!-- INCLUDE JS -->
<script src="<?php echo base_url('assets/js/jquery-2.1.4.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/function.process.js')?>"></script>
</body>
</html>