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
		<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" onclick="searchData(2)" data-toggle="tab" aria-expanded="false">Pengangkatan Perpindahan</a>
		</li>
		<li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" onclick="searchData(4)" data-toggle="tab" aria-expanded="false">Pengangkatan Kembail</a>
		</li>
		<li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab" onclick="searchData(3)" data-toggle="tab" aria-expanded="false">Pengangkatan Inpassing</a>
		</li>
	</ul>
	<div id="myTabContent" class="tab-content" style="background:#fff;">
		<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab" >

			<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">

								<div class="x_content">
									<div class="row">
										<label>Pilih Unit Kerja</label>
									</div>
									<div class="row">
										<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="padding:0;margin:0">
											<div>
													<select class="form-control" name='validator' id='validatorion'>

														<?php
															foreach ($validators as $key):
														?>
														<option value="<?php echo $key->CREATED_BY?>">
															<?php echo $key->UNITKERJA;?>
														</option>
														<?php
															endforeach;
														?>
													</select>
												</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0;margin:0">
											<button class="btn btn-primary btn-block" onclick="searchData(1);">Cari</button>
										</div>
									</div>
									<hr>
									<div class="row">
										<h4>Data List Pengusulan Pengangkatan <label id='titletabel'></label></h4>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					            <table id="dataUserpertama" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
                          <td>NO</td>
													<td>No Surat</td>
													<td>NIP</td>

													<td>Status Pengusulan Pengangkatan</td>
													<td>Status</td>
													<td>Status Doc</td>
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
										<label>Pilih Unit Kerja</label>
									</div>
									<div class="row">
										<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="padding:0;margin:0">
											<div>
													<select class="form-control" name='validator_perpindahan' id='validatorion_perpindahan'>

														<?php
															foreach ($validators_perpindahan as $key):
														?>
														<option value="<?php echo $key->CREATED_BY?>">
															<?php echo $key->UNITKERJA;?>
														</option>
														<?php
															endforeach;
														?>
													</select>
												</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0;margin:0">
											<button class="btn btn-primary btn-block" onclick="searchData(2);">Cari</button>
										</div>
									</div>
									<hr>
									<div class="row">
										<h4>Data List Pengusulan Pengangkatan <label id='titletabel_perpindahan'></label></h4>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					            <table id="dataUserPerpindahan" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>No Surat</td>
													<td>NIP</td>

													<td>Status Pengusulan Pengangkatan</td>
													<td>Status</td>
													<td>Status Doc</td>
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
										<label>Pilih Unit Kerja</label>
									</div>
									<div class="row">
										<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="padding:0;margin:0">
											<div>
													<select class="form-control" name='validator_kembali' id='validatorion_kembali'>

														<?php
															foreach ($validators_kembali as $key):
														?>
														<option value="<?php echo $key->CREATED_BY?>">
															<?php echo $key->UNITKERJA;?>
														</option>
														<?php
															endforeach;
														?>
													</select>
												</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0;margin:0">
											<button class="btn btn-primary btn-block" onclick="searchData(4);">Cari</button>
										</div>
									</div>
									<hr>
									<div class="row">
										<h4>Data List Pengusulan Pengangkatan <label id='titletabel_kembali'></label></h4>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
											<table id="dataUserKembali" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>No Surat</td>
													<td>NIP</td>

													<td>Status Pengusulan Pengangkatan</td>
													<td>Status</td>
													<td>Status Doc</td>
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
										<label>Pilih Unit Kerja</label>
									</div>
									<div class="row">
										<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="padding:0;margin:0">
											<div>
													<select class="form-control" name='validator_inpassing' id='validatorion_inpassing'>

														<?php
															foreach ($validators_inpassing as $key):
														?>
														<option value="<?php echo $key->CREATED_BY?>">
															<?php echo $key->UNITKERJA;?>
														</option>
														<?php
															endforeach;
														?>
													</select>
												</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding:0;margin:0">
											<button class="btn btn-primary btn-block" onclick="searchData(3);">Cari</button>
										</div>
									</div>
									<hr>
									<div class="row">
										<h4>Data List Pengusulan Pengangkatan <label id='titletabel_inpassing'></label></h4>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					            <table id="dataUserInpassing" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>No Surat</td>
													<td>NIP</td>

													<td>Status Pengusulan Pengangkatan</td>
													<td>Status</td>
													<td>Status Doc</td>
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
function searchData(obj){
if(obj==1){
	var	validator=$("#validatorion :selected").val();
	var	msgvalidator=$("#validatorion :selected").text();
	document.getElementById("titletabel").innerHTML=msgvalidator;
	ajaxProccess(validator,1,'dataUserpertama');
}else if(obj==2){
	var	validator=$("#validatorion_perpindahan :selected").val();
	var	msgvalidator=$("#validatorion_perpindahan :selected").text();
	document.getElementById("titletabel_perpindahan").innerHTML=msgvalidator;
	ajaxProccess(validator,2,'dataUserPerpindahan');
}else if(obj==4){
	var	validator=$("#validatorion_kembali :selected").val();
	var	msgvalidator=$("#validatorion_kembali :selected").text();
	document.getElementById("titletabel_kembali").innerHTML=msgvalidator;
	ajaxProccess(validator,4,'dataUserKembali');
}else if(obj==3){
	var	validator=$("#validatorion_inpassing :selected").val();
	var	msgvalidator=$("#validatorion_inpassing :selected").text();
	document.getElementById("titletabel_inpassing").innerHTML=msgvalidator;
	ajaxProccess(validator,3,'dataUserInpassing');
}
}
$(document).ready(function(){
	searchData(1);
});

function ajaxProccess(obj,type,table_dt){
	var table;
	      table = $('#'+table_dt).DataTable({
	              "processing": false, //Feature control the processing indicator.
	               "destroy": true,
	              "serverSide": true, //Feature control DataTables' server-side processing mode.
	              "order": [], //Initial no order.
	              // Load data for the table's content from an Ajax source
	              "ajax": {
	                  "url": '<?php echo base_url('sertifikasi/fasilitas/Home/loadData/')?>'+obj+'/'+type,
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
	              ],

	          });
}
function loadData(obj){
	// $('#dataUserpertama').DataTable().ajax.reload();
	searchData(1);
	searchData(2);
	searchData(3);
	searchData(4);
	//$('#dataUserPerpindahan').DataTable().ajax.reload();
	// loadDataperpindahan();

}
function action(obj1){

	$.ajax({
			url : "<?php echo base_url('sertifikasi/fasilitas/home/update')?>/"+obj1,
			type: "POST",
			dataType: "JSON",
			success: function(data)
			{
				if(data.msg=='success'){
						loadData(1);
					}else{
						alert('gagal update');
					}
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
					 alert('gagal update');

			}
	});
}

</script>
