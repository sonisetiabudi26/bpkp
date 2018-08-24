<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/insert_soal_kasus"; ?>')" method="POST" id="addSoalForm" >
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
						<option value="0">Pilihan</option>
						<?php
							foreach ($mata_ajar as $mataajars):
						?>
						<option value="<?php echo $mataajars->PK_MATA_AJAR;?>"><?php echo $mataajars->NAMA_MATA_AJAR;?> (<?php echo $mataajars->DESCR;?>)</option>
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
						<option value="0">Pilihan</option>
					</select>
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="kode_kasus" class="text-primary">Kode Kasus :</label>
					<input type="text" class="form-control" name="kode_kasus" id="kode_kasus" disabled />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="soal_kasus" class="text-primary">Soal Kasus :</label>
					<textarea class="form-control disabled" name="soal_kasus" id="soal_kasus" rows="7" disabled />
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<input id="btn-save-detail" type="submit" value="Save Kasus Soal" class="btn btn-primary" disabled />
			</td>
		</tr>
	</tbody>
</table>
</form>
</div>
<script>
	$('#select-list-bab-popup').change(function(){
		var fk_bab_mata_ajar = $(this).val();
		if(fk_bab_mata_ajar==='Pilihan'){
			$("input").prop("disabled", true);
			$("textarea").prop("disabled", true);
		}else{
			$('input').removeAttr('disabled');
			$('textarea').removeAttr('disabled');
		}
	});
</script>
