<div class="col-md-12" id="response-textx" ></div>
<div class="col-md-12">
<form onsubmit="procesForm(this, 'response-textx')" action="<?php echo base_url('sertifikasi')."/pusbin/PengusulanPengangkatan/add_validator"; ?>" method="POST" id="jadwalFrom" >
<input name="unitkerja" style="display:none;" value="<?php echo $unitkerja; ?>"></input>
    <div class="form-group">
        <label for="validator">Validator sesuai unit kerja</label>
        <div >
            <select class="form-control" name='validator' id='validator'>
              <?php
                foreach ($validator as $key):
              ?>
              <option value="<?php echo $key?>">
                <?php echo $key;?>
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
