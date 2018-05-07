<div class="modal fade" id="confirm-next" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Konfirmasi Masuk Ujian</h4>
                </div>
            
                <div class="modal-body">
                    <p>Anda akan diarahkan ke ujian online.</p>
                    <p>Apakah Anda Sudah Siap Untuk Ujian ini?</p>
                    <p class="debug-url"></p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Next</a>
                </div>
            </div>
        </div>
    </div>
<div class="clearfix"></div>
<h1>Ujian Sertifikasi</h1>
   <div class="info"><p> Auditor <i class="fa fa-pencil"></i></p></div>
<div class="clearfix">&nbsp;</div>
<div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p style="color:#eee;">Step 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle disabled" >2</a>
            <p style="color:#eee;">Step 2</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle disabled" >3</a>
            <p style="color:#eee;">Step 3</p>
        </div>
    </div>
</div>
<form role="form">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3 style="color:#ccc;"> Step 1</h3>
				<div><p style="color:#999;"> Input NIP <i class="fa fa-pencil"></i></p></div>
				<div class="clearfix">&nbsp;</div>
                <form>
			<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
			<div class="form-group" style="color:#fff;">
				<label class="control-label space-15" ><span> NIP</span></label>
					<div class="input-group">
						<input maxlength="100" type="text" required="required" type="text" id="nip" name="nip" class="form-control" placeholder="Masukan NIP">
						<span class="input-group-btn">
							<button id="next" class="btn btn-primary nextBtn" type="button">Lanjutkan</button>
						</span>
					</div>
				</div>
			</div>
		</form>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3 style="color:#ccc;"> Step 2</h3>
				<div><p style="color:#999;"> Input Kode Ujian <i class="fa fa-pencil"></i></p></div>
				<div class="clearfix">&nbsp;</div>
		<form>
			<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
				<div class="form-group" style="color:#fff;">
					<label class="control-label space-5"> Kode Ujian</label>
					<div class="input-group">
						<input type="text" maxlength="100" type="text" required="required" id="kodeUjian" name="kodeUjian" class="form-control" placeholder="Masukan Kode Ujian">
						<span class="input-group-btn">
							<button id="next-2" class="btn btn-primary nextBtn" type="button">Lanjutkan</button>
						</span>
					</div>
				</div>
			</div>
		</form>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3 style="color:#ccc;"> Step 3</h3>
				<div><p style="color:#999;"> Pilih Ujian <i class="fa fa-pencil"></i></p></div>
				<div class="clearfix">&nbsp;</div>
                <div class="row">
					<div class="col-lg-6">
						<button data-url="/ujian_online.php?id=23" data-toggle="modal" data-target="#confirm-next" class="col-lg-12 col-md-6 col-xs-12 btn-primary btn-box">
							<h2>Ujian 1</h2>
						</button>
					</div>
					<div class="col-lg-6">
						<button data-url="/ujian_online.php?id=23" data-toggle="modal" data-target="#confirm-next" class="col-lg-12 col-md-6 col-xs-12 btn-primary btn-box">
							<h2>Ujian 2</h2>
						</button>
					</div>
					<div class="col-lg-6">
						<button data-url="/ujian_online.php?id=23" data-toggle="modal" data-target="#confirm-next" class="col-lg-12 col-md-6 col-xs-12 btn-primary btn-box">
							<h2>Ujian 3</h2>
						</button>
					</div>
					<div class="col-lg-6">
						<button data-url="/ujian_online.php?id=23" data-toggle="modal" data-target="#confirm-next" class="col-lg-12 col-md-6 col-xs-12 btn-primary btn-box">
							<h2>Ujian 4</h2>
						</button>
					</div>
				</div>
            </div>
        </div>
    </div>
</form>
</div>
<script>
	$('#confirm-next').on('show.bs.modal', function(e) {
		$(this).find('.btn-ok').attr('url', $(e.relatedTarget).data('url'));
		$('.debug-url').html('Masuk Ujian URL: <strong>' + $(this).find('.btn-ok').attr('url') + '</strong>');
	});
</script>