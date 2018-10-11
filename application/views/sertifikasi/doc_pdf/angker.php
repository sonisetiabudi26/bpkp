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
  width:40%;
  display: inline-block;
}
.right{
  width:60%;
  display: inline-block;
}
.full-width{
  width: 100%;
}
table {
  border-collapse: collapse;
}

table, th, td {
  text-align:center;
  border: 1px solid black;
}
</style>
<div class="full-width">
<div style="width:100%;position:relative;">
    <div class="col-lg-12" style="width: 40%;text-align:right;float:right">
      <div class="row">
      <div class="left">
      <label>Lampiran</label>
    </div>
  </div><br/>
      <div class="row">
      <div class="left">
        <label>Surat Nomor</label>
      </div>

      <div class="right">
        <label><?php echo $nosurat; ?></label>
      </div>
    </div>
    <div class="row">
      <div class="left">
        <label>Tanggal</label>
      </div>
      <div class="right">
        <label><?php echo $tanggal; ?></label>
      </div>
    </div>
    </div>
</div>
</div>
  <br/>
  <br/>
  <div class="full-width">
  <div class="row" style="width:100%;position:relative">
    <div class="full-width" style="text-align:center;">
      DAFTAR NAMA PEGAWAI NEGERI SIPIL YANG DISETUJUI UNTUK DIANGKAT DALAM JABATAN FUNGSIONAL AUDITOR MELALUI <?php echo $status_pengusulan;?> TAHUN <?php echo $year ?> PADA <?php echo $unitapip ?>
    </div>
  </div><br/>
  <div class="row">
    <div class="full-width" style="text-align:center;">
      <table style="width:100%;">
        <tr>
          <td>NIP</td>
          <td>Nama</td>
          <td>Pangkat</td>
          <td>Gol Ruang</td>
          <td>TMT Kepangkatan</td>
          <td>Jabatan Auditor</td>
          <td>Pendidikan Sekolah</td>
          <td>Diklat</td>
          <td>Pengawasan</td>
          <td>Pengembangan Profesi</td>
          <td>Penunjang</td>
          <td>Jumlah</td>
        </tr>
      <?php

      foreach ($isi as $key) {
        echo "<tr>
          <td>".$key['nip']."</td>
          <td>".$key['nama']."</td>
          <td>".$key['pangkat']."</td>
          <td>".$key['golongan']."</td>
          <td>".$key['tmtkepangkatan']."</td>
          <td>".$key['jabatan']."</td>
          <td>".$key['pendidikan_sekolah']."</td>
          <td>".$key['diklat']."</td>
          <td>".$key['pengawasan']."</td>
          <td>".$key['pengembangan']."</td>
          <td>".$key['penunjang']."</td>
          <td>".$key['jumlah']."</td>
        </tr>";
      }

       ?>
       </table>
    </div>
  </div><br/>

  <div class="row">
    <div style="width:30%;float:right">
      <label><?php echo $jabatan;?></label>
    </div>
  </div>
  <br/><br/><br/><br/><br/>
  <div class="row">
    <div style="width:30%;float:right">
      <label><?php echo $nama ?></label><br/>
      <label><?php echo $kepala ?></label>
    </div>
  </div>
</div>
