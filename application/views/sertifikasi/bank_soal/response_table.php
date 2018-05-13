<table  class="table  table-bordered">
	<thead>
		<tr>
			<td>List Pertanyaan <span class="badge text-danger">Pending</span></td>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach ($soal as $soals):
	?>
		<tr>
			<td>
				<a onclick="getModalWithParam(this)" data-href="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/detail"; ?>" class="text-default" 
					data-var="pk_soal_ujian" data-id="<?php echo $soals->PK_SOAL_UJIAN; ?>" data-toggle="modal" data-target="#modal-content">
					<?php echo $soals->PERTANYAAN; ?> <i class="fa fa-pencil"></i></a>
			</td>
		</tr>
		<?php
			endforeach;
		?>
	</tbody>
</table>
<div class="form-group">
	<label for="lookup_bank_soal">Pilih User :</label>
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
<button class="btn btn-primary btn-block">Kirim</button>
</script>