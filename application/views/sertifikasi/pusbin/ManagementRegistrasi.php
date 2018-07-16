<div class="page-title">
	<div class="title_left">
		<h3>Management Registrasi</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="" role="tabpanel" data-example-id="togglable-tabs" style="background:#fff !important;">
	<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
		<li role="presentation" class="active"><a href="#tab_content1" onclick="loadData();" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Monitoring Peserta</a>
		</li>
		<li role="presentation" class=""><a href="#tab_content2" onclick="loadDatajadwal();" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Jadwal Ujian</a>
		</li>
		<li role="presentation" class=""><a href="#tab_content3" onclick="loadDatasoal();" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Management Kebutuhan Soal</a>
		</li>
	</ul>
	<div id="myTabContent" class="tab-content" style="background:#fff;">
		<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab" >
			<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">

								<div class="x_content">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>NIP</td>
													<td>Nama</td>
													<td>Unit Kerja</td>
													<td>Jenjang</td>
													<td>Mata Pelajaran</td>
													<td>Lokasi Ujian</td>
												</tr>
												</thead>
												<tbody id="dataPeserta">
												</tbody>
												</table>
										</div>

									</div>
								</div>
							</div>
						</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
			<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<button class="btn btn-primary" id="" onclick="getModal(this)" data-href="<?php echo base_url('sertifikasi')."/pusbin/ManagementRegistrasi/vw_add_jadwal"; ?>"   data-toggle="modal" data-target="#modal-content" class="btn btn-primary oval-box oval-box-circle" style="float:right;"><i class="glyphicon glyphicon-pencil"></i> Add data</button>
								<div class="x_content">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					            <table id="datajadwal" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
												<thead>
												<tr>
													<td>NO</td>
													<td>Category</td>
													<td>Start Date</td>
													<td>End Date</td>
													<td>Status</td>
													<td>Action</td>
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
		</div>
		<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
			<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">

								<div class="x_content">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

										</div>

									</div>
								</div>
							</div>
						</div>
			</div>
		</div>
	</div>
</div>

<script>
loadData();


function add()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
}
function loadData(){

		document.getElementById("dataPeserta").innerHTML='';

  $.ajax({
      type  : 'ajax',
      url   :  "<?php echo base_url('sertifikasi/pusbin/ManagementRegistrasi/loadData/')?>",
      async : false,
      dataType : 'json',
      success : function(data){

				var nip='';
				var a=1;
				data.forEach(function(resp) {

           $("#dataPeserta").append("<tr><td>" + a + "</td>"+
					 "<td>" + (resp.nip != nip ? resp.nip : '') + "</td>"+
					 "<td>" + (resp.nip != nip ? resp.nama : '') + "</td>"+
					  "<td>" + (resp.nip != nip ? resp.unitkerja : '') + "</td>"+
						"<td>" + (resp.nip != nip ? resp.jenjang : '') + "</td>"+
					 "<td> unknown (comming soon) </td>"+
					 // "<td>" + (resp.nip != nip ? resp.start + " - "+ resp.END_DATE  : '')+"</td>"+
					 "<td>" + (resp.nip != nip ? resp.provinsi : '') + "</td>"+
					 "</tr>");
					 nip=resp.NIP;
					 a++;
			  });
      }
	});
	//loadDatajadwal();
}
function loadDatajadwal(){
var table;
			table = $('#datajadwal').DataTable({
              "processing": false, //Feature control the processing indicator.
							 "destroy": true,
              "serverSide": true, //Feature control DataTables' server-side processing mode.
              "order": [], //Initial no order.
              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": '<?php echo base_url('sertifikasi/pusbin/ManagementRegistrasi/loadDataJadwal/')?>',
                  "type": "POST"
              },
              //Set column definition initialisation properties.
              "columns": [
                  {"data": "0",width:170},
                  {"data": "1",width:100},
                  {"data": "2",width:100},
                  {"data": "3",width:100},
									{"data": "2",width:100},
									{"data": "4",width:100}
              ],

          });
}
// function loadDatasoal(){
// 	var table;
//  table = $('#datajadwal').DataTable({
// 				 "processing": false, //Feature control the processing indicator.
// 				 "serverSide": true, //Feature control DataTables' server-side processing mode.
// 				 "order": [], //Initial no order.
// 				 // Load data for the table's content from an Ajax source
// 				 "ajax": {
// 						 "url": '<?php //echo base_url('sertifikasi/pusbin/ManagementRegistrasi/loadDataSoal/')?>',
// 						 "type": "POST"
// 				 },
// 				 //Set column definition initialisation properties.
// 				 "columns": [
// 						 {"data": "0",width:170},
// 						 {"data": "1",width:100},
// 						 {"data": "2",width:100},
// 						 {"data": "3",width:100},
// 						 {"data": "2",width:100}
// 				 ],
//
// 		 });
// }


function delete_jadwal(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('sertifikasi/pusbin/ManagementRegistrasi/ajax_delete/')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
              //  $('#modal_form').modal('hide');
                loadData();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script>