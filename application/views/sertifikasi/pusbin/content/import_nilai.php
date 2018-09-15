<div class="col-md-12">
<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/pusbin/PerhitunganNilai/importNilai"; ?>')" method="POST" enctype="multipart/form-data" id="import_nilai_form" >
  <div class="row">
    <div class="form-group">
      <label id="label-file"></label>
      <div class="col-lg-4 col-md-4 col-xs-4">
        <input style="display:none;" name='id_batch' value="<?php echo $event;?>"/>
        <span class="btn btn-primary btn-block btn-file" id="input_import"><i class="fa fa-file"></i>
          Upload Dokumen Nilai 	<input name="doc_nilai" id="doc_nilai" type="file">
        </span>
      </div>
    <div class="col-lg-8 col-md-8 col-xs-8">
       <input type="text" class="form-control text-primary" name="file_nilai" id="text-nilai" placeholder="doc nilai"/>
       <span class="mandatory"><i>* Format dokumen harus .xlsx</i></span>
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
<script>
$("#input_import").change(function (){

  var fileName = document.getElementById("doc_nilai").value;
  $("#text-nilai").val(fileName);
    $( "#btn-add-nilai" ).prop( "disabled", false );
});
function cleardata(){

}

</script>
