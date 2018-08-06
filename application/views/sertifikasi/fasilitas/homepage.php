<div class="page-title">
	<div class="title_left">
		<h3>Validasi Pengusulan Pengangkatan</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="" role="tabpanel" data-example-id="togglable-tabs" style="background:#fff !important;">
	<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
		<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pengangkatan Pertama</a>
		</li>
		<li role="presentation" class=""><a href="#tab_content2" role="tab" onclick="loadDataperpindahan();" id="profile-tab" data-toggle="tab" aria-expanded="false">Pengangkatan Perpindahan</a>
		</li>
		<!-- <li role="presentation" class=""><a href="#tab_content3" role="tab" onclick="loadDataUserWidya();" id="profile-tab2" data-toggle="tab" aria-expanded="false">Pengangkatan Penyesuaian (Inpassing)</a>
		</li>
		<li role="presentation" class=""><a href="#tab_content4" role="tab" onclick="loadDataUserFP();" id="profile-tab2" data-toggle="tab" aria-expanded="false">Pengangkatan Kembali</a>
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
					            <table id="dataUserpertama" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
                          <td>NO</td>
													<td>NIP</td>
													<td>Nama</td>
													<td>Status Pengusulan Pengangkatan</td>
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
						
								<div class="x_content">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					            <table id="dataUserPerpindahan" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>NIP</td>
													<td>Nama</td>
													<td>Status Pengusulan Pengangkatan</td>
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

								<div class="x_content">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
											<table id="dataUserWidyaiswara" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>Username</td>
													<td>Login As</td>
													<td>Password</td>
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

								<div class="x_content">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
											<table id="dataUserFP" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>Username</td>
													<td>Login As</td>
													<td>Password</td>
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
  //document.getElementById("datatable-responsive").innerHTML='';

var table;
      table = $('#dataUserpertama').DataTable({
              "processing": false, //Feature control the processing indicator.
               "destroy": true,
              "serverSide": true, //Feature control DataTables' server-side processing mode.
              "order": [], //Initial no order.
              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": '<?php echo base_url('sertifikasi/fasilitas/Home/loadpertama/')?>',
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

function loadDataperpindahan(){
  var table;
        table = $('#dataUserPerpindahan').DataTable({
                "processing": false, //Feature control the processing indicator.
                 "destroy": true,
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": '<?php echo base_url('sertifikasi/fasilitas/Home/loadperpindahan/')?>',
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

}

</script>
