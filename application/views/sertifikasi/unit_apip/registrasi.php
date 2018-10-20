<div class="page-title">
	<div class="title_left">
		<h3>Pendaftaran Ujian</h3>
	</div>
</div>
<div class="clearfix"></div>
	<div class="row" style="width:100%;">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label id="response-text"></label>
	</div>
</div>
<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<div class="row">
							<h2>Data Peserta</h2>
						</div>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<div class="row">
							<form enctype="multipart/form-data" onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/unit_apip/registrasi/add_data"; ?>')" method="POST" id="daftar_ujian">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="row">
										<div id="email-error-dialog"></div>
								</div>
								<div class="row">

	                <input class="form-control" type="text" id="nip" name="nip" placeholder="Masukan NIP Calon Peserta"><br>
	                <span class="btn btn-success btn-block" onclick="search()"><i class="fa fa-search"></i> Cari</span>

              </div>
							<div class="row">
								<div id="show_data" style="display: none">
									<div class="panel panel-default">
										<div class="panel-heading">Identitas</div>
											<div class="panel-body">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span>NAMA</span></div>
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><span id="Nama"></span></div>
												</div>
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span>Gelar Depan</span></div>
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><span id="gelarDepan"></span></div>
												</div>
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span>Gelar Belakang</span></div>
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><span id="gelarBelakang"></span></div>
												</div>
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">NIP</div>
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><span id="NIP"></span></div>
												</div>
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Tempat Tanggl Lahir</div>
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><span id="ttl"></span></div>
												</div>
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Pendidikan</div>
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><span id="pendidikan"></span></div>
												</div>
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Unit Kerja</div>
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><span id="unit"></span></div>
												</div>
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Jabatan</div>
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><span id="jabatan"></span></div>
												</div>
												</div>
											</div>
										</div>
								</div>
							</div>

              <div class="row">
								<div class="panel panel-default">
									<div class="panel-heading">Pindah Berkas/Lokasi
										<label class="switch">
									  <input type="checkbox" name="checkpindah" id="checkpindah">
									</label></div>
										<div class="panel-body" id="pindahlokasi" style="display: none">
											<div class="row">
												<label>Lokasi Ujian <span class="mandatory">*</span></label>
												<select class="form-control" name="lokasi" id="lokasi">
														<option value="">--Lokasi Ujian--</option>
													 <?php foreach($provinsi as $row) { ?>
															 <option value="<?php echo $row->PK_PROVINSI;?>"><?php echo $row->NAMA;?></option>
													 <?php } ?>
												</select>
											</div><br/>
											<div class="row">
												<div class="form-group">
													<div class="col-lg-4 col-md-4 col-xs-4">
														<span class="btn btn-default btn-block btn-file" id="input_lokasi"><i class="fa fa-file-pdf-o"></i>
												 			Unggah Surat <input name="doc_loc" id="doc_loc" type="file">
														</span>
											 		</div>
											 	<div class="col-lg-8 col-md-8 col-xs-8">
													 <input type="text" class="form-control text-primary" name="file_lokasi" id="text-loc" placeholder="Surat Permohonan" />
													 <span class="mandatory"><i>* Format dokumen harus .pdf</i></span>
												 </div>
											 </div>
											</div>
										</div>
									</div>

							</div>
							<div class="row">
								<label>Jenjang Ujian <span class="mandatory">*</span></label>
								<select class="form-control" name="diklat" id="diklat" >
									<option value="">--Jenjang Ujian--</option>
									<?php foreach($diklat as $row) { ?>
										 <option value="<?php echo $row->KODE_DIKLAT;?>"><?php echo $row->KODE_DIKLAT.' - '.$row->NAMA_JENJANG ;?></option>
								 <?php } ?>
							 </select>
							</div><br/>
							<div class="row">
								<label>Cluster <span class="mandatory">*</span></label>
								<div>
									<input type="radio" name="wilayah" value="01"> BPKP<br>
								  <input type="radio" name="wilayah" value="02"> Pusat<br>
								  <input type="radio" name="wilayah" value="03"> Daerah
								</div>
              </div><br/>
              <div class="row">
								<label>Jadwal Ujian <span class="mandatory">*</span></label>
								<select class="form-control" name="jadwal" id="jadwal" >
 									<option value="">--Jadwal Ujian--</option>
									<?php foreach($jadwal as $row) { ?>
 										 <option value="<?php echo $row->PK_JADWAL_UJIAN;?>"><?php echo $row->CATEGORY.' ('.$row->START_DATE.' - '.$row->END_DATE.')' ;?></option>
 								 <?php } ?>
							 </select>
              </div><br/>
							<div class="row">
									<label>Nomor Surat Persetujuan <span class="mandatory">*</span></label>
                   <input type="text" class="form-control" name="no_surat" placeholder="Nomor Surat Pendaftaran/Persetujuan">
              </div>
							<br/>
							<div class="row">
									<label>Nilai KSP <span class="mandatory">*</span></label>
                   <input type="text" class="form-control" name="nilai_ksp" placeholder="Nilai KSP">
              </div>
							<br/>
							<div class="row">
										<div class="form-group">
											<div class="col-lg-4 col-md-4 col-xs-4">
												<span class="btn btn-default btn-block btn-file" id="input_ksp"><i class="fa fa-file-pdf-o"></i>
										 			Unggah Dokumen<input name="doc_ksp" id="doc_ksp" type="file">
												</span>
									 		</div>
									 	<div class="col-lg-8 col-md-8 col-xs-8">
											 <input type="text" class="form-control text-primary" name="file_ksp" id="text-ksp" placeholder="Dokumen Nilan KSP" readonly/>
											 <span class="mandatory"><i>* Format dokumen harus .pdf</i></span>
										 </div>
									 </div>
                </div><br/>
              	<div class="row">
									<div class="form-group">
										<div class="col-lg-4 col-md-4 col-xs-4">
											<span class="btn btn-default btn-block btn-file" id="input_foto"><i class="fa fa-file-image-o"></i>
												Unggah foto <input name="doc_foto" id="doc_foto" type="file">
											</span>
										</div>
									<div class="col-lg-8 col-md-8 col-xs-8">
										 <input type="text" class="form-control text-primary" name="file_foto" id="text-foto" placeholder="Dokumen Foto Maks. 2mb, Latar Belakang Merah"  readonly/>
										 <span class="mandatory"><i>* Format foto harus .jpg</i></span>
									 </div>
								 </div>
							 </div><br/>
              </div>
							<button class="btn btn-primary btn-block" disabled id="daftar_ujian_btn" type="submit"> <i class="fa fa-paper-plane"></i> Ajukan</button>
              <!-- <input class="btn btn-primary btn-block" disabled id="daftar_ujian_btn" type="submit" value="Ajukan"> -->
						</form>
						</div>
					</div>
				</div>
			</div>

	<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Daftar Peserta Ujian</h2>
			<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="min-height:325px;">
						<form enctype="multipart/form-data" onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/unit_apip/registrasi/add_persetujuan"; ?>')" method="POST" id="daftar_persetujuan">
						<div class="row">
              <table id="dataResult" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  							<thead>
  							<tr>
  								<td>NIP</td>
									<td>NAMA</td>
                  <td>Nomor Surat</td>
                  <td>Tanggal Ujian</td>
								  <td>Tindakan</td>
  							</tr>
  							</thead>
								<tbody></tbody>
  							</table>
							</div>
							<div class="row">
								<div class="form-group">
									<div class="col-lg-4 col-md-4 col-xs-4">
										<span class="btn btn-default btn-block btn-file" id="input_persetujuan"><i class="fa fa-file-pdf-o"></i>
											Unggah Surat <input name="doc_persetujuan" id="doc_persetujuan" type="file">
										</span>
									</div>
								<div class="col-lg-8 col-md-8 col-xs-8">
									 <input type="text" class="form-control text-primary" name="file_persetujuan" id="text-persetujuan" placeholder="Dokumen Surat Persetujuan" readonly/>
									 <span class="mandatory"><i>* Format dokumen harus .pdf</i></span>
								 </div>
							 </div>
							</div>
							<br/>
						<div class="row">
							<!-- <input class="btn btn-primary btn-block" disabled id="setuju_ujian_btn" value="Ajukan" type="submit"> -->
							<button class="btn btn-primary btn-block" disabled id="setuju_ujian_btn" type="submit"> <i class="fa fa-paper-plane"></i> Ajukan</button>

						</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">

	$('#checkpindah').click(function() {
	    $("#pindahlokasi").toggle(this.checked);
	});


	$("#input_persetujuan").change(function (){

		var fileName = document.getElementById("doc_persetujuan").value;
		$("#text-persetujuan").val(fileName);
			$( "#setuju_ujian_btn" ).prop( "disabled", false );
	});

	$("#input_ksp").change(function (){

		var fileName = document.getElementById("doc_ksp").value;
		$("#text-ksp").val(fileName);
	});
	$("#input_foto").change(function (){

		var fileName = document.getElementById("doc_foto").value;
		$("#text-foto").val(fileName);
	});
	$("#input_lokasi").change(function (){

		var fileName = document.getElementById("doc_loc").value;
		$("#text-loc").val(fileName);
	});

//search
function search(){
	var nip=$( "#nip" ).val();
	if(nip !=''){
	$.ajax({
			type  : 'ajax',
			url   :  "<?php echo base_url('sertifikasi/unit_apip/registrasi/search/')?>/" + nip,
			async : false,
			dataType : 'json',
			success : function(data){
				if(data.status!='error'){
				  document.getElementById("show_data").style.display = "block";
					document.getElementById("Nama").innerHTML=': '+data.nama;
					document.getElementById("gelarDepan").innerHTML=': '+data.gelarDepan;
					document.getElementById("gelarBelakang").innerHTML=': '+data.gelarBelakang;
					document.getElementById("NIP").innerHTML=': '+data.nip;
					document.getElementById("ttl").innerHTML=': '+data.ttl;
					document.getElementById("pendidikan").innerHTML=': '+data.pendidikan;
					document.getElementById("unit").innerHTML=': '+data.unit;
					document.getElementById("jabatan").innerHTML=': '+data.jabatan;
					$( "#daftar_ujian_btn" ).prop( "disabled", false );
				}else{
					document.getElementById("Nama").innerHTML=':';
					document.getElementById("gelarDepan").innerHTML=':';
					document.getElementById("gelarBelakang").innerHTML=':';
					document.getElementById("NIP").innerHTML=':';
					document.getElementById("ttl").innerHTML=':';
					document.getElementById("pendidikan").innerHTML=':';
					document.getElementById("unit").innerHTML=':';
					document.getElementById("jabatan").innerHTML=':';
					document.getElementById("show_data").style.display = "none";
					$( "#daftar_ujian_btn" ).prop( "disabled", true );
					swal('Terjadi Kesalahan',data.msg,data.status);
				}
			},
			error: function (e) {
	      swal('Terjadi Kesalahan',e,'error');
				console.log("ERROR : ", e);
			}

	});
	}else{
			swal('Terjadi Kesalahan','NIP tidak boleh kosong','error');
	}
}
function loadData(data){
		$('#dataResult').DataTable().ajax.reload();
}

$(document).ready(function() {
	  document.getElementById("show_data").style.display = "none";
		var example_table = $('#dataResult').DataTable({
			"processing": false, //Feature control the processing indicator.
			 "destroy": true,
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url"    : '<?php echo base_url('sertifikasi/unit_apip/registrasi/loadData/')?>',
				"type": "POST"
			},
			'columns': [
				{"data": "0",width:50},
				{"data": "1",width:100},
				{"data": "2",width:100},
				{"data": "3",width:100},
				{"data": "4",width:100},

			]
			});
});

</script>
