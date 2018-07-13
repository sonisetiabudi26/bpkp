<div class="clearfix"></div>
<h1 class="text-primary">Management Bank Soal</h1>
	<div class="info">
		<p style="color:#777;"> Ujian Sertifikasi <i class="fa fa-book"></i></p>
	</div>
<br><br>
<div class="container">
		<br/>
		<div class="row">
		<div  style="border-radius:2px; padding:2px; background:#3a6073;width:570px;">
        <button onclick="getModal(this)" id="btn-add-soal" data-href="<?php echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_add_bab_mata_ajar"; ?>" 
			data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add Bab Soal</button>
		<button onclick="getModal(this)" id="btn-distribusi-soal" data-href="<?php echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_distribusi_soal"; ?>" data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-cog"></i> Distribusi Soal</button>
        <button class="btn btn-primary" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
		<button onclick="getModal(this)" id="btn-search-soal" data-href="<?php echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_search_datatable"; ?>" 
			data-toggle="modal" data-target="#modal-content" class="btn btn-primary" onclick="show_mata_ajar()"><i class="glyphicon glyphicon-search"></i> Search from Mata Ajar</button>
		</div>
		</div>
		<br/>
		<br/>
		<div  class="row">
			<div class="col-lg-12" id="response">
				<h2 style="font-weight:1000">Table Soal</h2>
			</div>
		</div>
		<br/>
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
    </div>
 
<script type="text/javascript">
	var save_method;
	var table;
	<?php
		if(isset($_POST['fk_bab_mata_ajar'])){
	?>
			var url = "<?php echo base_url('sertifikasi')."/bank_soal/managementbanksoal/datatable_list_soal/".$_POST['fk_bab_mata_ajar']; ?>";
	<?php
		}else{
		?>
			var url = "<?php echo base_url('sertifikasi')."/bank_soal/managementbanksoal/datatable_list_soal"; ?>";
		<?php
		}
	?>
	
	$(document).ready(function() {
		showDatatable(url);
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