<div class="clearfix"></div>
<h1 class="text-primary">Manajemen Ujian</h1>
	<div class="info">
		<p style="color:#777;"> Ujian Sertifikasi <i class="fa fa-book"></i></p>
	</div>
<br><br>
<div class="container">
  <div class="" role="tabpanel" data-example-id="togglable-tabs" style="background:#fff !important;">
    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
      <li role="presentation" class="active"><a href="#tab_1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Konfigurasi Ujian</a>
      </li>

    </ul>
    <div id="myTabContent" class="tab-content" style="background:#fff;">
      <div role="tabpanel" class="tab-pane fade active in" id="tab_1" aria-labelledby="home-tab" >
      <div  class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div style="float:right">
            <button  onclick="getModal(this)" id="btn-add-management-ujian" data-href="<?php echo base_url('sertifikasi')."/bank_soal/admin/ManagementUjian/vw_add_konfig"; ?>"
    						data-toggle="modal" data-target="#modal-content" class="btn btn-primary" ><i class="glyphicon glyphicon-plus"></i> Tambah</button>
            <!-- <button class="btn btn-primary" onclick="add()"><i class="glyphicon glyphicon-plus"></i> Buat Permintaan</button> -->
           </div>

            <div class="x_content">

              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">



          <table id="table_konfig" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
											<th>Tanggal</th>
                      <th>Waktu Mulai</th>
                      <th>Waktu Berakhir</th>
                      <th>Mata Ajar</th>
                      <th>Pin</th>
                      <th>Jadwal Ujian</th>
											<th>Lokasi Ujian</th>
											<th>Jumlah Soal</th>
                      <th>Tindakan</th>
                  </tr>
              </thead>
              <tbody style="color:#333;">
              </tbody>

          </table>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>

  </div>
  </div>
</div>
<script type="text/javascript">
	var save_method;
	var tables;


	$(document).ready(function() {

						tables = $('#table_konfig').DataTable({
			              "processing": false, //Feature control the processing indicator.
										 "destroy": true,
			              "serverSide": true, //Feature control DataTables' server-side processing mode.
			              "order": [], //Initial no order.
			              // Load data for the table's content from an Ajax source
			              "ajax": {
			                  "url": '<?php echo base_url('sertifikasi/bank_soal/admin/ManagementUjian/loadKonfig/')?>',
			                  "type": "POST"
			              },
			              //Set column definition initialisation properties.
			              "columns": [
			                  {"data": "0",width:50},
			                  {"data": "1",width:100},
			                  {"data": "2",width:100},
												{"data": "3",width:100},
												{"data": "4",width:100},
                        {"data": "5",width:100},
                        {"data": "6",width:100},
												{"data": "7",width:100},
												{"data": "8",width:100},
												{"data": "9",width:100},
			              ],

			          });

	});



	function loadData(obj)
	{

		tables.ajax.reload(null,false);


	}


	function delete_data(id)
	{
	    if(confirm('Are you sure delete this data?'))
	    {
	        // ajax delete data to database
	        $.ajax({
	            url : "<?php echo base_url('sertifikasi/bank_soal/admin/ManagementUjian/delete/')?>/"+id,
	            type: "POST",
	            dataType: "JSON",
	            success: function(data)
	            {
	             loadData(1);
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                alert('Error deleting data');
	            }
	        });

	    }
	}

</script>
