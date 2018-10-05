<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel" style="border:none">
			<div class="x_content">
				<div class="panel panel-default">
					<div class="panel-heading">Input nilai dasar widyaiswara
					</div>
						<div class="panel-body" id="pindahlokasi" >
  					<form>
							<input name='id_regis' id='id_regis' value='<?php echo $id_regis?>' style="visibility:hidden;"/>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
							<div class="row">
							<div class="form-group">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<span class="" name='nomor' id="nomor"><i class="fa fa-file"></i>
										Nomor Sertifikat
									</span>
								</div>
							<div class="col-lg-8 col-md-8 col-sm-8">
								 <input type="text" readonly class="form-control text-primary" name="nomor_val" id="nomor_val" value="<?php echo $nomor?>" placeholder="No sertifikat" />
							 </div>
						 </div>
					 </div>
					 <div class="row">
						 <div class="form-group">
							 <div class="col-lg-4 col-md-4 col-sm-4">
								 <span class="" name='a_n' id="a_n"><i class="fa fa-file"></i>
									 Atas Nama Jabatan Kepala
								 </span>
							 </div>
						 <div class="col-lg-8 col-md-8 col-sm-8">
								<input type="text" class="form-control text-primary" name="a_n_val" id="text-a_n_val" placeholder="Atas nama kepala jabatan" />
							</div>
						</div>
					</div>
          <div class="row">
          <div class="form-group">
            <div class="col-lg-4 col-md-4 col-sm-4">
              <span class="" name='nama_kepala' id="nama_kepala"><i class="fa fa-file"></i>
              Nama Kepala
              </span>
            </div>
              <div class="col-lg-8 col-md-8 col-sm-8">
                 <input type="text" class="form-control text-primary" name="nama_kepala_val" id="nama_kepala_val" placeholder="Nama Kepala" />
               </div>
             </div>
           </div>
           <div class="row">
           <div class="form-group">
             <div class="col-lg-4 col-md-4 col-sm-4">
               <span class="" name='nip_kepala' id="nip_kepala"><i class="fa fa-file"></i>
                 NIP Kepala
               </span>
             </div>
           <div class="col-lg-8 col-md-8 col-sm-8">
              <input type="text" class="form-control text-primary" name="nip_kepala_val" id="nip_kepala_val" placeholder="NIP Kepala" />
            </div>
          </div>
        </div>
            <div class="row">
            <div class="form-group">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <span class="" name='nama_kepala' id="nama_kepala"><i class="fa fa-file"></i>
                  Nama Kepala Pusat
                </span>
              </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
               <input type="text" class="form-control text-primary" name="nama_kepala_pusat_val" id="nama_kepala_pusat_val" placeholder="Nama Kepala Pusat" />
             </div>
           </div>
         </div>
         <div class="row">
         <div class="form-group">
           <div class="col-lg-4 col-md-4 col-sm-4">
             <span class="" name='nip_kepala' id="nip_kepala"><i class="fa fa-file"></i>
               NIP Kepala Pusat
             </span>
           </div>
         <div class="col-lg-8 col-md-8 col-sm-8">
            <input type="text" class="form-control text-primary" name="nip_kepala_pusat_val" id="nip_kepala_pusat_val" placeholder="NIP Kepala Pusat" />
          </div>
        </div>
        </div>
          <!-- <br/>
					<div class="row">
						<div class="col-lg-12">
					<button class="btn btn-primary" style="float:right"><i class="fa fa-paper-plane"></i> Ajukan</button>
				</div>
				</div> -->
						</div>
					</div>
				</form>
				</div>
			</div>


				<hr>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <h4>Edit Nilai</h4>
						<table id="Data_sertifikat" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<td>No</td>
									<td>NAMA MATA AJAR</td>
									<td>NILAI</td>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<button class="btn btn-primary send"  style="width:100%;"><i class="fa fa-paper-plane"></i> Buat Sertifikat</button>
				</div>
			</div>
		</div>
	</div>

</div>
<script>
$(document).ready(function(){
var id_regis="<?php echo $id_regis?>";
var table;

			table = $('#Data_sertifikat').DataTable({
              "processing": false, //Feature control the processing indicator.
							"destroy": true,
							"pageLength" :10,
              "serverSide": true, //Feature control DataTables' server-side processing mode.
              "order": [], //Initial no order.
              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": '<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/listNilaiSertifikat/')?>'+id_regis,
                  "type": "POST"
              },
              //Set column definition initialisation properties.
              "columns": [
                  {"data": "0",width:50},
                  {"data": "1",width:100},
									{"data": "2",width:100},

              ],

          });

});
$(document).on('click', '.send', function () {
		 var data = $('input').serialize();

			$.ajax({
				data : data,
				type : 'GET',
				url : '<?php echo base_url('sertifikasi')."/pusbin/PerhitunganNilai/CreateSertifikat"; ?>',
				async: true,
				processData: false,
				contentType: false,
				cache:false,
				timeout: 600000,
				success : function(resp) {

					if(resp.status=='success'){
					 $('.modal').modal('hide');
					 location.reload();
						swal("Berhasil", "Data berhasil disimpan!", "success");
						//$("#"+formTarget.id)[0].reset();

					}else if(resp.status=='error'){
					 // $('.modal').modal('hide');
						swal("Terjadi Kesalahan", data.msg, data.status);
						//  $("#"+formTarget.id)[0].reset();

					}
						loadData(1);

				},
				error: function (e) {
					// swal('Terjadi Kesalahan',e,'error');
					console.log("ERROR : ", e);
				}

			});

	});
function loadData(obj){
	$('#Data_sertifikat').DataTable().ajax.reload();
}
// function ModalNilai(obj1){
// 	  var param=obj1.split('~');
// 	   $('#modalNilai').modal('show');
// 		 $('#id_wi').val(param[0]);
// 		 $('#nilai1_edit').val(param[1]);
// 		 $('#nilai2_edit').val(param[2]);
// }

</script>
