<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/bank_soal/admin/managementujian/tambah_konfig_ujian"; ?>')" method="POST" id="konfig_form" >

  <div class="form-group">
    <label>Waktu Mulai :</label>
    <input type="time" class="form-control text-primary" id="waktu_mulai" name="waktu_mulai" step="2" placeholder="Waktu Mulai ex. 11:11:00" />
  </div>
  <div class="form-group">
    <label>Waktu Selesai :</label>
    <input type="time" class="form-control text-primary" id="waktu_selesai" name="waktu_selesai" step="2" placeholder="Waktu selesai ex. 12:11:00" />
  </div>
  <div class="form-group">
    <label for="select-mata-ajar">Diklat :</label>
    <select data-href="<?php echo base_url('sertifikasi')."/bank_soal/MataPelajaran/list_mata_ajar"; ?>"
      data-show-obj="mata_ajar" data-show-key="PK_MATA_AJAR" data-show-value="NAMA_MATA_AJAR"
        onChange="getAnotherSelectOption(this, 'select-list-mata-ajar', 'content-list-mata-ajar')" name="fk_group_mata_ajar" id="select-group-mata-ajar" class="form-control input-sm">
      <option>Pilihan</option>
      <?php
        foreach ($group_mata_ajar as $groupmataajars):
      ?>
        <option value="<?php echo $groupmataajars->KODE_DIKLAT;?>">
      <?php echo $groupmataajars->NAMA_JENJANG;?> (<?php echo $groupmataajars->DESCR;?>)
        </option>
      <?php
        endforeach;
      ?>
    </select>
  </div>
  <div class="form-group" id="content-list-mata-ajar" style="display:none;">
    <label for="select-list-mata-ajar">List Mata Ajar :</label>
    <select name="fk_mata_ajar" id="select-list-mata-ajar" onchange="getkodesoal()" class="form-control input-sm">
      <option>Pilihan</option>
    </select>
  </div>
		<div class="form-group" id="content-list-jadwal">
			<label for="select-list-jadwal">Jadwal :</label>
			<select name="fk_jadwal_ujian" id="select-list-jadwal-ujian" class="form-control input-sm">
				<option>Pilihan</option>
        <?php
					foreach ($jadwal as $list_jadwal):
				?>
					<option value="<?php echo $list_jadwal->PK_JADWAL_UJIAN;?>">
				<?php echo $list_jadwal->CATEGORY.' ('.$list_jadwal->START_DATE.' - '.$list_jadwal->END_DATE.') ';?>
					</option>
				<?php
					endforeach;
				?>
			</select>
		</div>
    <div class="form-group" id="content-list-provinsi">
			<label for="select-list-provinsi">Lokasi :</label>
			<select name="fk_provinsi" id="select-list-provinsi" class="form-control input-sm">
				<option>Pilihan</option>
        <?php
					foreach ($provinsi as $list_prov):
				?>
					<option value="<?php echo $list_prov->PK_PROVINSI;?>">
				<?php echo $list_prov->NAMA;?>
					</option>
				<?php
					endforeach;
				?>
			</select>
		</div>
    <div class="form-group">
      <label>Jumlah Soal :</label>
      <input type="number" class="form-control text-primary" id="jml_soal" name="jml_soal" placeholder="Jumlah Soal" />
    </div>
		<input id="btn-add-kode-soal" type="submit" value="Submit" class="btn btn-primary" />
	</br>
</form>
</div>
