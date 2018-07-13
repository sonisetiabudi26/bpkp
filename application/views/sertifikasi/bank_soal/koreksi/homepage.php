<div class="row">
	<div class="col-lg-12 bg-warning" style="min-height:10px;">
		<h4>Badan Pengawasan Keuangan dan Pembangunan</h4>
		<small>Selamat datang dihalaman Bank Soal,</small><hr>
	</div>
	<div class="col-lg-12">
		<div class="container bg-info" style="border-radius:5px;padding:5px">
			<button onclick="getModal(this)" id="btn-add-soal" data-href="<?php echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_add_bab_mata_ajar"; ?>" 
			data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add Bab Soal</button>
			
			<button onclick="getModal(this)" id="btn-import-soal" data-href="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/vw_import_soal"; ?>" data-toggle="modal" data-target="#modal-content" class="btn btn-primary">
			<i class="fa fa-pencil"></i> Import Soal
		</button>
		</div>
		<br>
		<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<div class="form-group">
					<label for="select-mata-ajar">Review Mata Ajar :</label>
					<select data-show-obj="bab" data-show-key="PK_BAB_MATA_AJAR" data-show-value="NAMA_BAB_MATA_AJAR" onChange="getAnotherSelectOption(this, 'select-list-bab-popup', 'content-list-bab-popup')" 
					data-href="<?php echo base_url('sertifikasi')."/bank_soal/BabMataPelajaran/listbab"; ?>" name="fk_mata_ajar" id="select-mata-ajar-popup" class="form-control input-sm">
						<option value="0">Pilihan</option>
						<?php
							foreach ($mata_ajar as $mataajars):
						?>
						<option value="<?php echo $mataajars->PK_MATA_AJAR;?>"><?php echo $mataajars->NAMA_MATA_AJAR;?> (<?php echo $mataajars->DESCR;?>)</option>
						<?php
							endforeach;
						?>
					</select>
				</div>
				
				
				<div class="form-group" id="content-list-bab-popup" style="display:none;">
					<label for="select-list-bab-popup">List BAB :</label>
					<select data-show-obj="soalkasus" data-show-key="PK_SOAL_KASUS" data-show-value="KODE_KASUS" onChange="getAnotherSelectOption(this, 'select-list-kasus', 'content-list-bab-popup')" 
					data-href="<?php echo base_url('sertifikasi')."/bank_soal/SoalUjianKasus/listsoalkasus"; ?>" name="fk_bab_mata_ajar" id="select-list-bab-popup" class="form-control input-sm">
						<option value="0">Pilihan</option>
					</select>
				</div>
				
				
				
<form onsubmit="procesForm(this, 'response-text')" action="<?php echo base_url('sertifikasi')."/bank_soal/soal/insert_soal"; ?>" method="POST" id="addSoalForm" >
<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Pertanyaan</th>
                    <th>Pilihan 1</th>
                    <th>Pilihan 2</th>
                    <th>Pilihan 3</th>
                    <th>Pilihan 4</th>
					<th>Jawaban</th>
					<th>Soal Kasus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="color:#333;">
            </tbody>
            <tfoot>
            <tr>
                <th>Pertanyaan</th>
                <th>Pilihan 1</th>
                <th>Pilihan 2</th>
                <th>Pilihan 3</th>
                <th>Pilihan 4</th>
				<th>Jawaban</th>
				<th>Soal Kasus</th>
				<th>Action</th>
            </tr>
            </tfoot>
        </table>
</form>
</div>
	</div>
</div>
<script type="text/javascript">
	var save_method;
	var table;
	
	$('#select-list-bab-popup').change(function(){
		var fk_bab_mata_ajar = $(this).val();
		var url = "<?php echo base_url('sertifikasi').'/bank_soal/managementbanksoal/datatable_list_soal/'?>"+fk_bab_mata_ajar;
		if(fk_bab_mata_ajar>0){
			showDatatable(url);
		}
		
	});
	
	function showDatatable(urlPar){
		table = $('#table').DataTable({ 
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": urlPar,
				"type": "POST"
			},
			"columnDefs": [
			{ 
				"targets": [ -1 ],
				"orderable": false
			},
			],
		});
	}

	function reload_table()
	{
		table.ajax.reload(null,false);
	}
</script>