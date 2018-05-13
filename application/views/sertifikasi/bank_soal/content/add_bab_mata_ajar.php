<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesForm(this, 'response-text')" action="<?php echo base_url('sertifikasi')."/bank_soal/BabMataPelajaran/tambah"; ?>" method="POST" id="babMataAjarForm" >
		<div class="form-group">
			<label for="mata_ajar">Mata Ajar :</label>
			<select name="fk_mata_ajar" class="form-control input-sm">
				<option>Pilihan</option>
				<?php
					foreach ($mata_ajar as $mataajars):
				?>
					<option value="<?php echo $mataajars->PK_MATA_AJAR;?>">
						<?php echo $mataajars->NAMA_MATA_AJAR;?>
						&nbsp; (<?php echo $mataajars->DESCR?>
						 - <?php echo $mataajars->NAMA_GROUP_MATA_AJAR?>)
					</option>
				<?php
					endforeach;
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="bab_mata_ajar">Tambah BAB :</label>
			<input type="text" class="form-control text-primary" id="bab_mata_ajar" name="bab_mata_ajar" placeholder="nama bab baru" />
		</div>
		<input id="btn-add-bab-mata-ajar" type="submit" value="Submit" class="btn btn-primary" />
	</br>
</form>
</div>