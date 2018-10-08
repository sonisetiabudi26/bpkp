<?php error_reporting(0);?>
<style>
  .full-width{width:100%}
  .title{
    font-size: 18px;
    font-weight: bolder;
  }
  .container {
      border-radius: 5px;
      margin:0px auto;
      width: 60%;
  }
  .box{
    width: 60%;
    margin:0px auto;

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
.col-25 {
    float: left;
    width: 30%;
    margin-top: 6px;
}

.col-75 {
    float: right;
    width: 70%;
    margin-top: 6px;
}
.row:after {
    content: "";
    display: table;
    clear: both;
}

table, th, td {
    border: 1px solid black;
    padding:5px;
}
</style>
<?php function nilaiStatus($nilai){
  if($nilai>80){
    return 'Memuaskan';
  }elseif($nilai>75 || $nilai<80){
    return 'Baik';
  }elseif($nilai>70 || $nilai<75){
    return 'Cukup';
  }
}
$foto_identitas=base_url('uploads')."/".$foto;

 ?>
<!-- <link href="<?php //echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet"> -->
<div class="full-width">
  <div class="row">
    <div class="col-lg-12" style="text-align:center;">
      <div class="row title" style="text-align:center">
        <img src="http://localhost/bpkp/assets/other/media/img/logo/bpkp.png" width="130" height="100"><br/>
        <label style="font-size:16px"><b>KARTU PESERTA UJIAN SERTIFIKASI AUDITOR</b></label><br/>
        <h2>SERTIFIKAT <?php echo $diklat ?></h2>
        <label style="font-size:14px"><b>Nomor : <?php echo $nomor?></b></label><br/>
        <label style="font-size:12px">diberikan kepada</label><br/>
        <h3><?php echo $nama;?></h3>
        <h4>NIP <?php echo $nip;?></h4>
        <h4>telah LULUS ujian sertifikasi <?php echo strtoupper($diklat)?></h4>
      </div>
      <br/><br/>
      <div class="row">
        <div class="col-lg-6" style="float:left">
          <div class="row">
            <!-- <table> -->
            <div height="472" width="354" style="float:left;padding-left:20px">
               <!-- <td height="150" width="130"> -->
              <img src="<?php echo $foto_identitas ?>" width="130" height="150">
            <!-- </td> -->
            </div>
          <!-- </table> -->
          </div>
        </div>
        <div class="col-lg-6" style="float:right;padding-right:20px;">
          <label>Jakarta, <?php echo $datex;?></label><br/>
          <label>a.n. <?php echo $a_n;?></label><br/><br/><br/><br/><br/>
          <label><?php echo $nama_kepala ?></label><br/>
          <label><?php echo $nip_kepala ?></label>
        </div>
      </div>
    </div>
  </div><br/>
  <br/>
  <div class="row">
    <div class="col-lg-12">
      <div class="row" style="text-align:center">
        <h3>DAFTAR MATERI UJIAN</h3>
        <h3>SERTIFIKAT <?php echo strtoupper($diklat);?></h3>
      </div>
      <div class="container">
          <div class="box">
            <div class="row">
            <div class="col-25">
              <label for="fname">Nama</label>
            </div>
            <div class="col-75">
              : <label><?php echo $nama ?></label>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="lname">NIP</label>
            </div>
            <div class="col-75">
              : <label><?php echo $nip ?></label>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="lname">Unit Organisasi</label>
            </div>
            <div class="col-75">
              : <label><?php echo $kodeunitkerja ?></label>
            </div>
          </div>
        </div>
    </div>



      <div class="row">
        <table style="width:100%;">
          <thead>
            <tr style="text-align:center">
              <td class="no"><b>No</b></td>
              <td class="ujian"><b>Mata Ujian</b></td>
              <td class="ujian"><b>Nilai</b></td>
              <td class="ujian"><b>Predikat</b></td>
            </tr>
        </thead>
        <tbody>

            <?php
            $no=1;
            $nilaitotal=0;
            foreach ($data_detail as $key ) {

              $nilaitotal=$nilaitotal+$key->NILAI;
              echo '  <tr>';
              echo '<td style="text-align:center">'.$no.'</td>';
              echo '<td>'.$key->NAMA_MATA_AJAR.'</td>';
              echo '<td>'.$key->NILAI.'</td>';
              echo '<td><b>'.nilaiStatus($key->NILAI).'</b></td>';
              echo '  </tr>';
              $no++;
            }
            ?>
            <tr>
              <td colspan="2" style="text-align:center">
                RATA-RATA
                </td>
                <td><b><?php echo ceil($nilaitotal/$no);?></b></td>
                <td><b><?php echo nilaiStatus(ceil($nilaitotal/$no))?></b></td>
            </tr>

        </tbody>
        </table>
      </div>
    </div>
  </div><br/><br/>
  <div class="row">
    <div class="col-lg-6" style="float:left">
      <div class="row">
        <!-- <table> -->

      <!-- </table> -->
      </div>
    </div>
    <div class="col-lg-6" style="float:right;text-align:center;">
      <label>Kepala Pusat</label><br/>
      <label>Pembinaan Jabatan Fungsional Auditor</label><br/><br/><br/><br/><br/>
      <label><?php echo $nama_kepala_pusat ?></label><br/>
      <label><?php echo $nip_kepala_pusat ?></label>
    </div>
  </div>
</div>
