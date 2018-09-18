
<div class="right_col" role="main">
<div class="col-lg-12" id="countdown"></div>
<div class="col-lg-12" id="ujian">
<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/unit_apip/PengusulanPengangkatan/upload_submit"; ?>')"  enctype="multipart/form-data" method="POST" id="daftar_pengusulan">
	<div class="outer-container" style="padding:10px 0px 0px 0px !important">
		<div class="col-lg-12" style="font-weight:1000;">
	<b class="badge date-header" >Waktu Mulai : <?php echo $start_time ;?></b>
	<b class="badge date-header" >Waktu Selesai : <?php echo $end_time ;?></b><hr>
</div>
		<div style="width: 100%;height:auto;padding:5px;border-radius:3px;background: rgba(255, 255, 255, 0.7);">
			<div class="row">
				<div class="col-lg-12">

					<?php
						foreach ($soal as $key=>$soal_ujian):
					?>
				  <button type="button" onclick="pindahPage('<?php echo $key+1;?>');" class="btn btn-primary col-lg-1"><?php echo $key+1;?> <i class="fa fa-check" id="check<?php echo $key+1;?>" style="visibility: hidden;color:yellow"></i><i class="fa fa-flag" id="flag<?php echo $key+1;?>" style="visibility: hidden;color:#fff"></i></button>
					<?php
						endforeach;
					?>

			</div>
			</div>
			<?php
				foreach ($soal as $key=>$soal_ujian):
			?>

			<div class="row">

				<div class='pages' id="page<?php echo $key+1;?>" style="display:none">
				<div class="col-lg-12" id="kasus">
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
<div style="width: 100%;height:50px;padding:5px;background : rgba(255, 255, 255, 0.7);">
	<button class="btn btn-primary" style="float:right;">Selesaikan Ujian</button>
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
// var myarray = new Array();
$('input[type=radio]').change( function() {
	var id=$(this).attr('id');
	$('#check'+id).css('visibility', 'visible');
});
$('input[type=checkbox]').change( function() {
	var id=$(this).attr('id');
	$('#flag'+id).css('visibility', 'visible');
});
// 	//alert($(this).data('id'));
// 	var i = myarray.indexOf($(this).data('id'));
// 	if(i != -1){
// 	 myarray.splice(i,1);
// 	 var dataobject=$(this).data('id');
// 	 myarray.push(dataobject);
// 	}else{
// 		var dataobject=$(this).data('id');
// 		myarray.push(dataobject);
//
// 	}
// 	alert(myarray);
// });

// $(document).on('click', '.aiia-wizard-button-next', function () {
//
//
// });

// Set the date we're counting down to
var countDownDate = new Date().getTime();

// Update the count down every 1 second
var x = setInterval(function() {
	//
  // // Get todays date and time
  // var now = new Date().getTime();
	//
  // // Find the distance between now an the count down date
  // var distance = countDownDate - now;
	//
  // // Time calculations for days, hours, minutes and seconds
  // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  // var seconds = Math.floor((distance % (1000 * 60)) / 1000);
	//
  // // Display the result in the element with id="countdown"
  // document.getElementById("countdown").innerHTML = hours + "h "
  // + minutes + "m " + seconds + "s ";
	//
  // // If the count down is finished, write some text
  // if (distance < 0) {
  //   clearInterval(x);
time_ujian();
}, 1000);
$(document).ready(function() {
	document.getElementById("page1").style.display='block';
time_ujian();
});
function time_ujian(){
	var start_time='<?php echo $start_time;?>';
	var end_time='<?php echo $end_time;?>';
	var dt = new Date();
	var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
	if(start_time>=time){
	document.getElementById("countdown").innerHTML = "Belum Waktu Ujian";
	//document.getElementById("ujian").innerHTML = "";
}else if(start_time<=time){
		if(end_time==time||end_time>=time){
			document.getElementById("countdown").innerHTML = "Waktu Ujian";
		}else{
			document.getElementById("countdown").innerHTML = "Waktu Ujian Habis";
		}
	}else if(end_time<=time){
		document.getElementById("countdown").innerHTML = "Waktu Ujian Habis";
	}
}

</script>
