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
   <?php
   $no=1;
   foreach ($data_mata_ajar as $key):
     echo '<td>'.$key->NAMA_MATA_AJAR.'</td>';
   endforeach
    ?>
 </tr>
 </thead>
 <tbody>
   <?php
   $no=1;
   foreach ($data_provinsi as $key):
     echo "<tr>
     <td>".$no++."</td>
     <td>".$key->NAMA."</td>";
     foreach ($data_mata_ajar as $key):
     echo "<td>".$key->jml_soal."</td>";
     endforeach
     echo "</tr>";
   endforeach
    ?>
 </tbody>
 </table>
