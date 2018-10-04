<table id="data_peserta">
  <thead>
  <tr>
    <td>NO</td>
    <td>Kode Event</td>
    <td>Kode Peserta</td>
    <td>Nama Peserta</td>
    <td>Nama Mata Ajar</td>
    <td>Status</td>
  </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    foreach ($dataAll as $key):
      echo "<tr>
      <td>".$no++."</td>
      <td>".$key->FK_EVENT."</td>
      <td>".$key->KODE_PESERTA."</td>
      <td>".$key->NAMA."</td>
      <td>".$key->NAMA_MATA_AJAR."</td>
      <td>".$key->STATUS."</td>
      </tr>";
    endforeach
     ?>
  </tbody>
  </table>
