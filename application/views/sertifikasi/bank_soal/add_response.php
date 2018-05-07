<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form action="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/insert_soal"; ?>" method="POST" id="addSoalForm" >
<table  class="table">
	<thead>
		<tr>
			<td><h2 class="text-primary">Form Tambah Soal</h2></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<div class="form-group">
					<label for="select-mata-ajar">Mata Ajar :</label>
					<select data-href="<?php echo base_url('sertifikasi')."/bank_soal/BabMataPelajaran/listbab"; ?>" name="fk_mata_ajar" id="select-mata-ajar-popup" class="form-control input-sm">
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
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group" id="content-list-bab-popup" style="display:none;">
					<label for="select-list-bab-popup">List BAB :</label>
					<select name="fk_bab_mata_ajar" id="select-list-bab-popup" class="form-control input-sm">
						<option value="0">Pilih BAB</option>
					</select>
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pertanyaan" class="text-primary">Pertanyaan :</label>
					<input type="text" class="form-control disabled" name="pertanyaan" id="pertanyaan" disabled />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan1" class="text-primary">Pilihan 1 :</label>
					<input type="text" class="form-control" name="pilihan1" id="pilihan1" disabled />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan2" class="text-primary">Pilihan 2 :</label>
					<input type="text" class="form-control" name="pilihan2" id="pilihan2" disabled />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan3" class="text-primary">Pilihan 3 :</label>
					<input type="text" class="form-control" name="pilihan3" id="pilihan3" disabled />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan4" class="text-primary">Pilihan 4 :</label>
					<input type="text" class="form-control" name="pilihan4" id="pilihan4" disabled />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="jawaban" class="text-primary">Jawaban :</label>
					<input type="text" class="form-control" name="jawaban" id="jawaban" disabled />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="parent_soal" class="text-primary">Parent Soal :</label>
					<input type="text" class="form-control" name="parent_soal" id="parent_soal" disabled />
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<input id="btn-save-detail" type="submit" value="Save Soal" class="btn btn-primary" disabled />
			</td>
		</tr>
	</tbody>
</table>
</form>
</div>
<script>
	$("#select-mata-ajar-popup").change(function() {
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
					$('#select-list-bab-popup').find('option').remove().end().append('<option>Data tidak ada</option>');
				}else{
					$('#select-list-bab-popup').find('option').remove().end().append('<option>Pilih BAB</option>').val('');
				}

				$.each(x, function(i, value) {
					console.log(value);
					_options +=('<option value="'+ value.PK_BAB_MATA_AJAR+'">'+ value.NAMA_BAB_MATA_AJAR +'</option>');
					console.log(value);
				});
				$('#select-list-bab-popup').append(_options);
				$('#content-list-bab-popup').show();
			}
		});
	});
	
	$('#select-list-bab-popup').change(function(){
		var fk_bab_mata_ajar = $(this).val();
		if(fk_bab_mata_ajar==='Pilih BAB'){
			$("input").prop("disabled", true);
		}else{
			$('input').removeAttr('disabled');
		}
	});
	
	$('#addSoalForm').submit(function(e) {
	e.preventDefault();
	var data = new FormData(document.getElementById("addSoalForm"));
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
			$("input:text").val('');
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