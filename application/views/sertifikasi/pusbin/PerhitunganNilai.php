<div class="page-title">
	<div class="title_left">
		<h3>Perhitungan Nilai</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="" role="tabpanel" data-example-id="togglable-tabs" style="background:#fff !important;">
	<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
		<li role="presentation" class="active"><a href="#tab_content1" onclick="loadData();" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Events</a>
		</li>
		<li role="presentation" class=""><a href="#tab_content2" onclick="loadDatabatch();" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Batch</a>
		</li>
		<!-- <li role="presentation" class=""><a href="#tab_content3" onclick="loadDatasoal();" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Nilai</a>
		</li> -->
	</ul>
	<div id="myTabContent" class="tab-content" style="background:#fff;">
		<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab" >
			<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<button class="btn btn-primary" id="" onclick="getModal(this)" data-href="<?php echo base_url('sertifikasi')."/pusbin/PerhitunganNilai/vw_add_event"; ?>"   data-toggle="modal" data-target="#modal-content" class="btn btn-primary oval-box oval-box-circle" style="float:right;"><i class="glyphicon glyphicon-pencil"></i> Add data</button>
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
													<td>Action</td>
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
		<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
			<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<!-- <div class="form-group"> -->
									<button class="btn btn-primary" id="btn-add-batch" onclick="getModal(this)" data-href="<?php echo base_url('sertifikasi')."/pusbin/PerhitunganNilai/vv_add_batch"; ?>"   data-toggle="modal" data-target="#modal-content" style="float:right;"><i class="glyphicon glyphicon-pencil"></i> Add data</button>
									<button class="btn btn-primary" onclick="getModal(this)" id="btn-upload-doc" data-href="<?php echo base_url('sertifikasi')."/pusbin/PerhitunganNilai/vw_upload_doc/"?>" data-toggle="modal" data-target="#modal-content" style="float:right;"><i class="glyphicon glyphicon-import"></i> Import Data</button>
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
													<td>Action</td>
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

<script>
// loadDatajadwal();
$(document).ready(function(){
var table;
			table = $('#dataEventAll').DataTable({
              "processing": false, //Feature control the processing indicator.
							 "destroy": true,
              "serverSide": true, //Feature control DataTables' server-side processing mode.
              "order": [], //Initial no order.
              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": '<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/LoadDateEvent/')?>',
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
function refresh(){
	$('#dataEventAll').DataTable().ajax.reload();
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
							refresh();
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
