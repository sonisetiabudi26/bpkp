<div class="col-md-12">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <table id="data_peserta" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
          <td>NO</td>
          <td>NIP</td>
          <td>NAMA</td>
          <td>Tanggal Terbit Mata Ajar</td>
          <td>Nama Mata Ajar</td>
          <td>Simulasi Kegiatan Pengawasan</td>
          <td>Aktivitas Pada Saat Mengikuti Diklat</td>
        </tr>
        </thead>
        <tbody>
          <?php
          $no=1;
          foreach ($dataALL as $key) {?>
            <tr>
              <td><?php echo $no; ?>
              </td>
              <td><?php echo $key->NIP ?>
              </td>
              <td><?php echo $key->NAMA ?>
              </td>
              <td><?php echo $key->TGL_RELEASE_MATA_AJAR ?>
              </td>
              <td><?php echo $key->NAMA_MATA_AJAR ?>
              </td>
              <td><?php echo $key->NILAI_1?>
              </td>
              <td><?php echo $key->NILAI_2?>
              </td>
          </tr>
         <?php $no++; }?>
        </tbody>
        </table>
    </div>
  </div><br/>
</div>
