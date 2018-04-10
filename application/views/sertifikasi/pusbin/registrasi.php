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
  <button class="btn btn-success" style="width:200px;float:right;" data-toggle="modal" data-target="#modal-content">Add</button>
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

      </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!--MODAL DELETE-->

  <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Delete Product</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
             <strong>Are you sure to delete this record?</strong>
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

        //function show all product
        function show_product(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url('sertifikasi/pusbin/registrasi/show_data')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].PK_PUSBIN+'</td>'+
                                '<td>'+data[i].NIP+'</td>'+
                                '<td>'+data[i].NAMA+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-product_code="'+data[i].PK_PUSBIN+'" data-product_name="'+data[i].NAMA+'" data-price="'+data[i].product_price+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-product_code="'+data[i].PK_PUSBIN+'">Delete</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }
        //get data for delete record
       $('#show_data').on('click','.item_delete',function(){
           var product_code = $(this).data('product_code');

           $('#Modal_Delete').modal('show');
           $('[name="product_code_delete"]').val(product_code);
       });
        //delete record to database
         $('#btn_delete').on('click',function(){
            var product_code = $('#product_code_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('sertifikasi/pusbin/registrasi/delete')?>",
                dataType : "JSON",
                data : {PK_PUSBIN:product_code},
                success: function(data){
                    $('[name="product_code_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_product();
                }
            });
            return false;
        });


    });

</script>
