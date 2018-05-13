<div class="clearfix"></div>
<h1>Dashboard Bank Soal</h1>
	<div class="info">
		<p> Ujian Sertifikasi <i class="fa fa-pencil"></i></p>
	</div>
<br><br>
<div class="container">
	<div style="text-align:center" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<button onclick="getModal(this)" id="btn-add-group-mata-ajar" data-href="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/vw_add_soal"; ?>" data-toggle="modal" data-target="#modal-content" class="btn btn-primary oval-box oval-box-circle">
			<span class="badge">ADD <i class="fa fa-pencil"></i></span>
			<br><h4>Buat Soal</h4>
		</button>
	</div>

	<div style="text-align:center" class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
		<button onclick="getModal(this)" id="btn-add-mata-ajar" data-href="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/vw_import_soal"; ?>" data-toggle="modal" data-target="#modal-content" class="btn btn-primary oval-box oval-box-circle">
			<span class="badge">ADD <i class="fa fa-pencil"></i></span>
			<br><h4>Import Soal</h4>
		</button>
	</div>
	
	<div style="text-align:center" class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
		<button onclick="getModal(this)" id="btn-add-bab-mata-ajar" data-href="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/vw_add_ujian"; ?>" data-toggle="modal" data-target="#modal-content" class="btn btn-primary oval-box oval-box-circle">
			<span class="badge">Add <i class="fa fa-pencil"></i></span>
			<br><h4>Ujian Sertifikasi</h4>
		</button>
	</div>
	
	<div style="text-align:center" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<button onclick="getModal(this)" id="btn-add-soal" data-href="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/vw_review_soal"; ?>" data-toggle="modal" data-target="#modal-content" class="btn btn-primary oval-box oval-box-circle">
			<span class="badge">Review <i class="fa fa-pencil"></i></span>
			<br><h4>Soal Ujian</h4>
		</button>
	</div>
</div>