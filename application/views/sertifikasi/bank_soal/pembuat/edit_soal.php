<div class="clearfix"></div>
<h1 class="text-primary">Management Soal</h1>
	<div class="info">
		<p style="color:#777;"> Ujian Sertifikasi - EDIT Soal <i class="fa fa-book"></i></p>
	</div>
<br><br>
<div class="container">
	<!-- <div class="" role="tabpanel" data-example-id="togglable-tabs" style="background:#fff !important;"> -->

<div role="tabpanel" class="tab-pane active fade in" id="tab_content1" aria-labelledby="home-tab" >

	<div  class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
        <div class="row">
          <div>
            <div class="panel panel-default">
              <div class="panel-heading">List Komentar</div>
                <div class="panel-body">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span style="font-weight:bold">PETUGAS</span></div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><span style="font-weight:bold">KOMENTAR</span></div>
                  </div><br/>
                    <?php
                      foreach ($comment as $key):
                    ?>
                    <div class="row" style="border-bottom:0.5px solid #f3f3f3">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><span><?php echo $key->PETUGAS ?></span></div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><span><?php echo $key->COMMENT ?></span></div>
                  </div>
                    <?php
            					endforeach;
            				?>

                  </div>
                </div>
              </div>
          </div>
        </div>

				<div class="x_content">
					<div class="row">
						<div class="col-lg-12" id="response">
							<!-- <h2 style="font-weight:1000;color:#000">Table Bank Soal ALL</h2> -->
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        			<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        					<thead>
        							<tr>
        									<th>No</th>
        									<th>Pertanyaan</th>
        									<th>Pilihan 1</th>
        									<th>Pilihan 2</th>
        									<th>Pilihan 3</th>
                          <th>Pilihan 4</th>
                          <th>Pilihan 5</th>
                          <th>Pilihan 6</th>
                          <th>Pilihan 7</th>
                          <th>Pilihan 8</th>
                          <th>Jawaban</th>
        									<th>Action</th>
        							</tr>
        					</thead>
        					<tbody style="color:#333;">
        					</tbody>

        			</table>
    	    </div>
    	</div>
	</div>
  <div class="row">
    <?php if($status!='pembuat_soal' && $status!=''){ ?>
    <form onsubmit="procesFormandUpload(this, '<?php echo base_url('sertifikasi')."/bank_soal/permintaan/add_comment"; ?>')" method="POST" id="commnet_form" >
    		<div class="form-group">
          <input name="id_permintaan" style="display:none"  value="<?php echo $id ?>"/>
          <input name="status" style="display:none"  value="<?php echo $status ?>"/>
    			<label for="fk_group_mata_ajar">Komentar :</label>
    			   <textarea name="comment" rows='7'style="width:100%" placeholder="Tulis Komentar"></textarea>
    		</div>
    		<input id="btn-add-bab-mata-ajar" type="submit" value="Submit" class="btn btn-primary form-control" />
    	</br>
    </form>
  <?php }elseif($status!=''){ ?>
     <button class="btn btn-primary form-control" onclick="submit('<?php echo $id ?>','<?php echo $status ?>')"><i class="fa fa-paper-plane"></i> Validasi Soal</button>
  <?php }?>

  </div>
	</div>
	</div>
	</div>
</div>

</div>




			<!-- <button onclick="getModal(this)" id="btn-distribusi-soal" data-href="<?php //echo base_url('sertifikasi')."/bank_soal/managementbanksoal/vw_distribusi_soal"; ?>" data-toggle="modal" data-target="#modal-content" class="btn btn-primary"><i class="glyphicon glyphicon-cog"></i> Distribusi Soal</button> -->
		<!-- <div class="" role="tabpanel" data-example-id="togglable-tabs" style="background:#fff !important;">



</div> -->
<script type="text/javascript">
	var save_method;
  var table;


	$(document).ready(function() {
		// alert();
		var param='<?php echo $id ?>';



	table=	$('#table').DataTable({
			"processing": true,
			"serverSide": true,
			 "destroy": true,
			"order": [],
			"ajax": {
				"url": '<?php echo base_url('sertifikasi')."/bank_soal/permintaan/loadSoalPermintaan/"; ?>',
				"type": "POST",
				"data": { id: param },
			},
			"columnDefs": [
			{
				"targets": [ -1 ],
				"orderable": false
			},
			],
		});
});

	function loadData(obj)
	{

		table.ajax.reload(null,false);
		// window.location.href ="<?php echo base_url('sertifikasi')."/bank_soal/pembuat/"; ?>";
	}

 // function loadDatareview(tugas,table){
	// table= $('#'+table).DataTable({
	// 	 "processing": true,
	// 	 "serverSide": true,
	// 	  "destroy": true,
	// 	 "order": [],
	// 	 "ajax": {
	// 		 "url": '<?php //echo base_url('sertifikasi')."/bank_soal/permintaan/loadPermintaan/"; ?>',
	// 		 "type": "POST",
	// 		 "data": { tugas: tugas },
	// 	 },
	// 	 "columnDefs": [
	// 	 {
	// 		 "targets": [ -1 ],
	// 		 "orderable": false
	// 	 },
	// 	 ],
	//  });
 // }
 function submit(id,tugas){
   // ajax delete data to database
   // ajax delete data to database
    $.ajax({
        url : "<?php echo base_url('sertifikasi/bank_soal/permintaan/review')?>",
        type: "POST",
        dataType: "JSON",
        data:{ id: id, tugas: tugas },
        success: function(data)
        {
          if(data.msg=='success'){
            swal("Success", "Data Publish Successfully!", "success");
          }else{
            swal("Error", "Data gagal dikirim!", "error");
          }

         loadData(1);
        },

    });

 }
	// function update_data(id,tugas)
	// {
	//
	// 				// ajax delete data to database
	// 				$.ajax({
	// 						url : "<?php //echo base_url('sertifikasi/bank_soal/permintaan/review')?>",
	// 						type: "POST",
	// 						dataType: "JSON",
	// 						data:{ id: id, tugas: tugas },
	// 						success: function(data)
	// 						{
	// 							if(data.msg=='success'){
	// 								swal("Success", "Data Publish Successfully!", "success");
	// 							}else{
	// 								swal("Error", "Data gagal dikirim!", "error");
	// 							}
	//
	// 						 loadData(1);
	// 						},
	//
	// 				});
	//
	// }
</script>
