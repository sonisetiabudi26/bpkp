<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesForm(this, 'response-text')" action="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/insert_soal"; ?>" method="POST" id="addSoalForm" >
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
					<select data-show-obj="bab" data-show-key="PK_BAB_MATA_AJAR" data-show-value="NAMA_BAB_MATA_AJAR" onChange="getAnotherSelectOption(this, 'select-list-bab-popup', 'content-list-bab-popup')" 
					data-href="<?php echo base_url('sertifikasi')."/bank_soal/BabMataPelajaran/listbab"; ?>" name="fk_mata_ajar" id="select-mata-ajar-popup" class="form-control input-sm">
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
	$('#select-list-bab-popup').change(function(){
		var fk_bab_mata_ajar = $(this).val();
		if(fk_bab_mata_ajar==='Pilih BAB'){
			$("input").prop("disabled", true);
		}else{
			$('input').removeAttr('disabled');
		}
	});
</script>