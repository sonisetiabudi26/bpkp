<div class="col-md-12" id="response-text" ></div>
<div class="col-md-12">
<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/bank_soal/admin/managementujian/edit_konfig_ujian"; ?>')" method="POST" id="addSoalForm" >
<table  class="table">
    <input type="text" class="form-control" name="pk_konfig_ujian" value="<?php echo $pk_konfig_ujian;?>" style="display:none;" id="pk_konfig_ujian" />
	<thead>
		<tr>
			<td><h2 class="text-primary">Form Edit Konfigurasi Ujian</h2></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<div class="form-group">
					<label for="select-mata-ajar">Waktu Mulai :</label>
          <input type="time" step="2" class="form-control" name="waktu_mulai" value="<?php echo $waktu_mulai;?>" id="waktu_mulai" />
        </div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group">
					<label for="select-list-bab-popup">Waktu Selesai :</label>
					<input type="time" step="2" class="form-control" name="waktu_selesai" value="<?php echo $waktu_selesai;?>" id="waktu_selesai" />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="kode_kasus" class="text-primary">Diklat :</label>
					<input type="text" class="form-control" name="diklat" value="<?php echo $nama_jenjang;?>" id="diklat" readonly  />
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group text-default">
					<label for="soal_kasus" class="text-primary">Mata Ajar :</label>
					<input type="text" class="form-control " name="mata_ajar" id="mata_ajar"  value="<?php echo $nama_mata_ajar;?>" readonly/>
				</div>
			</td>
		</tr>
    <tr>
			<td>
    <div class="form-group" id="content-list-jadwal">
      <label for="select-list-jadwal">Jadwal :</label>
      <select name="fk_jadwal_ujian" id="select-list-jadwal-ujian" value='<?php echo $jadwal_edit ?>' disabled class="form-control input-sm">
        <option>Pilihan</option>
        <?php
          foreach ($jadwal as $list_jadwal):
            $select=($jadwal_edit==$list_jadwal->PK_JADWAL_UJIAN?'selected':'');
        ?>
          <option <?php echo $select; ?> value="<?php echo $list_jadwal->PK_JADWAL_UJIAN;?>">
        <?php echo $list_jadwal->CATEGORY.' ('.$list_jadwal->START_DATE.' - '.$list_jadwal->END_DATE.') ';?>
          </option>
        <?php
          endforeach;
        ?>
      </select>
    </div>
  </td>
</tr>
<tr>
  <td>
    <div class="form-group" id="content-list-provinsi">
      <label for="select-list-provinsi">Lokasi :</label>
      <select name="fk_provinsi" id="select-list-provinsi" value='<?php echo $lokasi_edit ?>' disabled class="form-control input-sm">
        <option>Pilihan</option>
        <?php
          foreach ($provinsi as $list_prov):
            $select2=($lokasi_edit==$list_prov->PK_PROVINSI?'selected':'');
        ?>
          <option <?php echo $select2; ?> value="<?php echo $list_prov->PK_PROVINSI;?>">
        <?php echo $list_prov->NAMA;?>
          </option>
        <?php
          endforeach;
        ?>
      </select>
    </div>
  </td>
  </tr>
		<tr>
			<td>
				<input id="btn-save-detail" type="submit" value="Ubah Konfig Ujian" class="btn btn-primary"  />
			</td>
		</tr>
	</tbody>
</table>
</form>
</div>
