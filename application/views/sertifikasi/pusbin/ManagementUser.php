<div class="page-title">
	<div class="title_left">
		<h3>Management User</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="" role="tabpanel" data-example-id="togglable-tabs" style="background:#fff !important;">
	<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
		<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" onclick="loaddatapeserta();" role="tab" data-toggle="tab" aria-expanded="true">Bank Soal</a>
		</li>
		<li role="presentation" class=""><a href="#tab_content2" role="tab" onclick="loadDataUserDiklat();" id="profile-tab" data-toggle="tab" aria-expanded="false">Pengelola Diklat</a>
		</li>
		<li role="presentation" class=""><a href="#tab_content3" role="tab" onclick="loadDataUserWidya();" id="profile-tab2" data-toggle="tab" aria-expanded="false">Widyaiswara</a>
		</li>
		<li role="presentation" class=""><a href="#tab_content4" role="tab" onclick="loadDataUserFP();" id="profile-tab2" data-toggle="tab" aria-expanded="false">Fasilitasi Pengangkatan</a>
		</li>
	</ul>
	<div id="myTabContent" class="tab-content" style="background:#fff;">
		<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab" >
			<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<button class="btn btn-primary" id="" onclick="getModal(this)" data-href="<?php echo base_url('sertifikasi')."/pusbin/ManagementUser/vw_add_user/1"; ?>"   data-toggle="modal" data-target="#modal-content" class="btn btn-primary oval-box oval-box-circle" style="float:right;"><i class="glyphicon glyphicon-pencil"></i> Add data</button>

								<div class="x_content">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					            <table id="dataUserAll" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>Username</td>
													<td>Login As</td>

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
								<button class="btn btn-primary" id="" onclick="getModal(this)" data-href="<?php echo base_url('sertifikasi')."/pusbin/ManagementUser/vw_add_user/17"; ?>"   data-toggle="modal" data-target="#modal-content" class="btn btn-primary oval-box oval-box-circle" style="float:right;"><i class="glyphicon glyphicon-pencil"></i> Add data</button>

								<div class="x_content">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					            <table id="dataUserPengeloladiklat" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>Username</td>
													<td>Login As</td>

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
		<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
			<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<button class="btn btn-primary" id="" onclick="getModal(this)" data-href="<?php echo base_url('sertifikasi')."/pusbin/ManagementUser/vw_add_user/4"; ?>"   data-toggle="modal" data-target="#modal-content" class="btn btn-primary oval-box oval-box-circle" style="float:right;"><i class="glyphicon glyphicon-pencil"></i> Add data</button>

								<div class="x_content">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
											<table id="dataUserWidyaiswara" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>Username</td>
													<td>Login As</td>

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
		<div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
			<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<button class="btn btn-primary" id="" onclick="getModal(this)" data-href="<?php echo base_url('sertifikasi')."/pusbin/ManagementUser/vw_add_user/28"; ?>"   data-toggle="modal" data-target="#modal-content" class="btn btn-primary oval-box oval-box-circle" style="float:right;"><i class="glyphicon glyphicon-pencil"></i> Add data</button>

								<div class="x_content">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
											<table id="dataUserFP" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>Username</td>
													<td>Login As</td>

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
$(document).ready(function(){
loaddatapeserta();
});
function loaddatapeserta(){
var table;
			table = $('#dataUserAll').DataTable({
              "processing": false, //Feature control the processing indicator.
							 "destroy": true,
              "serverSide": true, //Feature control DataTables' server-side processing mode.
              "order": [], //Initial no order.
              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": '<?php echo base_url('sertifikasi/pusbin/ManagementUser/LoadDateUserBank/')?>',
                  "type": "POST"
              },
              //Set column definition initialisation properties.
              "columns": [
                  {"data": "0",width:50},
                  {"data": "1",width:100},
                  {"data": "2",width:100},

									{"data": "4",width:100}
              ],

          });

}

function loadDataUserDiklat(){
	var table;
				table = $('#dataUserPengeloladiklat').DataTable({
	              "processing": false, //Feature control the processing indicator.
								 "destroy": true,
	              "serverSide": true, //Feature control DataTables' server-side processing mode.
	              "order": [], //Initial no order.
	              // Load data for the table's content from an Ajax source
	              "ajax": {
	                  "url": '<?php echo base_url('sertifikasi/pusbin/ManagementUser/LoadDateUserDiklat/')?>',
	                  "type": "POST"
	              },
	              //Set column definition initialisation properties.
	              "columns": [
	                  {"data": "0",width:50},
	                  {"data": "1",width:100},
	                  {"data": "2",width:100},

										{"data": "4",width:100}
	              ],

	          });
}
function loadDataUserWidya(){
	var table;
				table = $('#dataUserWidyaiswara').DataTable({
	              "processing": false, //Feature control the processing indicator.
								 "destroy": true,
	              "serverSide": true, //Feature control DataTables' server-side processing mode.
	              "order": [], //Initial no order.
	              // Load data for the table's content from an Ajax source
	              "ajax": {
	                  "url": '<?php echo base_url('sertifikasi/pusbin/ManagementUser/LoadDateUserWidya/')?>',
	                  "type": "POST"
	              },
	              //Set column definition initialisation properties.
	              "columns": [
	                  {"data": "0",width:50},
	                  {"data": "1",width:100},
	                  {"data": "2",width:100},

										{"data": "4",width:100}
	              ],

	          });
}
function loadDataUserFP(){
	var table;
				table = $('#dataUserFP').DataTable({
	              "processing": false, //Feature control the processing indicator.
								 "destroy": true,
	              "serverSide": true, //Feature control DataTables' server-side processing mode.
	              "order": [], //Initial no order.
	              // Load data for the table's content from an Ajax source
	              "ajax": {
	                  "url": '<?php echo base_url('sertifikasi/pusbin/ManagementUser/LoadDateUserFP/')?>',
	                  "type": "POST"
	              },
	              //Set column definition initialisation properties.
	              "columns": [
	                  {"data": "0",width:50},
	                  {"data": "1",width:100},
	                  {"data": "2",width:100},

										{"data": "4",width:100}
	              ],

	          });
}
function loadData(obj){
	loaddatapeserta();
	loadDataUserDiklat();
	loadDataUserWidya();
	loadDataUserFP();
}
function delete_user(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('sertifikasi/pusbin/ManagementUser/delete_user/')?>/"+id,
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
