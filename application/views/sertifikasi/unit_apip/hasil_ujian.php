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
            <table id="dataResult" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
							<tr>
								<td>NIP</td>
								<td>NAMA</td>
								<td>Mata Pelajaran</td>
								<td>Status</td>
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
<script>
$(document).ready(function() {
	var example_table = $('#dataResult').DataTable({

		"processing": false, //Feature control the processing indicator.
		 "destroy": true,
		"serverSide": true, //Feature control DataTables' server-side processing mode.
		"order": [], //Initial no order.
		// Load data for the table's content from an Ajax source
		"ajax": {
			"url"    : '<?php echo base_url('sertifikasi/unit_apip/KomponenNilai/loadData/')?>',
			"type": "POST"
		},
		'columns': [
			{"data": "0",width:50},
			{"data": "1",width:100},
			{"data": "2",width:100},
			{"data": "3",width:100},
		]
		});
});
</script>
