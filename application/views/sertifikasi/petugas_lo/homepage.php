<style>
	.card,.x_panel{
		padding:10px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	.card-title{
		color:#fff;
	}
	.card-text{
		color:#fff;
	}
	.card-body{
		height:70px;
	}
</style>
<div class="page-title">
	<div class="title_left">
		<h3>Dashboard Petugas LO</h3>
	</div>
</div>
<div class="clearfix"></div>

<!-- <div class="row"> -->
	<!-- <div class="row">

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
</div> -->
<div class="row">
	<div class="col-sm-3">
		<div class="card" style="background:#D7768F">
			<div class="card-body">
				<div class="col-lg-2">
					<label style="font-size:45px;color:#fff"><i class="fa fa-file-o"></i></label>
				</div>
				<div class="col-lg-10">
					<h5 class="card-title"><b>IKUT DIKLAT</b></h5>
					<h2 class="card-text">6 ORANG</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card" style="background:#76B5D7">
			<div class="card-body">
				<div class="col-lg-2">
					<label style="font-size:45px;color:#fff"><i class="fa fa-file-o"></i></label>
				</div>
				<div class="col-lg-10">
				<h5 class="card-title"><b>IKUT UJIAN</b></h5>
				<h2 class="card-text">12 ORANG</h2>
			</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card" style="background:#60BF6B">
			<div class="card-body">
				<div class="col-lg-2">
					<label style="font-size:45px;color:#fff"><i class="fa fa-file-o"></i></label>
				</div>
				<div class="col-lg-10">
				<h5 class="card-title"><b>DATA AUDITOR TAMPIL</b></h5>
				<h2 class="card-text">9 ORANG</h2>
			</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card" style="background:#59BBAE">
			<div class="card-body">
				<div class="col-lg-2">
					<label style="font-size:45px;color:#fff"><i class="fa fa-file-o"></i></label>
				</div>
				<div class="col-lg-10">
				<h5 class="card-title"><b>AUDITOR INPASSING</b></h5>
				<h2 class="card-text">6 ORANG</h2>
			</div>
			</div>
		</div>
	</div>
</div>
<br/>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel" style="border:none">
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
<!-- </div> -->
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
								"url": '<?php echo base_url('sertifikasi/petugas_lo/Home/loadData/')?>',
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

	$.ajax({
			type  : 'ajax',
			url   :  "<?php echo base_url('sertifikasi/petugas_lo/home/print_kartu/')?>",
			async : false,
			dataType : 'json',
			success : function(data){

			}

	});
	//swal('Under Maintenance','','warning');
}
</script>
