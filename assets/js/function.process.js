$('#formReg').submit(function(e) {
	e.preventDefault();
	// catch the form's submit event
	$.ajax({ // create an AJAX call...
		data : $(this).serialize(), // get the form data
		type : $(this).attr('method'), // GET or POST
		url : $(this).attr('action'),
		before : $('#col-reg').hide(),// the file to call
		success : function(response) { // on success..
			$('.loading-content').show();
			$('#col-reg').show();
			$('#col-reg').html("");
			$('#col-reg').html(response); // update the DIV
			alert(response);
			$('.loading-content').hide();
		}
	});
	return false; // cancel original event to prevent form submitting
});
$('#edit-modal').on('show.bs.modal', function(e) {
	var $modal = $(this), esseyId = e.relatedTarget.id;
	$.ajax({
		cache : false,
		type : 'POST',
		url : '/view-web/data',
		success : function(data) {
			$modal.find('.modal-body').html(data);
		}
	});
});

$('#admin-modal').on('show.bs.modal', function(e) {
	var $modal = $(this), esseyId = e.relatedTarget.id;
	$.ajax({
		cache : false,
		type : 'POST',
		url : '/view-web/allData',
		success : function(data) {
			$modal.find('.modal-body').html(data);
		}
	});
});

$('body').on('hidden.bs.modal', '.modal', function () {
  $(this).removeData('bs.modal');
});