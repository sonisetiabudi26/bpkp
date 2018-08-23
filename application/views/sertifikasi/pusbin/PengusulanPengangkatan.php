<div class="page-title">
	<div class="title_left">
		<h3>Pengusulan Pengangkatan</h3>
	</div>
</div>
<div class="clearfix"></div>


    		<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">

								<div class="x_content">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					            <table id="datatable-responsive"  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>NIP Unit Apip</td>
													<td>Unit Kerja</td>
													<td>Jumlah Category</td>
													<td>Jumlah Peserta</td>
                          <td>Validator</td>
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
      <script>
      $(document).ready(function() {



      		//document.getElementById("datatable-responsive").innerHTML='';
      		var example_table = $('#datatable-responsive').DataTable({
        'ajax': {
          "type"   : "POST",
          "url"    : '<?php echo base_url('sertifikasi/pusbin/PengusulanPengangkatan/loadData/')?>',
          "dataSrc": ""
        },
        'columns': [
          {"data" : "no"},
          {"data" : "nipunitapip"},
          {"data" : "unitapip"},
          {"data" : "jml_category"},
      		{"data" : "jml_peserta"},
          {"data" : "validator"},
      		{"data" : "action"}
        ]
      });
		
});
		function loadData(obj){
			$('#datatable-responsive').DataTable().ajax.reload();
		}
      </script>
