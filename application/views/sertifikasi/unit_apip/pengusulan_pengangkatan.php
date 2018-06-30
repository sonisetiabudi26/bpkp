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
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                <input class="form-control" name="nip" id="nip" type="text" placeholder="Masukan NIP"><br>
                <button class="btn btn-primary btn-block" onclick="search();">Cari</button>
              </div>
							<div class="row">
								<div class="col-md-12" id="response-text" ></div>

								<div id="show_data" style="display:none;">
									<form onsubmit="procesFormPengusul(this, 'response-text')" action="<?php echo base_url('sertifikasi')."/unit_apip/pengusulanpengangkatan/add_data"; ?>" enctype="multipart/form-data" method="POST" id="daftar_ujian">

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
													<input class="btn btn-primary btn-block" id="daftar_pengusul" type="submit" value="submit">
												</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
              <div class="row">
								<h2 style="color:#000;">List Pengusulan Pengangkatan</h2><br/>
								<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
									<tr>
										<td>Nama</td>
										<td>NIP</td>
										<td>status</td>
										<td>Action</td>
									</tr>
									</thead>
									<tbody id="dataAuditor">
									</tbody>
									</table>

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
					// $( "#show_data" ).prop( "disabled", false );
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
					// $( "#show_data" ).prop( "disabled", true );
					alert(data.msg);
				}
			}

	});
}
loadData();
function loadData(){

		//document.getElementById("datatable-responsive").innerHTML='';

  $.ajax({
      type  : 'ajax',
      url   :  "<?php echo base_url('sertifikasi/pusbin/ManagementRegistrasi/loadData/')?>",
      async : false,
      dataType : 'json',
      success : function(data){

				var nip='';
				var a=1;
				data.forEach(function(resp) {

           $("#dataAuditor").append("<tr><td>" + a + "</td>"+
					 "<td>" + (resp.nip != nip ? resp.nip : '') + "</td>"+
					 "<td>" + (resp.nip != nip ? resp.nama : '') + "</td>"+
					 "<td><button class='btn btn-primary'>Upload Doc </button><button class='btn btn-primary'>Delete</button><button class='btn btn-primary'>View</button></td>"+
					 "</tr>");
					 nip=resp.NIP;
					 a++;
			  });
      }
	});
	//loadDatajadwal();
}
</script>
