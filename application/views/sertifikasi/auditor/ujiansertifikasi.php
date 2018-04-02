<div class="page-title">
	<div class="title_left">
		<h3>Ujian Sertifikasi</h3>
	</div>
</div>
<div class="clearfix"></div>

<div class="row">
	<div class="col-md-12">
	<div class="clearfix">&nbsp;</div>
	<div id="formKodeUjian" style="display:block;">
		<form>
			<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
				<div class="input-group">
					<input type="text" id="kodeUjian" name="kodeUjian" class="form-control" placeholder="Masukan Kode Ujian">
					<span class="input-group-btn">
						<button id="next" class="btn btn-primary" type="button">Lanjutkan</button>
					</span>
				</div>
			</div>
		</form>
	</div>
	
	<div id="formGetNip" style="display:none;">
		<form>
			<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
				<div class="input-group">
					<input type="text" id="kodeUjian" name="kodeUjian" class="form-control" placeholder="Masukan NIP">
					<span class="input-group-btn">
						<button id="next-2" class="btn btn-primary" type="button">Lanjutkan</button>
					</span>
				</div>
			</div>
		</form>
	</div>
	
	<div id="formShowData" style="display:none;">
		<div class="table-responsive">
			<h4>Data Auditor</h4>
			<table class="table">
				<tr>
					<th>Kolom 1</th>
					<th>Isi Kolom 1</th>
				</tr>
				<tr>
					<th>Kolom 2</th>
					<th>Isi Kolom 2</th>
				</tr>
				<tr>
					<th>Kolom 3</th>
					<th>Isi Kolom 3</th>
				</tr>
				<tr>
					<th>Kolom 4</th>
					<th>Isi Kolom 4</th>
				</tr>
			</table>
			<button id="next-3" class="btn btn-primary" type="button">Lanjutkan</button>
		</div>
	</div>
	
	<div id="formStartUjian" style="display:none;">
		<div class="table-responsive">
			<h4>Ujian Auditor</h4>
			<table class="table">
				<tr>
					<th colspan="4">Pertanyaan 1?</th>
				</tr>
				<tr>
					<th><div class="checkbox"><label><input type="checkbox" value="">A. Option 1</label></div></th>
					<th><div class="checkbox"><label><input type="checkbox" value="">B. Option 2</label></div></th>
					<th><div class="checkbox"><label><input type="checkbox" value="">C. Option 3</label></div></th>
					<th><div class="checkbox"><label><input type="checkbox" value="">D. Option 4</label></div></th>
				</tr>
				
				<tr>
					<th colspan="4">Pertanyaan 2?</th>
				</tr>
				<tr>
					<th><div class="checkbox"><label><input type="checkbox" value="">A. Option 1</label></div></th>
					<th><div class="checkbox"><label><input type="checkbox" value="">B. Option 2</label></div></th>
					<th><div class="checkbox"><label><input type="checkbox" value="">C. Option 3</label></div></th>
					<th><div class="checkbox"><label><input type="checkbox" value="">D. Option 4</label></div></th>
				</tr>
				
				<tr>
					<th colspan="4">Pertanyaan 3?</th>
				</tr>
				<tr>
					<th><div class="checkbox"><label><input type="checkbox" value="">A. Option 1</label></div></th>
					<th><div class="checkbox"><label><input type="checkbox" value="">B. Option 2</label></div></th>
					<th><div class="checkbox"><label><input type="checkbox" value="">C. Option 3</label></div></th>
					<th><div class="checkbox"><label><input type="checkbox" value="">D. Option 4</label></div></th>
				</tr>
			</table>
			<button id="next-4" class="btn btn-primary" type="button">Lanjutkan</button>
		</div>
	</div>
	</div>	
</div>
<script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js')?>"></script>
<script>
$('#next').click(function() {
	$('#formKodeUjian').hide();
    $('#formGetNip').show();
});

$('#next-2').click(function() {
	$('#formKodeUjian').hide();
    $('#formGetNip').hide();
	$('#formShowData').show();
	
});

$('#next-3').click(function() {
	$('#formKodeUjian').hide();
    $('#formGetNip').hide();
	$('#formShowData').hide();
	$('#formStartUjian').show();
});
</script>