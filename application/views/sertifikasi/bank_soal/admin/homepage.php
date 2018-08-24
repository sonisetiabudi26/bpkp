<div class="row">
	<div class="col-lg-12 bg-warning" style="min-height:10px;">
		<h4>Badan Pengawasan Keuangan dan Pembangunan</h4>
		<small>Selamat datang dihalaman Management Soal,</small><hr>
	</div>
	<div class="col-lg-6">
		<div class="container bg-info" style="border-radius:5px;padding:5px">
			<span class="text-primary"><span class="glyphicon glyphicon-file"></span> List Soal / Bab Mata Ajar </span>
		</div>
		<br>
		<div class="container">
			<table class="table table-striped table-bordered nowrap" >
				<thead style="color:#111;">
					<tr>
						<td>Nama Diklat</td>
						<td>Group</td>
						<td>Mata Ajar</td>
						<td>Bab Mata Ajar</td>
					</tr>
				</thead>
				<tbody style="color:#333;">
				<?php
					foreach ($bank_soal as $bank_soals):
				?>
					<tr>
						<td>
							<?php echo $bank_soals->DESCR; ?>
						</td>
						<td>
							<?php echo $bank_soals->NAMA_JENJANG; ?>
						</td>
						<td>
							<?php echo $bank_soals->NAMA_MATA_AJAR; ?>
						</td>
						<td>
							<?php echo $bank_soals->NAMA_BAB_MATA_AJAR; ?>
						</td>
					</tr>
				<?php
					endforeach;
				?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="container bg-info" style="border-radius:5px;padding:5px">
			<span class="text-primary"><span class="glyphicon glyphicon-ok"></span> Approve Soal Ujian </span>
		</div><br>
		<div class="container" >
			<table class="table table-striped table-bordered nowrap" >
	<thead style="color:#111;">
		<tr>
			<td>Bab Mata Ajar</td>
			<td>Status</td>
			<td>Reviewer</td>
		</tr>
	</thead>
	<tbody style="color:#333;">
		<?php
			foreach ($review_soal as $review_soals):
		?>
		<tr>
			<td>
				<?php echo $review_soals->NAMA_BAB_MATA_AJAR; ?>
			</td>
			<td>
				<?php echo $review_soals->DESCR; ?>
			</td>
			<td>
				<?php echo $review_soals->REVIEWER; ?>
			</td>
		</tr>
	<?php
		endforeach;
	?>
	</tbody>
</table>
		</div>
	</div>
</div>
