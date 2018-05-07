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
									<span class="response-text"></span>
									<button class="btn btn-primary btn-block btn-mata-ajar"><i class="fa fa-book"></i> List Mata Ajar</button>
									<form action="<?php echo base_url('sertifikasi')."/bank_soal/BabMataPelajaran/tambah"; ?>" method="POST" id="mataAjarForm" >
										<div class="content_response content_mata_ajar">
											<div class="form-group">
												<label for="mata_ajar">Mata Ajar :</label>
												<select name="fk_mata_ajar" class="form-control input-sm">
													<option>Pilih Mata Ajar</option>
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
									<form action="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/upload_soal"; ?>" method="POST" enctype="multipart/form-data" id="fileUploadForm">
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
												<select data-href="<?php echo base_url('sertifikasi')."/bank_soal/BabMataPelajaran/listbab"; ?>" name="fk_mata_ajar" id="select-mata-ajar" class="form-control input-sm">
													<option>Pilih Mata Ajar</option>
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
													<option>Pilih BAB</option>
												</select>
											</div>
											
											<input id="btn-file-export-soal" type="submit" value="Submit Soal" class="btn btn-primary" />
										</div></br>
									</form>
									<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-add-content" ><i class="fa fa-pencil "></i> Buat Soal dan Jawaban</button>
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
								<select data-href="<?php echo base_url('sertifikasi')."/bank_soal/BabMataPelajaran/listbab"; ?>" name="fk_mata_ajar" id="select-mata-ajar-soal" class="form-control input-sm">
									<option>Pilih Mata Ajar</option>
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
								<select name="fk_bab_mata_ajar" id="select-list-bab-soal" class="form-control input-sm">
									<option>Pilih BAB</option>
								</select>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<div class="x_content" style="min-height:300px;">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="response_table">
						<h4>Silahkan pilih mata ajar untuk melihat soal. </h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<div id="modal-add-content" class="modal fade bs-example-modal-lg"
	tabindex="-1" role="dialog" aria-labelledby="myStandardModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">
					<b>Tambah Soal Ujian</b>
				</h4>
			</div>
			<div class="modal-body" style="min-height:300px;overflow-y:auto;">
      </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

$('#fileUploadForm').submit(function(e) {
	e.preventDefault();
	var data = new FormData(document.getElementById("fileUploadForm"));
	$.ajax({
		data : data,
		type : $(this).attr('method'),
		url : $(this).attr('action'),
        async: false,
		processData: false,
		contentType: false,
		cache:false,
        timeout: 600000,
		dataType: "json",
		success : function(response) {
			if(response.status=='success'){
				$("#label-file").html("<h4 class='text-success'>Process upload : "+response.status+"</h4>");
			}else{
				$("#label-file").html("<h4 class='text-danger'>Process upload : "+response.status+"</h4>");
			}
			
			console.log("success : ", "success");
			$("#btn-file-export-soal").prop("disabled", true);
		},
		error: function (e) {
			$("#label-file").html("<h4 class='alert-danger space-10 padding-5'>Proses Data Bermasalah, Silahkan Hubungi Administrator</h4>");
			console.log("ERROR : ", e);
			$("#btn-file-export-soal").prop("disabled", false);
		}
	});
	return false;
});

$('#mataAjarForm').submit(function(e) {
	e.preventDefault();
	var data = new FormData(document.getElementById("mataAjarForm"));
	$.ajax({
		data : data,
		type : $(this).attr('method'),
		url : $(this).attr('action'),
        async: false,
		processData: false,
		contentType: false,
		cache:false,
        timeout: 600000,
		dataType: "json",
		success : function(response) {
			if(response.status=='success'){
				$(".response-text").html("<h4 class='text-success'>Process save : "+response.status+"</h4>");
			}else{
				$(".response-text").html("<h4 class='text-danger'>Process save : "+response.status+"</h4>");
			}
			
			$(".response-text").fadeTo(2000, 500).slideUp(500, function(){
				$(".response-text").slideUp(500);
			});
			
			console.log("success : ", "success");
			$("#btn-add-mata-ajar").prop("disabled", true);
		},
		error: function (e) {
			$("#text-file").html("<h4 class='alert-danger space-10 padding-5'>Proses Data Bermasalah, Silahkan Hubungi Administrator</h4>");
			console.log("ERROR : ", e);
			$("#btn-add-mata-ajar").prop("disabled", false);
		}
	});
	return false;
});


$('#select-list-bab-soal').change(function(){
	var fk_bab_mata_ajar = $(this).val();
	$.ajax({
		type:'POST',
		data:{fk_bab_mata_ajar:fk_bab_mata_ajar},
		url: $('#listSoalForm').attr('action'),
		success:function(data){
			$('#response_table').show();
			$('#response_table').html(data);
		} 
	});
});

$(function() {
	$("#select-mata-ajar-soal").change(function (){
		var fk_mata_ajar = $(this).val();
		var href = $(this).attr('data-href');
		$.ajax({
			type:'GET',
			data:{fk_mata_ajar:fk_mata_ajar},
			url: href,
			dataType: 'json',
			success:function(response){
				var x = response.bab;
				var _options = '';
				if(x==''){
					$('#select-list-bab-soal').find('option').remove().end().append('<option>Data tidak ada</option>');
				}else{
					$('#select-list-bab-soal').find('option').remove().end().append('<option>Pilih BAB</option>').val('');
				}

				$.each(x, function(i, value) {
					console.log(value);
					_options +=('<option value="'+ value.PK_BAB_MATA_AJAR+'">'+ value.NAMA_BAB_MATA_AJAR +'</option>');
					console.log(value);
				});
				
				$('#select-list-bab-soal').append(_options);
				$('#content-list-bab-soal').show();
			}
		});
	});
});


$(function() {
	$("#select-mata-ajar").change(function (){
		var fk_mata_ajar = $(this).val();
		var href = $(this).attr('data-href');
		$.ajax({
			type:'GET',
			data:{fk_mata_ajar:fk_mata_ajar},
			url: href,
			dataType: 'json',
			success:function(response){
				var x = response.bab;
				var _options = '';
				if(x==''){
					$('#select-list-bab').find('option').remove().end().append('<option>Data tidak ada</option>');
				}else{
					$('#select-list-bab').find('option').remove().end().append('<option>Pilih BAB</option>').val('');
				}

				$.each(x, function(i, value) {
					console.log(value);
					_options +=('<option value="'+ value.PK_BAB_MATA_AJAR+'">'+ value.NAMA_BAB_MATA_AJAR +'</option>');
					console.log(value);
				});
				
				$('#select-list-bab').append(_options);
				$('#content-list-bab').show();
			}
		});
	});
});

$('#modal-add-content').on('show.bs.modal', function(e) {
	var $modal = $(this), esseyId = e.relatedTarget.id;
	$.ajax({
		cache : false,
		type : 'POST',
		url : '<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/add_soal"; ?>',
		success : function(data) {
			$modal.find('.modal-body').html(data);
		}
	});
});

$('body').on('hidden.bs.modal', '.modal', function () {
  $(this).removeData('bs.modal');
});
</script>