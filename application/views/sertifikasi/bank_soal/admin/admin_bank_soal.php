
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
	<div class="col-lg-12 bg-warning" style="min-height:10px;">
		<h4>Badan Pengawasan Keuangan dan Pembangunan</h4>
		<small>Selamat datang dihalaman Bank Soal,</small><hr>

	</div>
	<div class="col-lg-12  bg-info" style="padding:5px;margin:0">

			<span class="text-primary"><span class="glyphicon glyphicon-file"></span> Bank Soal </span>
		
	</div>
	<div class="col-lg-12">

		<div class="container">
			<form onsubmit="procesForm(this, 'response-text')" action="<?php echo base_url('sertifikasi')."/bank_soal/permintaan/insert_permintaan"; ?>" method="POST" id="buatPermintaan" >
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
					<label for="fk_group_mata_ajar">Jenjang :</label>
					<select name="fk_group_mata_ajar" id="fk_group_mata_ajar" data-href="<?php echo base_url('sertifikasi')."/bank_soal/MataPelajaran/list_mata_ajar"; ?>"
				data-show-obj="mata_ajar" data-show-key="PK_MATA_AJAR" data-show-value="NAMA_MATA_AJAR"
					onChange="getAnotherSelectOption(this, 'select-list-mata-ajar', 'content-list-mata-ajar')" class="form-control input-sm">
						<option value="">Pilih Jenjang</option>
						<?php
							foreach ($mata_ajar as $mataajars):
						?>
						<option value="<?php echo $mataajars->PK_GROUP_MATA_AJAR;?>"><?php echo $mataajars->NAMA_GROUP_MATA_AJAR;?></option>
						<?php
							endforeach;
						?>
					</select>
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group">
					<label for="select-mata-ajar">Tipe Soal :</label>
					<select name="tipe_soal" id="tipe_soal" class="form-control input-sm">
						<option value="">Pilih Tipe Soal</option>
						<option value="Pilihan Ganda">Pilihan Ganda</option>
						<option value="Soal Kasus">Soal Kasus</option>
					</select>
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group" id="content-list-mata-ajar" style="display:none;">
					<label for="select-mata-ajar">Mata Ajar :</label>
					<select data-show-obj="bab" data-show-key="PK_BAB_MATA_AJAR" data-show-value="NAMA_BAB_MATA_AJAR" onChange="getAnotherSelectOption(this, 'select-list-bab-popup', 'content-list-bab-popup')"
					data-href="<?php echo base_url('sertifikasi')."/bank_soal/BabMataPelajaran/listbab"; ?>" name="fk_mata_ajar" id="select-mata-ajar-popup" class="form-control input-sm select-list" disabled>
						<option value="0">Pilihan</option>
						<?php
							foreach ($mata_ajar as $mataajars):
						?>
						<option value="<?php echo $mataajars->PK_MATA_AJAR;?>"><?php echo $mataajars->NAMA_MATA_AJAR;?> (<?php echo $mataajars->DESCR;?>)</option>
						<?php
							endforeach;
						?>
					</select>
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group" id="content-list-bab-popup" style="display:none;">
					<label for="select-list-bab-popup">List BAB :</label>
					<select name="fk_bab_mata_ajar" id="select-list-bab-popup" class="form-control input-sm select-list" disabled>
						<option value="0">Pilihan</option>
					</select>
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pembuat" class="text-primary">Pembuat Soal :</label>
					<select name="pembuat" id="pembuat" class="form-control input-sm select-list" disabled >
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
					<select name="review1" id="review1" class="form-control input-sm select-list" disabled >
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
					<select name="review2" id="review2" class="form-control input-sm select-list" disabled >
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
					<input type="date" class="form-control" name="tanggal_permintaan" id="tgl_permintaan" disabled required />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="jumlah_soal" class="text-primary">Jumlah Soal :</label>
					<input type="number" class="form-control" name="jumlah_soal" id="jumlah_soal" disabled required />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<input id="btn-buat-permintaan" type="submit" value="Buat Permintaan" class="btn btn-primary" disabled />
			</td>
		</tr>
	</tbody>
</table>
</form>
		</div>
	</div>
</div>
</div>
</div>
</div>

<script>
	$('#tipe_soal').change(function(){
		check_select_input();
	});

	$('#fk_mata_ajar').change(function(){
		check_select_input();
	});

	$('#jenjang').change(function(){
		check_select_input();
	});

	function check_select_input(){
		var jenjang = $('#jenjang').val();
		var tipe_soal = $('#tipe_soal').val();
		var fk_mata_ajar = $('#fk_mata_ajar').val();
		if(jenjang==='' ||  fk_mata_ajar==='' || tipe_soal===''){
			$("input").prop("disabled", true);
			$("textarea").prop("disabled", true);
			$(".select-list").prop("disabled", true);
		}else{
			$('input').removeAttr('disabled');
			$('textarea').removeAttr('disabled');
			$(".select-list").removeAttr('disabled');
		}
	}
</script>
