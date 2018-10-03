<style>
.card,.x_panel{
	padding:10px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.card-title{
	color:#fff;
}

.card-text{
	color:#fff;
}
.card-body{
	height:70px;
}
</style>
<div class="right_col" role="main" >


	<div class="col-lg-12 col-md-12 col-sm-12" id="ujian">
			<!-- <form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/unit_apip/PengusulanPengangkatan/upload_submit"; ?>')"  enctype="multipart/form-data" method="POST" id="daftar_pengusulan"> -->
				<div class="outer-container" style="padding:10px 0px 0px 0px !important">
					<!-- <div class="col-lg-12 col-md-12 col-sm-12" style="font-weight:1000;">
						<b class="badge date-header" >Waktu Mulai : <?php echo $start_time ;?></b>
						<b class="badge date-header" >Waktu Selesai : <?php echo $end_time ;?></b><hr>
					</div> -->

					<div style="width: 100%;height:auto;padding:5px;border-radius:3px;">
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
								<div class="col-lg-12">
									<div class="row"><h3>Ujian Mata Ajar <?php echo urldecode($nama_mata_ajar)?></h3></div>
								</div>
							</div>
							<div class="row">

								<div class="col-lg-8">

									<div class="row" >
										<div class="panel panel-default">
											<div class="panel-heading">Soal ke - <span id='soal_urut'></span></div>
												<div class="panel-body">
												<?php
													foreach ($soal as $key=>$soal_ujian):
											  ?>
													<div class='pages col-lg-12 col-md-12 col-sm-12' id="page<?php echo $key+1;?>" style="display:none">
															<!-- <div class="col-lg-12 col-md-12 col-sm-12" id="kasus">  -->
															<?php
															// if(isset($soal_ujian[6])){
															// 	echo "<h4 class='badge'>Type Soal : Soal Kasus</h4>";
															// 	echo "<h4 class='container bg-warning' style='border-radius:5px;padding:3px;padding-left:10px;'>".$soal_ujian[6]."</h4>";
															// }else{
															// 	echo "<h4 class='badge'>Type Soal : Soal Biasa</h4>";
															// 	echo "<h4>No ".($key+1)."</h4>";
															// }
															?>
															<!-- </div> -->
															<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2" style="position:absolute;color:#000;">
																<!-- <label style="color:#000"><?php //echo "No ".($key+1); ?></label> -->
																</div>
															</div>
															<div class="row">
																<div class="col-lg-12 col-md-12 col-sm-12" style="border-bottom:0.1px solid #f3f3f3;">
																	<div class="step-content" >
																		<p><label style="color:#000;font-size:36px;"><?php echo $soal_ujian[5];?></label></p>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8">
																	<div class="step-content" >
																		<form>
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
																		</form>
																	</div>
																</div>
															</div>

													</div>
											<?php
												endforeach;
											?>
											</div>

									</div>

								</div>
								</div>
								<div class="col-lg-4">
									<div class="panel panel-default">
										<div class="panel-heading">Navigasi Soal</div>
											<div class="panel-body">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<h5></h5>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group row">
												<label for="staticEmail" class="col-sm-4 col-form-label">Waktu</label>
												<div class="col-sm-8">
													<label id="demo"></label>
												</div>
											</div>
											<div class="form-group row">
										    <label for="staticEmail" class="col-sm-4 col-form-label">Status</label>
										    <div class="col-sm-8">
										      <label id="countdowns"></label>
										    </div>
										  </div>
											<div class="form-group row">
										    <label for="staticEmail" class="col-sm-4 col-form-label">Waktu Mulai</label>
										    <div class="col-sm-8">
										      <label><?php echo $start_time ;?></label>
										    </div>
										  </div>
											<div class="form-group row">
												<label for="staticEmail" class="col-sm-4 col-form-label">Waktu Selesai</label>
												<div class="col-sm-8">
													<label><?php echo $end_time ;?></label>
												</div>
											</div>
										</div>
									</div>
									<hr/>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<h5>Daftar Soal Ujian</h5>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<?php
											foreach ($soal as $key=>$soal_ujian):
											?>
												<button type="button" onclick="pindahPage('<?php echo $key+1;?>');" id="navi<?php echo $key+1;?>" class="btn btn-primary col-lg-1"><?php echo $key+1;?> <i class="fa fa-flag" id="flag<?php echo $key+1;?>" style="display: none;color:#fff"></i></button>
											<?php
											endforeach;
											?>
										</div>
									</div>
								<br/>
									<div class="row">
										<div class="col-lg-12" style="border-top:0.1px solid #f3f3f3;padding:10px;">
											<button class="btn btn-success" onclick="sending();" id="selesai" style="width:100%"><i class="fa fa-paper-plane"></i> Selesaikan Ujian</button>
										</div>
									</div>
								</div>
								</div>
								</div>
							</div>
				 		</div>
					</div>
					<!-- <hr/> -->
						<!-- <div style="width: 100%;height:50px;padding:5px;background : rgba(255, 255, 255, 0.7);">

						</div> -->
					</div>

			<!-- </form> -->
	</div>

</div>
<script>
window.i=0;
var keyPairArray=[];

function pindahPage(obj){
	$('.pages').css('display','none');
	$('#page'+obj).css('display','block');
	document.getElementById("soal_urut").innerHTML=obj;
}

$('input[type=radio]').change( function() {
	// window.x =[];

	var id=$(this).attr('id');
	var jawaban=$(this).attr('value');
	var no_soal=$(this).attr('data-id');
  $("#navi"+id).css('background','green');
		var item = { 'no_urut':id,'jawaban': jawaban,'no_soal': no_soal };
		var index = Object.keys(keyPairArray).indexOf(id);
		if (index === 1) {
		    keyPairArray.push(item);
		} else {
		    keyPairArray[id] = item;
		}
		console.log(keyPairArray);
	// if(x==''){
	// 		x[id] = jawaban;
	// }else{
	// 		delete x[id];
	// 		x[id] = jawaban;
	// 		console.log(x);
	// }
	// x[id]=($(this).attr('data-id'));
	// console.log(x);
	// x.push($(this).attr('data-id'));



	// $('#check'+id).css('visibility', 'visible');
});

$('input[type=checkbox]').change( function() {
	var id=$(this).attr('id');
	if($('#flag'+id).is(':visible')=='true'){
			$('#flag'+id).toggle();
	}else{
			$('#flag'+id).toggle();
	}

});

var x = setInterval(function() {
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

	var time =  addZero(dt.getHours()) + ":" +  addZero(dt.getMinutes()) + ":" +  addZero(dt.getSeconds());
	var dates_all=dates+' '+end_time;


	var selisih =   new Date(dates_all).getTime()-new Date().getTime();
	// alert(selisih);
	var days = Math.floor(selisih / (1000 * 60 * 60 * 24));
  var hours = Math.floor((selisih % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((selisih % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((selisih % (1000 * 60)) / 1000);


// Output the result in an element with id="demo"
if (selisih < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }else{
			document.getElementById("demo").innerHTML =  hours + "h "+ minutes + "m "+ seconds + "s";
		}


 // + detik + "s ";
	time_ujian();
}, 1000);

 function sending(){
	// var jml_soal='<?php echo $jml_soal;?>';
	// for (var i = 0; i < jml_soal; i++) {
	//
	// }
alert(JSON.stringify(keyPairArray[1]));
		// var jawaban=$('input[type=radio]').attr('value');
}

$(document).ready(function() {
 	document.getElementById("soal_urut").innerHTML=1;
	document.getElementById("page1").style.display='block';
	time_ujian();
});
function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

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

	var time =  addZero(dt.getHours()) + ":" +  addZero(dt.getMinutes()) + ":" +  addZero(dt.getSeconds());
	var countDownDate = datetime+" "+time;
	var now = dates+" "+end_time;
	var distance = countDownDate - now;
	// alert(distance);

    // Time calculations for days, hours, minutes and seconds


	if(dates<datetime){
		document.getElementById("countdowns").innerHTML = "Waktu Ujian Habis";
		document.getElementById("ujian_finished").style.display='block';
		document.getElementById("ujian_not_ready").style.display='none';
		document.getElementById("selesai").style.display='none';
		document.getElementById("ujian_page").style.display='none';
		//document.getElementById("page1").style.display='none';
	}else if(dates==datetime){
		validation(start_time,end_time,dt,time);
	}else if(dates>datetime){

		document.getElementById("countdowns").innerHTML = "Belum Waktu Ujian";
		document.getElementById("ujian_not_ready").style.display='block';
		document.getElementById("ujian_finished").style.display='none';
		document.getElementById("selesai").style.display='none';
		document.getElementById("ujian_page").style.display='none';
		//document.getElementById("page1").style.display='none';
	}
}
function validation(start_time,end_time,dt,time){
	if(start_time>=time){
		document.getElementById("countdowns").innerHTML = "Belum Waktu Ujian";
		//document.getElementById("page1").style.display='none';
		document.getElementById("ujian_not_ready").style.display='block';
		document.getElementById("ujian_finished").style.display='none';
		document.getElementById("selesai").style.display='none';
		document.getElementById("ujian_page").style.display='none';
	 }else if(start_time<time){
		if(end_time>=time){
				document.getElementById("countdowns").innerHTML = "Waktu Ujian";
				//document.getElementById("page1").style.display='block';
				document.getElementById("ujian_not_ready").style.display='none';
				document.getElementById("ujian_finished").style.display='none';
				document.getElementById("selesai").style.display='block';
				document.getElementById("ujian_page").style.display='block';
		}else{
			document.getElementById("countdowns").innerHTML = "Waktu Ujian Habis";
			document.getElementById("ujian_not_ready").style.display='none';
			document.getElementById("ujian_finished").style.display='block';
			document.getElementById("selesai").style.display='none';
			document.getElementById("ujian_page").style.display='none';
		 //	document.getElementById("page1").style.display='none';
		}
	}else if(end_time<time){
		document.getElementById("countdowns").innerHTML = "Waktu Ujian Habis";
		document.getElementById("ujian_finished").style.display='block';
		document.getElementById("ujian_not_ready").style.display='none';
		document.getElementById("selesai").style.display='none';
		document.getElementById("ujian_page").style.display='none';
		//document.getElementById("page1").style.display='none';
	}
}

</script>
