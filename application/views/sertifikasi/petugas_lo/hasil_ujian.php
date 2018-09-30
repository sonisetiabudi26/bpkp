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
		'ajax': {
			"type"   : "POST",
			"url"    : '<?php echo base_url('sertifikasi/petugas_lo/KomponenNilai/loadData/')?>',
			"dataSrc": ""
		},
		'columns': [
			{"data" : "NIP"},
			{"data" : "NAMA"},
			{"data" : "NAMA_MATA_AJAR"},
			{"data" : "STATUS"},

		]
		});



});
</script>
