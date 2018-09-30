
<div class="right_col" role="main">
<div class="col-lg-12" id="countdown"></div>

	<div class="col-lg-12 col-md-12 col-sm-12" id="ujian">
			<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/unit_apip/PengusulanPengangkatan/upload_submit"; ?>')"  enctype="multipart/form-data" method="POST" id="daftar_pengusulan">
				<div class="outer-container" style="padding:10px 0px 0px 0px !important">
					<div class="col-lg-12 col-md-12 col-sm-12" style="font-weight:1000;">
						<b class="badge date-header" >Waktu Mulai : <?php echo $start_time ;?></b>
						<b class="badge date-header" >Waktu Selesai : <?php echo $end_time ;?></b><hr>
					</div>

					<div style="width: 100%;height:auto;padding:5px;border-radius:3px;background: rgba(255, 255, 255, 0.7);">
						<div class="col-lg-12 col-md-12 col-sm-12" id="ujian_finished" style="display:none;text-align:center">
							<h1 style="color:#888">UJIAN TELAH SELESAI</h1>
							<h3 style="color:#888">SILAKAN MENGIKUTI SESI UJIAN BERIKUTNYA</h3><br/>
							<h4 style="color:#888">Terima Kasih telah mengikuti ujian yang diselenggarakan oleh panitia</h4><br/>
							<a href="<?php echo base_url('ujian')."/ujiansertifikasi/index/"?>" class="btn btn-default">Selesai</a>
							<hr/>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12" id="ujian_not_ready" style="display:none;text-align:center">
							<h1 style="color:#888">UJIAN BELUM DI MULAI</h1>
							<h3 style="color:#888">SILAKAN MENUNGGU UJIAN DIMULAI SESUAI PETUNJUK PANITIA</h3>
							<a href="<?php echo base_url('ujian')."/ujiansertifikasi/index/"?>" class="btn btn-default">OK</a>
							<hr/>
						</div>
						<div id="ujian_page">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<?php
									foreach ($soal as $key=>$soal_ujian):
								?>
							  <button type="button" onclick="pindahPage('<?php echo $key+1;?>');" class="btn btn-primary col-lg-1"><?php echo $key+1;?> <i class="fa fa-check" id="check<?php echo $key+1;?>" style="visibility: hidden;color:#32CD32"></i><i class="fa fa-flag" id="flag<?php echo $key+1;?>" style="visibility: hidden;color:#fff"></i></button>
								<?php
									endforeach;
								?>
							</div>
						</div>
						<?php
							foreach ($soal as $key=>$soal_ujian):
						?>
						<div class="row" >
							<div class='pages' id="page<?php echo $key+1;?>" style="display:none">
								<div class="col-lg-12 col-md-12 col-sm-12" id="kasus">
								<?php
									if(isset($soal_ujian[6])){
										echo "<h4 class='badge'>Type Soal : Soal Kasus</h4>";
										echo "<h4 class='container bg-warning' style='border-radius:5px;padding:3px;padding-left:10px;'>".$soal_ujian[6]."</h4>";
									}else{
										echo "<h4 class='badge'>Type Soal : Soal Biasa</h4>";
										echo "<h4>No ".($key+1)."</h4>";
									}
								?>
								</div>
								<h1 style="color:#000;"><?php echo $soal_ujian[5];?></h1><hr>
								<div class="step-content" >
									<p>
										<input id="<?php echo $key+1;?>" type="radio" data-key="<?php echo $key+1;?>" data-id="<?php echo $soal_ujian[4];?>" name="jawaban<?php echo $key+1;?>" value="<?php echo $soal_ujian[0]['PILIHAN']['value'];?>" /> A. <?php echo $soal_ujian[0]['PILIHAN']['descr'];?>
									</p>
									<p>
										<input id="<?php echo $key+1;?>" type="radio" data-key="<?php echo $key+1;?>" data-id="<?php echo $soal_ujian[4];?>" name="jawaban<?php echo $key+1;?>" value="<?php echo $soal_ujian[1]['PILIHAN']['value'];?>" /> B. <?php echo $soal_ujian[1]['PILIHAN']['descr'];?>
									</p>
									<p>
										<input id="<?php echo $key+1;?>" type="radio" data-key="<?php echo $key+1;?>" data-id="<?php echo $soal_ujian[4];?>" name="jawaban<?php echo $key+1;?>" value="<?php echo $soal_ujian[2]['PILIHAN']['value'];?>" /> C. <?php echo $soal_ujian[2]['PILIHAN']['descr'];?>
									</p>
									<p>
										<input id="<?php echo $key+1;?>" type="radio" data-key="<?php echo $key+1;?>" data-id="<?php echo $soal_ujian[4];?>" name="jawaban<?php echo $key+1;?>" value="<?php echo $soal_ujian[3]['PILIHAN']['value'];?>" /> D. <?php echo $soal_ujian[3]['PILIHAN']['descr'];?>
									</p>
									<br/>
									<p>
										<input id="<?php echo $key+1;?>" type="checkbox" data-key="<?php echo $key+1;?>" data-id="<?php echo $soal_ujian[4];?>" name="jawaban<?php echo $key+1;?>" value="<?php echo $soal_ujian[3]['PILIHAN']['value'];?>" />Tandai jika anda belum yakin
									</p>
								</div>
							</div>
						</div>
						<?php
							endforeach;
						?>
					</div>
					</div>
						<div style="width: 100%;height:50px;padding:5px;background : rgba(255, 255, 255, 0.7);">
							<button class="btn btn-primary" id="selesai" style="float:right;"><i class="fa fa-paper-plane"></i> Selesaikan Ujian</button>
						</div>
					</div>

			</form>
	</div>

</div>
<script>
function pindahPage(obj){
	$('.pages').css('display','none');
	$('#page'+obj).css('display','block');
}

$('input[type=radio]').change( function() {
	var id=$(this).attr('id');
	$('#check'+id).css('visibility', 'visible');
});

$('input[type=checkbox]').change( function() {
	var id=$(this).attr('id');
	$('#flag'+id).css('visibility', 'visible');
});

var x = setInterval(function() {
	time_ujian();
}, 1000);



$(document).ready(function() {
	time_ujian();
});

function time_ujian(){
	var dates='<?php echo $dates;?>';
	var start_time='<?php echo $start_time;?>';
	var end_time='<?php echo $end_time;?>';
	var dt = new Date();

	var dd = dt.getDate();
	var mm = dt.getMonth()+1;
	if(dd<10){
    dd='0'+dd;
	}
	if(mm<10){
	    mm='0'+mm;
	}
	var datetime= dt.getFullYear() + "-" + mm + "-" + dd;

	var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
	if(dates<datetime){

		document.getElementById("countdown").innerHTML = "Waktu Ujian Habis";
		document.getElementById("ujian_finished").style.display='block';
		document.getElementById("ujian_not_ready").style.display='none';
		document.getElementById("selesai").style.display='none';
		document.getElementById("ujian_page").style.display='none';
	}else if(dates==datetime){

		validation(start_time,end_time,dt,time);
	}else if(dates>datetime){

		document.getElementById("countdown").innerHTML = "Belum Waktu Ujian";
		document.getElementById("ujian_not_ready").style.display='block';
		document.getElementById("ujian_finished").style.display='none';
		document.getElementById("selesai").style.display='none';
		document.getElementById("ujian_page").style.display='none';
	}
}
function validation(start_time,end_time,dt,time){
	if(start_time>=time){
		document.getElementById("countdown").innerHTML = "Belum Waktu Ujian";
		document.getElementById("ujian_not_ready").style.display='block';
		document.getElementById("ujian_finished").style.display='none';
		document.getElementById("selesai").style.display='none';
		document.getElementById("ujian_page").style.display='none';
	 }else if(start_time<time){
		if(end_time==time||end_time>=time){

				document.getElementById("countdown").innerHTML = "Waktu Ujian";
				document.getElementById("page1").style.display='block';
				document.getElementById("ujian_not_ready").style.display='none';
				document.getElementById("ujian_finished").style.display='none';
				document.getElementById("selesai").style.display='block';
		
		}else{

			document.getElementById("countdown").innerHTML = "Waktu Ujian Habis";
			document.getElementById("ujian_not_ready").style.display='none';
			document.getElementById("ujian_finished").style.display='block';
			document.getElementById("selesai").style.display='none';
			document.getElementById("ujian_page").style.display='none';
		}
	}else if(end_time<time){

		document.getElementById("countdown").innerHTML = "Waktu Ujian Habis";
		document.getElementById("ujian_finished").style.display='block';
		document.getElementById("ujian_not_ready").style.display='none';
		document.getElementById("selesai").style.display='none';
		document.getElementById("ujian_page").style.display='none';
	}
}

</script>
