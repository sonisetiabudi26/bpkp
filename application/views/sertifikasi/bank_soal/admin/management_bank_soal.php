<div class="clearfix"></div>
<h1 class="text-primary">Manajemen Soal</h1>
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
				<!-- <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Bank Soal</a>
				</li> -->
				<li role="presentation" class="active"><a href="#tab_content1" role="tab" onclick="loadDataBabMataAjar()" id="home-tab" data-toggle="tab" aria-expanded="true">Bab Soal</a>
				</li>
				<li role="presentation" class=""><a href="#tab_content2" role="tab" onclick="loadDatakodeSoal()"  id="profile-tab2" data-toggle="tab" aria-expanded="false">Kode Soal</a>
				</li>
				<li role="presentation" class=""><a href="#tab_content3" role="tab"  id="profile-tab2"  onclick="loadDatakodeSoalpublish()"data-toggle="tab" aria-expanded="false">Terbitkan Kode Soal</a>
				</li>
				<li role="presentation" class=""><a href="#tab_content4" role="tab"  id="profile-tab3"  onclick="loadDataSemuaSoal()"data-toggle="tab" aria-expanded="false">Semua Soal</a>
				</li>

			</ul>
			<div id="myTabContent" class="tab-content" style="background:#fff;">
				<!-- <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab" >
				<div  class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div style="float:right">
							<button class="btn btn-primary" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
						 <button onclick="getModal(this)" id="btn-search-soal" data-href="<?php //echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_search_datatable"; ?>"
								 data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Search from Mata Ajar</button>
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
												<th>ID Soal</th>
		                    <th>Pertanyaan</th>
		                    <th>Pilihan 1</th>
		                    <th>Pilihan 2</th>
		                    <th>Pilihan 3</th>
		                    <th>Pilihan 4</th>

							<th>Soal Kasus</th>
		                    <th>Action</th>
		                </tr>
		            </thead>
		            <tbody style="color:#333;">
		            </tbody>
		            <tfoot>
		            <tr>
									  <th>ID Soal</th>
		                <th>Pertanyaan</th>
		                <th>Pilihan 1</th>
		                <th>Pilihan 2</th>
		                <th>Pilihan 3</th>
		                <th>Pilihan 4</th>

						<th>Soal Kasus</th>
						<th>Action</th>
		            </tr>
		            </tfoot>
		        </table>
		    </div>
			</div>
		</div>
		</div>
		</div>
		</div>
</div> -->
<div role="tabpanel" class="tab-pane active fade in" id="tab_content1" aria-labelledby="home-tab" >
<div  class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div style="float:right">
				<button onclick="getModal(this)" id="btn-add-bab-soal" data-href="<?php echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_add_bab_mata_ajar"; ?>"
						data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Buat Bab Soal</button>
			 </div>
			<div class="x_content">
				<div class="row">
					<div class="col-lg-12" id="response">
						<h2 style="font-weight:1000;color:#000">Table Bab Mata Ajar</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
		<table id="tableBabMataAjar" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
						<tr>
								<th>No</th>
								<th>Diklat</th>
								<th>Mata Ajar</th>
								<th>Bab Mata Ajar</th>
								<th>Tindakan</th>
						</tr>
				</thead>
				<tbody></tbody>
		</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div role="tabpanel" class="tab-pane fade in" id="tab_content2" aria-labelledby="home-tab" >
<div  class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div style="float:right">
				<button onclick="getModal(this)" id="btn-add-kode-soal" data-href="<?php echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_add_kode_soal"; ?>"
						data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Buat Kode Soal</button>
			 </div>
			<div class="x_content">
				<div class="row">
					<div class="col-lg-12" id="response">
						<h2 style="font-weight:1000;color:#000">Tabel Kode Soal</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
		<table id="tableKodeSoal" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
						<tr>
								<th>No</th>
								<th>Kode Soal</th>
								<th>Mata Ajar</th>
								<th>Jumlah Kebutuhan Soal</th>
								<th>Tindakan</th>
						</tr>
				</thead>
				<tbody></tbody>
		</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div role="tabpanel" class="tab-pane fade in" id="tab_content3" aria-labelledby="home-tab" >
<div  class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<!-- <div style="float:right">
				<button onclick="getModal(this)" id="btn-add-soal" data-href="<?php //echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_add_kode_soal"; ?>"
						data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Buat Kode Soal</button>
			 </div> -->
			<div class="x_content">
				<div class="row">
					<div class="col-lg-12" id="response">
						<h2 style="font-weight:1000;color:#000">Table Penerbitaan Kode Soal</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
		<table id="tableKodeSoalpublish" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
						<tr>
								<th>No</th>
								<th>Kode Soal</th>
								<th>Mata Ajar</th>
								<th>Jumlah Kebutuhan Soal</th>
								<th>Publish</th>
								<th>Tindakan</th>
						</tr>
				</thead>
				<tbody></tbody>
		</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div role="tabpanel" class="tab-pane fade in" id="tab_content4" aria-labelledby="home-tab" >
<div  class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<!-- <div style="float:right">
				<button onclick="getModal(this)" id="btn-add-soal" data-href="<?php //echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_add_kode_soal"; ?>"
						data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Buat Kode Soal</button>
			 </div> -->
			<div class="x_content">
				<div class="row">
					<div class="col-lg-12" id="response">
						<h2 style="font-weight:1000;color:#000">Table Semua Soal</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
		<table id="tablesemuasoal" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
						<tr>
								<th>No</th>
								<th>Pertanyaan</th>
								<th>Pilihan 1</th>
								<th>Pilihan 2</th>
								<th>Pilihan 3</th>
								<th>Pilihan 4</th>
								<th>Pilihan 5</th>
								<th>Pilihan 6</th>
								<th>Pilihan 7</th>
								<th>Pilihan 8</th>
								<th>Jawaban</th>
								<th>Tindakan</th>
						</tr>
				</thead>
				<tbody></tbody>
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
	<?php
		if(isset($_POST['fk_bab_mata_ajar'])){
	?>
			var url = "<?php echo base_url('sertifikasi')."/bank_soal/managementbanksoal/datatable_list_soal/".$_POST['fk_bab_mata_ajar']; ?>";
	<?php
		}else{
		?>
			var url = "<?php echo base_url('sertifikasi')."/bank_soal/managementbanksoal/datatable_list_soal"; ?>";
		<?php
		}
	?>

	$(document).ready(function() {

						table = $('#tableBabMataAjar').DataTable({
			              "processing": false, //Feature control the processing indicator.
										 "destroy": true,
			              "serverSide": true, //Feature control DataTables' server-side processing mode.
			              "order": [], //Initial no order.
			              // Load data for the table's content from an Ajax source
			              "ajax": {
			                  "url": '<?php echo base_url('sertifikasi/bank_soal/managementbanksoal/loadBabMataAjar/')?>',
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
		loadDatakodeSoal();
		loadDatakodeSoalpublish();
		loadDataSemuaSoal();

	}

	function loadDatakodeSoal(){
					table = $('#tableKodeSoal').DataTable({
		              "processing": false, //Feature control the processing indicator.
									 "destroy": true,
		              "serverSide": true, //Feature control DataTables' server-side processing mode.
		              "order": [], //Initial no order.
		              // Load data for the table's content from an Ajax source
		              "ajax": {
		                  "url": '<?php echo base_url('sertifikasi/bank_soal/managementbanksoal/loadKodeSoal/')?>',
		                  "type": "POST"
		              },
		              //Set column definition initialisation properties.
		              "columns": [
		                  {"data": "0",width:10},
		                  {"data": "1",width:100},
		                  {"data": "2",width:100},
											{"data": "3",width:50},
											{"data": "4",width:150},
		              ],

		          });
	}
	function loadDataSemuaSoal(){
					table = $('#tablesemuasoal').DataTable({
									"processing": false, //Feature control the processing indicator.
									 "destroy": true,
									"serverSide": true, //Feature control DataTables' server-side processing mode.
									"order": [], //Initial no order.
									// Load data for the table's content from an Ajax source
									"ajax": {
											"url": '<?php echo base_url('sertifikasi/bank_soal/managementbanksoal/loadSemuaSoal/')?>',
											"type": "POST"
									},
									//Set column definition initialisation properties.
									"columns": [
											{"data": "0",width:10},
											{"data": "1",width:100},
											{"data": "2",width:100},
											{"data": "3",width:100},
											{"data": "4",width:100},
											{"data": "5",width:100},
											{"data": "6",width:100},
											{"data": "7",width:100},
											{"data": "8",width:100},
											{"data": "9",width:100},
											{"data": "10",width:100},
											{"data": "11",width:100},
									],

							});
	}

	function loadDatakodeSoalpublish(){
					table = $('#tableKodeSoalpublish').DataTable({
									"processing": false, //Feature control the processing indicator.
									 "destroy": true,
									"serverSide": true, //Feature control DataTables' server-side processing mode.
									"order": [], //Initial no order.
									// Load data for the table's content from an Ajax source
									"ajax": {
											"url": '<?php echo base_url('sertifikasi/bank_soal/managementbanksoal/loadKodeSoalpublish/')?>',
											"type": "POST"
									},
									//Set column definition initialisation properties.
									"columns": [
											{"data": "0",width:10},
											{"data": "1",width:100},
											{"data": "2",width:100},
											{"data": "3",width:50},
											{"data": "4",width:50},
											{"data": "5",width:150},
									],

							});
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
	function publish(id)
	{

					// ajax delete data to database
					$.ajax({
							url : "<?php echo base_url('sertifikasi/bank_soal/ManagementBankSoal/publish/')?>/"+id,
							type: "POST",
							dataType: "JSON",
							success: function(data)
							{
								if(data.msg=='success'){
									swal("Success", "Data Publish Successfully!", "success");
								}else{
									swal("Error", "Data Publish Failed!", "error");
								}

							 loadData(1);
							},

					});

	}
</script>
