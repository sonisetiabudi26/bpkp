<div class="page-title">
	<div class="title_left">
		<h3 style="text-align:left">Input Nilai WI</h3>
   <!-- <div  style="text-align:left;color:#eee;"><p> Form Input Nilai <i class="fa fa-pencil"></i></p></div> -->
	</div>
</div>
<div class="clearfix"></div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
						<table id="pesertaByWI" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<td>No</td>
									<td>NIP</td>
									<td>Tanggal Release Mata Ajar</td>
									<td>Mata Pelajaran</td>
									<td>Nilai 1</td>
									<td>Nilai 2</td>
									<td>Instruktur</td>
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
	<!--modal-->
	<div class="modal fade" id="modalNilai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
			<form onsubmit="procesForm(this, 'response-text')" action="<?php echo base_url('sertifikasi')."/widyaiswara/NilaiAPI/tambah"; ?>" method="POST" id="jadwalFrom" >

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Nilai<h4>
      </div>
      <div class="modal-body">
        <div class="row">
					<div class="col-md-12" id="response-text" ></div>
            <div class="col-lg-12">

             <div class="row">
                <div class="col-lg-4">
                  <label class="control-label" for="title">Nilai 1</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" name="nilai1" id="nilai1" class="form-control" required="required" />
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-lg-4">
                  <label class="control-label" for="title">Nilai 2</label>
                </div>
								<div class="col-lg-8">
                  <input type="text" name="nilai2" id="nilai2" class="form-control" required="required" />
                </div>
            </div>


            </div>
        </div>
      </div>
      <div class="modal-footer">
				<input type="text" name="nip_m" id="nip_m" class="form-control" style="display:none;" />
				<input type="text" name="mataajar_m" id="mataajar_m" class="form-control" style="display:none;" />
				<input type="text" name="tglrelease_m" id="tglrelease_m" class="form-control" style="display:none;" />
				<input type="text" name="instruktur_m" id="instruktur_m" class="form-control" style="display:none;" />
         <input type="submit"  name="submit" id="action" value="Add" class="btn btn-info" />
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!--modal-->
</div>
<script>
$(document).ready(function(){

var table;
			table = $('#pesertaByWI').DataTable({
              "processing": false, //Feature control the processing indicator.
							"destroy": true,
              "serverSide": true, //Feature control DataTables' server-side processing mode.
              "order": [], //Initial no order.
              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": '<?php echo base_url('sertifikasi/widyaiswara/NilaiAPI/LoadDataKelasDiklat/')?>',
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
									{"data": "7",width:100}
              ],

          });
});

function ModalNilai(obj1){

	 $('#modalNilai').modal('show');
	 $('#nip_m').val(obj1);

}

</script>
