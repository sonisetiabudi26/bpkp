<div class="page-title">
	<div class="title_left">
		<h3>Registrasi</h3>
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
							<form onsubmit="procesFormandUpload(this, 'response-text')" action="<?php echo base_url('sertifikasi')."/unit_apip/registrasi/add_data"; ?>" enctype="multipart/form-data" method="POST" id="daftar_ujian">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">

	                <input class="form-control" type="text" id="nip" name="nip" placeholder="Masukan NIP Calon Peserta" ><br>
	                <span class="btn btn-primary btn-block" onclick="search()">Cari</span>

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
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Jenjang Jabatan</div>
													<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><span id="jenjangjabatan"></span></div>
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
												<select class="form-control" name="lokasi" id="lokasi">
														<option value="">--Lokasi Ujian--</option>
													 <?php foreach($provinsi as $row) { ?>
															 <option value="<?php echo $row->NAMA;?>"><?php echo $row->NAMA;?></option>
													 <?php } ?>
												</select>
											</div><br/>
											<div class="row">
												<div class="form-group">
													<div class="col-lg-4">
														<span class="btn btn-primary btn-block btn-file" id="input_lokasi"><i class="fa fa-file"></i>
												 			Upload Surat Permohonan <input name="doc_loc" id="doc_loc" type="file">
														</span>
											 		</div>
											 	<div class="col-lg-8">
													 <input type="text" class="form-control text-primary" name="file_lokasi" id="text-loc" placeholder="doc loc" />
												 </div>
											 </div>
											</div>
										</div>
									</div>

							</div>
              <div class="row">

								<select class="form-control" name="jadwal" id="jadwal" >
 									<option value="">--Jadwal Ujian--</option>
									<?php foreach($jadwal as $row) { ?>
 										 <option value="<?php echo $row->PK_JADWAL_UJIAN;?>"><?php echo $row->CATEGORY.' ('.$row->START_DATE.' - '.$row->END_DATE.')' ;?></option>
 								 <?php } ?>
							 </select>
              </div><br/>
							<div class="row">
                   <input type="text" class="form-control" name="no_surat" placeholder="Nomor Surat Pendaftaran/Persetujuan">
              </div><br/>
							<div class="row">
                   <input type="text" class="form-control" name="nilai_ksp" placeholder="Nilai KSP">
              </div><br/>
							<div class="row">
										<!-- <span>Upload Dokumen Nilai KSP</span> -->

										<div class="form-group">
											<div class="col-lg-4 col-md-4 col-xs-4">
												<span class="btn btn-primary btn-block btn-file" id="input_ksp"><i class="fa fa-file"></i>
										 			Upload Dokumen Nilai KSP <input name="doc_ksp" id="doc_ksp" type="file">
												</span>
									 		</div>
									 	<div class="col-lg-8 col-md-8 col-xs-8">
											 <input type="text" class="form-control text-primary" name="file_ksp" id="text-ksp" placeholder="doc ksp" disabled/>
										 </div>
									 </div>
                </div><br/>

              	<div class="row">

									<div class="form-group">
										<div class="col-lg-4 col-md-4 col-xs-4">
											<span class="btn btn-primary btn-block btn-file" id="input_foto"><i class="fa fa-file"></i>
												Upload foto background <input name="doc_foto" id="doc_foto" type="file">
											</span>
										</div>
									<div class="col-lg-8 col-md-8 col-xs-8">
										 <input type="text" class="form-control text-primary" name="file_foto" id="text-foto" placeholder="doc foto"  disabled/>
									 </div>
								 </div>
                </div><br/>


              </div>
              <input class="btn btn-primary btn-block" disabled id="daftar_ujian_btn" type="submit" value="submit">
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
						<form onsubmit="procesFormandUpload(this, 'response-result')" action="<?php echo base_url('sertifikasi')."/unit_apip/registrasi/add_persetujuan"; ?>" enctype="multipart/form-data" method="POST" id="daftar_persetujuan">
						<div class="row">
              <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  							<thead>
  							<tr>
  								<td>NIP</td>
  								<td>Mata Pelajaran</td>
                  <td>Nomor Surat</td>
                  <td>Tanggal Ujian</td>
  							</tr>
  							</thead>
  							<tbody id="dataResult">



  							</tbody>
  							</table>


					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-lg-4 col-md-4 col-xs-4">
								<span class="btn btn-primary btn-block btn-file" id="input_persetujuan"><i class="fa fa-file"></i>
									Upload Surat Persetujuan <input name="doc_persetujuan" id="doc_persetujuan" type="file">
								</span>
							</div>
						<div class="col-lg-8 col-md-8 col-xs-8">
							 <input type="text" class="form-control text-primary" name="file_persetujuan" id="text-persetujuan" placeholder="doc surat persetujuan" disabled/>
						 </div>
					 </div>
					</div><br/>
					<div class="row">
						<input class="btn btn-primary btn-block" disabled id="setuju_ujian_btn" value="submit" type="submit">
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

function search(){

	 var nip=$( "#nip" ).val();
	$.ajax({
			type  : 'ajax',
			url   :  "<?php echo base_url('sertifikasi/unit_apip/registrasi/search/')?>/" + nip,
			async : false,
			dataType : 'json',
			success : function(data){
				if(!data.msg){
				 document.getElementById("show_data").style.display = "block";
					document.getElementById("Nama").innerHTML=': '+data.nama;
					document.getElementById("NIP").innerHTML=': '+data.nip;
					document.getElementById("ttl").innerHTML=': '+data.ttl;
					document.getElementById("pendidikan").innerHTML=': '+data.pendidikan;
					document.getElementById("unit").innerHTML=': '+data.unit;
					document.getElementById("jabatan").innerHTML=': '+data.jabatan;
					document.getElementById("jenjangjabatan").innerHTML=': '+data.jenjangjabatan;
					$( "#daftar_ujian_btn" ).prop( "disabled", false );
					// $('#show_data').html(html);
				}else{
					document.getElementById("Nama").innerHTML=':';
					document.getElementById("NIP").innerHTML=':';
					document.getElementById("ttl").innerHTML=':';
					document.getElementById("pendidikan").innerHTML=':';
					document.getElementById("unit").innerHTML=':';
					document.getElementById("jabatan").innerHTML=':';
					document.getElementById("jenjangjabatan").innerHTML=':';
					document.getElementById("show_data").style.display = "none";
					$( "#daftar_ujian_btn" ).prop( "disabled", true );
					alert(data.msg);
				}
			}

	});
}
loadData(1);
function loadData(data){

		document.getElementById("dataResult").innerHTML='';

  $.ajax({
      type  : 'ajax',
      url   :  "<?php echo base_url('sertifikasi/unit_apip/registrasi/loadData/')?>",
      async : false,
      dataType : 'json',
      success : function(data){

				var nip='';
				data.forEach(function(resp) {

           $("#dataResult").append("<tr><td>" + (resp.NIP != nip ? resp.NIP : '') + "</td><td> unknown (comming soon) </td><td>" + (resp.NIP != nip ? resp.NO_SURAT_UJIAN : '') + "</td><td>" + (resp.NIP != nip ? resp.START_DATE + " - "+ resp.END_DATE  : '')+"</td></tr>");
					 nip=resp.NIP;
			  });
      }
	});
}

</script>
