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
<!-- <div class="page-title">
	<div class="title_left">
		<h3>Dashboard UNIT APIP</h3>
	</div>
</div>
<div class="clearfix"></div> -->
<br>
<div class="row" >
	<div class="col-sm-12" style="border-bottom:0.4px solid #ddd">
	<span style="color:#666;font-size:14px"><b>Data Umum Unit APIP</b></span>
</div>
</div>
<br>
<div class="row">
	<div class="col-sm-6">
		<div class="card" style="background:#D7768F">
			<div class="card-body">
				<div class="col-lg-1">
					<label style="font-size:45px;color:#fff"><i class="fa fa-users"></i></label>
				</div>
				<div class="col-lg-11">
					<h5 class="card-title"><b>Auditor Dokumen Belum Lengkap (Pengusulan Pengangkatan)</b></h5>
					<h2 class="card-text"><?php echo $dokumen_belum_lengkap?> ORANG</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="card" style="background:#E7B18C">
			<div class="card-body">
				<div class="col-lg-1">
					<label style="font-size:45px;color:#fff"><i class="fa fa-users"></i></label>
				</div>
				<div class="col-lg-11">
				<h5 class="card-title"><b>IKUT UJIAN</b></h5>
				<h2 class="card-text"><?php echo $ikut_ujian ?> ORANG</h2>
			</div>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row" >
	<div class="col-sm-12" style="border-bottom:0.4px solid #ddd">
	<span style="color:#666;font-size:14px"><b>Data Pengusulan Pengangkatan</b></span>
</div>
</div>
<br>
<div class="row">
	<div class="col-sm-3">
		<div class="card" style="background:#8E87A4">
			<div class="card-body">
				<div class="col-lg-2">
					<label style="font-size:45px;color:#fff"><i class="fa fa-users"></i></label>
				</div>
				<div class="col-lg-10">
				<h5 class="card-title"><b>AUDITOR PERTAMA</b></h5>
				<h2 class="card-text"><?php echo $pertama?> ORANG</h2>
			</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card" style="background:#76B5D7">
			<div class="card-body">
				<div class="col-lg-2">
					<label style="font-size:45px;color:#fff"><i class="fa fa-users"></i></label>
				</div>
				<div class="col-lg-10">
				<h5 class="card-title"><b>AUDITOR INPASSING</b></h5>
				<h2 class="card-text"><?php echo $inpassing?> ORANG</h2>
			</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card" style="background:#59BBAE">
			<div class="card-body">
				<div class="col-lg-2">
					<label style="font-size:45px;color:#fff"><i class="fa fa-users"></i></label>
				</div>
				<div class="col-lg-10">
				<h5 class="card-title"><b>AUDITOR PERPINDAHAN</b></h5>
				<h2 class="card-text"><?php echo $perpindahan?>  ORANG</h2>
			</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card" style="background:#60BF6B">
			<div class="card-body">
				<div class="col-lg-2">
					<label style="font-size:45px;color:#fff"><i class="fa fa-users"></i></label>
				</div>
				<div class="col-lg-10">
				<h5 class="card-title"><b>AUDITOR KEMBALI</b></h5>
				<h2 class="card-text"><?php echo $kembali?> ORANG</h2>
			</div>
			</div>
		</div>
	</div>
</div>
<br/><br>
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

	$.ajax({
			type  : 'ajax',
			url   :  "<?php echo base_url('sertifikasi/unit_apip/home/print_kartu/')?>",
			async : false,
			dataType : 'json',
			success : function(data){

			}

	});
	//swal('Under Maintenance','','warning');
}
</script>
