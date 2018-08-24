<div class="col-md-12" id="response-text-angker" ></div>
<div class="col-md-12">
<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/fasilitas/Home/add_angka_kredit"; ?>')" method="POST" id="angka_kredit" >
  <input value='<?php echo $id_pengusul ?>' name='id_pengusul' style="display:none;"/>
		<div class="form-group">
      <div class="col-lg-3">
      	<label for="category">Pendidikan Sekolah</label>
      </div>
          <div class="col-lg-9" id='user'>
        	<input type="text" class="form-control text-primary" id="pendidikan_sekolah" name="pendidikan_sekolah" placeholder="Angka Pendidikan Sekolah" />

        </div>
    </div>
    <div class="form-group">
      <div class="col-lg-3">
        <label for="startdate">Diklat </label>
      </div>
        <div class="col-lg-9" id='pass'>
            <input type="text" name='diklat' id='diklat' class="form-control" placeholder="Angka Diklat" >

          </div>
    </div>
    <div class="form-group">
      <div class="col-lg-3">
        <label for="startdate">Pengawasan </label>
      </div>
        <div class="col-lg-9" id='pass'>
            <input type="text" name='pengawasan' id='pengawasan' class="form-control" placeholder="Angka Pengawsan" >

          </div>
    </div>
    <div class="form-group">
      <div class="col-lg-3">
        <label for="startdate">Pengembangan Profesi </label>
      </div>
        <div class="col-lg-9" id='pass'>
            <input type="text" name='pengembangan_profesi' id='pengembangan_profesi' class="form-control" placeholder="Angka Pengembangan Profesi" >

          </div>
    </div>
    <div class="form-group">
      <div class="col-lg-3">
        <label for="startdate">Penunjang </label>
      </div>
        <div class="col-lg-9" id='pass'>
            <input type="text" name='penunjang' id='penunjang' class="form-control" placeholder="Angka Penunjang" >

          </div>
    </div>
    <div class="form-group">
      <div class="col-lg-3">
        <label for="startdate">Jumlah </label>
      </div>
        <div class="col-lg-9">
            <input type="text" name='jumlah' id='jumlah' class="form-control" placeholder="Angka Jumlah" >
          </div>
    </div>
    <div class="form-group">
        <div class="col-lg-3">
          <label for="startdate">Tunjangan Jabatan </label>
        </div>
        <div class="col-lg-9">
            <input type="text" name='tunjangan_jabatan' id='tunj_jabatan' class="form-control" placeholder="Angka Tunjangan Jabatan" >
        </div>
    </div>

		<input id="btn-add-angka_kredit" type="submit" value="Submit" class="btn btn-primary" />
	</br>
</form>
</div>
<script>

</script>
