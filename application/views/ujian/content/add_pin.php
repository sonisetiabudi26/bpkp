<div class="col-md-12">
<form onsubmit="procesFormandUpload(this, '<?php echo base_url('ujian')."/UjianSertifikasi/add_pin"; ?>')" method="POST" enctype="multipart/form-data" id="pin_form" >
  <div class="row">
    <div class="form-group">
      <input style="display:none;" name='pk_regis' id='pk_regis' value="<?php echo $pk_regis ?>"/>
      <input style="display:none;" name='fk_mata_ajar' id='fk_mata_ajar' value="<?php echo $fk_mata_ajar ?>"/>
      <div class="col-lg-3 col-md-3 col-xs-3">
      <label id="label-file">Masukan Pin</label>
      </div>
    <div class="col-lg-9 col-md-9 col-xs-9">
       <input type="text" class="form-control text-primary" name="pin" id="pin" placeholder="Masukan Pin"/>
     </div>
   </div>
  </div><br/>
  <div class="row">
    <div class="col-md-12">
    <!-- <input id="btn-add-check" onclick="checkData()" value="Check" class="btn btn-primary" /> -->
  	<input id="btn-add-nilai" type="submit" value="Submit" class="btn btn-primary" />
  </div>
  </div>
	</br>
</form>
</div>
