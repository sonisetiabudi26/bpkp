<div class="page-title">
	<div class="title_left">
		<h3>Hasil Ujian</h3>
	</div>
</div>
<div class="clearfix"></div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">

			<div class="x_content">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
							<tr>
								<td>NIP</td>
								<td>Mata Pelajaran</td>
								<td>Status</td>
							</tr>
							</thead>
							<tbody id="dataResult">
							</tbody>
							</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {



	$.ajax({
			type  : 'ajax',
			url   :  "<?php echo base_url('sertifikasi/unit_apip/KomponenNilai/loadData/')?>",
			async : false,
			dataType : 'json',
			success : function(data){

				var nip='';
				data.forEach(function(resp) {
					for (var i = 0; i < resp.length; i++) {
						$("#dataResult").append("<tr><td>" + resp[i].NIP + "</td><td>"+resp[i].NAMA_MATA_AJAR+"</td><td>" + resp[i].STATUS  + "</td></tr>");
						nip=resp[i].NIP;
					}
				});
			}
	});


});
</script>
