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
      <label>Jakarta, Februari 2018</label>
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
      <p align='justify'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan dengan Surat <?php echo $unitapip ?> Nomor <?php echo $nosurat ?> tanggal <?php echo $datex ?>
       perihal Usulan Pengangkatan PNS dalam Jabatan Fungsional Auditor melalui <?php echo $status_pengusulan ?>, dan setelah
     dilakukan penelitian kelengkapan berkas persyaratan yang diterima, dapat disampaikan sebagai berikut: </p>
     <table style="width:100%;border:none">
       <tr>
         <td>Jumlah yang diusulkan untuk diangkat dalam JFA</td>
         <td>3 orang</td>
      </tr>
      <tr>
        <td>Jumlah yang memenuhi syarat dan disetujui</td>
        <td>3 orang</td>
     </tr>
     <tr>
       <td>Jumlah yang Belum memenuhi persyarat</td>
       <td>3 orang</td>
    </tr>

     </table>
     <p align='justify'>Rician lebih lanjut Pegawai Negeri Sipil yang memenuhi syarat dan disetujui untuk diangkat dalam JFA di lingkungan
     <?php echo $unitapip ?> dapat dilihat pada Lampiran Surat ini. Dua orang PNS belum disetujui atas nama Mudassir dan Elisma karena belum lulus
   uji kompetensi.</p>
     <p align='justify'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Penetapan Angka Kredit Awal pengangkatan dalam JFA agar didasarkan pada jumlah Angka Kredit sebagaimana terlampir dalam Lampiran Surat ini.</p>
     <p align='justify'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pengangkatan dalam JFA agar memperhatikan formasi dan kecukupan beban kerja, sehingga para Auditor dapat memperoleh Angka Kredit yang cukup untuk
     kenaikan jabatan/pangkat berikutnya sesuai dengan ketentuan yang berlaku.</p>
     <p>Surat Keputusan Pengangkatan dalam JFA dan Penetapan Angka Kredit Awal sebagai tindak lanjut atas persetujuan ini agar disampaikan tembusannya kepada
       kami c.q Kepala Pusat Pembinaan JFA</p>
     <p align='justify'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian kami sampaikan. Atas perhatian Bupati Aceh Barat, kami ucapkan terima kasih. </p>
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
      <label><?php echo '' ?></label><br/>
      <label><?php echo $kepala ?></label>
    </div>
  </div><br/><br/>
  <div class="row">
    <div style="width:100%;float:left">
      <label>Tembusan :</label><br/>
      <label>1. </label><br/>
      <label>2. </label><br/>
    </div>
  </div>
</div>
