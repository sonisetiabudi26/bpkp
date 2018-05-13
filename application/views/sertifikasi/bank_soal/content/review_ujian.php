<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesForm(this, 'response-text')" action="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/insert_soal"; ?>" method="POST" id="addSoalForm" >
<table  class="table">
	<thead>
		<tr>
			<td><h2 class="text-primary">Form Verifikasi Soal</h2></td>
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
					<label for="select-list-bab-popup">Pilih User Verifikasi :</label>
					<select name="pk_user" class="form-control input-sm">
		<option>-- Pilih User --</option>
		<?php
			foreach ($user_bank_soal as $user_bank_soals):
		?>
		<option value="<?php echo $user_bank_soals->PK_USER;?>"><?php echo $user_bank_soals->USER_NAME;?></option>
		<?php
			endforeach;
		?>
	</select>
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="jumlah_soal" class="text-primary">Verifikasi Soal :</label>
					<select name="pk_user" class="form-control input-sm">
		<option>-- Pilih User --</option>
		<?php
			foreach ($user_bank_soal as $user_bank_soals):
		?>
		<option value="<?php echo $user_bank_soals->PK_USER;?>"><?php echo $user_bank_soals->USER_NAME;?></option>
		<?php
			endforeach;
		?>
	</select>
				</div>
			</td>
		</tr>
		
	</tbody>
</table>
<button class="btn btn-primary btn-block">Kirim</button>
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