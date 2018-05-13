<table id="datatable-responsive" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
	<thead style="color:#111;">
		<tr>
			<td>Pertanyaan</td>
			<td>Pilihan 1</td>
			<td>Pilihan 2</td>
			<td>Pilihan 3</td>
			<td>Pilihan 4</td>
			<td>Jawaban</td>
		</tr>
	</thead>
	<tbody style="color:#333;">
		<?php
	foreach ($soal as $soals):
?>
	<tr>
		<td>
			<a class="text-primary" onclick="getModalWithParam(this)" data-href="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/detail"; ?>" class="text-default" 
				data-var="pk_soal_ujian" data-id="<?php echo $soals->PK_SOAL_UJIAN; ?>" data-toggle="modal" data-target="#modal-content">
				<?php echo $soals->PERTANYAAN; ?> <i class="fa fa-pencil"></i></a>
		</td>
		<td>
			<?php echo $soals->PILIHAN_1; ?>
		</td>
		<td>
			<?php echo $soals->PILIHAN_2; ?>
		</td>
		<td>
			<?php echo $soals->PILIHAN_3; ?>
		</td>
		<td>
			<?php echo $soals->PILIHAN_4; ?>
		</td>
		<td>
			<?php echo $soals->JAWABAN; ?>
		</td>
	</tr>
	<?php
		endforeach;
	?>
	</tbody>
</table>			
<script>
	$('#datatable-responsive').DataTable();
</script>