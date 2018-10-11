<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
  <div class="row">
    <?php
      foreach ($dataAll as $key):
    ?>
    <div class="form-group">
        <div class="col-md-6">
          <label class="form-control"><i class="glyphicon glyphicon-ok"></i> <?php echo $key->FILE_NAMA_DOC ?></label>
          </div>
        <div class="col-md-6">
          <div class="col-lg-4">
            <a href="<?php echo base_url('sertifikasi')."/fasilitas/home/download/".$key->PK_DOC_PENGUSULAN_PENGANGKATAN; ?>"><button class="form-control"><i class="glyphicon glyphicon-download-alt"></i> Download</button></a>

          </div>
          <div class="col-lg-4">
            <a href="<?=base_url('uploads')."/".$key->DATA_DOC;?>" target="_blank"><button class="form-control"><i class="glyphicon glyphicon-open-eye"></i> View</button><a/>

          </div>
          <?php if($result==''){?>
          <div class="col-lg-4">
            <a onclick="hapus('<?php echo $key->PK_DOC_PENGUSULAN_PENGANGKATAN."~".$key->CATEGORY_DOC."~".$key->FK_PENGUSUL_PENGANGKATAN?>');"><button class="form-control"><i class="glyphicon glyphicon-open-eye"></i> Delete</button><a/>

          </div>
        <?php }?>
          </div>
    </div>
    <!-- <div class="col-lg-12"><embed src="namafolder/nama_file.pdf" type="application/pdf" width="100%" height="auto"></div> -->
    <?php
      endforeach;
    ?>
  </div><br/>
</div>
<script>
function hapus(id){
	if(confirm('Are you sure delete this data?'))
	{
			// ajax delete data to database
			$.ajax({
					url : "<?php echo base_url('sertifikasi/fasilitas/Home/hapusDoc/')?>/"+id,
					type: "POST",
					dataType: "JSON",
					success: function(data)
					{
							//if success reload ajax table
						//  $('#modal_form').modal('hide');
							refresh();
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
							alert('Error deleting data');
					}
			});

	}
}
</script>
