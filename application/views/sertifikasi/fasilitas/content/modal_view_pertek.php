<div class="col-md-12" id="response-text-pertek_doc" ></div>
<div class="col-md-12">
<form onsubmit="procesForm(this, 'response-text-pertek_doc')" action="<?php echo base_url('sertifikasi')."/fasilitas/ManagementPertek/create_pertek"; ?>" method="POST" id="angka_kredit" >
  <input value='<?php echo $id_pertek?>' name='id_pertek' style="display:none;"/>
    <input value='<?php echo $data_doc?>' name='doc' style="display:none;"/>
		<div class="form-group">
      <div class="col-lg-3">
      	<label for="category">No Surat</label>
      </div>
          <div class="col-lg-9" id='user'>
        	<input type="text" class="form-control text-primary" id="no_surat" name="no_surat" value="<?php echo $nosurat ?>" placeholder="No Surat" readonly />

        </div>
    </div>
    <div class="form-group">
      <div class="col-lg-3">
        <label for="startdate">NO PERTEK </label>
      </div>
        <div class="col-lg-9" id='pass'>
            <input type="text" name='nopertek' id='nopertek' class="form-control" placeholder="No PERTEK" >

          </div>
    </div>
    <div class="form-group">
      <div class="col-lg-3">
        <label for="startdate">Kepada YTH </label>
      </div>
        <div class="col-lg-9" id='pass'>
            <input type="text" name='yth' id='yth' class="form-control" placeholder="Kepada YTH" >

          </div>
    </div>
    <div class="form-group">
      <div class="col-lg-3">
        <label for="startdate">Di Tempat</label>
      </div>
        <div class="col-lg-9" id='pass'>
            <input type="text" name='tempat' id='tempat' class="form-control" placeholder="Tempat Kirim PERTEK" >

          </div>
    </div>
    <div class="form-group">
      <div class="col-lg-3">
        <label for="startdate">Kepala </label>
      </div>
        <div class="col-lg-9" id='pass'>
            <input type="text" name='kepala' id='kepala' class="form-control" placeholder="Masukan NIP Kepala" >

          </div>
    </div>
    <div class="form-group">
      <div class="col-lg-3">
        <label for="startdate">Tembusan </label>
      </div>
        <div class="col-lg-9">
            <input type="text" name='tembusan' id='tembusan' class="form-control" placeholder="Nama Tembusan 1, Nama Tembusan 2, dst" >
          </div>
    </div>


		<input id="btn-add-pertek" type="submit" value="Submit" class="btn btn-primary" />
	</br>
</form>
</div>
<script>

</script>
