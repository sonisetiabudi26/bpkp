<style>
	.bg-blue-gd{
		background: #3a7bd5;  /* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #3a6073, #3a7bd5);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #3a6073, #3a7bd5);
	}
</style>
<div class="col-md-3 left_col menu_fixed ">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;padding-top:10px">
      <a href="index.html" class="site_title"><img style="height:35px;padding-right:10px;" src="<?php echo base_url('assets/other/media/img/logo/bpkp.png') ?>" /> <span>SYSTEM</span></a>
    </div>
    <div class="clearfix"></div>
    <hr class="line">

    <!-- menu profile quick info -->
    <div class="profile clearfix ">
      <div class="profile_pic">
        <img src="http://localhost/bpkp/uploads/<?php echo $foto_profile;?>" style="height:55px;" class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Selamat Datang,</span>
        <h2><?php echo $nama_auditor; ?></h2>
      </div>
    </div>

    <!-- sidebar menu -->
    <div id="sidebar-menu" class=" main_menu_side hidden-print main_menu">
		<div class="menu_section">
			<div class="clearfix">&nbsp;</div>
			<!-- <h3 style="color:#ccc !important"><?php //echo "NIP : ".$nip_auditor;?></h3><br> -->
			<!-- <h3 style="color:#ADABAB !important">Ujian Sertifikasi JFA</h3> -->
			<!-- <ul class="nav side-menu">
				<li><a href="#"><i class="fa fa-book;?>"></i>Ujian Auditor Utama</a>
			</ul> -->
      </div>
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('ujian/login/logout'); ?>">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>
