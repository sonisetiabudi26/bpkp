<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/bank_soal/permintaan/add_comment"; ?>')" method="POST" id="commnet_form" >
		<div class="form-group">
      <input name="id_permintaan" style="display:none"  value="<?php echo $id_permintaan ?>"/>
      <input name="status" style="display:none"  value="<?php echo $status ?>"/>
			<label for="fk_group_mata_ajar">Komentar :</label>
			   <textarea name="comment" rows='7'style="width:100%" placeholder="Tulis Komentar"></textarea>
		</div>
		<input id="btn-add-bab-mata-ajar" type="submit" value="Submit" class="btn btn-primary form-control" />
	</br>
</form>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
<table id="tablesoal" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
		<tr>
			<th>No</th>
			<th>BAB Mata Ajar</th>
			<th>Tipe Soal</th>
			<th>Tanggal Permintaan</th>
			<th>Jumlah Soal</th>
			<th>Action</th>
		</tr>
</thead>
<tbody></tbody>
</table>
</div>
</div>
</div>
