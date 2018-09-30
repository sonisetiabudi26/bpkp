<div class="col-md-12">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <table id="data_peserta" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
          <td>NO</td>
          <td>PROVINSI</td>
          <td>JUMLAH</td>

        </tr>
        </thead>
        <tbody>
          <?php
          $no=1;
          foreach ($data_soal as $key):
            echo "<tr>
            <td>".$no++."</td>
            <td>".$key->NAMA."</td>
            <td>".$key->jml_soal."</td>
            </tr>";
          endforeach
           ?>
        </tbody>
        </table>
    </div>
  </div><br/>
</div>
