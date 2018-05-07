<table  class="table  table-bordered">
	<thead>
		<tr>
			<td>List Pertanyaan <span class="badge text-danger">Pending</span></td>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach ($soal as $soals):
	?>
		<tr>
			<td>
				<a href="#" class="text-default" data-id="<?php echo $soals->PK_SOAL_UJIAN; ?>" data-toggle="modal" data-target="#modal-content">
					<?php echo $soals->PERTANYAAN; ?> <i class="fa fa-pencil"></i></a>
			</td>
		</tr>
		<?php
			endforeach;
		?>
	</tbody>
</table>
<div class="form-group">
	<label for="lookup_bank_soal">Pilih User :</label>
	<select name="pk_user" class="form-control input-sm">
		<option>-- Pilih User --</option>
		<?php
			foreach ($user_bank_soal as $user_bank_soals):
		?>
		<option value="<?php echo $user_bank_soals->PK_USER;?>"><?php echo $user_bank_soals->USER_NAME;?></option>
		<?php
			endforeach;
		?>
	</select>
</div>
<button class="btn btn-primary btn-block">Kirim</button>

<div id="modal-content" class="modal fade bs-example-modal-lg"
	tabindex="-1" role="dialog" aria-labelledby="myStandardModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">
					<b>Edit Soal Ujian</b>
				</h4>
			</div>
			<div class="modal-body" style="min-height:300px;overflow-y:auto;">
      </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script>
$('#modal-content').on('show.bs.modal', function(e) {
	var pk_soal_ujian = $(e.relatedTarget).data('id');
	var $modal = $(this), esseyId = e.relatedTarget.id;
	$.ajax({
		data:{pk_soal_ujian:pk_soal_ujian},
		cache : false,
		type : 'POST',
		url : '<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/detail"; ?>',
		success : function(data) {
			$modal.find('.modal-body').html(data);
		}
	});
});

$('body').on('hidden.bs.modal', '.modal', function () {
  $(this).removeData('bs.modal');
});
</script>