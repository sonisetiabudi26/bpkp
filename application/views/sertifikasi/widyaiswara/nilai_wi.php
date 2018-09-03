<div class="page-title">
	<div class="title_left">
		<h3 style="text-align:left">Masukan Nilai Widyaiswara</h3>
   <!-- <div  style="text-align:left;color:#eee;"><p> Form Input Nilai <i class="fa fa-pencil"></i></p></div> -->
	</div>
</div>
<div class="clearfix"></div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="panel panel-default">
					<div class="panel-heading">Input nilai dasar widyaiswara
					</div>
						<div class="panel-body" id="pindahlokasi" >
  					<form onsubmit="procesFormandUpload(this,'<?php echo base_url('sertifikasi')."/widyaiswara/Nilai/add_nilai_default"; ?>')" method="POST" id="nilai_default" >
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
							<div class="row">
							<div class="form-group">
								<div class="col-lg-4">
									<span class="" name='nilai1' id="nilai1"><i class="fa fa-file"></i>
										Nilai dasar simulasi
									</span>
								</div>
							<div class="col-lg-8">
								 <input type="text" class="form-control text-primary" name="nilai_1" id="text-loc" placeholder="Nilai Simulasi" />
							 </div>
						 </div>
					 </div>
					 <div class="row">
						 <div class="form-group">
							 <div class="col-lg-4">
								 <span class="" name='nilai2' id="nilai2"><i class="fa fa-file"></i>
									 Nilai dasar Aktifitas
								 </span>
							 </div>
						 <div class="col-lg-8">
								<input type="text" class="form-control text-primary" name="nilai_2" id="text-loc" placeholder="Nilai Activity" />
							</div>
						</div>
					</div><br/>
					<div class="row">
						<div class="col-lg-12">
					<button class="btn btn-primary" style="float:right">Ajukan</button>
				</div>
				</div>
						</div>
					</div>
				</form>
				</div>
			</div>


				<hr>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
						<table id="pesertaByWI" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<td>No</td>
									<td>NIP</td>
									<td>NAMA</td>
									<td>Tanggal Terbit Mata Ajar</td>
									<td>Mata Pelajaran</td>
									<td>Nilai Simulasi</td>
									<td>Nilai Aktivitas</td>
									<td>Instruktur</td>

								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<button class="btn btn-primary" style="width:100%;"><i class="fa fa-paper-plane"></i> Ajukan</button>
				</div>
			</div>
		</div>
	</div>
	<!--modal-->
	<div class="modal fade" id="modalNilai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
			<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/widyaiswara/NilaiAPI/tambah"; ?>')" method="POST" id="nilai_edit_wi" >

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
                  <label class="control-label" for="title">Nilai Simulasi</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" name="nilai1_edit" id="nilai1_edit" class="form-control" required="required" />
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-lg-4">
                  <label class="control-label" for="title">Nilai Aktivitas</label>
                </div>
								<div class="col-lg-8">
                  <input type="text" name="nilai2_edit" id="nilai2_edit" class="form-control" required="required" />
                </div>
            </div>


            </div>
        </div>
      </div>
      <div class="modal-footer">
				<input type="text" name="id_wi" id="id_wi" class="form-control" style="display:none;" />
         <input type="submit"  name="submit" id="action" value="Ubah" class="btn btn-info" />
         <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
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
							"pageLength" :10,
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
function loadData(obj){
	$('#pesertaByWI').DataTable().ajax.reload();
}
function ModalNilai(obj1){
	  var param=obj1.split('~');
	   $('#modalNilai').modal('show');
		 $('#id_wi').val(param[0]);
		 $('#nilai1_edit').val(param[1]);
		 $('#nilai2_edit').val(param[2]);
}

</script>
