<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/pusbin/ManagementRegistrasi/tambah"; ?>')" method="POST" id="jadwalFrom" >
		<div class="form-group">
      	<label for="category">Category :</label>
        	<input type="text" class="form-control text-primary" id="category" name="category" placeholder="Category" />
    </div>
    <div class="form-group">
        <label for="startdate">Start Date :</label>
        <div class="input-group date" data-provide="datepicker" id='datetimepicker1'>
            <input type="text" name='start_date' id='start_date' class="form-control">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
          </div>
    </div>
    <div class="form-group">
        <label for="enddate">End Date :</label>
        <div class="input-group date" data-provide="datepicker" id='datetimepicker2'>
            <input type="text" name='end_date' id='end_date' class="form-control">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
          </div>
    </div>
	
		<input id="btn-add-jadwal" type="submit" value="Submit" class="btn btn-primary" />
	</br>
</form>
</div>
