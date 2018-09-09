<div>
	
<div class="page-title">
	<div class="title_left">
		<h3>Perhitungan Nilai</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="" role="tabpanel" data-example-id="togglable-tabs" style="background:#fff !important;">
	<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
		<li role="presentation" class="active"><a href="#tab_content1"  id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Jenjang</a>
		</li>
		<!-- <li role="presentation"><a href="#tab_content2" onclick="loaddataEvent();" id="event-tab" role="tab" data-toggle="tab" aria-expanded="false">Events</a>
		</li>
		<li role="presentation" class=""><a href="#tab_content3" onclick="loadDatabatch();" role="tab" id="batch-tab" data-toggle="tab" aria-expanded="false">Batch</a>
		</li> -->

	</ul>
	<div id="myTabContent" class="tab-content" style="background:#fff;">
		<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab" >
			<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_content">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					            <table id="datajenjang" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>

													<td>Kode Diklat</td>
													<td>Nama Jenjang</td>
												</tr>
												</thead>

												</table>
										</div>

									</div>
								</div>
							</div>
						</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="event-tab" >
			<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<button class="btn btn-primary" id="" onclick="getModal(this)" data-href="<?php echo base_url('sertifikasi')."/pusbin/PerhitunganNilai/vw_add_event"; ?>"   data-toggle="modal" data-target="#modal-content" class="btn btn-primary oval-box oval-box-circle" style="float:right;"><i class="glyphicon glyphicon-pencil"></i> Tambah data</button>
								<div class="x_content">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					            <table id="dataEventAll" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>Kode Event</td>
													<td>Nama Diklat</td>
													<td>Uraian</td>
													<td>Provinsi</td>
													<td>Tindakan</td>
												</tr>
												</thead>
												</table>
										</div>

									</div>
								</div>
							</div>
						</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="batch-tab">
			<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<!-- <div class="form-group"> -->
									<!-- <button class="btn btn-primary" id="btn-add-batch" onclick="getModal(this)" data-href="<?php //echo base_url('sertifikasi')."/pusbin/PerhitunganNilai/vv_add_batch"; ?>"   data-toggle="modal" data-target="#modal-content" style="float:right;"><i class="glyphicon glyphicon-pencil"></i> Add data</button> -->
									<!-- <button class="btn btn-primary" onclick="getModal(this)" id="btn-upload-doc" data-href="<?php //echo base_url('sertifikasi')."/pusbin/PerhitunganNilai/vw_upload_doc/"?>" data-toggle="modal" data-target="#modal-content" style="float:right;"><i class="glyphicon glyphicon-import"></i> Import Data</button> -->
							<!-- </div><br/> -->
								<div class="x_content">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					            <table id="dataBatchAll" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>Kode Event</td>
													<td>Provinsi</td>
													<td>Kelas</td>
													<td>Jadwal</td>
													<td>Reff</td>
													<td>Jumlah Peserta</td>
													<td>Tindakan</td>
												</tr>
												</thead>
												<tbody>
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
<script>
// loadDatajadwal();
$(document).ready(function(){

		var table;
					table = $('#datajenjang').DataTable({
									"processing": false, //Feature control the processing indicator.
									"destroy": true,
								 "serverSide": true, //Feature control DataTables' server-side processing mode.
									"order": [], //Initial no order.
		            	'ajax': {
					          "type"   : "POST",
					          "url"    : '<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/loadDataJenjang/')?>',
					        },
		              //Set column definition initialisation properties.
		              "columns": [

									 {"data": "kode",width:100},
									 {"data": "nama",width:100}

		              ],

		          });
});
function calculate(kode_event,kelas){
	var kode=kode_event+'~'+kelas;
	$.ajax({
			url : "<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/calculate/')?>/"+kode,
			type: "POST",
			dataType: "JSON",
			success: function(resp)
			{
				if(resp.status=="success"){
					loadData(1);
					swal('Berhasil',resp.msg,resp.status);
				}else{
					loadData(1);
					swal('Terjadi kesalahan',resp.msg,resp.status);
				}
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
					alert('Error calculate data');
			}
	});
}
function loaddataEvent(){


	var table;
				table = $('#dataEventAll').DataTable({
							"processing": false, //Feature control the processing indicator.
							"destroy": true,
						 "serverSide": true, //Feature control DataTables' server-side processing mode.
				 	 		"order": [], //Initial no order.
	            	'ajax': {
				          "type"   : "POST",
				          "url"    : '<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/LoadDateEvent/')?>',
				          "dataSrc": ""
				        },
	              //Set column definition initialisation properties.
	              "columns": [
	                  {"data": "no"},
	                  {"data": "kodeevent"},
	                  {"data": "namadiklat"},
	                  {"data": "uraian"},
										{"data": "nama"},
										{"data": "action"}
	              ],

	          });
}
function loadDatabatch(){
	var table;
				table = $('#dataBatchAll').DataTable({
	              "processing": false, //Feature control the processing indicator.
								 "destroy": true,
	              "serverSide": true, //Feature control DataTables' server-side processing mode.
	              "order": [], //Initial no order.
	              // Load data for the table's content from an Ajax source
	              "ajax": {
	                  "url": '<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/LoadBatch/')?>',
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
										{"data": "7",width:100}
	              ],

	          });
}
function loadData(obj){
	$('#dataEventAll').DataTable().ajax.reload();
	loadDatabatch();
}
function delete_event(id){
	if(confirm('Are you sure delete this data?'))
	{
			// ajax delete data to database
			$.ajax({
					url : "<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/deleteEvent/')?>/"+id,
					type: "POST",
					dataType: "JSON",
					success: function(data)
					{
							//if success reload ajax table
						//  $('#modal_form').modal('hide');
							loadData(1);
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
							alert('Error deleting data');
					}
			});

	}
}
function loadDataWidyaiswarauser(){
var table;
			table = $('#datawi').DataTable({
              "processing": false, //Feature control the processing indicator.
							 "destroy": true,
              "serverSide": true, //Feature control DataTables' server-side processing mode.
              "order": [], //Initial no order.
              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": '<?php echo base_url('sertifikasi/pusbin/ManagementRegistrasi/loadDatawidyaiswara/')?>',
                  "type": "POST"
              },
              //Set column definition initialisation properties.
              "columns": [
                  {"data": "0",width:70},
                  {"data": "1",width:100},
                  {"data": "2",width:100},

              ],

          });
}
function delete_batch(id){
	if(confirm('Are you sure delete this data?'))
	{
			// ajax delete data to database
			$.ajax({
					url : "<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/deleteBatch/')?>/"+id,
					type: "POST",
					dataType: "JSON",
					success: function(data)
					{
							//if success reload ajax table
						//  $('#modal_form').modal('hide');
							loadData(1);
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
							alert('Error deleting data');
					}
			});

	}
}
function import_batch(){

}
</script>
