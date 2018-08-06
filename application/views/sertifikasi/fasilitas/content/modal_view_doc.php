<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
  <div class="row">
    <?php
      foreach ($data as $key):
    ?>
    <div class="form-group">
        <div class="col-md-8">
          <label class="form-control"><i class="glyphicon glyphicon-ok"></i> <?php echo $key->DOC_PENGUSULAN_PENGANGKATAN ?></label>
          </div>
        <div class="col-md-4">
          <div class="col-lg-6">
            <a href="<?php echo base_url('sertifikasi')."/fasilitas/home/download/".$key->PK_DOC_PENGUSULAN_PENGANGKATAN; ?>"><button class="form-control"><i class="glyphicon glyphicon-download-alt"></i> Download</button></a>

          </div>
          <div class="col-lg-6">
            <a href="<?=base_url('uploads')."/".$key->DATA_DOC;?>" target="_blank"><button class="form-control"><i class="glyphicon glyphicon-open-eye"></i> View</button><a/>

          </div>
          </div>
    </div>
    <!-- <div class="col-lg-12"><embed src="namafolder/nama_file.pdf" type="application/pdf" width="100%" height="auto"></div> -->
    <?php
      endforeach;
    ?>
  </div><br/>
</div>
<script>

</script>
