<div class="page-title">
	<div class="title_left">
		<h3>Pengusulan Pengangakatan</h3>
	</div>
</div>
<div class="clearfix"></div>

<div class="row">


			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">

					<div class="x_content">


								<div class="row" >
					        <div class="col-lg-10" style="padding:0;margin:0">
										  <input class="form-control" name="nip" id="nip" type="text" placeholder="Masukan NIP">
									</div>
									<div class="col-md-2" style="padding:0;margin:0">
										<button class="btn btn-primary btn-block" onclick="search();">Cari</button>
									</div>
              </div>
							<div class="row">
								<div class="col-md-12" id="response-text" ></div>

								<div id="show_data" style="display:none;">
									<form onsubmit="procesFormPengusul(this, 'response-text')" action="<?php echo base_url('sertifikasi')."/unit_apip/pengusulanpengangkatan/submit"; ?>" enctype="multipart/form-data" method="POST" id="daftar_pengusul">

									<div class="panel panel-default">
										<div class="panel-heading">Identitas</div>
											<div class="panel-body">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<div class="row">
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span>NIP</span></div>
														<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='nip' class="form-control" readonly id="Nip"/></div>
													</div>
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span>NAMA</span></div>
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='nama' class="form-control" readonly id="Nama"/></div>
												</div>
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Tempat Tanggl Lahir</div>
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='ttl' class="form-control" readonly id="ttl"/></span></div>
												</div>
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Pendidikan</div>
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='pendidikan' class="form-control" readonly id="pendidikan"/></div>
												</div>
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Unit Kerja</div>
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='unit' class="form-control" readonly id="Unit"/></div>
												</div>
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Jabatan</div>
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='jabatan' class="form-control" readonly id="jabatan"/></div>
												</div>
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Golongan</div>
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='golongan' class="form-control" readonly id="golongan"/></div>
												</div><br/>
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Status</div>
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
													<select class="form-control" name="status" id="status">
														<?php
															foreach($status as $key):
														?>
														<option value="<?php echo $key->PK_STATUS_PENGUSUL_PENGANGKATAN; ?>"><?php echo $key->DESC; ?></option>

													<?php endforeach;?>
													</select>
													</div>
												</div>
												<br/>
												<div class="row">
													<button class="btn btn-primary btn-block" id="daftar_pengusul" type="submit">Submit</button>
												</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
              <div class="row">
								<h2 style="color:#000;">List Pengusulan Pengangkatan</h2><br/>
								<table id="example_table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
									<tr>
										<td>No</td>
										<td>Nama</td>
										<td>NIP</td>
										<td>Status</td>
										<td>Status Document</td>
										<td>Action</td>
									</tr>
									</thead>
									<!-- <tbody id="dataAuditor">
									</tbody> -->
									</table>

              </div>

							<div class="row">
								<div class="panel panel-default">
									<div class="panel-heading">Upload No Surat Pengusulan </div>
										<div class="panel-body">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<form onsubmit="procesFormPengusul(this, 'response-text')" action="<?php echo base_url('sertifikasi')."/unit_apip/pengusulanpengangkatan/submit_nosurat"; ?>" enctype="multipart/form-data" method="POST" id="daftar_nosurat">

												<div class="row">
													<div class="form-group">
														<div class="col-lg-4">
															<span class="btn btn-primary btn-block btn-file" id="input_surat"><i class="fa fa-file"></i>
														 		Surat Pengusulan <input name="doc_surat" id="doc_surat" type="file">
															</span>
														</div>
													<div class="col-lg-8">
														 <input type="text" class="form-control text-primary" name="file_surat" id="text-surat" placeholder="doc Surat Pengusulan" />
													 </div>
												 </div>
											 </div><br/>
											<div class="row">
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span>No Surat</span></div>
												<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='no_surat' class="form-control" id="no_surat" placeholder='input no surat'/></div>
											</div>
											<br/>
											<div class="row">
												<button class="btn btn-primary btn-block" id="btn-upload-surat" type="submit">Submit</button>
											</div>
										</form>
											</div>
										</div>
									</div>


						 </div>
              </div>



				</div>
			</div>
</div>

<script type="text/javascript">
function search(){

	 var nip=$( "#nip" ).val();
	$.ajax({
			type  : 'ajax',
			url   :  "<?php echo base_url('sertifikasi/unit_apip/pengusulanpengangkatan/search/')?>/" + nip,
			async : false,
			dataType : 'json',
			success : function(data){
				if(!data.msg){
				 document.getElementById("show_data").style.display = "block";
				  document.getElementById("Nip").value=nip;
					document.getElementById("Nama").value=data.nama;
					document.getElementById("ttl").value=data.ttl;
					document.getElementById("pendidikan").value=data.pendidikan;
					document.getElementById("unit").value=data.unit;
					document.getElementById("jabatan").value=data.jabatan;
					document.getElementById("golongan").value=data.golongan;
					// $( "#show_data" ).prop( "disabled", false );
					// $('#show_data').html(html);
				}else{
					document.getElementById("Nip").value='';
					document.getElementById("Nama").value='';
					document.getElementById("ttl").value='';
					document.getElementById("pendidikan").value='';
					document.getElementById("unit").value='';
					document.getElementById("jabatan").value='';
					document.getElementById("golongan").value='';
					document.getElementById("show_data").style.display = "none";
					// $( "#show_data" ).prop( "disabled", true );
					alert(data.msg);
				}
			}

	});
}
$(document).ready(function() {

		//document.getElementById("datatable-responsive").innerHTML='';
		var example_table = $('#example_table').DataTable({
  'ajax': {
    "type"   : "POST",
    "url"    : '<?php echo base_url('sertifikasi/unit_apip/pengusulanpengangkatan/loadData/')?>',
    "dataSrc": ""
  },
  'columns': [
    {"data" : "no"},
    {"data" : "nama"},
    {"data" : "nip"},
    {"data" : "desc"},
		{"data" : "desc_status"},
		{"data" : "action"}
  ]
});

});
function refresh(){
	$('#example_table').DataTable().ajax.reload();
}
function remove(obj){
	$.ajax({
			type  : 'ajax',
			url   :  "<?php echo base_url('sertifikasi/unit_apip/pengusulanpengangkatan/remove/')?>/" + obj,
			async : false,
			dataType : 'json',
			success : function(data){
				if(!data.msg){
					refresh();
				}else{

				}
			}

	});
}
$("#input_surat").change(function (){

  var fileName = document.getElementById("doc_surat").value;
  $("#text-surat").val(fileName);
    $( "#btn-upload-surat" ).prop( "disabled", false );
});
function cleardata(){

}

</script>
