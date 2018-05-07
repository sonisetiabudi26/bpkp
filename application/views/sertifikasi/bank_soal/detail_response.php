<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form action="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/update_soal"; ?>" method="POST" id="editSoalForm" >
<table  class="table">
	<thead>
		<tr>
			<td><span class="text-primary">Detail Pertanyaan</span></td>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach ($soal as $soals):
	?>
		
		<tr>
			<td>
				<h2 class="text-primary"><b><?php echo $soals->NAMA_MATA_AJAR; ?></b>
				<span class="badge text-primary"><?php echo $soals->NAMA_BAB_MATA_AJAR; ?></span>
				</h2>
			</td>
		</tr>
		
		<tr>
			<td>
				<input type="hidden" class="form-control" name="pk_soal_ujian" id="pk_soal_ujian" value="<?php echo $soals->PK_SOAL_UJIAN; ?>" />
				<input type="hidden" class="form-control" name="fk_mata_ajar" id="fk_mata_ajar" value="<?php echo $soals->FK_BAB_MATA_AJAR; ?>" />
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pertanyaan" class="text-primary">Pertanyaan :</label>
					<input type="text" class="form-control" name="pertanyaan" id="pertanyaan" value="<?php echo $soals->PERTANYAAN; ?>" />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan1" class="text-primary">Pilihan 1 :</label>
					<input type="text" class="form-control" name="pilihan1" id="pilihan1" value="<?php echo $soals->PILIHAN_1; ?>" />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan2" class="text-primary">Pilihan 2 :</label>
					<input type="text" class="form-control" name="pilihan2" id="pilihan2" value="<?php echo $soals->PILIHAN_2; ?>" />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan3" class="text-primary">Pilihan 3 :</label>
					<input type="text" class="form-control" name="pilihan3" id="pilihan3" value="<?php echo $soals->PILIHAN_3; ?>" />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan4" class="text-primary">Pilihan 4 :</label>
					<input type="text" class="form-control" name="pilihan4" id="pilihan4" value="<?php echo $soals->PILIHAN_4; ?>" />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="jawaban" class="text-primary">Jawaban :</label>
					<input type="text" class="form-control" name="jawaban" id="jawaban" value="<?php echo $soals->JAWABAN; ?>" />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="parent_soal" class="text-primary">Parent Soal :</label>
					<input type="text" class="form-control" name="parent_soal" id="parent_soal" value="<?php echo $soals->PARENT_SOAL; ?>" />
				</div>
			</td>
		</tr>
		<?php
			endforeach;
		?>
		<tr>
			<td>
				<input id="btn-save-detail" type="submit" value="Save Soal" class="btn btn-primary" />
			</td>
		</tr>
	</tbody>
</table>
</form>
</div>
<script>
$('#editSoalForm').submit(function(e) {
	e.preventDefault();
	var data = new FormData(document.getElementById("editSoalForm"));
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
				$("#response-text").html("<h4 class='text-success'>Process save : "+response.status+"</h4>");
			}else{
				$("#response-text").html("<h4 class='text-danger'>Process save : "+response.status+"</h4>");
			}
			
			$("#response-text").fadeTo(2000, 500).slideUp(500, function(){
				$("#response-text").slideUp(500);
			});
			
			console.log("success : ", "success");
			$("#btn-save-detail").prop("disabled", true);
		},
		error: function (e) {
			$("#response-text").html("<h4 class='alert-danger space-10 padding-5'>Proses Data Bermasalah, Silahkan Hubungi Administrator</h4>");
			console.log("ERROR : ", e);
			$("#btn-save-detail").prop("disabled", false);
		}
	});
	return false;
});
</script>