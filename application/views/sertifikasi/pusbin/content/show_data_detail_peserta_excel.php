<?php

 header("Content-type: application/vnd-ms-excel");

 header("Content-Disposition: attachment; filename=$title.xls");

 header("Pragma: no-cache");

 header("Expires: 0");

 ?>

<table>
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
