<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>BPKP System</title>

	<link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/normalize.min.css')?>" rel="stylesheet">
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
	<link href="<?php echo base_url('assets/css/develop.style.css')?>" rel="stylesheet">
	<!-- jQuery -->
	<script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js')?>"></script>
	<style>
		body{
			/* Location of the image */
			background-image: url(<?php echo base_url('assets/img/content/book.jpg')?>);
  
			/* Background image is centered vertically and horizontally at all times */
			background-position: center center;
  
			/* Background image doesn't tile */
			background-repeat: no-repeat;
  
			/* Background image is fixed in the viewport so that it doesn't move when 
				the content's height is greater than the image's height */
			background-attachment: fixed;
  
			/* This is what makes the background image rescale based
				on the container's size */
			background-size: cover;
  
			/* Set a background color that will be displayed
				while the background image is loading */
			background-color: #fff;
		}
		.date-header{
			background: #3a7bd5;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to right, #3a6073, #3a7bd5);  /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to right, #3a6073, #3a7bd5); 
		}
	</style>
</head>
<body class="nav-md">
	<div class="container body">
		<div class="main_container" >
<?php $this->load->view('ujian/content/menu-page.php');?>
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
    </nav>
  </div>
</div>

<div class="right_col" role="main">
<div class="col-lg-12" id="countdown"></div>
<div class="col-lg-12" id="ujian">
<form>
	<div class="outer-container">
		<div class="col-lg-12" style="font-weight:1000;">
	<b class="badge date-header" ><?php echo date("d M Y") ;?></b><hr>
</div>
		<div id="wizard" class="aiia-wizard" style="display: none;padding:5px;border-radius:3px;background: rgba(255, 255, 255, 0.7);">
			<?php
				foreach ($soal as $key=>$soal_ujian):
			?>
			<div class="aiia-wizard-step">
				<div class="col-lg-12" style="display:none;" id="kasus">
				<?php
					if(isset($soal_ujian[6])){
						echo "<h4 class='badge'>Type Soal : Soal Kasus</h4>";
						echo "<h4 class='container bg-warning' style='border-radius:5px;padding:3px;padding-left:10px;'>".$soal_ujian[6]."</h4>";
					}else{
						echo "<h4 class='badge'>Type Soal : Soal Biasa</h4>";
					}
				?>
				</div>
				<h1><?php echo $soal_ujian[5];?></h1><hr>
				<div class="step-content">
					<p>
						<input type="radio" data-key="<?php echo $key+1;?>" data-id="<?php echo $soal_ujian[4];?>" name="jawaban" value="<?php echo $soal_ujian[0]['PILIHAN']['value'];?>" /> A. <?php echo $soal_ujian[0]['PILIHAN']['descr'];?>
					</p>
					<p>
						<input type="radio" data-key="<?php echo $key+1;?>" data-id="<?php echo $soal_ujian[4];?>" name="jawaban" value="<?php echo $soal_ujian[1]['PILIHAN']['value'];?>" /> B. <?php echo $soal_ujian[1]['PILIHAN']['descr'];?>
					</p>
					<p>
						<input type="radio" data-key="<?php echo $key+1;?>" data-id="<?php echo $soal_ujian[4];?>" name="jawaban" value="<?php echo $soal_ujian[2]['PILIHAN']['value'];?>" /> C. <?php echo $soal_ujian[2]['PILIHAN']['descr'];?>
					</p>
					<p>
						<input type="radio" data-key="<?php echo $key+1;?>" data-id="<?php echo $soal_ujian[4];?>" name="jawaban" value="<?php echo $soal_ujian[3]['PILIHAN']['value'];?>" /> D. <?php echo $soal_ujian[3]['PILIHAN']['descr'];?>
					</p>
				</div>
			</div>
			<?php
				endforeach;
			?>
</div>
		</div>
	</div>
</form>
</div>
</div>
</div>
<script>
// Set the date we're counting down to
var countDownDate = new Date("Aug 31, 2018 01:18:05").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="countdown"
  document.getElementById("countdown").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown").innerHTML = "EXPIRED";
	//document.getElementById("ujian").innerHTML = "";
  }
}, 1000);
</script>
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

</body>
</html>
