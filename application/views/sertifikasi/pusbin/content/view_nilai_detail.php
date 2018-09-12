<div class="col-md-12">
  <div class="row">
      <input id="id_lookup" value="<?php echo $id;?>" style="display:none"/>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <table id="data_peserta" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
          <td>MATA AJAR</td>
          <td>Bobot Nilai Total Kelulusan</td>
          <td>Nilai Tertulis</td>
          <td>Simulasi Kegiatan Pengawasan</td>
          <td>Aktivitas Pada Saat Mengikuti Diklat</td>
          <td>Jumlah Nilai Hasil Diklat</td>
          <td>Bobot Nilai Diklat</td>
          <td>Bobot Nilai KSP</td>

        </tr>
        </thead>
        <tbody>

        </tbody>
        </table>
    </div>
  </div><br/>
</div>
<script>
$(document).ready(function(){
var id=$('#id_lookup').val();
var table;
			table = $('#data_peserta').DataTable({
              "processing": false, //Feature control the processing indicator.
							 "destroy": true,
              "serverSide": true, //Feature control DataTables' server-side processing mode.
              "order": [], //Initial no order.
              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": '<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/getdatanilai/')?>'+id,
                  "type": "POST"
              },
              //Set column definition initialisation properties.
              "columns": [
                  {"data": "0",width:50},
                  {"data": "7",width:100},
                  {"data": "1",width:100},
                  {"data": "2",width:100},
                  {"data": "3",width:100},
									{"data": "4",width:100},
                  {"data": "5",width:100},
                  {"data": "6",width:100},

                  // {"data": "5",width:100}

              ],

          });
          return false;
});
</script>
