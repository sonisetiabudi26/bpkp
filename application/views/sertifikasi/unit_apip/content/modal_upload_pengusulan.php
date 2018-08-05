<form onsubmit="uploadFilePengusulan(this, 'response-texts')" action="<?php echo base_url('sertifikasi')."/unit_apip/PengusulanPengangkatan/upload_submit"; ?>" enctype="multipart/form-data" method="POST" id="daftar_pengusulan">
<div class="col-md-12" id="response-texts" ></div>
<input name="desc" style="display:none;" value="<?php echo $desc; ?>"></input>
<input name="id_pengusul" style="display:none;" value="<?php echo $id_pengusul; ?>"></input>
<input name="nip" style="display:none;" value="<?php echo $nip; ?>"></input>
  <?php
  if($desc=='1' ||$desc=='2' ){?>

    <div class="row">
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_sk_cpns"><i class="fa fa-file"></i>
            SK CPNS <input name="doc_cpns" id="doc_cpns" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_sk_cpns" id="text-sk_cpns" placeholder="doc SK CPNS" />
       </div>
     </div>
    </div>
    <div class="row"><br/>
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_sk_pns"><i class="fa fa-file"></i>
            SK PNS <input name="doc_pns" id="doc_pns" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_sk_pns" id="text-sk_pns" placeholder="SK PNS" />
       </div>
     </div>
   </div><br/>
    <div class="row">
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_ijazah"><i class="fa fa-file"></i>
            Ijazah <input name="doc_ijazah" id="doc_ijazah" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_ijazah" id="text-ijazah" placeholder="Ijazah" />
       </div>
     </div>
    </div><br/>
    <div class="row">
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_sk_prajab"><i class="fa fa-file"></i>
            SK Prajab <input name="doc_prajab" id="doc_prajab" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_prajab" id="text-prajab" placeholder="SK Prajab" />
       </div>
     </div>
    </div><br/>
    <div class="row">
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_sk_diklat"><i class="fa fa-file"></i>
            SK Ikut Diklat <input name="doc_sk_diklat" id="doc_sk_diklat" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_sk_diklat" id="text-sk_diklat" placeholder="SK Ikut Diklat" />
       </div>
     </div>
    </div><br/>
    <div class="row">
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_skp"><i class="fa fa-file"></i>
            SKP <input name="doc_skp" id="doc_skp" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_skp" id="text-skp" placeholder="SKP" />
       </div>
     </div>
    </div><br/>
    <div class="row">
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_sk_lulus"><i class="fa fa-file"></i>
            SK LULUS <input name="doc_sk_lulus" id="doc_sk_lulus" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_sk_lulus" id="text-sk_lulus" placeholder="SK Lulus" />
       </div>
     </div>
    </div><br/>
    <div class="row">
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_daftar_penugasan"><i class="fa fa-file"></i>
            Daftar Penugasan <input name="doc_penugasan" id="doc_penugasan" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_penugasan" id="text-penugasan" placeholder="Daftar Penugasan" />
       </div>
     </div>
   </div><br/>
    <?php if($desc=='2'){?>
      <div class="row">
        <div class="form-group">
          <div class="col-lg-4">
            <span class="btn btn-primary btn-block btn-file" id="input_sk_pangkat_terakhir"><i class="fa fa-file"></i>
              SK Pangkat Terakhir <input name="doc_pangkat_terakhir" id="doc_pangkat_terakhir" type="file">
            </span>
          </div>
        <div class="col-lg-8">
           <input type="text" class="form-control text-primary" name="file_pangkat_terakhir" id="text-pangkat_terakhir" placeholder="SK Pangkat Terakhir" />
         </div>
       </div>
      </div>
    <?php } ?>
  <?php }else if($desc=='4'){?>
    <div class="row">
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_sk_pangkat"><i class="fa fa-file"></i>
            SK Pangkat <input name="doc_sk_pangkat" id="doc_sk_pangkat" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_sk_pangkat" id="text-sk_pangkat" placeholder="SK Pangkat" />
       </div>
     </div>
    </div>
    <div class="row"><br/>
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_sk_riwayat"><i class="fa fa-file"></i>
            SK Riwayat Jabatan <input name="doc_sk_riwayat" id="doc_sk_riwayat" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_sk_riwayat_jabatan" id="text-sk_riwayat_jabatan" placeholder="SK Riwayat Jabatan" />
       </div>
     </div>
   </div><br/>
    <div class="row">
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_sk_pendukung"><i class="fa fa-file"></i>
            SK Pendukung <input name="doc_sk_pendukung" id="doc_sk_pendukung" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_sk_pendukung" id="text-sk_pendukung" placeholder="SK Pendukung" />
       </div>
     </div>
    </div><br/>
    <div class="row">
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_sk_pembebasan"><i class="fa fa-file"></i>
            SK Pembebasan Sementara <input name="doc_sk_pembebasan" id="doc_sk_pembebasan" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_sk_pembebasan" id="text-sk_pembebasan" placeholder="SK Pembebasan Sementara" />
       </div>
     </div>
    </div><br/>
    <div class="row">
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_pak_pembebasan"><i class="fa fa-file"></i>
            PAK Pembebasan Sementara <input name="doc_pak_sementara" id="doc_pak_sementara" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_pak_sementara" id="text-pak_sementara" placeholder="PAK Pembebasan Sementara" />
       </div>
     </div>
    </div><br/>
    <div class="row">
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_skp"><i class="fa fa-file"></i>
            SKP Tahun terakhir <input name="doc_skp" id="doc_skp" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_skp" id="text-skp" placeholder="SKP Tahun Terakhir" />
       </div>
     </div>
    </div><br/>
    <div class="row">
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_lulus_diklat"><i class="fa fa-file"></i>
            Sertifikat Kelulusan Diklat <input name="doc_lulus_diklat" id="doc_lulus_diklat" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_lulus_diklat" id="text-lulus_diklat" placeholder="Sertifikat Kelulusan Diklat" />
       </div>
     </div>
    </div><br/>
    <div class="row">
      <div class="form-group">
        <div class="col-lg-4">
          <span class="btn btn-primary btn-block btn-file" id="input_ijazah_terakhir"><i class="fa fa-file"></i>
            Ijazah Terakhir <input name="doc_ijazah_terakhir" id="doc_ijazah_terakhir" type="file">
          </span>
        </div>
      <div class="col-lg-8">
         <input type="text" class="form-control text-primary" name="file_ijazah_terakhir" id="text-ijazah_terakhir" placeholder="Ijazah Terakhir" />
       </div>
     </div>
   </div>
  <?php }?>
  <br/>
  <div class="row">
    <input class="btn btn-primary btn-block" id="setuju_ujian_btn" value="submit" type="submit">
  </div>
</form>
<script>
$("#input_sk_cpns").change(function (){
  var fileName = document.getElementById("doc_cpns").value;
  $("#text-sk_cpns").val(fileName);
});
$("#input_sk_pns").change(function (){
  var fileName = document.getElementById("doc_pns").value;
  $("#text-sk_pns").val(fileName);
});
$("#input_ijazah").change(function (){
  var fileName = document.getElementById("doc_ijazah").value;
  $("#text-ijazah").val(fileName);
});
$("#input_sk_prajab").change(function (){
  var fileName = document.getElementById("doc_prajab").value;
  $("#text-prajab").val(fileName);
});
$("#input_sk_diklat").change(function (){
  var fileName = document.getElementById("doc_sk_diklat").value;
  $("#text-sk_diklat").val(fileName);
});
$("#input_skp").change(function (){
  var fileName = document.getElementById("doc_skp").value;
  $("#text-skp").val(fileName);
});
$("#input_sk_lulus").change(function (){
  var fileName = document.getElementById("doc_sk_lulus").value;
  $("#text-sk_lulus").val(fileName);
});
$("#input_daftar_penugasan").change(function (){
  var fileName = document.getElementById("doc_penugasan").value;
  $("#text-penugasan").val(fileName);
});
$("#input_sk_pangkat_terakhir").change(function (){
  var fileName = document.getElementById("doc_pangkat_terakhir").value;
  $("#text-pangkat_terakhir").val(fileName);
});
</script>
