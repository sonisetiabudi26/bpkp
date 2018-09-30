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
    <!-- <button onclick="ModalNilai(1)"></button> -->
    	<div class="x_content" >
        <div class="panel panel-default" style="padding:20px;">
      <table id="list_wi" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <td>No</td>
            <td>Tanggal Terbit Mata Ajar</td>
            <td>Mata Pelajaran</td>
            <td>Tindakan</td>
            <!-- <td>Instruktur</td> -->

          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    </div>
	</div>
	<!--modal-->
	<div class="modal fade" id="modalNilai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">


      <div class="modal-header">
        <a type="button" class="close" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">×</span></a>
        <h4 class="modal-title" id="myModalLabel">List Nilai WI<h4>
      </div>
      <div class="modal-body">
        <div class="row">

      			<div class="x_content" style="padding:10px;">
      				<div class="panel panel-default">
      					<div class="panel-heading">Input nilai dasar widyaiswara
      					</div>
      						<div class="panel-body" id="pindahlokasi" >
        					<form onsubmit="procesFormandUpload(this,'<?php echo base_url('sertifikasi')."/widyaiswara/Nilai/add_nilai_default"; ?>')" method="POST" id="nilai_default" >
      					<div class="row">
      						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      							<div class="row">
      							<div class="form-group">
      								<div class="col-lg-4 col-md-4 col-sm-4">
      									<span class="" name='nilai1' id="nilai1"><i class="fa fa-file"></i>
      										Nilai dasar simulasi
      									</span>
      								</div>
      							<div class="col-lg-8 col-md-8 col-sm-8">
      								 <input type="number" class="form-control text-primary" name="nilai_1" id="text-loc" placeholder="Nilai Simulasi" />
      							 </div>
      						 </div>
      					 </div>
      					 <div class="row">
      						 <div class="form-group">
      							 <div class="col-lg-4 col-md-4 col-sm-4">
      								 <span class="" name='nilai2' id="nilai2"><i class="fa fa-file"></i>
      									 Nilai dasar Aktifitas
      								 </span>
      							 </div>
      						 <div class="col-lg-8 col-md-8 col-sm-8">
      								<input type="number" class="form-control text-primary" name="nilai_2" id="text-loc" placeholder="Nilai Activity" />
      							</div>
      						</div>
      					</div><br/>
      					<div class="row">
      						<div class="col-lg-12">
      					<button class="btn btn-primary" style="float:right"><i class="fa fa-paper-plane"></i> Ajukan</button>
      				</div>
      				</div>
      						</div>
      					</div>
                <input type="text" name="id_wi" id="id_wi" class="form-control" style="display:none;" />
                <input type="text" name="mata_ajar" id="mata_ajar" class="form-control" style="display:none;" />
                <input type="text" name="tgl_release" id="tgl_release" class="form-control" style="display:none;" />
      				</form>
      				</div>
      			</div>


      				<hr>
              	<!-- <form onsubmit="procesFormandUpload(this, '<?php //echo base_url('sertifikasi')."/widyaiswara/NilaiAPI/tambah"; ?>')" method="POST" id="nilai_edit_wi" > -->
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
      									<!-- <td>Instruktur</td> -->

      								</tr>
      							</thead>
      							<tbody>
      							</tbody>
      						</table>
      					</div>
      				</div>

      				<div class="row" style="padding:10px;">
                <button class="btn btn-primary" id="send"><i class="fa fa-paper-plane"></i> Ajukan</button>
      				</div>
            <!-- </form> -->
      			</div>

        </div>
      </div>
      <div class="modal-footer">

         <a type="button" class="btn btn-default" data-dismiss="modal">Keluar</a>
      </div>
    <!-- </form> -->
    </div>
  </div>
</div>
<!--modal-->
</div>
<script>
$(document).ready(function(){
    var table2;

    			table2 = $('#list_wi').DataTable({
                  "processing": false, //Feature control the processing indicator.
    							"destroy": true,
    							"pageLength" :10,
                  "serverSide": true, //Feature control DataTables' server-side processing mode.
                  "order": [], //Initial no order.
                  // Load data for the table's content from an Ajax source
                  "ajax": {
                      "url": '<?php echo base_url('sertifikasi/widyaiswara/NilaiAPI/LoadDataList/')?>',
                      "type": "POST"
                  },
                  //Set column definition initialisation properties.
                  "columns": [
                      {"data": "0",width:50},
                      {"data": "1",width:100},
    									{"data": "2",width:100},
                      {"data": "3",width:100},

    									// {"data": "7",width:100}
                  ],

              });
				 $('button').click( function() {
             var tgl_release=$('#tgl_release').val();
             var mata_ajar=$('#mata_ajar').val();
             var obj=tgl_release+'~'+mata_ajar;
             // var tgl_release=$('#tgl_release').val();
						 var data =  $('#pesertaByWI').DataTable().$('input').serialize();
						 if(data.substr( 0, 3)=='nip'){
							$.ajax({
								data : data,
								type : 'GET',
								url : '<?php echo base_url('sertifikasi/widyaiswara/NilaiAPI/updateDataNilai')?>/'+obj,
								async: true,
								processData: false,
								contentType: false,
								cache:false,
								timeout: 600000,
								success : function(data) {

					        if(data.status=='success'){
					         // $('.modal').modal('hide');
					          swal("Berhasil", "Data berhasil disimpan!", "success");
					          //$("#"+formTarget.id)[0].reset();

					        }else if(data.status=='error'){
					         // $('.modal').modal('hide');
					          swal("Terjadi Kesalahan", data.msg, data.status);
					          //  $("#"+formTarget.id)[0].reset();

					        }
					          loadData(1);

									console.log(data);
					      },
					      error: function (e) {
					        // swal('Terjadi Kesalahan',e,'error');
					        console.log("ERROR : ", e);
					      }

					    });
						}else{
							swal("Terjadi Kesalahan", 'Data peserta tidak boleh kosong', 'error');
						}

					});
});
function modalDetail(obj){
  var table;

  			table = $('#pesertaByWI').DataTable({
                "processing": false, //Feature control the processing indicator.
  							"destroy": true,
  							"pageLength" :10,
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": '<?php echo base_url('sertifikasi/widyaiswara/NilaiAPI/LoadDataKelasDiklat')?>/'+obj,
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
  									// {"data": "7",width:100}
                ],

            });
}
function loadData(obj){
	$('#pesertaByWI').DataTable().ajax.reload();
}
function ModalNilai(obj){
     modalDetail(obj);
	   var param=obj.split('~');
	   $('#modalNilai').modal('show');
		 $('#id_wi').val(param[2]);
		 $('#mata_ajar').val(param[1]);
		 $('#tgl_release').val(param[0]);
}

</script>
