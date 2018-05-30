<div class="page-title">
	<div class="title_left">
		<h3>Dashboard Auditor</h3>
	</div>
</div>
<div class="clearfix"></div>

<div class="row">
	<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Data Umum Auditor</h2>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="image_photo" id="foto"><img src="<?php echo base_url('assets/img/content/user.png') ?>" class="img-circle profile_img"></div>
						<div class="clearfix"></div>
						<div class="panel panel-default" style="padding:5px;margin:0;">
							<div class="panel-heading" style="margin:0;">Identitas</div>
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
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Tempat/Tgl Lahir</div>
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
			</div>
		</div>
	</div>
	<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Status Ujian</h2>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="min-height:435px;">
						<div id="kartu_auditor">

						</div>
						<div class="row" id="kartu_non" style="display:none;">
							<h3>Mohon Maaf anda belum terdaftar sebagai calon peserta ujian.</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>

function search(){

	 //var nip=$( "#nip" ).val();
	$.ajax({
			type  : 'ajax',
			url   :  "<?php echo base_url('sertifikasi/auditor/home/search/')?>",
			async : false,
			dataType : 'json',
			success : function(data){
				if(!data.msg){
				 // document.getElementById("show_data").style.display = "block";
					document.getElementById("Nama").innerHTML=': '+data.nama;
					document.getElementById("NIP").innerHTML=': '+data.nip;
					document.getElementById("ttl").innerHTML=': '+data.tempat_lahir+','+data.ttl;
					document.getElementById("pendidikan").innerHTML=': '+data.pendidikan;
					document.getElementById("unit").innerHTML=': '+data.unit;
					document.getElementById("jabatan").innerHTML=': '+data.jabatan;
					document.getElementById("jenjangjabatan").innerHTML=': '+data.jenjangjabatan;
					// $( "#daftar_ujian_btn" ).prop( "disabled", false );
					// $('#show_data').html(html);
				}else{
					document.getElementById("Nama").innerHTML=':';
					document.getElementById("NIP").innerHTML=':';
					document.getElementById("ttl").innerHTML=':';
					document.getElementById("pendidikan").innerHTML=':';
					document.getElementById("unit").innerHTML=':';
					document.getElementById("jabatan").innerHTML=':';
					document.getElementById("jenjangjabatan").innerHTML=':';
					// document.getElementById("show_data").style.display = "none";
					// $( "#daftar_ujian_btn" ).prop( "disabled", true );
					alert(data.msg);
				}
			}

	});
}
load();
function load(){

	 //var nip=$( "#nip" ).val();
	$.ajax({
			type  : 'ajax',
			url   :  "<?php echo base_url('sertifikasi/auditor/home/load/')?>",
			async : false,
			dataType : 'json',
			success : function(data){
				if(!data.msg){
						data.forEach(function(resp) {
							var file_img="./uploads/"+resp.DOC_FOTO;
							var image='<?php echo base_url("'+file_img+'")?>';
							var img='<img src="'+image+'" class="img-circle profile_img">';
							var data='<div class="row">'+
													'<h3>TERDAFTAR TANGGAL '+resp.START_DATE+' - '+resp.END_DATE+'</h3>'+
													'<h3>Setelah di setujui dari UNIT APIP</h3>'+
												'</div>'+
												'<div class="row">'+
													'<a><i class="fa fa-print"></i> Cetak kartu ujian</a>'+
												'</div>';
							$('#kartu_auditor').html(data);
							$('#foto').html(img);
							$('#pic').html(img);
						});

					// document.getElementById("Nama").innerHTML=': '+data.nama;
					// document.getElementById("NIP").innerHTML=': '+data.nip;
					// document.getElementById("ttl").innerHTML=': '+data.tempat_lahir+','+data.ttl;
					// document.getElementById("pendidikan").innerHTML=': '+data.pendidikan;
					// document.getElementById("unit").innerHTML=': '+data.unit;
					// document.getElementById("jabatan").innerHTML=': '+data.jabatan;
					// document.getElementById("jenjangjabatan").innerHTML=': '+data.jenjangjabatan;
					// $( "#daftar_ujian_btn" ).prop( "disabled", false );
					// $('#show_data').html(html);



				}else{
				  document.getElementById("kartu_non").style.display = "block";
					document.getElementById("Nama").innerHTML=':';
					document.getElementById("NIP").innerHTML=':';
					document.getElementById("ttl").innerHTML=':';
					document.getElementById("pendidikan").innerHTML=':';
					document.getElementById("unit").innerHTML=':';
					document.getElementById("jabatan").innerHTML=':';
					document.getElementById("jenjangjabatan").innerHTML=':';
					// document.getElementById("show_data").style.display = "none";
					// $( "#daftar_ujian_btn" ).prop( "disabled", true );
					//alert(data.msg);
				}
			}

	});
	search();
}
</script>
<!-- <div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Info Grafik</h2>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height:320px;">

							<div id="mainb" style="height:350px;"></div>


					</div>

				</div>
			</div>
		</div>
	</div>
</div> -->
