$( document ).ready(function( $ ) {
$('.loading-content').show();
    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeClass('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
	$('.loading-content').hide();
});

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

$('#menuToContent').click(function(e){
	alert("hai");
	var pageurl = $(this).attr('href');
	$.ajax({
		data: {
			title : $(this).data('title')
		},
		url:$(this).attr('href'),
		type:'GET',
		success:function(data){
			$('div#content-web').html(data);
			$('div#content-web').load(url);
		}
	})
	if(pageurl!=window.location){
		window.history.pushState({path:pageurl},'',pageurl);
	}
	e.preventDefault();
	return false;
});