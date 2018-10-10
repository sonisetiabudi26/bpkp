<?php
// $unitapip='Inspektur Kabupaten Aceh Barat';
// $nomor_surat='700/233/INSP/2017';
// $date='16 Oktober 2017';
// $status_pengusulan='Penyesuaian/inpassing';
// $user='Ardan Adiperdana';
// $nip='1959061619791001';
// $nopertek='123/asd/2019';
 ?>
<style>
.left{
  width:10%;
  display: inline-block;
}
.right{
  width:90%;
  display: inline-block;
}
.full-width{
  width: 100%;
}
</style>
<div class="full-width">
  <div class="row">
    <div class="col-lg-12" style="text-align:right">
      <label>Jakarta, <?php echo $periode;?></label>
    </div>
  </div>
  <div class="row">
    <div class="left">
      <label>Nomor</label>
    </div> :
    <div class="right">
      <label><?php echo $no_pertek; ?></label>
    </div>
  </div>
  <div class="row">
    <div class="left">
      <label>Lampiran</label>
    </div> :
    <div class="right">
      <label>Satu Lembar</label>
    </div>
  </div>
  <div class="row">
    <div class="left">
      <label>Hal</label>
    </div> :
    <div class="right">
      <span>Persetujuan Pengangkatan dalam jabatan</span><br/>
      <span> Fungsional Auditor (JFA) melalui <?php echo $status_pengusulan?></span><br/>
      <span> pada <?php echo $unitapip?>.</span>
    </div>
  </div><br/>
  <div class="row">
    <div class="full-width">
      <label>Yth. <?php echo $yth?></label><br/>
      <label>di <?php echo $tempat?></label>
    </div>
  </div><br/><br/>
  <div class="row">
    <div class="full-width">
      <?php echo $isi;?>
    </div>
  </div><br/>
  <div class="row">
    <div style="width:30%;float:right">
      <label>Kepala,</label>
    </div>
  </div>
  <br/><br/><br/><br/><br/>
  <div class="row">
    <div style="width:30%;float:right">
      <label><?php echo $nama ?></label><br/>
      <label><?php echo $kepala ?></label>
    </div>
  </div><br/><br/>
  <div class="row">
    <div style="width:100%;float:left">
      <label>Tembusan :</label><br/>
      <?php
      $no=1;
      foreach ($tembusan_surat as $key => $value) {
        echo "<label>".$no++.". ".$value."</label><br/>";
      }
       ?>
    </div>
  </div>
</div>
