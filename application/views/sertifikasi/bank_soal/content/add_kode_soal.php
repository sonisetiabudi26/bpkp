<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/bank_soal/managementbanksoal/tambah_kode_soal"; ?>')" method="POST" id="kodesoal_form" >


		<div class="form-group">
			<label for="select-mata-ajar">Diklat :</label>
			<select data-href="<?php echo base_url('sertifikasi')."/bank_soal/MataPelajaran/list_mata_ajar"; ?>"
				data-show-obj="mata_ajar" data-show-key="PK_MATA_AJAR" data-show-value="NAMA_MATA_AJAR"
					onChange="getAnotherSelectOption(this, 'select-list-mata-ajar', 'content-list-mata-ajar')" name="fk_group_mata_ajar" id="select-group-mata-ajar" class="form-control input-sm">
				<option>Pilihan</option>
				<?php
					foreach ($group_mata_ajar as $groupmataajars):
				?>
					<option value="<?php echo $groupmataajars->KODE_DIKLAT;?>">
				<?php echo $groupmataajars->NAMA_JENJANG;?> (<?php echo $groupmataajars->DESCR;?>)
					</option>
				<?php
					endforeach;
				?>
			</select>
		</div>
		<div class="form-group" id="content-list-mata-ajar" style="display:none;">
			<label for="select-list-mata-ajar">List Mata Ajar :</label>
			<select name="fk_mata_ajar" id="select-list-mata-ajar" onchange="getkodesoal()" class="form-control input-sm">
				<option>Pilihan</option>
			</select>
		</div>
		<div class="form-group">
			<label for="bab_mata_ajar">Kode Soal :</label>
			<input type="text" class="form-control text-primary" id="kode_soal" name="kode_soal" readonly placeholder="nama kode soal" />
		</div>
    <div class="form-group">
			<label for="jml_kode_soal">kebutuhan Soal :</label>
			<input type="text" class="form-control text-primary" id="jml_kode_soal" name="jml_kode_soal" placeholder="Jumlah Kebutuhan Soal" />
		</div>
		<input id="btn-add-kode-soal" type="submit" value="Submit" class="btn btn-primary" />
	</br>
</form>
</div>

<script>
function getkodesoal(){
	var param1= $("#select-list-mata-ajar option:selected").val();
  	$.ajax({
			url : "<?php echo base_url('sertifikasi/bank_soal/managementbanksoal/createkodesoal')?>",
			type: "POST",
			dataType: "JSON",
			data:{param: param1 },
			success: function(data)
			{
				if(data.status=='success'){
					$('#kode_soal').val(data.msg);
				}
			 // loadData(1);
			},

	});
}
</script>
