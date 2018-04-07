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
					<div class="col-lg-6"><button class="col-lg-12 btn-primary" style="border-radius:3px;padding:5px;">Ujian 1</button></div>
					<div class="col-lg-6"><button class="col-lg-12 btn-primary" style="border-radius:3px;padding:5px;">Ujian 2</button></div>
					<div class="col-lg-6"><button class="col-lg-12 btn-primary" style="border-radius:3px;padding:5px;">Ujian 3</button></div>
					<div class="col-lg-6"><button class="col-lg-12 btn-primary" style="border-radius:3px;padding:5px;">Ujian 4</button></div>
				</div>
            </div>
        </div>
    </div>
</form>
</div>