<form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/unit_apip/PengusulanPengangkatan/upload_submit"; ?>')"  enctype="multipart/form-data" method="POST" id="daftar_pengusulan">
<div class="col-md-12" id="response-texts" ></div>
<input name="desc" style="display:none;" value="<?php echo $desc; ?>"></input>
<input name="id_pengusul" style="display:none;" value="<?php echo $id_pengusul; ?>"></input>
<input name="nip" style="display:none;" value="<?php echo $nip; ?>"></input>
  <?php

  $b=1;
  // print_r($file_format);
  $total=count($file_format);
  for ($i=0; $i < $total ; $i++) {
    ?>

    <div class="row">
      <div class="form-group">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <span class="btn btn-default btn-block btn-file" onchange="inputan(this.id)" id="<?php echo $b?>"><i class="fa fa-file-pdf-o"></i>
            <?php echo $file_format[$i];?> <input name="file_<?php echo $b;?>" id="doc_<?php echo $b;?>" type="file">
          </span>
        </div>
      <div class="col-lg-8 col-md-8 col-sm-8">
         <input type="text" class="form-control text-primary" name="file_<?php echo $b;?>" id="text_<?php echo $b;?>" placeholder="<?php echo $file_format[$i];?>" />
       </div>
     </div>
    </div>
  <?php  $b++;}?>
  <br/>
  <div class="row">
    <input class="btn btn-primary btn-block" id="setuju_ujian_btn" value="Ajukan" type="submit">
  </div>
</form>
<script>
function inputan(id){
// $("#input_sk_cpns").change(function (){
  var fileName = document.getElementById("doc_"+id).value;
  $("#text_"+id).val(fileName);
// });
}
// $("#input_sk_pns").change(function (){
//   var fileName = document.getElementById("doc_pns").value;
//   $("#text-sk_pns").val(fileName);
// });
// $("#input_ijazah").change(function (){
//   var fileName = document.getElementById("doc_ijazah").value;
//   $("#text-ijazah").val(fileName);
// });
// $("#input_sk_prajab").change(function (){
//   var fileName = document.getElementById("doc_prajab").value;
//   $("#text-prajab").val(fileName);
// });
// $("#input_sk_diklat").change(function (){
//   var fileName = document.getElementById("doc_sk_diklat").value;
//   $("#text-sk_diklat").val(fileName);
// });
// $("#input_skp").change(function (){
//   var fileName = document.getElementById("doc_skp").value;
//   $("#text-skp").val(fileName);
// });
// $("#input_sk_lulus").change(function (){
//   var fileName = document.getElementById("doc_sk_lulus").value;
//   $("#text-sk_lulus").val(fileName);
// });
// $("#input_daftar_penugasan").change(function (){
//   var fileName = document.getElementById("doc_penugasan").value;
//   $("#text-penugasan").val(fileName);
// });
// $("#input_sk_pangkat_terakhir").change(function (){
//   var fileName = document.getElementById("doc_pangkat_terakhir").value;
//   $("#text-pangkat_terakhir").val(fileName);
// });
</script>
