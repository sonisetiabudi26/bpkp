<style>
.card,.x_panel{
  padding:10px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.card-title{
  color:#fff;
}
.card-text{
  color:#fff;
}
.card-body{
  height:70px;
}
</style>
<div class="col-md-12">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <table id="data_detail_peserta" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
          <td>NO</td>
          <td>Nama Mata Ajar</td>
        </tr>
        </thead>
        <tbody>
          <?php
          $no=1;
          foreach ($data_detail as $key):

            echo "<tr>
            <td>".$no."</td>
            <td>".$key->NAMA_MATA_AJAR."</td>
            </tr>";
            $no++;
          endforeach
           ?>
        </tbody>
        </table>
    </div>
  </div><br/>
  <div class="row">
    <?php

    if($doc->DOC_NAMA=='doc_ksp'){
      $ksp=$doc->DOCUMENT;
    }else{
      $ksp='';
    }
      $setuju=$doc->DOKUMEN;
    ?>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
        <a href="<?=base_url('uploads')."/".$ksp;?>" target="_blank">
          <div class="card" style="background:#D7768F">
    			<div class="card-body">
    				<div class="col-lg-2">
    					<label style="font-size:45px;color:#fff"><i class="fa fa-file-o"></i></label>
    				</div>
    				<div class="col-lg-10">
    					<h5 class="card-title"><b>Dokumen Surat KSP</b></h5>

    				</div>
    			</div>
    		</div>
      </a>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
        <a href="<?=base_url('uploads')."/".$setuju;?>" target="_blank">
        <div class="card" style="background:#76B5D7">
    			<div class="card-body">
    				<div class="col-lg-2">
    					<label style="font-size:45px;color:#fff"><i class="fa fa-file-o"></i></label>
    				</div>
    				<div class="col-lg-10">
    					<h5 class="card-title"><b>Dokumen Surat Persetujuan</b></h5>

    				</div>
    			</div>
    		</div>
      </a>
      </div>
  </div>
</div>
