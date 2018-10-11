<div class="col-md-12" id="response-text-pertek_doc" ></div>
<div class="col-md-12">
<form  onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/fasilitas/ManagementPertek/create_resi"; ?>')"  method="POST" id="no_resi" >
  <input value='<?php echo $id_pertek?>' name='id_pertek' style="display:none;"/>
    <!-- <input value='<?php ///echo $data_doc?>' name='doc' style="display:none;"/> -->
    <input value='<?php echo $nosurat?>' name='nosurat' style="display:none;"/>
		<div class="form-group">
      <div class="col-lg-3">
      	<label for="category">No Resi</label>
      </div>
          <div class="col-lg-9" id='user'>
        	<input type="text" class="form-control text-primary" id="no_resi" name="no_resi" placeholder="No Resi"  />

        </div>
    </div>
		<input id="btn-add-resi" type="submit" value="Submit" class="btn btn-primary" />
	</br>
</form>
</div>
