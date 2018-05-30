<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form action="<?php echo base_url('sertifikasi')."/bank_soal/managementbanksoal"; ?>" method="POST" >
		
<div class="form-group">
	<label for="select-mata-ajar">Mata Ajar :</label>
	<select data-href="<?php echo base_url('sertifikasi')."/bank_soal/BabMataPelajaran/listbab"; ?>"
		data-show-obj="bab" data-show-key="PK_BAB_MATA_AJAR" data-show-value="NAMA_BAB_MATA_AJAR" onChange="getAnotherSelectOption(this, 'select-list-bab', 'content-list-bab')"
			name="fk_mata_ajar" id="select-mata-ajar" class="form-control input-sm">
		<option>Pilihan</option>
			<?php
				foreach ($mata_ajar as $mataajars):
			?>
			<option value="<?php echo $mataajars->PK_MATA_AJAR;?>">
				<?php echo $mataajars->NAMA_MATA_AJAR;?> (<?php echo $mataajars->DESCR;?>)
			</option>
			<?php
				endforeach;
			?>
	</select>
</div>
<div class="form-group" id="content-list-bab" style="display:none;">
	<label for="select-list-bab">List BAB :</label>
	<select name="fk_bab_mata_ajar" id="select-list-bab" class="form-control input-sm">
		<option>Pilihan</option>
	</select>
</div>

<input id="btn-add-bab-mata-ajar" type="submit" value="Submit" class="btn btn-primary" />
	</br>
</form>