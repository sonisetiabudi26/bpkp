
<div class="right_col" role="main">
  <div class="row">
    <div class="col-lg-12" id="ujian">
          <div style="width:100%;min-height:500px;padding:5px;border-radius:3px;background: rgba(255, 255, 255, 0.7);">
              <div class="row" style="padding:10px;">
                <h3>List Ujian Online</h3>
              </div>
              <div  class="row">
            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            			<div class="x_panel" style="border:none;background:transparent">
            				<div class="x_content">
            					<div class="row">
            						<div class="col-lg-12" id="response">
            							<!-- <h2 style="font-weight:1000;color:#000">Table Bank Soal ALL</h2> -->
            						</div>
            					</div>
            					<div class="row">
            						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                      			<table id="table" class="table table-bordered" cellspacing="0" width="100%">
                      					<thead>
                      							<tr>
                      									<th>No</th>
                      									<th>Mata Ajar</th>
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
    </div>
  </div>
</div>
<script type="text/javascript">
	var save_method;
  var table;


	$(document).ready(function() {
		var tugas='pembuat_soal';

	table=	$('#table').DataTable({
			"processing": true,
			"serverSide": true,
			 "destroy": true,
			"order": [],
			"ajax": {
				"url": '<?php echo base_url('ujian')."/ujiansertifikasi/loadListUjian/"; ?>',
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
	});
loadData(obj){
  $('#table').DataTable().ajax.reload();
}
</script>
