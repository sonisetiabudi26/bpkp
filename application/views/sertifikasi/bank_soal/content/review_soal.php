<div class="row">
	<div class="col-lg-12">
		<h3>Riwayat Ujian</h3>
	</div>
</div>
<div class="clearfix"></div>

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
		<select data-href="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/check_soal"; ?>" onChange="submitWithSelectOption(this, 'listSoalForm', 'response_table')" name="fk_bab_mata_ajar" id="select-list-bab-soal" class="form-control input-sm">
			<option>Pilihan</option>
		</select>
	</div>
	<div class="form-group text-default">
		<label for="select-list-user" class="text-primary">User Bank Soal :</label>
		<select name="pk_user" id="select-list-user" class="form-control input-sm" disabled>
			<option>Pilihan</option>
			<?php
				foreach ($user_bank_soal as $user_bank_soals):
			?>
			<option value="<?php echo $user_bank_soals->PK_USER;?>"><?php echo $user_bank_soals->USER_NAME;?></option>
			<?php
				endforeach;
			?>
		</select>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<input id="btn-save-detail" type="submit" value="Verifikasi Soal" class="btn btn-primary" disabled />
		</div>
	</div>
	<div class="row">
		&nbsp;
	</div>
</form>
<div class="row">
		<div class="col-lg-12">
			<label class="text-primary">List Soal</label>
		</div>
	</div>
<div id="response_table">
<table id="datatable-responsive" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
	<thead style="color:#111;">
		<tr>
			<td>Pertanyaan</td>
			<td>Pilihan 1</td>
			<td>Pilihan 2</td>
			<td>Pilihan 3</td>
			<td>Pilihan 4</td>
			<td>Jawaban</td>
		</tr>
	</thead>
</table>
</div>
<script>	
	$('#select-list-bab-soal').change(function(){
		var urlVar = $(this).attr('data-href');
		var fk_bab_mata_ajar = $(this).val();
		if(fk_bab_mata_ajar==='Pilihan'){
			fk_bab_mata_ajar=0;
			$("input").prop("disabled", true);
		}else{
			$('input').removeAttr('disabled');
		}
		check_soal(fk_bab_mata_ajar, urlVar);
	});
	
	function check_soal(fk_bab_mata_ajar, urlVar){
	var urlVar = urlVar;
	var objParsingName = 'fk_bab_mata_ajar';
	var objParsingVal = fk_bab_mata_ajar;
	var jsonParam = JSON.parse('{"'+objParsingName+'":'+objParsingVal+'}');
     $.ajax({
		data:jsonParam,
		url:urlVar,
		type:'GET',
		success : function(response) {
			if(response>0){
				$("#select-list-user").prop("disabled", false);
			}else{
				$("#select-list-user").prop("disabled", true)
			}
		},
		error: function (e) {
			alert(e);
		}
	});
	}
</script>