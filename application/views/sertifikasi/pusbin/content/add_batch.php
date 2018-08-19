<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesForm(this, 'response-text')" action="<?php echo base_url('sertifikasi')."/pusbin/PerhitunganNilai/tambahBatch"; ?>" method="POST" id="batchList" >
  <div class="row">
      <div class="form-group">
        <div class="col-md-12">
        <label for="category">Kode Event :</label>
        <input type="text" class="form-control text-primary" id="event" name="event" value="<?php echo $id_event?>" placeholder="Kelas" readonly />
      </div>
    </div>
  </div><br/>
  <div class="row">
      <div class="form-group">
        <div class="col-md-12">
        <label for="category">Kelas :</label>
        	<input type="text" class="form-control text-primary" id="kelas" name="kelas" placeholder="Kelas" />
        </div>
      </div>
  </div><br/>
  <div class="row">
      <div class="form-group">
        <div class="col-md-12">
        <label for="category">Jadwal :</label>
        <select name="jadwal" class="form-control input-sm">
          <option value="">Pilihan</option>
          <?php
            foreach ($jadwal as $key):
          ?>
            <option value="<?php echo $key->PK_JADWAL_UJIAN;?>"><?php echo $key->CATEGORY.' ('. $key->START_DATE .'-'. $key->END_DATE.')'?></option>
          <?php
            endforeach;
          ?>
        </select>
      </div>
    </div>
  </div><br/>
  <div class="row">
      <div class="form-group">
        <div class="col-md-12">
        <label for="category">Refrensi :</label>
          <input type="text" class="form-control text-primary" id="reff" name="reff" placeholder="Refrensi" />
        </div>
      </div>
  </div><br/>
  <div class="row">
    <div class="col-md-12">
  	<input id="btn-add-event" type="submit" value="Submit" class="btn btn-primary" />
  </div>
  </div>
	</br>
</form>
</div>
<script>

</script>
