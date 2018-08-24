<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/bank_soal/ManagementBankSoal/edit_soal_kasus"; ?>')" method="POST" id="addSoalForm" >
<table  class="table">
  <input type="text" class="form-control" name="id_soal_kasus" value="<?php echo $PK_SOAL_KASUS;?>" id="id_soal_kasus" style="display:none" />
	<thead>
		<tr>
			<td><h2 class="text-primary">Form Edit Materi Soal Kasus</h2></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<div class="form-group">
					<label for="select-mata-ajar">Mata Ajar :</label>
          <input type="text" class="form-control" name="mata_ajar" value="<?php echo $NAMA_MATA_AJAR;?>" id="mata_ajar" readonly />
        </div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group">
					<label for="select-list-bab-popup">List BAB :</label>
					<input type="text" class="form-control" name="bab_mata_ajar" value="<?php echo $NAMA_BAB_MATA_AJAR;?>" id="bab_mata_ajar" readonly />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="kode_kasus" class="text-primary">Kode Kasus :</label>
					<input type="text" class="form-control" name="kode_kasus" value="<?php echo $KODE_KASUS;?>" id="kode_kasus"  />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="soal_kasus" class="text-primary">Soal Kasus :</label>
					<textarea class="form-control disabled" name="soal_kasus" id="soal_kasus" rows="7"  ><?php echo $SOAL_KASUS;?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<input id="btn-save-detail" type="submit" value="Ubah Kasus Soal" class="btn btn-primary"  />
			</td>
		</tr>
	</tbody>
</table>
</form>
</div>
