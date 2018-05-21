<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesForm(this, 'response-text')" action="<?php echo base_url('sertifikasi')."/bank_soal/managementbanksoal/hapus_soal"; ?>" method="POST" id="editSoalForm" >
<table  class="table">
	<thead>
		<tr>
			<td><span class="text-danger">Hapus Soal?</span></td>
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
					<input disabled type="text" class="form-control" name="pertanyaan" id="pertanyaan" value="<?php echo $soals->PERTANYAAN; ?>" />
				</div>
			</td>
		</tr>
		<?php
			endforeach;
		?>
		<tr>
			<td>
				<input id="btn-delete" type="submit" value="Hapus Soal" class="btn btn-danger" />
			</td>
		</tr>
	</tbody>
</table>
</form>
</div>