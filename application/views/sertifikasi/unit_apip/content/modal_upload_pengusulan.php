  <?php
  if($desc=='1'){?>
    <div class="row">
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_lokasi"><i class="fa fa-file"></i>
            Upload Persetujuan <input name="doc_loc" id="doc_loc" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_lokasi" id="text-loc" placeholder="doc loc" />
       </div>
     </div>
    </div>
    <div class="row"><br/>
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_lokasi"><i class="fa fa-file"></i>
            Upload Persetujuan <input name="doc_loc" id="doc_loc" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_lokasi" id="text-loc" placeholder="doc loc" />
       </div>
     </div>
   </div><br/>
    <div class="row">
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_lokasi"><i class="fa fa-file"></i>
            Upload Persetujuan <input name="doc_loc" id="doc_loc" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_lokasi" id="text-loc" placeholder="doc loc" />
       </div>
     </div>
    </div>
  <?php }
   ?>
<script>
$("#input_lokasi").change(function (){

  var fileName = document.getElementById("doc_loc").value;
  $("#text-loc").val(fileName);
});
</script>
