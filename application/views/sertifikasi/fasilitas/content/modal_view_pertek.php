<div class="col-md-12" id="response-text-pertek_doc" ></div>
<div class="col-md-12">
<form  action="" method="POST" id="pertek" >
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
        <label for="startdate">Isi Pertek</label>
      </div>
        <div class="col-lg-9" id='pass'>
            <textarea type="text" name='body_pertek' id='body_pertek' class="form-control" ></textarea>

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
var ckeditor=CKEDITOR.replace('body_pertek',{
  height:'400px'
});
$(function () {
$('form').on('submit', function (e) {
  e.preventDefault();
  data = new FormData(document.getElementById('pertek'));
  $.ajax({
    data : data,
    type : 'POST',
    url : "<?php echo base_url('sertifikasi')."/fasilitas/ManagementPertek/create_pertek"; ?>",
    async: false,
    processData: false,
    contentType: false,
    cache:false,
    dataType:"json",
    timeout: 600000,
    success : function(data) {
      if(data.msg=='success'){
        swal("Success", "Data Inserted Successfully!", "success");

      }else if(data.msg=='error'){
        swal("Failed!", "Data Inserted Failed!", "error");
      }
      $("#pertek")[0].reset();
      loadData(1);
    }
  });
});
});
</script>
