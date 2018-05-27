<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<div class="row">
	<div class="col-lg-12">
		<h3>Distribusi Soal Ujian</h3>
	</div>
</div>
<div class="clearfix"></div>

<form onsubmit="procesFormUjian(this, 'response_table')" action="<?php echo base_url('sertifikasi')."/bank_soal/soal/build_ujian"; ?>" method="POST" id="listDistribusiUjianForm" >
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
		<select onChange="submitWithSelectOption(this, 'listDistribusiUjianForm', 'response_table')" name="fk_bab_mata_ajar" id="select-list-bab-soal" class="form-control input-sm">
			<option>Pilihan</option>
		</select>
	</div>
	<div class="form-group">
			<label for="jumlah_soal">Jumlah Soal Ujian:</label>
			<input type="number" class="form-control text-primary" id="jumlah_soal" name="jumlah_soal" placeholder="jumlah soal" required disabled />
		</div>
	<div class="row">
		<div class="col-lg-12">
			<input id="btn-save-ujian" type="submit" value="Buat Soal Ujian" class="btn btn-primary" disabled />
		</div>
	</div>
	<div class="row">
		&nbsp;
	</div>
</form>
<div class="row">
		<div class="col-lg-12">
			<b><h4 class="text-primary" id="response-random">List Soal</h4></b>
			<hr>
		</div>
		<div class="col-lg-12">
			<button id="btn-save-ujian" class="btn btn-primary" disabled>Export to Excel</button>
			<button id="btn-save-ujian" class="btn btn-primary" disabled >Export to PDF</button>
		</div>
		<br>
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
		var fk_bab_mata_ajar = $(this).val();
		if(fk_bab_mata_ajar==='Pilihan'){
			$("input").prop("disabled", true);
			$("#select-list-user").prop("disabled", true);
		}else{
			$('input').removeAttr('disabled');
			$("#select-list-user").removeAttr('disabled');
		}
	});
	
	/** format parsing : this select, content id for show response */
function procesFormUjian(formTarget, responseContent){
	$(document).on('submit', '#'+formTarget.id, function(e) {
		e.preventDefault();
		var data = new FormData(document.getElementById(formTarget.id));
		$.ajax({
			data : data,
			type : $(this).attr('method'),
			url : $(this).attr('action'),
			async: false,
			processData: false,
			contentType: false,
			cache:false,
			timeout: 600000,
			success : function(response) {
				$('#response-random').html('List Soal Ujian (Random)');
				$('#' + responseContent).show();
				$('#' + responseContent).html(response);
			}
		});
	return false;
	});
}
</script>