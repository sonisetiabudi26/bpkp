<div class="page-title">
	<div class="title_left">
		<h3 style="text-align:left">Input Nilai WI</h3>
   <!-- <div  style="text-align:left;color:#eee;"><p> Form Input Nilai <i class="fa fa-pencil"></i></p></div> -->
	</div>
</div>
<div class="clearfix"></div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
						<label>Pilih Nilai yang diajar :</label>
					<select name="fk_group_mata_ajar" id="kelas_wi"
					onChange="getAnotherSelectOption()" class="form-control input-sm">
						<option value="">Pilih Kelas</option>
						<?php
							foreach ($mata_ajar as $mataajars):
						?>
						<option value="<?php echo $mataajars->PK_GROUP_MATA_AJAR;?>"><?php echo $mataajars->NAMA_GROUP_MATA_AJAR;?></option>
						<?php
							endforeach;
						?>
					</select>
					<!-- <button class="btn btn-primary btn-block" onclick="search();">Cari</button> -->
				</div>
			</div><br/>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
						<table id="pesertaByWI" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<td>No</td>
									<td>NIP</td>
									<td>Mata Pelajaran</td>
									<td>Nilai</td>
									<td>Kelas</td>
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
<script>
$(document).ready(function(){
var table;
			table = $('#pesertaByWI').DataTable({
              "processing": false, //Feature control the processing indicator.
							"destroy": true,
              "serverSide": true, //Feature control DataTables' server-side processing mode.
              "order": [], //Initial no order.
              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": '<?php echo base_url('sertifikasi/widyaiswara/NilaiAPI/LoadDataKelasDiklat/')?>',
                  "type": "POST"
              },
              //Set column definition initialisation properties.
              "columns": [
                  {"data": "0",width:50},
                  {"data": "1",width:100},
                  {"data": "2",width:100},
                  {"data": "3",width:100},
									{"data": "4",width:100},
									{"data": "5",width:100}
              ],

          });
});
</script>
