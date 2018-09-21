<?php error_reporting(0);?>
<style>
  .full-width{width:100%}
  .title{
    font-size: 18px;
    font-weight: bolder;
  }

  .subtitle{
    width:40%;
    border:none;
  }
  .isi{
    width:80%;
    border:none;
  }
  .no{
    width: 10%;

  }
  .ujian{
    width:90%;
  }
  table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}
</style>
<div class="full-width">
  <div class="row">
    <div class="col-lg-12" style="text-align:center;border:2px solid #000;">
      <div class="row title">
        <label>KARTU PESERTA UJIAN SERTIFIKASI AUDITOR</label><br/>
        <label>PERIODE JULI 2018</label>
      </div>
    </div>
  </div><br/>
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <table style="border: none;width:100%;">

            <tr>
              <td class="subtitle"><b>Nama</b></td>
              <td class="isi"><b>: <?php echo $nama; ?></b></td>
            </tr>
            <tr>
              <td class="subtitle"><b>NIP/NRP</b></td>
              <td class="isi"><b>: <?php echo $nip; ?></b></td>
            </tr>
            <tr>
              <td class="subtitle"><b>Lokasi Ujian</b></td>
              <td class="isi"><b>: <?php echo $lokasi; ?></b></td>
            </tr>
            <tr>
              <td class="subtitle"><b>Unit/Instansi</b></td>
              <td class="isi"><b>: <?php echo $unit; ?></b></td>
            </tr>
            <tr>
              <td class="subtitle"><b>Kode Unit/Instansi *)</b></td>
              <td class="isi"><b>: <?php echo $kode_unit; ?></b></td>
            </tr>
            <tr>
              <td class="subtitle"><b>Kode Diklat *)</b></td>
              <td class="isi"><b>: <?php echo $kode_diklat; ?></b></td>
            </tr>

        </table>
      </div>

    </div>
  </div><br/>
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <label>Mata Ujian yang akan diikuti</label>
        <table style="width:100%;">
          <thead>
            <tr style="text-align:center">
              <td class="no"><b>No</b></td>
              <td class="ujian"><b>Mata Ujian</b></td>
            </tr>
        </thead>
        <tbody>

            <?php
            $no=1;
            foreach ($data_detail as $key ) {
              echo '  <tr>';
              echo '<td style="text-align:center">'.$no.'</td>';
              echo '<td>'.$key->NAMA_MATA_AJAR.'</td>';
              echo '  </tr>';
              $no++;
            }?>


        </tbody>
        </table>
      </div>
    </div>
  </div><br/><br/>
  <div class="row">
    <div class="col-lg-6" style="float:left">
      <div class="row">
        <!-- <table> -->
        <div height="472" width="354" style="border:1px solid #999">
           <!-- <td height="150" width="130"> -->
          <img src="http://localhost/bpkp/uploads/<?php echo $foto; ?>" width="130" height="150">
        <!-- </td> -->
        </div>
      <!-- </table> -->
      </div>
    </div>
    <div class="col-lg-6" style="float:right">

    </div>
  </div>
</div>
