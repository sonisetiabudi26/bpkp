<?php

 header("Content-type: application/vnd-ms-excel");

 header("Content-Disposition: attachment; filename=$title.xls");

 header("Pragma: no-cache");

 header("Expires: 0");

 ?>

<table>
 <thead>
 <tr>

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
   $nama='';
    foreach ($data_soal as $key){
      echo '<tr><td>'.$key['provinsi'].'</td>';
     foreach ($key['nilai'] as $keys=>$value){
         echo '<td>'.$value.'</td>';
     }
     echo '</tr>';

 }

    ?>
 </tbody>
 </table>
