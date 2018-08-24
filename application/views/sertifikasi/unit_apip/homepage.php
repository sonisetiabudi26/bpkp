<div class="page-title">
	<div class="title_left">
		<h3>Dashboard UNIT APIP</h3>
	</div>
</div>
<div class="clearfix"></div>

<div class="row">
	<div class="row">

			<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>IKUT DIKLAT</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h3>5 Orang</h3>
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>IKUT UJIAN</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h3>4 Orang</h3>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>DATA AUDITOR TAMPIL</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h3>1 Orang</h3>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>AUDITOR INPASSING</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h3>0 Orang</h3>
							</div>

						</div>
					</div>
				</div>
			</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<h4>Daftar Peserta Ujian</h4>
			<div class="x_content">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
							<tr>
								<td>No</td>
								<td>NIP</td>
								<td>Nama</td>
								<td>Kode Diklat</td>
								<td>Unit/ Instansi</td>
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
<script>
$(document).ready(function() {



		//document.getElementById("datatable-responsive").innerHTML='';
		table = $('#datatable-responsive').DataTable({
						"processing": false, //Feature control the processing indicator.
						 "destroy": true,
						"serverSide": true, //Feature control DataTables' server-side processing mode.
						"order": [], //Initial no order.
						// Load data for the table's content from an Ajax source
						"ajax": {
								"url": '<?php echo base_url('sertifikasi/unit_apip/Home/loadData/')?>',
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

function cetak(){
	swal('Under Maintenance','','warning');
}
</script>
