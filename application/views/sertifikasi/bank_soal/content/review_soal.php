<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesForm(this, 'response-text')" action="<?php echo base_url('sertifikasi')."/bank_soal/MataPelajaran/tambah"; ?>" method="POST" id="mataAjarForm" >
		<div class="form-group">
			<label for="fk_group_mata_ajar">Group Mata Ajar :</label>
			<select name="fk_group_mata_ajar" class="form-control input-sm">
				<option value="">Pilihan</option>
				<?php
					foreach ($group_mata_ajar as $groupmataajars):
				?>
					<option value="<?php echo $groupmataajars->PK_GROUP_MATA_AJAR;?>"><?php echo $groupmataajars->NAMA_GROUP_MATA_AJAR;?>&nbsp; (<?php echo $groupmataajars->DESCR?>)</option>
				<?php
					endforeach;
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="nama_mata_ajar">Tambah Mata Ajar :</label>
			<input type="text" class="form-control text-primary" id="mata_ajar" name="nama_mata_ajar" placeholder="nama mata ajar" />
		</div>
		<input id="btn-add-bab-mata-ajar" type="submit" value="Submit" class="btn btn-primary" />
	</br>
</form>
</div>