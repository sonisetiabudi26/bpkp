<div class="col-lg-12" id="countdown">
</div>

<div class="col-lg-12" id="ujian">
<form>
	<div class="outer-container">
		<div class="col-lg-12" style="font-weight:1000;">
	<b class="badge" style="background: #3a7bd5;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #3a6073, #3a7bd5);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #3a6073, #3a7bd5); ">Ujian Sertifikasi JFA</b><hr>
</div>
		<div id="wizard" class="aiia-wizard" style="display: none;background:#fff;padding:5px;border-radius:3px;">
			<?php
				foreach ($soal as $soal_ujian):
			?>
			<div class="aiia-wizard-step">
				<h1><?php echo $soal_ujian[5];?></h1>
				<div class="step-content">
					<p>
						<input type="radio" name="jawaban<?php echo $soal_ujian[4];?>" value="<?php echo $soal_ujian[0];?>" /> A. <?php echo $soal_ujian[0];?>
					</p>
					<p>
						<input type="radio" name="jawaban<?php echo $soal_ujian[4];?>" value="<?php echo $soal_ujian[1];?>" /> B. <?php echo $soal_ujian[1];?>
					</p>
					<p>
						<input type="radio" name="jawaban<?php echo $soal_ujian[4];?>" value="<?php echo $soal_ujian[2];?>" /> C. <?php echo $soal_ujian[2];?>
					</p>
					<p>
						<input type="radio" name="jawaban<?php echo $soal_ujian[4];?>" value="<?php echo $soal_ujian[3];?>" /> D. <?php echo $soal_ujian[3];?>
					</p>
				</div>
			</div>
			<?php
				endforeach;
			?>

		</div>
	</div>
</form>
</div>
<script>
// Set the date we're counting down to
var countDownDate = new Date("May 30, 2018 01:18:05").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="countdown"
  document.getElementById("countdown").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown").innerHTML = "EXPIRED";
	//document.getElementById("ujian").innerHTML = "";
  }
}, 1000);
</script>