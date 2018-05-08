<style>
	.content_response{
		display:none;
		border-radius:2px;
		box-shadow:0px 0px 1px 1px #999;
		padding:5px;
	}
	.content_response span{
		padding:5px;
		font-size:14px;
		color:#eee;
	}
</style>
<div class="clearfix"></div>
<h1>Dashboard Bank Soal</h1>
   <div class="info"><p> Ujian Sertifikasi <i class="fa fa-pencil"></i></p></div>
<div class="clearfix">&nbsp;</div>
<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
				<div class="x_panel" style="min-height:400px;">
					<div class="x_content">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="row">
									<span id="response-form-mata-ajar"></span>
									<button class="btn btn-primary btn-block btn-mata-ajar"><i class="fa fa-book"></i> List Mata Ajar</button>
									<form onsubmit="procesForm(this, 'response-form-mata-ajar')" action="<?php echo base_url('sertifikasi')."/bank_soal/BabMataPelajaran/tambah"; ?>" method="POST" id="mataAjarForm" >
										<div class="content_response content_mata_ajar">
											<div class="form-group">
												<label for="mata_ajar">Mata Ajar :</label>
												<select name="fk_mata_ajar" class="form-control input-sm">
													<option>Pilihan</option>
													<?php
														foreach ($mata_ajar as $mataajars):
													?>
													<option value="<?php echo $mataajars->PK_MATA_AJAR;?>"><?php echo $mataajars->NAMA_MATA_AJAR;?></option>
													<?php
														endforeach;
													?>
												</select>
											</div>
											<div class="form-group">
												<label for="bab_mata_ajar">Tambah BAB :</label>
												<input type="text" class="form-control text-primary" id="bab_mata_ajar" name="bab_mata_ajar" placeholder="nama bab baru" />
											</div>
											<input id="btn-add-mata-ajar" type="submit" value="Submit" class="btn btn-primary" />
										</div></br>
									</form>
								</div>
								<div class="row">
									<form onsubmit="uploadFile(this, 'label-file')" action="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/upload_soal"; ?>" method="POST" enctype="multipart/form-data" id="fileUploadForm">
										<button class="btn btn-primary btn-block btn-file"><i class="fa fa-file"></i> 
										Import Soal <input name="soalfile" id="soalfile" type="file"></button>
										<div class="content_response content_file">
											<div class="form-group">
												<label for="bab_mata_ajar">File Upload :</label>
												<label id="label-file"></label>
												<input type="text" class="form-control text-primary" name="file_upload" id="text-file" placeholder="nama bab baru" />
											</div>
											<div class="form-group">
												<label for="select-mata-ajar">Mata Ajar :</label>
												<select data-href="<?php echo base_url('sertifikasi')."/bank_soal/BabMataPelajaran/listbab"; ?>"
														data-show-obj="bab" data-show-key="PK_BAB_MATA_AJAR" data-show-value="NAMA_BAB_MATA_AJAR" onChange="getAnotherSelectOption(this, 'select-list-bab', 'content-list-bab')"
														name="fk_mata_ajar" id="select-mata-ajar" class="form-control input-sm">
													<option>Pilihan</option>
													<?php
														foreach ($mata_ajar as $mataajars):
													?>
													<option value="<?php echo $mataajars->PK_MATA_AJAR;?>"><?php echo $mataajars->NAMA_MATA_AJAR;?></option>
													<?php
														endforeach;
													?>
												</select>
											</div>
											
											<div class="form-group" id="content-list-bab" style="display:none;">
												<label for="select-list-bab">List BAB :</label>
												<select name="fk_bab_mata_ajar" id="select-list-bab" class="form-control input-sm">
													<option>Pilihan</option>
												</select>
											</div>
											
											<input id="btn-file-export-soal" type="submit" value="Submit Soal" class="btn btn-primary" />
										</div></br>
									</form>
									<button onclick="getModal(this)" id="btn-add-soal" data-href="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/add_soal"; ?>" class="btn btn-primary btn-block" 
										data-toggle="modal" data-target="#modal-content" ><i class="fa fa-pencil "></i> Buat Soal dan Jawaban</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

	<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
						<form action="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/listsoal"; ?>" method="POST" id="listSoalForm" >
							<div class="form-group">
								<label for="mata_ajar">Mata Ajar :</label>
								<select data-show-obj="bab" data-show-key="PK_BAB_MATA_AJAR" data-show-value="NAMA_BAB_MATA_AJAR" onChange="getAnotherSelectOption(this, 'select-list-bab-soal', 'content-list-bab-soal')" data-href="<?php echo base_url('sertifikasi')."/bank_soal/BabMataPelajaran/listbab"; ?>" 
									name="fk_mata_ajar" id="select-mata-ajar-soal" class="form-control input-sm">
									<option>Pilihan</option>
									<?php
										foreach ($mata_ajar as $mataajars):
									?>
									<option value="<?php echo $mataajars->PK_MATA_AJAR;?>"><?php echo $mataajars->NAMA_MATA_AJAR;?></option>
								<?php
									endforeach;
								?>
								</select>
							</div>
							
							<div class="form-group" id="content-list-bab-soal" style="display:none;">
								<label for="select-list-bab-soal">List BAB :</label>
								<select onChange="submitWithSelectOption(this, 'listSoalForm', 'response_table')" name="fk_bab_mata_ajar" id="select-list-bab-soal" class="form-control input-sm">
									<option>Pilihan</option>
								</select>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<div class="x_content" style="min-height:300px;">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="response_table">
						<h4>Silahkan Pilihan untuk melihat soal. </h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script>
$(function() {
	$(".btn-file").change(function (){
		$(".content_file").show();
		var fileName = document.getElementById("soalfile").value;
		$("#text-file").val(fileName);
	});
});

$(function() {
	$(".btn-mata-ajar").click(function (){
		$(".content_mata_ajar").show();
	});
});
</script>