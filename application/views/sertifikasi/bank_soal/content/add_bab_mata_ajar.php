<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesForm(this, 'response-text')" action="<?php echo base_url('sertifikasi')."/bank_soal/BabMataPelajaran/tambah"; ?>" method="POST" id="babMataAjarForm" >
		
		
		<div class="form-group">
			<label for="select-mata-ajar">Diklat :</label>
			<select data-href="<?php echo base_url('sertifikasi')."/bank_soal/MataPelajaran/list_mata_ajar"; ?>" 
				data-show-obj="mata_ajar" data-show-key="PK_MATA_AJAR" data-show-value="NAMA_MATA_AJAR" 
					onChange="getAnotherSelectOption(this, 'select-list-mata-ajar', 'content-list-mata-ajar')" name="fk_group_mata_ajar" id="select-group-mata-ajar" class="form-control input-sm">
				<option>Pilihan</option>
				<?php
					foreach ($group_mata_ajar as $groupmataajars):
				?>
					<option value="<?php echo $groupmataajars->PK_GROUP_MATA_AJAR;?>">
				<?php echo $groupmataajars->NAMA_GROUP_MATA_AJAR;?> (<?php echo $groupmataajars->DESCR;?>)
					</option>
				<?php
					endforeach;
				?>
			</select>
		</div>
		<div class="form-group" id="content-list-mata-ajar" style="display:none;">
			<label for="select-list-mata-ajar">List Mata Ajar :</label>
			<select name="fk_mata_ajar" id="select-list-mata-ajar" class="form-control input-sm">
				<option>Pilihan</option>
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