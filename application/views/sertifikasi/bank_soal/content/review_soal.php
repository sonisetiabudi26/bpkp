<div class="row">
	<div class="col-lg-12">
		<h3>Riwayat Ujian</h3>
	</div>
</div>
<div class="clearfix"></div>

<form action="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/listsoal"; ?>" method="POST" id="listSoalForm" >
	<div class="form-group">
		<label for="mata_ajar">Mata Ajar :</label>
		<select data-show-obj="bab" data-show-key="PK_BAB_MATA_AJAR" data-show-value="NAMA_BAB_MATA_AJAR" onChange="getAnotherSelectOption(this, 'select-list-bab-soal', 'content-list-bab-soal')" data-href="<?php echo base_url('sertifikasi')."/bank_soal/BabMataPelajaran/listbab"; ?>" 
									name="fk_mata_ajar" id="select-mata-ajar-soal" class="form-control input-sm">
		<option>Pilihan</option>
		<?php
			foreach ($mata_ajar as $mataajars):
		?>
		<option value="<?php echo $mataajars->PK_MATA_AJAR;?>"><?php echo $mataajars->NAMA_MATA_AJAR;?></option>
		<?php
			endforeach;
		?>
		</select>
	</div>				
	<div class="form-group" id="content-list-bab-soal" style="display:none;">
		<label for="select-list-bab-soal">List BAB :</label>
		<select onChange="submitWithSelectOption(this, 'listSoalForm', 'response_table')" name="fk_bab_mata_ajar" id="select-list-bab-soal" class="form-control input-sm">
			<option>Pilihan</option>
		</select>
	</div>
</form>
<div id="response_table">
<table id="datatable-responsive" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
	<thead style="color:#111;">
		<tr>
			<td>Pertanyaan</td>
			<td>Pilihan 1</td>
			<td>Pilihan 2</td>
			<td>Pilihan 3</td>
			<td>Pilihan 4</td>
			<td>Jawaban</td>
		</tr>
	</thead>
</table>
</div>