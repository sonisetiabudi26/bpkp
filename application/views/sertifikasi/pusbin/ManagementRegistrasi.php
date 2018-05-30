<div class="page-title">
	<div class="title_left">
		<h3>Management Registrasi</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="" role="tabpanel" data-example-id="togglable-tabs" style="background:#fff !important;">
	<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
		<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Monitoring Peserta</a>
		</li>
		<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Jadwal Ujian</a>
		</li>
		<li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Management Kebutuhan Soal</a>
		</li>
	</ul>
	<div id="myTabContent" class="tab-content" style="background:#fff;">
		<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab" >
			<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">

								<div class="x_content">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					            <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>NIP</td>
													<td>Nama</td>
													<td>Unit Kerja</td>
													<td>Jenjang</td>
													<td>Mata Pelajaran</td>
													<td>Lokasi Ujian</td>
												</tr>
												</thead>
												<tbody id="dataPeserta">
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
					            <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>Category</td>
													<td>Start Date</td>
													<td>End Date</td>
													<td>Status</td>
												</tr>
												</thead>
												<tbody id="datajadwal">
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
					            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>NIP</td>
													<td>Nama</td>
													<td>Unit Kerja</td>
													<td>Jenjang</td>
													<td>Mata Pelajaran</td>
													<td>Lokasi Ujian</td>
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
loadData();
function loadData(){

		document.getElementById("dataPeserta").innerHTML='';

  $.ajax({
      type  : 'ajax',
      url   :  "<?php echo base_url('sertifikasi/pusbin/ManagementRegistrasi/loadData/')?>",
      async : false,
      dataType : 'json',
      success : function(data){

				var nip='';
				var a=1;
				data.forEach(function(resp) {

           $("#dataPeserta").append("<tr><td>" + a + "</td>"+
					 "<td>" + (resp.nip != nip ? resp.nip : '') + "</td>"+
					 "<td>" + (resp.nip != nip ? resp.nama : '') + "</td>"+
					  "<td>" + (resp.nip != nip ? resp.unitkerja : '') + "</td>"+
						"<td>" + (resp.nip != nip ? resp.jenjang : '') + "</td>"+
					 "<td> unknown (comming soon) </td>"+
					 // "<td>" + (resp.nip != nip ? resp.start + " - "+ resp.END_DATE  : '')+"</td>"+
					 "<td>" + (resp.nip != nip ? resp.provinsi : '') + "</td>"+
					 "</tr>");
					 nip=resp.NIP;
					 a++;
			  });
      }
	});
	loadDatajadwal();
}
function loadDatajadwal(){

		document.getElementById("datajadwal").innerHTML='';
		var currentdate = new Date();
		var datetime =  currentdate.getFullYear() + "-"
		                + ("0" + (currentdate.getMonth() + 1)).slice(-2)  + "-"
		                + currentdate.getDate();
  $.ajax({
      type  : 'ajax',
      url   :  "<?php echo base_url('sertifikasi/pusbin/ManagementRegistrasi/loadDataJadwal/')?>",
      async : false,
      dataType : 'json',
      success : function(data){


				var a=1;
				data.forEach(function(resp) {

           $("#datajadwal").append("<tr><td>" + a + "</td>"+
					 "<td>" + resp.CATEGORY + "</td>"+
					 "<td>" + resp.START_DATE + "</td>"+
					  "<td>" + resp.END_DATE + "</td>"+
					 "<td>" + (resp.START_DATE < datetime ? 'Expired' : 'Available') + "</td>"+
					 "</tr>");

					 a++;
			  });
      }
	});
}

</script>
