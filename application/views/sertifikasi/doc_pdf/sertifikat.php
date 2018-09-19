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
    padding:5px;
}
</style>
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
            <div height="472" width="354" style="float:left">
               <!-- <td height="150" width="130"> -->
              <img src="http://localhost/bpkp/assets/other/media/img/logo/bpkp.png" width="130" height="150">
            <!-- </td> -->
            </div>
          <!-- </table> -->
          </div>
        </div>
        <div class="col-lg-6" style="float:right">
          <label>Jakarta, <?php echo $datex;?></label><br/>
          <label>a.n. <?php echo $a_n;?></label><br/><br/><br/><br/><br/>
          <label><?php echo $nama_kepala ?></label><br/>
          <label><?php echo $nip_kepala ?></label>
        </div>
      </div>
    </div>
  </div><br/>
  <br/>  <br/>  <br/>  <br/>  <br/>  <br/>  <br/>  <br/>  <br/>
  <div class="row">
    <div class="col-lg-12">
      <div class="row" style="text-align:center">
        <h3>DAFTAR MATERI UJIAN</h3>
        <h3>SERTIFIKAT <?php echo strtoupper($diklat);?></h3>
      </div>
      <div class="row">
        <div style="margin:0px auto;width:70%">
          <div style="width:30%">
            <h4>Nama</h4>
          </div>
          <div style="width:70%">: <?php echo $nama ?></div>
          <div style="width:30%">
            <h4>NIP </h4>
          </div>
          <div style="width:70%">: <?php echo $nip ?></div>
          <div style="width:30%">
            <h4>Unit Organisasi </h4>
          </div>
          <div style="width:70%">: <?php echo $kodeunitkerja ?></div>
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
              if($key->NILAI>80){
                $predikat='Memuaskan';
              }elseif($key->NILAI>75){
                $predikat='Baik';
              }elseif($key->NILAI>70){
                $predikat='Cukup';
              }
              $nilaitotal=$nilaitotal+$key->NILAI;
              echo '  <tr>';
              echo '<td style="text-align:center">'.$no.'</td>';
              echo '<td>'.$key->NAMA_MATA_AJAR.'</td>';
              echo '<td>'.$key->NILAI.'</td>';
              echo '<td>'.$predikat.'</td>';
              echo '  </tr>';
              $no++;
            }
            if($nilaitotal>80){
              $predikat_total='Memuaskan';
            }elseif($nilaitotal>75){
              $predikat_total='Baik';
            }elseif($$nilaitotal>70){
              $predikat_total='Cukup';
            }

            ?>
            <tr>
              <td colspan="2">
                RATA-RATA
                </td>
                <td><?php echo ceil($nilaitotal/$no);?></td>
                <td><?php echo $predikat_total?></td>
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
