<div class="col-md-12">
  <div class="row">
    <input id="kodeevent" value="<?php echo $kode;?>" style="display:none"/>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <table id="data_peserta" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
          <td>NO</td>
          <td>Kode Event</td>
          <td>Kode Peserta</td>
          <td>Kode Soal</td>
          <td>Kelas</td>
          <td>Nilai</td>
        </tr>
        </thead>
        <tbody>
          <!-- <?php
          // foreach ($jawaban as $key):
          //   $NILAI='';
          //   echo "<tr>
          //   <td>".$key->PK_JAWABAN_DETAIL."</td>
          //   <td>".$key->FK_KODE_EVENT."</td>
          //   <td>".$key->KODE_PESERTA."</td>
          //   <td>".$key->KODE_SOAL."</td>
          //   <td>".$key->KELAS."</td>
          //   <td>".$NILAI."</td>
          //   </tr>";
          // endforeach
           ?> -->
        </tbody>
        </table>
    </div>
  </div><br/>
</div>
<script>
$(document).ready(function(){
var kodeevent=$('#kodeevent').val();
var table;
			table = $('#data_peserta').DataTable({
              "processing": false, //Feature control the processing indicator.
							 "destroy": true,
              "serverSide": true, //Feature control DataTables' server-side processing mode.
              "order": [], //Initial no order.
              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": '<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/LoadDatePeserta/')?>'+kodeevent,
                  "type": "POST"
              },
              //Set column definition initialisation properties.
              "columns": [
                  {"data": "0",width:50},
                  {"data": "1",width:100},
                  {"data": "2",width:100},
                  {"data": "3",width:100},
									{"data": "4",width:100},
                  {"data": "5",width:100}

              ],

          });
});
</script>
