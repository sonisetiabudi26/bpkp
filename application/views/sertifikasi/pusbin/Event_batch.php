<div>
	<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active"><a href="<?php echo base_url('sertifikasi')."/pusbin/PerhitunganNilai"?>">Perhitungan Nilai</a></li>
		<?php if ($category=='Event'){?>
    <li class="breadcrumb-item active" aria-current="page">Event</li>
	<?php }else if($category=='Batch'){?>
		<li class="breadcrumb-item"><a href="javascript:history.go(-1)">Event</a></li>
    <li class="breadcrumb-item active" aria-current="page">batch</li>
	<?php }?>
  </ol>
</nav>
	<!-- <input name='kd_diklat' id='kd_diklat' value style="display:none;"/> -->
<div class="page-title">
	<div class="title_left">
		<h3><?php echo $category;?></h3>
	</div>
</div>
<div class="clearfix"></div>
	<?php if($category=='Event'){ ?>
  			<div class="row">
  						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  							<div class="x_panel">
  								<button class="btn btn-primary" id="tambah_event" onclick="getModal(this)" data-href="<?php echo base_url('sertifikasi')."/pusbin/PerhitunganNilai/vw_add_event/".$id; ?>"   data-toggle="modal" data-target="#modal-content" class="btn btn-primary oval-box oval-box-circle" style="float:right;"><i class="glyphicon glyphicon-pencil"></i> Tambah data</button>
  								<div class="x_content">
  									<div class="row">
  										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
  					            <table id="dataEventAll" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  												<thead>
  												<tr>
  													<td>NO</td>
  													<td>Kode Event</td>
  													<td>Nama Diklat</td>
  													<td>Uraian</td>
  													<td>Provinsi</td>
														<td>Pass Grade</td>
  													<td>Tindakan</td>
  												</tr>
  												</thead>
													<tbody></tbody>
  												</table>
  										</div>

  									</div>
  								</div>
  							</div>
  						</div>
  			</div>
			<?php }else if($category=='Batch'){?>
				<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<!-- <div class="form-group"> -->
										<!-- <button class="btn btn-primary" id="btn-add-batch" onclick="getModal(this)" data-href="<?php //echo base_url('sertifikasi')."/pusbin/PerhitunganNilai/vv_add_batch"; ?>"   data-toggle="modal" data-target="#modal-content" style="float:right;"><i class="glyphicon glyphicon-pencil"></i> Add data</button> -->
										<!-- <button class="btn btn-primary" onclick="getModal(this)" id="btn-upload-doc" data-href="<?php //echo base_url('sertifikasi')."/pusbin/PerhitunganNilai/vw_upload_doc/"?>" data-toggle="modal" data-target="#modal-content" style="float:right;"><i class="glyphicon glyphicon-import"></i> Import Data</button> -->
								<!-- </div><br/> -->
									<div class="x_content">
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
												<table id="dataBatchAll" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
													<thead>
													<tr>
														<td>NO</td>
														<td>Kode Event</td>
														<td>Provinsi</td>
														<td>Kelas</td>
														<td>Jadwal</td>
														<td>Reff</td>
														<td>Jumlah Peserta</td>
														<td>Tindakan</td>
													</tr>
													</thead>
													<tbody>
													</tbody>
													</table>
											</div>

										</div>
									</div>
								</div>
							</div>
				</div>

			<?php }?>

</div>
<script>
$(document).ready(function(){
	var category='<?php echo $category ?>';
	var id='<?php echo $id ?>';
	if(category=='Event'){

  var table;
        table = $('#dataEventAll').DataTable({
              "processing": false, //Feature control the processing indicator.
              "destroy": true,
             "serverSide": true, //Feature control DataTables' server-side processing mode.
              "order": [], //Initial no order.
                'ajax': {
                  "type"   : "POST",
                  "url"    : '<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/LoadDateEventbyid/')?>'+id,
                  "dataSrc": ""
                },
                //Set column definition initialisation properties.
                "columns": [
									{"data": "0",width:50},
									{"data": "1",width:100},
									{"data": "2",width:100},
									{"data": "3",width:100},
									{"data": "4",width:100},
									{"data": "5",width:100},
									{"data": "6",width:100},
                ],

            });
					}else{
						var table;
									table = $('#dataBatchAll').DataTable({
													"processing": false, //Feature control the processing indicator.
													 "destroy": true,
													"serverSide": true, //Feature control DataTables' server-side processing mode.
													"order": [], //Initial no order.
													// Load data for the table's content from an Ajax source
													"ajax": {
															"url": '<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/LoadBatch/')?>'+id,
															"type": "POST"
													},
													//Set column definition initialisation properties.
													"columns": [
															{"data": "0",width:50},
															{"data": "1",width:100},
															{"data": "2",width:100},
															{"data": "3",width:100},
															{"data": "4",width:100},
															{"data": "5",width:100},
															{"data": "6",width:100},
															{"data": "7",width:100}
													],

											});

					}

});

function loadData(obj){
	var category='<?php echo $category ?>';
	if(category=='Event'){
		$('#dataEventAll').DataTable().ajax.reload();
	}else{
		$('#dataBatchAll').DataTable().ajax.reload();
	}
}
function delete_event(id){
	if(confirm('Are you sure delete this data?'))
	{
			// ajax delete data to database
			$.ajax({
					url : "<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/deleteEvent/')?>/"+id,
					type: "POST",
					dataType: "JSON",
					success: function(data)
					{
							//if success reload ajax table
						//  $('#modal_form').modal('hide');
							loadData(1);
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
							alert('Error deleting data');
					}
			});

	}
}

function delete_batch(id){
	if(confirm('Are you sure delete this data?'))
	{
			// ajax delete data to database
			$.ajax({
					url : "<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/deleteBatch/')?>/"+id,
					type: "POST",
					dataType: "JSON",
					success: function(data)
					{
							//if success reload ajax table
						//  $('#modal_form').modal('hide');
							loadData(1);
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
							alert('Error deleting data');
					}
			});

	}
}
function calculate(kode_event,kelas){
	var kode=kode_event+'~'+kelas;
	$.ajax({
			url : "<?php echo base_url('sertifikasi/pusbin/PerhitunganNilai/calculate/')?>/"+kode,
			type: "POST",
			dataType: "JSON",
			success: function(resp)
			{
				if(resp.status=="success"){
					loadData(1);
					swal('Berhasil',resp.msg,resp.status);
				}else{
					loadData(1);
					swal('Terjadi kesalahan',resp.msg,resp.status);
				}
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
					alert('Error calculate data');
			}
	});
}

</script>
