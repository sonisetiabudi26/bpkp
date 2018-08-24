<!-- <div class="page-title">
	<div class="title_left">
		<h3>Registrasi Perwakilan BPKP</h3>
	</div>
</div>
<div class="clearfix"></div> -->
<div class="row" >
  <div class="col-lg-6">
    <div class="title_left">
      <h3>Management PERTEK</h3>
    </div>
  </div>
  <div class="col-lg-6" style="padding-top:10px;">
</div>
</div><br/>
<div class="clearfix"></div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <table id="dataPertek" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
							<tr>
								<td>No</td>
								<td>No Surat</td>
								<td>Doc Pertek</td>
                <td>Doc Angka Kredit</td>
                <td>No Resi</td>
                <td>Jumlah Peserta</td>
                <td>Action</td>
							</tr>
							</thead>

							</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        dataPertek(); //call function show all product
      });
        //function show all product
        function dataPertek(){
        var table;
              table = $('#dataPertek').DataTable({
                      "processing": false, //Feature control the processing indicator.
                       "destroy": true,
                      "serverSide": true, //Feature control DataTables' server-side processing mode.
                      "order": [], //Initial no order.
                      // Load data for the table's content from an Ajax source
                      "ajax": {
                          "url": '<?php echo base_url('sertifikasi/fasilitas/ManagementPertek/loadData/')?>',
                          "type": "POST"
                      },
                      //Set column definition initialisation properties.
                      "columns": [
                          {"data": "0",width:50},
                          {"data": "1",width:100},
                          {"data": "2",width:100},
                          {"data": "3",width:100},
        									{"data": "4",width:100},
                          {"data": "5",width:100},
                          {"data": "6",width:100},

                      ],

                  });
        				}
function loadData(obj){
  dataPertek();
}

</script>
