<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesForm(this, 'response-text')" action="<?php echo base_url('sertifikasi')."/pusbin/PerhitunganNilai/tambah"; ?>" method="POST" id="eventList" >
  <div class="row">
    <div class="form-group">
      <div class="col-md-3">
      	<label for="category">Kode Diklat :</label>
        	<input type="number" class="form-control text-primary" onchange="createKodeEventDiklat()" id="kodediklat" name="kodediklat" placeholder="Kode Diklat" />
        </div>
        <div class="col-md-3">
          <label for="category">Bulan :</label>
            <input type="number" class="form-control text-primary" onchange="createKodeEvent()" id="bulan" name="bulan" placeholder="Category" />
          </div>
        <div class="col-md-3">
          <label for="category">Tahun :</label>
            <input type="number" class="form-control text-primary" onchange="createKodeEvent()" id="tahun" name="tahun" placeholder="tahun" />
          </div>
        <div class="col-md-3">
          <label for="category">Kode Event :</label>
            <input type="text" class="form-control text-primary"  id="kodeevent" readonly name="kodeevent" placeholder="KodeEvent" />
          </div>
    </div>
  </div><br/>
  <div class="row">
      <div class="form-group">
        <div class="col-md-12">
        <label for="category">Nama Diklat :</label>
        	<input type="text" class="form-control text-primary" readonly id="namadiklat" name="namadiklat" placeholder="Nama Diklat" />
        </div>
      </div>
  </div><br/>
  <div class="row">
      <div class="form-group">
        <div class="col-md-12">
        <label for="category">Uraian :</label>
        	<input type="text" class="form-control text-primary" id="uraian" name="uraian" placeholder="Uraian" />
      </div>
    </div>
  </div><br/>
  <div class="row">
      <div class="form-group">
        <div class="col-md-12">
        <label for="category">Wilayah :</label>
        <select name="provinsi" class="form-control input-sm">
          <option value="">Pilihan</option>
          <?php
            foreach ($provinsi as $key):
          ?>
            <option value="<?php echo $key->PK_PROVINSI;?>"><?php echo $key->PK_PROVINSI.'-'. $key->NAMA?></option>
          <?php
            endforeach;
          ?>
        </select>
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
  function createKodeEvent(){
  var kodediklat=  $('#kodediklat').val();
  var bulan     =  $('#bulan').val();
  var tahun     =  $('#tahun').val();
  var kodeevent=kodediklat+bulan+tahun;

    	document.getElementById("kodeevent").value=kodeevent;
  }
  function createKodeEventDiklat(){
    var kodediklat=$('#kodediklat').val();
    $.ajax({
        url : "<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/CheckNodiklat/')?>/"+kodediklat,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
          if(data.msg!='No data diklat'){
              document.getElementById("namadiklat").value=data[0].diklat;
              createKodeEvent();
            }else{
              document.getElementById("namadiklat").value='';
              createKodeEvent();
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
             alert('gagal get data diklat');

        }
    });


  }
</script>
