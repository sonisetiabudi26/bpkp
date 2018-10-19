<style>
	.card{
		padding:10px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	.card-title{
		color:#fff;
	}
	.card-text{
		color:#fff;
	}
	.card-body{
		height:70px;
	}
</style>
<div class="row">
  <div class="col-sm-3">
    <div class="card" style="background:#D7768F">
      <div class="card-body">
				<div class="col-lg-2">
					<label style="font-size:45px;color:#fff"><i class="fa fa-file-o"></i></label>
				</div>
				<div class="col-lg-10">
	        <h5 class="card-title"><b>Total Soal Yang Ditayangkan</b></h5>
	        <h2 class="card-text">6 SOAL</h2>
				</div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="background:#76B5D7">
      <div class="card-body">
				<div class="col-lg-2">
					<label style="font-size:45px;color:#fff"><i class="fa fa-list-alt"></i></label>
				</div>
				<div class="col-lg-10">
				<h5 class="card-title"><b>Total Permintaan Buat Soal</b></h5>
        <h2 class="card-text"><?php echo $permintaan ?> SOAL</h2>
			</div>
      </div>
    </div>
  </div>
	<div class="col-sm-3">
		<div class="card" style="background:#60BF6B">
			<div class="card-body">
				<div class="col-lg-2">
					<label style="font-size:45px;color:#fff"><i class="fa fa-file-code-o"></i></label>
				</div>
				<div class="col-lg-10">
				<h5 class="card-title"><b>Total Kode Soal</b></h5>
				<h2 class="card-text"><?php echo $kode_soal ?> BUTIR</h2>
			</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card" style="background:#59BBAE">
			<div class="card-body">
				<div class="col-lg-2">
					<label style="font-size:45px;color:#fff"><i class="fa fa-gear"></i></label>
				</div>
				<div class="col-lg-10">
				<h5 class="card-title"><b>Total Konfigurasi Ujian</b></h5>
        <h2 class="card-text"><?php echo $konfig; ?> KONFIG</h2>
			</div>
			</div>
		</div>
	</div>
</div>
