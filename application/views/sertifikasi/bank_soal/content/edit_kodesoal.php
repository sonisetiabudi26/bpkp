<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/bank_soal/managementbanksoal/edit_kode_soal"; ?>')" method="POST" id="kodesoal_form_edit" >

<input type="text" class="form-control text-primary" id="id_kode" name="id_kode" value="<?php echo $id_kode ?>" style="display:none" />
		<div class="form-group">
			<label for="select-mata-ajar">Diklat :</label>
		 <input type="text" class="form-control text-primary" id="jml_kode_soal" name="diklat" value="<?php echo $diklat ?>" readonly />
		</div>
		<div class="form-group" id="content-list-mata-ajar" style="display:none;">
			<label for="select-list-mata-ajar">List Mata Ajar :</label>
			<input type="text" class="form-control text-primary" id="mata_ajar" name="mata_ajar" value="<?php echo $mataajar ?>" readonly />
		</div>
		<div class="form-group">
			<label for="bab_mata_ajar">Kode Soal :</label>
			<input type="text" class="form-control text-primary" id="kode_soal" name="kode_soal" value="<?php echo $kode_soal ?>" placeholder="nama kode soal" />
		</div>
    <div class="form-group">
			<label for="jml_kode_soal">kebutuhan Soal :</label>
			<input type="text" class="form-control text-primary" id="jml_kode_soal" name="jml_kode_soal"  value="<?php echo $jml_soal ?>" placeholder="Jumlah Kebutuhan Soal" />
		</div>
		<input id="btn-add-kode-soal" type="submit" value="Submit" class="btn btn-primary" />
	</br>
</form>
</div>
