
	<div class="col-lg-12">

		<div class="container">
			<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/bank_soal/permintaan/insert_permintaan"; ?>')" method="POST" id="buatPermintaan" >
        <input name="fk_bab_mata_ajar" value="<?php echo $pk_bab_mata_ajar ?>" style="display:none">
<table  class="table">
	<thead>
		<tr>
			<td><h2 class="text-primary">Form Tambah Permintaan</h2></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<div class="form-group">
					<label for="select-mata-ajar">Tipe Soal :</label>
					<select name="tipe_soal" id="tipe_soal" class="form-control input-sm">
						<option value="">Pilih Tipe Soal</option>
						<option value="Pilihan Ganda">Pilihan Ganda</option>
					
					</select>
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pembuat" class="text-primary">Pembuat Soal :</label>
					<select name="pembuat" id="pembuat" class="form-control input-sm select-list"  >
						<option>Pilihan</option>
						<?php
							foreach ($user_bank_soal as $user_bank_soals):
						?>
						<option value="<?php echo $user_bank_soals->USER_NAME;?>"><?php echo $user_bank_soals->USER_NAME;?></option>
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
					<label for="review1" class="text-primary">Reviewer 1 :</label>
					<select name="review1" id="review1" class="form-control input-sm select-list"  >
						<option>Pilihan</option>
						<?php
							foreach ($user_bank_soal as $user_bank_soals):
						?>
						<option value="<?php echo $user_bank_soals->USER_NAME;?>"><?php echo $user_bank_soals->USER_NAME;?></option>
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
					<label for="review1" class="text-primary">Reviewer 2 :</label>
					<select name="review2" id="review2" class="form-control input-sm select-list"  >
						<option>Pilihan</option>
						<?php
							foreach ($user_bank_soal as $user_bank_soals):
						?>
						<option value="<?php echo $user_bank_soals->USER_NAME;?>"><?php echo $user_bank_soals->USER_NAME;?></option>
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
					<label for="review1" class="text-primary">Reviewer 3 :</label>
					<select name="review3" id="review3" class="form-control input-sm select-list"  >
						<option>Pilihan</option>
						<?php
							foreach ($user_bank_soal as $user_bank_soals):
						?>
						<option value="<?php echo $user_bank_soals->USER_NAME;?>"><?php echo $user_bank_soals->USER_NAME;?></option>
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
					<label for="review1" class="text-primary">Reviewer 4 :</label>
					<select name="review4" id="review4" class="form-control input-sm select-list"  >
						<option>Pilihan</option>
						<?php
							foreach ($user_bank_soal as $user_bank_soals):
						?>
						<option value="<?php echo $user_bank_soals->USER_NAME;?>"><?php echo $user_bank_soals->USER_NAME;?></option>
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
					<label for="tgl_permintaan" class="text-primary">Tgl Permintaan :</label>
					<input type="date" class="form-control" name="tanggal_permintaan" id="tgl_permintaan"  required />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="jumlah_soal" class="text-primary">Jumlah Soal :</label>
					<input type="number" class="form-control" name="jumlah_soal" id="jumlah_soal"  required />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<input id="btn-buat-permintaan" type="submit" value="Buat Permintaan" class="btn btn-primary"  />
			</td>
		</tr>
	</tbody>
</table>
</form>
		</div>
	</div>


<script>

</script>
