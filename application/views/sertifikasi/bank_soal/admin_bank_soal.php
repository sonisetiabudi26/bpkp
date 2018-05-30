<div class="clearfix"></div>
<h1 class="text-primary">Dashboard Bank Soal</h1>
	<div class="info">
		<p style="color:#777;"> Ujian Sertifikasi <i class="fa fa-pencil"></i></p>
	</div>
<br><br>
<div class="container">
	<div style="text-align:center" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<button onclick="getModal(this)" id="btn-add-soal" data-href="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/vw_add_soal"; ?>" data-toggle="modal" data-target="#modal-content" class="btn btn-primary oval-box oval-box-circle">
			<span class="badge">ADD <i class="fa fa-pencil"></i></span>
			<br><h4>Soal</h4>
		</button>
	</div>

	<div style="text-align:center" class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
		<button onclick="getModal(this)" id="btn-import-soal" data-href="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/vw_import_soal"; ?>" data-toggle="modal" data-target="#modal-content" class="btn btn-primary oval-box oval-box-circle">
			<span class="badge">ADD <i class="fa fa-pencil"></i></span>
			<br><h4>Import Soal</h4>
		</button>
	</div>
	
	<div style="text-align:center" class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
		<button onclick="getModal(this)" id="btn-review-soal" data-href="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/vw_review_soal"; ?>" data-toggle="modal" data-target="#modal-content" class="btn btn-primary oval-box oval-box-circle">
			<span class="badge">REVIEW <i class="fa fa-pencil"></i></span>
			<br><h4>Soal Ujian</h4>
		</button>
	</div>
	
	<div style="text-align:center" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<button onclick="getModal(this)" id="btn-add-soal-kasus" data-href="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/vw_add_soal_kasus"; ?>" data-toggle="modal" data-target="#modal-content" class="btn btn-primary oval-box oval-box-circle">
			<span class="badge">ADD <i class="fa fa-pencil"></i></span>
			<br><h4>Soal Kasus</h4>
		</button>
	</div>
</div>