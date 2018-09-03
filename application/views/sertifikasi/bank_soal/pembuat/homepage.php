<div class="clearfix"></div>
<h1 class="text-primary">Manajemen Soal</h1>
	<div class="info">
		<p style="color:#777;"> Ujian Sertifikasi - Pembuat Soal <i class="fa fa-book"></i></p>
	</div>
<br><br>
<div class="container">
	<div class="" role="tabpanel" data-example-id="togglable-tabs" style="background:#fff !important;">
		<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
			<!-- <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Bank Soal</a>
			</li> -->
			<li role="presentation" class="active"><a href="#tab_content1" role="tab"   id="home-tab" data-toggle="tab" aria-expanded="true">Buat Soal</a>
			</li>
			<li role="presentation" class=""><a href="#tab_content2" role="tab" onclick="loadDatareview('review','tablereview')"  id="profile-tab2" data-toggle="tab" aria-expanded="false">Tinjau Soal</a>
			</li>
			 <li role="presentation" class=""><a href="#tab_content3" role="tab"  id="profile-tab3"  onclick="loadDatareview('reviewResult','tablereviewsoal')"data-toggle="tab" aria-expanded="false">Hasil Tinjau Soal</a>
			</li>
			<!--<li role="presentation" class=""><a href="#tab_content4" role="tab"  id="profile-tab3"  onclick="loadsoalkasus()"data-toggle="tab" aria-expanded="false">Materi Soal Kasus</a>
			</li> -->
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
				<button class="btn btn-primary" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Segarkan</button>
			 <!-- <button onclick="getModal(this)" id="btn-search-soal" data-href="<?php //echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_search_datatable"; ?>"
					 data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Search from Mata Ajar</button> -->
				 </div>

				<div class="x_content">
					<div class="row">
						<div class="col-lg-12" id="response">
							<!-- <h2 style="font-weight:1000;color:#000">Table Bank Soal ALL</h2> -->
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">



			<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
							<tr>
									<th>No</th>
									<th>BAB Mata Ajar</th>
									<th>Tipe Soal</th>
									<th>Tanggal Permintaan</th>
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
<div role="tabpanel" class="tab-pane fade in" id="tab_content2" aria-labelledby="home-tab" >
<div  class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<!-- <div style="float:right"> -->
			<!-- <button onclick="getModal(this)" id="btn-add-soal" data-href="<?php //echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_add_kode_soal"; ?>"
					data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Buat Kode Soal</button>
		 </div> -->
		<div class="x_content">
			<div class="row">
				<!-- <div class="col-lg-12" id="response">
					<h2 style="font-weight:1000;color:#000">Table Kode Soal</h2>
				</div> -->
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
	<table id="tablereview" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
					<tr>
						<th>No</th>
						<th>BAB Mata Ajar</th>
						<th>Tipe Soal</th>
						<th>Tanggal Permintaan</th>
						<th>Jumlah Soal</th>
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
				<!-- <button class="btn btn-primary" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button> -->
			 <!-- <button onclick="getModal(this)" id="btn-search-soal" data-href="<?php //echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_search_datatable"; ?>"
					 data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Search from Mata Ajar</button> -->
				 <!-- </div> -->

				<div class="x_content">
					<div class="row">
						<div class="col-lg-12" id="response">
							<!-- <h2 style="font-weight:1000;color:#000">Table Bank Soal ALL</h2> -->
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">



			<table id="tablereviewsoal" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
							<tr>
									<th>No</th>
									<th>BAB Mata Ajar</th>
									<th>Tipe Soal</th>
									<th>Tanggal Permintaan</th>
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
<!-- <div role="tabpanel" class="tab-pane fade in" id="tab_content3" aria-labelledby="home-tab" >
<div  class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">

		<div class="x_content">
			<div class="row">
				<div class="col-lg-12" id="response">
					<h2 style="font-weight:1000;color:#000">Table Publish Kode Soal</h2>
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
							<th>Action</th>
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
</div> -->
<!-- <div role="tabpanel" class="tab-pane fade in" id="tab_content4" aria-labelledby="home-tab" >
<div  class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div style="float:right">
			<button onclick="getModal(this)" id="btn-add-soal" data-href="<?php //echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_add_soal_kasus"; ?>"
					data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Buat Materi Soal Kasus</button>
		 </div>
		<div class="x_content">
			<div class="row">
				<div class="col-lg-12" id="response">
					<h2 style="font-weight:1000;color:#000">Table Kode Soal</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
	<table id="tabelsoalkasus" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
					<tr>
							<th>No</th>
							<th>Soal Kasus</th>
							<th>Mata Ajar</th>
							<th>Bab Mata Ajar</th>
							<th>Kode Kasus</th>
							<th>Action</th>
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
</div> -->
</div>
</div>




			<!-- <button onclick="getModal(this)" id="btn-distribusi-soal" data-href="<?php //echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_distribusi_soal"; ?>" data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-cog"></i> Distribusi Soal</button> -->
		<!-- <div class="" role="tabpanel" data-example-id="togglable-tabs" style="background:#fff !important;">



</div> -->
<script type="text/javascript">
	var save_method;
  var table;


	$(document).ready(function() {
		// alert();
		var tugas='pembuat_soal';



	table=	$('#table').DataTable({
			"processing": true,
			"serverSide": true,
			 "destroy": true,
			"order": [],
			"ajax": {
				"url": '<?php echo base_url('sertifikasi')."/bank_soal/permintaan/loadPermintaan/"; ?>',
				"type": "POST",
				"data": { tugas: tugas },
			},
			"columnDefs": [
			{
				"targets": [ -1 ],
				"orderable": false
			},
			],
		});
	}
);

	function loadData(obj)
	{

		table.ajax.reload(null,false);
		loadDatareview('review','tablereview');
	}

 function loadDatareview(tugas,table){
	table= $('#'+table).DataTable({
		 "processing": true,
		 "serverSide": true,
		  "destroy": true,
		 "order": [],
		 "ajax": {
			 "url": '<?php echo base_url('sertifikasi')."/bank_soal/permintaan/loadPermintaan/"; ?>',
			 "type": "POST",
			 "data": { tugas: tugas },
		 },
		 "columnDefs": [
		 {
			 "targets": [ -1 ],
			 "orderable": false
		 },
		 ],
	 });
 }

	function update_data(id,tugas)
	{

					// ajax delete data to database
					$.ajax({
							url : "<?php echo base_url('sertifikasi/bank_soal/permintaan/review')?>",
							type: "POST",
							dataType: "JSON",
							data:{ id: id, tugas: tugas },
							success: function(data)
							{
								if(data.msg=='success'){
									swal("Success", "Data Publish Successfully!", "success");
								}else{
									swal("Error", "Data gagal dikirim!", "error");
								}

							 loadData(1);
							},

					});

	}
</script>
