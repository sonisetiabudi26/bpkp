<style>
.col-lg-12,.col-lg-4{
  margin-bottom:10px !important;
}
</style>
<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesFormandUpload(this,'<?php echo base_url('sertifikasi')."/widyaiswara/Nilai/tambah_nip_widyaiswara"; ?>')" method="POST" id="nip_widyaiswara" >
<input name='id_wi' id='id_wi' style="display:none;" value='<?php echo $id_wi; ?>'/>

		<div class="form-group">
      <div class="col-lg-12 col-md-12 col-xs-12">
			<label for="select-mata-ajar">Diklat :</label>
			<select data-href="<?php echo base_url('sertifikasi')."/bank_soal/MataPelajaran/list_mata_ajar"; ?>"
				data-show-obj="mata_ajar" data-show-key="PK_MATA_AJAR" data-show-value="NAMA_MATA_AJAR"
					onChange="getAnotherSelectOption(this, 'select-list-mata-ajar', 'content-list-mata-ajar')" name="fk_group_mata_ajar" id="select-group-mata-ajar" class="form-control input-sm">
				<option>Pilihan</option>
				<?php
					foreach ($group_mata_ajar as $groupmataajars):
				?>
					<option value="<?php echo $groupmataajars->KODE_DIKLAT;?>">
				<?php echo $groupmataajars->NAMA_JENJANG;?> (<?php echo $groupmataajars->DESCR;?>)
					</option>
				<?php
					endforeach;
				?>
			</select>
    </div>
  </div><br/>
		<div class="form-group" id="content-list-mata-ajar" style="display:none;">
      <div class="col-lg-12 col-md-12 col-xs-12">
			<label for="select-list-mata-ajar">List Mata Ajar :</label>
			<select name="fk_mata_ajar" id="select-list-mata-ajar" class="form-control input-sm">
				<option>Pilihan</option>
			</select>
    </div>
  </div><br/>
		<div class="form-group">
      <div class="col-lg-12 col-md-12 col-xs-12">
  			<label for="bab_mata_ajar">Tanggal Release Mata Ajar :</label>
  			<input type="date" class="form-control" name="tanggal_release" id="tgl_permintaan"  required />
    </div>
  </div><br/>
    <div class="form-group">
      <label id="label-file"></label>
      <div class="col-lg-4 col-md-4 col-xs-4">
        <!-- <input style="display:none;" name='id_batch' value="<?php //echo $event;?>"/> -->
        <span class="btn btn-default btn-block btn-file" id="input_import"><i class="fa fa-file-excel-o"></i>
          Unggah Dokumen Widyaiswara 	<input name="doc_wi" id="doc_wi" type="file">
        </span>
      </div>
    <div class="col-lg-8 col-md-8 col-xs-8">
       <input type="text" class="form-control text-primary" name="file_wi" id="text-wi" readonly placeholder="Dokumen Widyaiswara"/>
       <span class="mandatory"><i>* Format dokumen harus .xlsx</i></span>
     </div>
   </div><br/>
   <div class="col-lg-12 col-md-12 col-xs-12">
		<input id="btn-add-bab-mata-ajar" type="submit" value="Submit" class="btn btn-primary" />
  </div>
</form>
</div>
<script>
$("#input_import").change(function (){

  var fileName = document.getElementById("doc_wi").value;
  $("#text-wi").val(fileName);
    // $( "#btn-add-nilai" ).prop( "disabled", false );
});
</script>
