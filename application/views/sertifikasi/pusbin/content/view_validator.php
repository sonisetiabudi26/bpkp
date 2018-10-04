<div class="col-md-12" id="response-textx" ></div>
<div class="col-md-12">
<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/pusbin/PengusulanPengangkatan/add_validator"; ?>')" method="POST" id="validator_form" >
<input name="no_surat" style="display:none;" value="<?php echo $no_surat; ?>"></input>
    <div class="form-group">
        <label for="validator">Validator</label>
        <div >
            <select class="form-control" name='validator' id='validator'>
              <?php
                foreach ($validator as $key):
              ?>
              <option value="<?php echo $key->USER_NAME?>">
                <?php echo $key->USER_NAME;?>
              </option>
              <?php
                endforeach;
              ?>
            </select>
          </div>
    </div>

		<input id="btn-add-validator" type="submit" value="Submit" class="btn btn-primary" />
	</br>
</form>
</div>
