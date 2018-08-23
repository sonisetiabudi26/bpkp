<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/pusbin/ManagementUser/add_user"; ?>')" method="POST" id="add_user" >
  <input value='<?php echo $param ?>' name='role' style="display:none;"/>
		<div class="form-group">
      	<label for="category">Username</label>
          <div class="input-group" id='user'>
        	<input type="text" class="form-control text-primary" id="username" name="username" placeholder="Username" />
          <div class="input-group-addon">
              <span class="glyphicon glyphicon-user"></span>
          </div>
        </div>
    </div>
    <div class="form-group">
        <label for="startdate">Password :</label>
        <div class="input-group" id='pass'>
            <input type="password" name='password' id='password' class="form-control" placeholder="Password" >
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-lock"></span>
            </div>
          </div>
    </div>
    <!-- <div class="form-group">
        <label for="enddate">End Date :</label>
        <div class="input-group date" data-provide="datepicker" id='datetimepicker2'>
            <input type="text" name='end_date' id='end_date' class="form-control">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
          </div>
    </div> -->

		<input id="btn-add-user" type="submit" value="Submit" class="btn btn-primary" />
	</br>
</form>
</div>
<script>

</script>
