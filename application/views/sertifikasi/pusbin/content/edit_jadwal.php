<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/pusbin/ManagementRegistrasi/edit_jadwal"; ?>')"  method="POST" id="edit_jadwalFrom" >
	<input type="text" name='id_ujian' value="<?php echo $PK_JADWAL_UJIAN ?>" style="display:none"/>
		<div class="form-group">
      	<label for="category">Category :</label>
        	<input type="text" class="form-control text-primary" value="<?php echo $CATEGORY ?>" id="category" name="category" placeholder="Category" />
    </div>
    <div class="form-group">
        <label for="startdate">Start Date :</label>
        <div class="input-group date" data-provide="datepicker" id='datetimepicker1'>
            <input type="text" name='start_date' id='start_date' value="<?php echo $START_DATE ?>" class="form-control">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
          </div>
    </div>
    <div class="form-group">
        <label for="enddate">End Date :</label>
        <div class="input-group date" data-provide="datepicker" id='datetimepicker2'>
            <input type="text" name='end_date' id='end_date' value="<?php echo $END_DATE ?>" class="form-control">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
          </div>
    </div>
		<div class="form-group">
				<label for="pass_grade">Passing Grade Kelulusan:</label>
					<input type="number" class="form-control text-primary" id="pass_grade" name="pass_grade" value="<?php echo $PASS_GRADE ?>" placeholder="Passing Grade" />
		</div>
		<input id="btn-edit-jadwal" type="submit" value="Ubah" class="btn btn-primary" />
	</br>
</form>
</div>
