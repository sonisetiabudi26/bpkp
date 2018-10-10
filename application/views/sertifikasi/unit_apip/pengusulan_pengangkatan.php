<style>
	span.form-control{
		border : none;
		box-shaddow:none;
		webkit-box-shadow: none;
	}
</style>
<div class="page-title">
	<div class="title_left">
		<h3>Pengusulan Pengangkatan</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="" role="tabpanel" data-example-id="togglable-tabs" style="background:#fff !important;">
	<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
		<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Daftar Pengusulan</a>
		</li>
		<li role="presentation" class=""><a href="#tab_content2" role="tab" onclick="databelumlengkap()" id="profile-tab" data-toggle="tab" aria-expanded="false">Daftar Dokumen belum Lengkap</a>
		</li>
		<!-- <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
		</li> -->
	</ul>
	<div id="myTabContent" class="tab-content" style="background:#fff;">
		<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab" >

			<div class="row">


						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">

								<div class="x_content">


											<div class="row" >
								        <div class="col-lg-10 col-md-10 col-sm-10" style="padding:0;margin:0">
													  <input class="form-control" name="nip" id="nip" type="text" placeholder="Masukan NIP">
												</div>
												<div class="col-lg-2 col-md-2 col-sm-2" style="padding:0;margin:0">
													<button class="btn btn-success btn-block" onclick="search();"><i class="glyphicon glyphicon-search"></i> Cari</button>
												</div>
			              </div>
										<div class="row">
											<div class="col-md-12" id="response-text" ></div>

											<div id="show_data" style="display:none;">
												<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/unit_apip/PengusulanPengangkatan/submit"; ?>')"  enctype="multipart/form-data" method="POST" id="daftar_pengusul">

												<div class="panel panel-default">
													<div class="panel-heading">Identitas</div>
														<div class="panel-body">
															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																<div class="row">
																	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="form-control">NIP</span></div>
																	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='nip' class="form-control" readonly id="Nip"/></div>
																</div>
															<div class="row">
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="form-control">Nama</span></div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='nama' class="form-control" readonly id="Nama"/></div>
															</div>
															<div class="row">
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="form-control">Umur</span></div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='umur' class="form-control" readonly id="umur"/></div>
															</div>
															<div class="row">
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="form-control">Gelar Depan</span></div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='gelarDepan' class="form-control" readonly id="gelarDepan"/></div>
															</div>
															<div class="row">
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="form-control">Gelar Belakang</span></div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='gelarBelakang' class="form-control" readonly id="gelarBelakang"/></div>
															</div>
															<div class="row">
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="form-control">Tempat Tanggl Lahir</span></div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='ttl' class="form-control" readonly id="ttl"/></span></div>
															</div>
															<div class="row">
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="form-control">Pendidikan</span></div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='pendidikan' class="form-control" readonly id="pendidikan"/></div>
															</div>
															<div class="row">
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="form-control">Unit Kerja</span></div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='unit' class="form-control" readonly id="unit"/></div>
															</div>
															<div class="row">
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="form-control">Jabatan</span></div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='jabatan' class="form-control" readonly id="jabatan"/></div>
															</div>
															<div class="row">
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="form-control">Golongan</span></div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='golongan' class="form-control" readonly id="golongan"/></div>
															</div>
															<div class="row">
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="form-control">TMT Pangkat</span></div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='tmtPangkat' class="form-control" readonly id="tmtPangkat"/></div>
															</div><br/>
															<div class="row">
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span class="form-control">Jenis Pengusulan</span></div>
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
																<button class="btn btn-primary btn-block" id="daftar_pengusul" type="submit"><i class="fa fa-paper-plane"></i> Ajukan</button>
															</div>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
			              <div class="row">
											<h2 style="color:#000;">Daftar Pengusulan Pengangkatan</h2><br/>
											<table id="example_table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>No</td>
													<td>Nama</td>
													<td>NIP</td>
													<td>Status</td>
													<td>Status Dokumen</td>
													<td>Tindakan</td>
												</tr>
												</thead>
												<!-- <tbody id="dataAuditor">
												</tbody> -->
												</table>

			              </div>

										<div class="row">
											<div class="panel panel-default">
												<div class="panel-heading">Unggah No Surat Pengusulan </div>
													<div class="panel-body">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/unit_apip/PengusulanPengangkatan/submit_nosurat"; ?>')" enctype="multipart/form-data" method="POST" id="daftar_nosurat">

															<div class="row">
																<div class="form-group">
																	<div class="col-lg-4 col-md-4 col-sm-4">
																		<span class="btn btn-default btn-block btn-file" id="input_surat"><i class="fa fa-file-pdf-o"></i>
																	 		Surat Pengusulan <span class="mandatory">*</span> <input name="doc_surat" id="doc_surat" type="file">
																		</span>
																	</div>
																<div class="col-lg-8 col-md-8 col-sm-8">
																	 <input type="text" class="form-control text-primary" name="file_surat" id="text-surat" placeholder="Dokumen Surat Pengusulan" readonly/>
																	 <span class="mandatory"><i>* Format dokumen harus .pdf</i></span>
																 </div>
															 </div>
														 </div><br/>
														<div class="row">
															<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span>No Surat <span class="mandatory">*</span></span></div>
															<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input name='no_surat' class="form-control" id="no_surat" placeholder='Masukan No Surat'/></div>
														</div>
														<br/>
														<div class="row">
															<button class="btn btn-primary btn-block" id="btn-upload-surat" type="submit"> <i class="fa fa-paper-plane"></i> Ajukan</button>
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
		</div>
		<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
			<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">

								<div class="x_content">
									<div class="row">
										<h2 style="color:#000;">Daftar Pengusulan Pengangkatan</h2><br/>
										<table id="document_belum_lengkap" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
											<thead>
											<tr>
												<td>No</td>
												<td>Nama</td>
												<td>NIP</td>
												<td>Status</td>
												<td>Status Dokumen</td>
												<td>Tindakan</td>
											</tr>
											</thead>
											<!-- <tbody id="dataAuditor">
											</tbody> -->
											</table>

									</div>
								</div>
							</div>
						</div>
			</div>
		</div>
		<!-- <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
			<p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
				booth letterpress, commodo enim craft beer mlkshk </p>
		</div> -->
	</div>
</div>

<div class="clearfix"></div>


<script type="text/javascript">
function search(){

	 var nip=$( "#nip" ).val();
	 if(nip!=''){
		$.ajax({
				type  : 'ajax',
				url   :  "<?php echo base_url('sertifikasi/unit_apip/PengusulanPengangkatan/search/')?>/" + nip,
				async : false,
				dataType : 'json',
				success : function(data){
					if(!data.msg){
					 document.getElementById("show_data").style.display = "block";
					  document.getElementById("Nip").value=nip;
						document.getElementById("Nama").value=data.nama;
						document.getElementById("umur").value=data.umur;
						document.getElementById("ttl").value=data.ttl;
						document.getElementById("pendidikan").value=data.pendidikan;
						document.getElementById("unit").value=data.unit;
						document.getElementById("jabatan").value=data.jabatan;
						document.getElementById("golongan").value=data.golongan;
						document.getElementById("tmtPangkat").value=data.Tmtpangkat;
						document.getElementById("gelarDepan").value=data.gelarDepan;
						document.getElementById("gelarBelakang").value=data.gelarbelakang;
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
						// document.getElementById("tmtPangkat").value=data.tmtPangkat;
						document.getElementById("tmtPangkat").value='';
						document.getElementById("gelarDepan").value='';
						document.getElementById("gelarBelakang").value='';
						// $( "#show_data" ).prop( "disabled", true );
						//alert(data.msg);
						swal('Terjadi Kesalahan',data.msg,data.status);
					}
				}

		});
	}else{
		swal('Terjadi Kesalahan','NIP tidak boleh kosong','error');
	}
}
$(document).ready(function() {

		//document.getElementById("datatable-responsive").innerHTML='';
		var example_table = $('#example_table').DataTable({
  'ajax': {
    "type"   : "POST",
    "url"    : '<?php echo base_url('sertifikasi/unit_apip/PengusulanPengangkatan/loadData/')?>',
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
var databelumlengkap = $('#document_belum_lengkap').DataTable({
	'ajax': {
		"type"   : "POST",
		"url"    : '<?php echo base_url('sertifikasi/unit_apip/PengusulanPengangkatan/loadDatabelumlengkap/')?>',
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
function databelumlengkap(){
	// var databelumlengkap = $('#document_belum_lengkap').DataTable({
	// 	'ajax': {
	// 		"type"   : "POST",
	// 		"url"    : '<?php //echo base_url('sertifikasi/unit_apip/PengusulanPengangkatan/loadDatabelumlengkap/')?>',
	// 		"dataSrc": ""
	// 	},
	// 	'columns': [
	// 		{"data" : "no"},
	// 		{"data" : "nama"},
	// 		{"data" : "nip"},
	// 		{"data" : "desc"},
	// 		{"data" : "desc_status"},
	// 		{"data" : "action"}
	// 	]
	// 	});
	$('#databelumlengkap').DataTable().ajax.reload();
}
function loadData(obj){
	document.getElementById("show_data").style.display = "none";
	$('#example_table').DataTable().ajax.reload();
	$('#databelumlengkap').DataTable().ajax.reload();
}
function remove(obj){
	if(confirm('Are you sure delete this data?'))
	{
	$.ajax({
			type  : 'ajax',
			url   :  "<?php echo base_url('sertifikasi/unit_apip/PengusulanPengangkatan/remove/')?>/" + obj,
			async : false,
			dataType : 'json',
			success : function(data){
				if(!data.msg){
					loadData(1);
				}else{

				}
			}

	});
}
}
$("#input_surat").change(function (){

  var fileName = document.getElementById("doc_surat").value;
  $("#text-surat").val(fileName);
    $( "#btn-upload-surat" ).prop( "disabled", false );
});
function cleardata(){

}

</script>
