<div class="col-md-12" id="response_table" ></div>
<div class="col-md-12">
<div class="row">
	<div class="col-lg-12">
		<h3>Distribusi Soal Ujian</h3>
	</div>
</div>
<div class="clearfix"></div>

<form action="" method="POST" id="listDistribusiUjianForm" >
	<div class="form-group">
		<label for="mata_ajar">Kode Soal :</label>
		<input value='<?php echo $id_kode_soal?>' style="display:none" name='id_kode_soal'>
		<input type="text" class="form-control text-primary" value="<?php echo $kode_soal?>" id="kode_soal" name="kode_soal" placeholder="kode_soal" required readonly />
	</div>
	<div class="form-group">
		<label for="mata_ajar">Mata Ajar :</label>
		<input type="text" class="form-control text-primary" id="mata_ajar"  value="<?php echo $mata_ajar?>" name="mata_ajar" placeholder="Mata ajar" required readonly />
	</div>
	<div class="form-group" id="content-list-bab-soal">
		<label for="select-list-bab-soal">List BAB yang memiliki soal ujian:</label>
		<select  name="fk_bab_mata_ajar" id="select-list-bab-soal" class="form-control input-sm">
			<option value=''>Pilihan</option>
			<?php
			$count=	count($materi);
			for ($i=0; $i < $count ; $i++) {
			?>
			<option value="<?php echo $materi[$i]['pk'].'~'.$materi[$i]['number'];?>"><?php echo $materi[$i]['nama'].' ( jumlah soal '.$materi[$i]['number'].')';?></option>
			<?php
				}
			?>
		</select>
	</div>
	<div class="form-group">
			<label for="jumlah_soal">Jumlah Soal Ujian:</label>
			<input type="number" class="form-control text-primary" id="jumlah_soal" name="jumlah_soal" placeholder="jumlah soal" required  />
		</div>
	<div class="row">
		<div class="col-lg-12">
			<input id="btn-save-ujian" type="submit" value="Buat Soal Ujian" class="btn btn-primary"  />
		</div>
	</div>
	<div class="row">
		&nbsp;
	</div>
</form>
<!-- <div class="row">
		<div class="col-lg-12">
			<b><h4 class="text-primary" id="response-random">List Soal</h4></b>
			<hr>
		</div>
		<div class="col-lg-12">
			<button id="btn-save-ujian" class="btn btn-primary" disabled>Export to Excel</button>
			<button id="btn-save-ujian" class="btn btn-primary" disabled >Export to PDF</button>
		</div>
		<br>
	</div> -->
<!-- <div id="response_table">
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
</div> -->
<script>

	// $('#select-list-bab-soal').change(function(){
	// 	var fk_bab_mata_ajar = $(this).val();
	// 	if(fk_bab_mata_ajar==='Pilihan'){
	// 		$("input").prop("disabled", true);
	// 		$("#select-list-user").prop("disabled", true);
	// 	}else{
	// 		$('input').removeAttr('disabled');
	// 		$("#select-list-user").removeAttr('disabled');
	// 	}
	// });
	//
	/** format parsing : this select, content id for show response */
	$(function () {
  $('form').on('submit', function (e) {
		e.preventDefault();
		data = new FormData(document.getElementById('listDistribusiUjianForm'));
		$.ajax({
			data : data,
			type : 'POST',
			url : "<?php echo base_url('sertifikasi')."/bank_soal/soal/build_ujian"; ?>",
			async: false,
			processData: false,
			contentType: false,
			cache:false,
			dataType:"json",
			timeout: 600000,
			success : function(data) {
				  $('.modal').modal('hide');
				if(data.msg=='success'){
	       	swal("Success", "Data Inserted Successfully!", "success");

				}else if(data.msg=='error'){
	        swal("Failed!", "Data Inserted Failed!", "error");

				}
				loadData(1);
				$("#listDistribusiUjianForm")[0].reset();
			}
		});
	});
});
</script>
