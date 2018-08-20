<div class="row">
	<div class="col-lg-12">
			<form onsubmit="uploadFile(this, 'label-file')" action="<?php echo base_url('sertifikasi')."/bank_soal/soal/upload_soal"; ?>" method="POST" enctype="multipart/form-data" id="fileUploadForm">
				<div class="row">
					<label id="label-file"></label>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-lg-4 col-md-4 col-xs-4">
								<input style="display:none;" name='id_permintaan' value="<?php echo $id_permintaan;?>"/>
								<span class="btn btn-primary btn-block btn-file" id="input_import"><i class="fa fa-file"></i>
									Import Soal 	<input name="soalfile" id="soalfile" type="file">
								</span>
							</div>
						<div class="col-lg-8 col-md-8 col-xs-8">
							 <input type="text" class="form-control text-primary" name="text-file" id="text-file" placeholder="doc Soal"/>
						 </div>
					 </div>
	 		 </div>
			 <br/>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
		<input id="btn-save-detail" type="submit" value="Import" class="btn btn-primary"   />
	</div>
</div>
			</form>
		</div>
		</div>
<script>
$(function() {
	$(".btn-file").change(function (){
		var fileName = document.getElementById("soalfile").value;
		$("#text-file").val(fileName);
	});
});


</script>
