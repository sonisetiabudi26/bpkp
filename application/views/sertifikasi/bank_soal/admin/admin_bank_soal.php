<div class="clearfix"></div>
<h1 class="text-primary">Permintaan Buat Soal</h1>
	<div class="info">
		<p style="color:#777;"> Ujian Sertifikasi <i class="fa fa-book"></i></p>
	</div>
<br><br>
<div class="container">
		<!-- <br/>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label>Setting Management Soal</label>
		</div>
		</div>
		<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div  style="border:dashed 1px #999; padding:5px;width:100%">
	        <button onclick="getModal(this)" id="btn-add-soal" data-href="<?php //echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_add_bab_mata_ajar"; ?>"
							data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Buat Bab Soal</button>
					<button onclick="getModal(this)" id="btn-distribusi-kodesoal" data-href="<?php //echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_distribusi_soal"; ?>" data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Buat Kode Soal</button>
					<button onclick="getModal(this)" id="btn-distribusi-soal" data-href="<?php// echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_distribusi_soal"; ?>" data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-cog"></i> Distribusi Soal</button>
	        <button class="btn btn-primary" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
					<button onclick="getModal(this)" id="btn-search-soal" data-href="<?php// echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_search_datatable"; ?>"
							data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Search from Mata Ajar</button>
			</div>
		</div>
		</div> -->
	  <br/>
			<!-- <button onclick="getModal(this)" id="btn-distribusi-soal" data-href="<?php //echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_distribusi_soal"; ?>" data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-cog"></i> Distribusi Soal</button> -->
		<div class="" role="tabpanel" data-example-id="togglable-tabs" style="background:#fff !important;">
			<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
				<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">List Permintaan Buat Soal</a>
				</li>

			</ul>
			<div id="myTabContent" class="tab-content" style="background:#fff;">
				<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab" >
				<div  class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div style="float:right">
							<button class="btn btn-primary" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
							<!-- <button class="btn btn-primary" onclick="add()"><i class="glyphicon glyphicon-plus"></i> Buat Permintaan</button> -->
						 </div>

							<div class="x_content">
								<div class="row">
									<div class="col-lg-12" id="response">
										<h2 style="font-weight:1000;color:#000">Table Bank Soal ALL</h2>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">



		        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
		            <thead>
		                <tr>
												<th>No</th>
		                    <th>Jenjang</th>
		                    <th>Mata Ajar</th>
		                    <th>Bab Mata Ajar</th>
		                    <th>Tipe Soal</th>
		                    <th>Tanggal Permintaan</th>
												<th>Jumlah Soal</th>
												<th>Status</th>
		                    <!-- <th>Action</th> -->
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
<script type="text/javascript">
	var save_method;
	var table;

			var url = "<?php echo base_url('sertifikasi')."/bank_soal/Permintaan/list_permintaan"; ?>";


	$(document).ready(function() {
		showDatatable(url);


	});

	function showDatatable(urlPar){
		table = $('#table').DataTable({
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": urlPar,
				"type": "POST"
			},
			"columnDefs": [
			{
				"targets": [ -1 ],
				"orderable": false
			},
			],
		});
	}

	function loadData(obj)
	{
		table.ajax.reload(null,false);
	}


	function delete_data(id)
	{
	    if(confirm('Are you sure delete this data?'))
	    {
	        // ajax delete data to database
	        $.ajax({
	            url : "<?php echo base_url('sertifikasi/bank_soal/ManagementBankSoal/delete/')?>/"+id,
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
