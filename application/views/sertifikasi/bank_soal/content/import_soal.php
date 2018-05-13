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
													<option value="<?php echo $mataajars->PK_MATA_AJAR;?>">
														<?php echo $mataajars->NAMA_MATA_AJAR;?> (<?php echo $mataajars->DESCR;?>)
													</option>
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