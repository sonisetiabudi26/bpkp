<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesForm(this, 'response-text')" action="<?php echo base_url('sertifikasi')."/bank_soal/GroupMataPelajaran/tambah"; ?>" method="POST" id="groupMataAjarForm" >
		<div class="form-group">
			<label for="fk_lookup_diklat">Diklat Sertifikasi :</label>
			<select name="fk_lookup_diklat" class="form-control input-sm">
				<option value="">Pilihan</option>
				<?php
					foreach ($diklat as $diklats):
				?>
					<option value="<?php echo $diklats->PK_LOOKUP;?>"><?php echo $diklats->DESCR;?></option>
				<?php
					endforeach;
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="group_mata_ajar">Tambah Group Mata Ajar ( Kategori Diklat ) :</label>
			<input type="text" class="form-control text-primary" id="group_mata_ajar" name="group_mata_ajar" placeholder="group mata ajar" />
		</div>
		<input id="btn-add-bab-mata-ajar" type="submit" value="Submit" class="btn btn-primary" />
	</br>
</form>
</div>