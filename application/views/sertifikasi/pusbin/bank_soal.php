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
<div class="page-title">
	<div class="title_left">
		<h3>Bank Soal</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_content">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="row">
									<span class="response-text"></span>
									<button class="btn btn-primary btn-block btn-mata-ajar"><i class="fa fa-book"></i> Tambah Mata Ajar</button>
									<form action="<?php echo base_url('sertifikasi')."/pusbin/MataPelajaran/tambah"; ?>" method="POST" id="mataAjarForm" >
										<div class="content_response content_mata_ajar">
											<div class="form-group">
												<label for="mata_ajar">Mata Ajar :</label>
												<input type="text" class="form-control text-primary" id="mata_ajar" name="mata_ajar" placeholder="nama mata ajar baru" />
											</div>
											<input id="btn-add-mata-ajar" type="submit" value="Submit" class="btn btn-primary" />
										</div></br>
									</form>
								</div>
								<div class="row">
									<form action="<?php echo base_url('sertifikasi')."/pusbin/BankSoal/upload_soal"; ?>" method="POST" enctype="multipart/form-data" id="fileUploadForm">
										<button class="btn btn-primary btn-block btn-file"><i class="fa fa-file"></i> 
										Import Soal <input name="soalfile" id="soalfile" type="file"></button>
										<div class="content_response content_file">
											<div class="form-group">
												<label for="file_upload">File Upload :</label></br>
												<span name="file_upload" id="text-file"></span>
											</div>
											<div class="form-group">
												<label for="mata_ajar">Mata Ajar :</label>
												<select name="mata_ajar" class="form-control input-sm">
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
											<input id="btn-file-export-soal" type="submit" value="Submit Soal" class="btn btn-primary" />
										</div></br>
									</form>
									<button class="btn btn-primary btn-block"><i class="fa fa-pencil "></i> Buat Soal dan Jawaban</button>
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
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="min-height:325px;">

            <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
							<tr>
								<td>Soal</td>
							</tr>
							</thead>
							<tbody>
                  <tr>
                    <td>Soal 1 <i class="fa fa-pencil"></i></td>
                  </tr>
                  <tr>
                    <td>Soal 2 <i class="fa fa-pencil"></i></td>
                  </tr>
                  <tr>
                    <td>Soal 3 <i class="fa fa-pencil"></i></td>
                  </tr>

							</tbody>
							</table>
					</div>
          <button class="btn btn-primary btn-block">Kirim</button>
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
		$("#text-file").html(fileName);
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
				$("#text-file").html("<h4 class='text-success'>Process upload : "+response.status+"</h4>");
			}else{
				$("#text-file").html("<h4 class='text-danger'>Process upload : "+response.status+"</h4>");
			}
			
			console.log("success : ", "success");
			$("#btn-file-export-soal").prop("disabled", true);
		},
		error: function (e) {
			$("#text-file").html("<h4 class='alert-danger space-10 padding-5'>Proses Data Bermasalah, Silahkan Hubungi Administrator</h4>");
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

</script>