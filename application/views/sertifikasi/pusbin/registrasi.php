<!-- <div class="page-title">
	<div class="title_left">
		<h3>Registrasi Perwakilan BPKP</h3>
	</div>
</div>
<div class="clearfix"></div> -->
<div class="row" >
  <div class="col-lg-6">
    <div class="title_left">
      <h3>Registrasi Perwakilan BPKP</h3>
    </div>
  </div>
  <div class="col-lg-6" style="padding-top:10px;">
  <button class="btn btn-primary" style="width:200px;float:right;" onclick="add_perwakilan()">Tambah</button>
</div>
</div><br/>
<div class="clearfix"></div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <table id="datatable-responsive" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
							<tr>
								<td>No</td>
								<td>NIP</td>
								<td>Nama</td>
                <td>Provinsi</td>
                <td>Role</td>
                <td>Action</td>
							</tr>
							</thead>
							<tbody id="show_data">
							</tbody>
							</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<div id="modal-content" class="modal fade bs-example-modal-lg"
	tabindex="-1" role="dialog" aria-labelledby="myStandardModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">
					<b>Registrasi Perwalikan BPKP</b>
				</h4>
			</div>
			<div class="modal-body" style="min-height:300px;overflow-y:auto;">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3 text-left">NIP</label>
              <div class="col-md-9">
                <input name="nip" placeholder="Masukan NIP" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 text-left">Nama</label>
              <div class="col-md-9">
                <input name="nama" placeholder="Masukan Nama" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 text-left">Provinsi</label>
              <div class="col-md-9">
                <select class="form-control" name="provinsi">
                  <option  value="">---Select Category---</option>
                    <?php foreach($provinsi as $row) { ?>
                        <option value="<?php echo $row->provinsi;?>"><?php echo $row->provinsi;?></option>
                    <?php } ?>
                </select>
              </div>
            </div>
						<div class="form-group">
							<label class="control-label col-md-3 text-left">Pengguna</label>
							<div class="col-md-9">
								<input name="user" placeholder="Masukan Username" class="form-control" type="text">

							</div>
						</div>
            <div class="form-group">
							<label class="control-label col-md-3 text-left">Kata Sandi</label>
							<div class="col-md-9">
								<input name="password" placeholder="Password" class="form-control" type="password">

							</div>
						</div>
            <div class="form-group">
              <label class="control-label col-md-3 text-left">Role</label>
              <div class="col-md-9">
                <select class="form-control" name="role">
                  <option  value="">---Select Role---</option>
                    <?php foreach($lookup_bpkp as $row) { ?>
                        <option value="<?php echo $row->PK_LOOKUP;?>"><?php echo $row->NAME;?></option>
                    <?php } ?>
                </select>
              </div>
            </div>
          </div>
        </form>
      </div>
			<div class="modal-footer">
        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>

<!--MODAL DELETE-->

  <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Hapus Product</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
             <strong>Apakah anda yakin mengahpus data?</strong>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="product_code_delete" id="product_code_delete" class="form-control">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
        </div>
      </div>
    </div>
  </div>


<script type="text/javascript">
    $(document).ready(function(){
        show_product(); //call function show all product

        $('#datatable-responsive').dataTable();
        var save_method; //for save method string
        var table;
      });
        function add_perwakilan()
          {
            save_method = 'add';
            $('#form')[0].reset(); // reset form on modals
            $('#modal-content').modal('show'); // show bootstrap modal
          //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
          }

        //function show all product
        function show_product(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url('sertifikasi/bpkp/registrasi/show_data')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].PK_PERWAKILAN_BPKP+'</td>'+
                                '<td>'+data[i].NIP+'</td>'+
                                '<td>'+data[i].NAMA+'</td>'+
                                '<td>'+data[i].PROVINSI+'</td>'+
                                '<td>'+data[i].NAME+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" onclick="edit_data('+data[i].PK_PERWAKILAN_BPKP+')">Ubah</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" onclick="delete_data('+data[i].PK_PERWAKILAN_BPKP+')>Hapus</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }
        //get data for delete record
       // $('#show_data').on('click','.item_delete',function(){
       //     var product_code = $(this).data('product_code');
       //
       //     $('#Modal_Delete').modal('show');
       //     $('[name="product_code_delete"]').val(product_code);
       // });
       //  //delete record to database
       //   $('#btn_delete').on('click',function(){
       //      var product_code = $('#product_code_delete').val();
       //      $.ajax({
       //          type : "POST",
       //          url  : "<?php //echo base_url('sertifikasi/pusbin/registrasi/delete')?>",
       //          dataType : "JSON",
       //          data : {PK_PUSBIN:product_code},
       //          success: function(data){
       //              $('[name="product_code_delete"]').val("");
       //              $('#Modal_Delete').modal('hide');
       //              show_product();
       //          }
       //      });
       //      return false;
       //  });
        function edit_data(id)
        {

             save_method = 'update';
             $('#form')[0].reset(); // reset form on modals

             //Ajax Load data from ajax
             $.ajax({
               url : "<?php echo base_url('sertifikasi/bpkp/registrasi/update_data/')?>/" + id,
               type: "GET",
               dataType: "JSON",
               success: function(data)
               {

                   $('[name="nip"]').val(data.PK_PERWAKILAN_BPKP);
                   $('[name="nama"]').val(data.NAMA);
                   $('[name="provinsi"]').val(data.PROVINSI);
                   $('[name="user"]').val(data.USER);
                   $('[name="password"]').val(data.PASSWORD);
                   $('[name="role"]').val(data.ROLE);


                   $('#modal-content').modal('show'); // show bootstrap modal when complete loaded
                   $('.modal-title').text('Edit Data'); // Set title to Bootstrap modal title

               },
               error: function (jqXHR, textStatus, errorThrown)
               {
                   alert('Error get data from ajax');
               }
           });


        }
        function save()
          {
            var url;
            if(save_method == 'add')
            {
                url = "<?php echo base_url('sertifikasi/bpkp/registrasi/add_data')?>";
            }
            else
            {
              url = "<?php echo base_url('sertifikasi/bpkp/registrasi/update_data')?>";
            }

             // ajax adding data to database
                $.ajax({
                  url : url,
                  type: "POST",
                  data: $('#form').serialize(),
                  dataType: "JSON",
                  success: function(data)
                  {
                     //if success close modal and reload ajax table
                     $('#modal-content').modal('hide');
                    location.reload();// for reload a page
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      alert('Error adding / update data');
                  }
              });
          }

    //});

</script>
