<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form  action="" method="POST" id="addSoalForm" >
<input name='pk_permintaan' style="display:none" value='<?php echo $pk_permintaan_soal ?>'>
<table  class="table">
	<thead>
		<tr>
			<td><h2 class="text-primary">Form Tambah Soal</h2></td>
		</tr>
	</thead>
	<tbody>
		<!-- <tr>
			<td>
				<div class="form-group">
					<label for="select-mata-ajar">Mata Ajar :</label>
					<select data-show-obj="bab" data-show-key="PK_BAB_MATA_AJAR" data-show-value="NAMA_BAB_MATA_AJAR" onChange="getAnotherSelectOption(this, 'select-list-bab-popup', 'content-list-bab-popup')"
					data-href="<?php //echo base_url('sertifikasi')."/bank_soal/BabMataPelajaran/listbab"; ?>" name="fk_mata_ajar" id="select-mata-ajar-popup" class="form-control input-sm">
						<option value="0">Pilihan</option>
						<?php
							//foreach ($mata_ajar as $mataajars):
						?>
						<option value="<?php //echo $mataajars->PK_MATA_AJAR;?>"><?php //echo $mataajars->NAMA_MATA_AJAR;?> (<?php //echo $mataajars->DESCR;?>)</option>
						<?php
						//	endforeach;
						?>
					</select>
				</div>
			</td>
		</tr> -->

		<!-- <tr>
			<td>
				<div class="form-group" id="content-list-bab-popup" style="display:none;">
					<label for="select-list-bab-popup">List BAB :</label>
					<select data-show-obj="soalkasus" data-show-key="PK_SOAL_KASUS" data-show-value="KODE_KASUS" onChange="getAnotherSelectOption(this, 'select-list-kasus', 'content-list-bab-popup')"
					data-href="<?php //echo base_url('sertifikasi')."/bank_soal/SoalUjianKasus/listsoalkasus"; ?>" name="fk_bab_mata_ajar" id="select-list-bab-popup" class="form-control input-sm">
						<option value="0">Pilihan</option>
					</select>
				</div>
			</td>
		</tr> -->

		<!-- <tr>
			<td>
				<div class="form-group text-default">
					<label for="img_soal" class="text-primary">Image Soal :</label>
					<input type="file" class="form-control" name="img_soal" id="img_soal"   />
				</div>
			</td>
		</tr> -->

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pertanyaan" class="text-primary">Pertanyaan :</label>
					<input type="text" class="form-control  " name="pertanyaan" id="pertanyaan"   />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan1" class="text-primary">Pilihan 1 :</label>
					<input type="text" class="form-control" name="pilihan1" id="pilihan1"   />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan2" class="text-primary">Pilihan 2 :</label>
					<input type="text" class="form-control" name="pilihan2" id="pilihan2"   />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan3" class="text-primary">Pilihan 3 :</label>
					<input type="text" class="form-control" name="pilihan3" id="pilihan3"   />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan4" class="text-primary">Pilihan 4 :</label>
					<input type="text" class="form-control" name="pilihan4" id="pilihan4"   />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan4" class="text-primary">Pilihan 5 :</label>
					<input type="text" class="form-control" name="pilihan5" id="pilihan5"   />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan4" class="text-primary">Pilihan 6 :</label>
					<input type="text" class="form-control" name="pilihan6" id="pilihan6"   />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan4" class="text-primary">Pilihan 7 :</label>
					<input type="text" class="form-control" name="pilihan7" id="pilihan7"   />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="pilihan4" class="text-primary">Pilihan 8 :</label>
					<input type="text" class="form-control" name="pilihan8" id="pilihan8"   />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="jawaban" class="text-primary">Jawaban :</label>
					<select class="form-control" name="jawaban">
						<option value="1">Pilihan 1</option>
						<option value="2">Pilihan 2</option>
						<option value="3">Pilihan 3</option>
						<option value="4">Pilihan 4</option>
						<option value="5">Pilihan 5</option>
						<option value="6">Pilihan 6</option>
						<option value="7">Pilihan 7</option>
						<option value="8">Pilihan 8</option>
					</select>
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group" id="content-list-bab-popup" >
					<label for="parent_soal">Parent Soal Kasus :</label>
					<select class="form-control" name="parent_soal" id="select-list-kasus"  >
						<option value="0">Pilihan</option>
					</select>
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<input id="btn-save-detail" type="submit" value="Save Soal" class="btn btn-primary"   />
			</td>
		</tr>
	</tbody>
</table>
</form>
</div>
<script>
	// $('#select-list-bab-popup').change(function(){
	// 	var fk_bab_mata_ajar = $(this).val();
	// 	if(fk_bab_mata_ajar==='Pilihan'){
	// 		$("input").prop(" ", true);
	// 		$("textarea").prop(" ", true);
	// 		$("#select-list-kasus").prop(" ", true);
	// 	}else{
	// 		$('input').removeAttr(' ');
	// 		$('textarea').removeAttr(' ');
	// 		$("#select-list-kasus").removeAttr(' ');
	// 	}
	// });
	$(function () {
  $('form').on('submit', function (e) {
		e.preventDefault();
		data = new FormData(document.getElementById('addSoalForm'));
		$.ajax({
			data : data,
			type : 'POST',
			url : "<?php echo base_url('sertifikasi')."/bank_soal/soal/insert_soal"; ?>",
			async: false,
			processData: false,
			contentType: false,
			cache:false,
			dataType:"json",
			timeout: 600000,
			success : function(data) {
				if(data.msg=='success'){
	       	swal("Success", "Data Inserted Successfully!", "success");
				}else if(data.msg=='error'){
	        swal("Failed!", "Data Inserted Failed!", "error");
				}
				$("#addSoalForm")[0].reset();
			}
		});
	});
});
</script>
