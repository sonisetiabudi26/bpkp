<div class="row">
	<div class="col-lg-12 bg-warning" style="min-height:10px;">
		<h4>Badan Pengawasan Keuangan dan Pembangunan</h4>
		<small>Selamat datang dihalaman Bank Soal,</small><hr>
	</div>
	<div class="col-lg-12">
		<div class="container bg-info" style="border-radius:5px;padding:5px">
			<button onclick="getModal(this)" id="btn-add-soal" data-href="<?php echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_add_bab_mata_ajar"; ?>" 
			data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add Bab Soal</button>
			
			<button onclick="getModal(this)" id="btn-import-soal" data-href="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/vw_import_soal"; ?>" data-toggle="modal" data-target="#modal-content" class="btn btn-primary">
			<i class="fa fa-pencil"></i> Import Soal
		</button>
		</div>
		<br>
		<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesForm(this, 'response-text')" action="<?php echo base_url('sertifikasi')."/bank_soal/soal/insert_soal"; ?>" method="POST" id="addSoalForm" >
<table  class="table">
	<thead>
		<tr>
			<td><h2 class="text-primary">Form Tambah Soal</h2></td>
		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td>
				<div class="form-group" id="content-list-bab-popup">
					<label for="select-list-bab-popup">List BAB :</label>
					<select data-show-obj="soalkasus" data-show-key="PK_SOAL_KASUS" data-show-value="KODE_KASUS" onChange="getAnotherSelectOption(this, 'select-list-kasus', 'content-list-bab-popup')" 
					data-href="<?php echo base_url('sertifikasi')."/bank_soal/SoalUjianKasus/listsoalkasus"; ?>" name="fk_bab_mata_ajar" id="select-list-bab-popup" class="form-control input-sm">
						<option value="0">Pilihan</option>
						<?php
							foreach ($bab_mata_ajar as $babmataajars):
						?>
						<option value="<?php echo $babmataajars->PK_BAB_MATA_AJAR;?>"><?php echo $babmataajars->NAMA_BAB_MATA_AJAR;?> (<?php echo $babmataajars->DESCR;?>)</option>
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
					<label for="img_soal" class="text-primary">Image Soal :</label>
					<input type="file" class="form-control" name="img_soal" id="img_soal" disabled />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pertanyaan" class="text-primary">Pertanyaan :</label>
					<input type="text" class="form-control disabled" name="pertanyaan" id="pertanyaan" disabled />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan1" class="text-primary">Pilihan 1 :</label>
					<input type="text" class="form-control" name="pilihan1" id="pilihan1" disabled />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan2" class="text-primary">Pilihan 2 :</label>
					<input type="text" class="form-control" name="pilihan2" id="pilihan2" disabled />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan3" class="text-primary">Pilihan 3 :</label>
					<input type="text" class="form-control" name="pilihan3" id="pilihan3" disabled />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan4" class="text-primary">Pilihan 4 :</label>
					<input type="text" class="form-control" name="pilihan4" id="pilihan4" disabled />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan4" class="text-primary">Pilihan 5 :</label>
					<input type="text" class="form-control" name="pilihan5" id="pilihan5" disabled />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan4" class="text-primary">Pilihan 6 :</label>
					<input type="text" class="form-control" name="pilihan6" id="pilihan6" disabled />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan4" class="text-primary">Pilihan 7 :</label>
					<input type="text" class="form-control" name="pilihan7" id="pilihan7" disabled />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan4" class="text-primary">Pilihan 8 :</label>
					<input type="text" class="form-control" name="pilihan8" id="pilihan8" disabled />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group text-default">
					<label for="jawaban" class="text-primary">Jawaban :</label>
					<input type="text" class="form-control" name="jawaban" id="jawaban" disabled />
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<div class="form-group" id="content-list-bab-popup" >
					<label for="parent_soal">Parent Soal Kasus :</label>
					<select class="form-control" name="parent_soal" id="select-list-kasus" disabled>
						<option value="0">Pilihan</option>
					</select>
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				<input id="btn-save-detail" type="submit" value="Save Soal" class="btn btn-primary" disabled />
			</td>
		</tr>
	</tbody>
</table>
</form>
</div>
	</div>
</div>

<script>	
	$('#select-list-bab-popup').change(function(){
		var fk_bab_mata_ajar = $(this).val();
		if(fk_bab_mata_ajar==='Pilihan'){
			$("input").prop("disabled", true);
			$("textarea").prop("disabled", true);
			$("#select-list-kasus").prop("disabled", true);
		}else{
			$('input').removeAttr('disabled');
			$('textarea').removeAttr('disabled');
			$("#select-list-kasus").removeAttr('disabled');
		}
	});
</script>