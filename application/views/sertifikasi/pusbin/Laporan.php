<div>
<div class="page-title">
	<div class="title_left">
		<h3>Laporan</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="" role="tabpanel" data-example-id="togglable-tabs" style="background:#fff !important;">
	<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
		<li role="presentation" class="active"><a href="#tab_content3" onclick="loadData(1);" role="tab" id="home-tab" data-toggle="tab" aria-expanded="true">List Nilai by Unit Kerja</a>
		</li>
		<li role="presentation" class=""><a href="#tab_content4" onclick="loadDataNilaiPeserta();" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">List Nilai by NIP</a>
		</li>
		<li role="presentation" class=""><a href="#tab_content5" onclick="loadDataWidyaiswarauser();" role="tab" id="profile-tab5" data-toggle="tab" aria-expanded="false">Unggah Data Widyaiswara</a>
		</li>
	</ul>
	<div id="myTabContent" class="tab-content" style="background:#fff;">
		<div role="tabpanel" class="tab-pane active fade in" id="tab_content3" aria-labelledby="home-tab">
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
					            <table id="dataList" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>Kode Event</td>
													<td>Kode Unit</td>
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
		<div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="list-tab">
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
											<table id="dataNilaiPeserta" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>NIP</td>
													<td>Nama Jenjang</td>

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
		<div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
			<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_content">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
											<table id="datawi" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>NIP</td>
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
$(document).ready(function(){

  var table;
				table = $('#dataList').DataTable({
	              "processing": false, //Feature control the processing indicator.
								 "destroy": true,
	              "serverSide": true, //Feature control DataTables' server-side processing mode.
	              "order": [], //Initial no order.
	              // Load data for the table's content from an Ajax source
	              "ajax": {
	                  "url": '<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/LoadDataUnit/')?>',
	                  "type": "POST"
	              },
	              //Set column definition initialisation properties.
	              "columns": [
	                  {"data": "0",width:50},
	                  {"data": "1",width:100},
	                  {"data": "2",width:100},
	                  {"data": "3",width:100},
										{"data": "4",width:100},
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
function loadDatalist(){
	//var kodeevent=$('#kodeevent').val();

}
function loadDataNilaiPeserta(){
	//var kodeevent=$('#kodeevent').val();
	var table;
				table = $('#dataNilaiPeserta').DataTable({
	              "processing": false, //Feature control the processing indicator.
								 "destroy": true,
	              "serverSide": true, //Feature control DataTables' server-side processing mode.
	              "order": [], //Initial no order.
	              // Load data for the table's content from an Ajax source
	              "ajax": {
	                  "url": '<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/LoadDataNilaiPeserta/')?>',
	                  "type": "POST"
	              },
	              //Set column definition initialisation properties.
	              "columns": [
	                  {"data": "0",width:50},
	                  {"data": "1",width:100},
	                  {"data": "2",width:100},
	                  {"data": "3",width:100},


	              ],

	          });
}
function loadData(obj){
	$('#dataList').DataTable().ajax.reload();
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

</script>
