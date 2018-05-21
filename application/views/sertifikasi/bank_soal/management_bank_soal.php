<div class="clearfix"></div>
<h1>Management Bank Soal</h1>
	<div class="info">
		<p> Ujian Sertifikasi <i class="fa fa-book"></i></p>
	</div>
<br><br>
<div class="container">
        <button onclick="getModal(this)" id="btn-add-soal" data-href="<?php echo base_url('sertifikasi')."/bank_soal/AdminBankSoal/vw_add_soal"; ?>" data-toggle="modal" data-target="#modal-content" class="btn btn-primary"></i> Add Soal</button>
        <button class="btn btn-success" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br />
        <br />
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
	
	$(document).ready(function() {
		table = $('#table').DataTable({ 
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?php echo base_url('sertifikasi')."/bank_soal/managementbanksoal/datatable_list_soal"; ?>",
				"type": "POST"
			},
			"columnDefs": [
			{ 
				"targets": [ -1 ],
				"orderable": false
			},
			],
		});
	});

	function reload_table()
	{
		table.ajax.reload(null,false);
	}
</script>