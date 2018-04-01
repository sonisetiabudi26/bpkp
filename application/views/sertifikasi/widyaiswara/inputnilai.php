

<div class="clearfix"></div>

<div class="row">
<h1>Dashboard Widyaiswara</h1>
   <div class="info"><p> Form Input Nilai <i class="fa fa-pencil"></i></p></div>
  
  <form class="form-style">
        <h1>Input Nilai Auditor</h1>
        
    <div class="contentform">
        <div id="sendmessage">
		<?php
			if(isset($messages)){?>
			<div>
				<div class="alert alert-danger">
					<strong><?php echo trim($messages);?></strong><button type="button" class="close" data-dismiss="alert">x</button>
				</div>
			</div>
		<?php }?>
		</div>
		<div class="form-group">
			<p>NPK<span>*</span></p>
			<span class="icon-case"><i class="fa fa-search"></i></span>
			<input type="text" name="npk" id="npk" placeholder="masukan npk" />
		</div>
		<button id="search" class="btn btn-sm btn-default">Search</button>
		<div class="clearfix">&nbsp;</div>
		<div class="form-group">
			<p>Pilih Nama Ujian<span>*</span></p>
			<select class="form-control" id="exampleFormControlSelect1">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		</div>
		<div class="clearfix">&nbsp;</div>
		<div class="leftcontact">
			<div class="form-group">
				<p>Nama<span></span></p>
				<span class="icon-case"><i class="fa fa-male"></i></span>
				<input type="text" name="nama" id="nama" readonly />
			</div>
			<div class="form-group">
				<p>Nilai<span></span></p>
				<span class="icon-case"><i class="fa fa-pencil"></i></span>
				<input type="number" name="nilaiUjian" id="nilaiUjian" />
			</div>
		</div>

		<div class="rightcontact">  
			<div class="form-group">
				<p>Alamat<span></span></p>
				<span class="icon-case"><i class="fa fa-location-arrow"></i></span>
				<input type="text" name="alamat" id="alamat" readonly />
			</div>
			<div class="form-group">
				<p>Lokasi<span></span></p>
				<span class="icon-case"><i class="fa fa-location-arrow"></i></span>
				<input type="text" name="lokasi" id="lokasi" readonly />
			</div>
		</div>
		<button type="submit" class="button-style">Send</button>
	</form> 
</div>
