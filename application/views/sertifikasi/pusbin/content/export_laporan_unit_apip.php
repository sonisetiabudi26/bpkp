<?php

 header("Content-type: application/vnd-ms-excel");

 header("Content-Disposition: attachment; filename=$title.xls");

 header("Pragma: no-cache");

 header("Expires: 0");

 ?>
<table id="data_peserta">
  <thead>
  <tr>
    <td>NO</td>
    <td>Kode Event</td>
    <td>Kode Peserta</td>
    <td>Kelas</td>
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
      <td>".$key->KELAS."</td>
      <td>".$key->STATUS."</td>
      </tr>";
    endforeach
     ?>
  </tbody>
  </table>
