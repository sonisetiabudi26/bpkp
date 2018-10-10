<div class="col-md-12" id="response-text-pertek_doc" ></div>
<div class="col-md-12">
<form  onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/fasilitas/ManagementPertek/create_angker"; ?>')"  method="POST" id="pertek" >
  <input value='<?php echo $id_pertek?>' name='id_pertek' style="display:none;"/>
    <input value='<?php echo $data_doc?>' name='doc' style="display:none;"/>
    <input value='<?php echo $nosurat?>' name='nosurat' style="display:none;"/>
		<div class="form-group">
      <div class="col-lg-3">
      	<label for="category">No Surat</label>
      </div>
          <div class="col-lg-9" id='user'>
        	<input type="text" class="form-control text-primary" id="no_surat" name="no_surat" placeholder="No Surat"  />

        </div>
    </div>
    <div class="form-group">
      <div class="col-lg-3">
        <label for="startdate">Jabtan </label>
      </div>
        <div class="col-lg-9"  >
            <input type="text" name='jabatan' id='jabatan' class="form-control" placeholder="Masukan Jabatan" >

          </div>
    </div>

    <div class="form-group">
      <div class="col-lg-3">
        <label for="startdate">Kepala </label>
      </div>
        <div class="col-lg-9"  >
            <input type="text" name='kepala' id='kepala' class="form-control" placeholder="Masukan NIP Kepala" >

          </div>
    </div>



		<input id="btn-add-pertek" type="submit" value="Submit" class="btn btn-primary" />
	</br>
</form>
</div>
