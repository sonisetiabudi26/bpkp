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

/** format parsing : this select, select id target show, div id for show response */
function getAnotherSelectOption(sel, selectTargetId, eventDivContent){
	var objParsingVal = sel.value;
	var objParsingName = sel.name;
	var urlHref = $(sel).attr('data-href');
	var optObj = $(sel).attr('data-show-obj');
	var optPk = $(sel).attr('data-show-key');
	var optNama = $(sel).attr('data-show-value');
	var datastr = {objParsing : objParsingName};
	var jsonParam = JSON.parse('{"'+objParsingName+'":'+objParsingVal+'}');
	$.ajax({
		type:'GET',
		data:jsonParam,
		url: urlHref,
		dataType: 'json',
		success:function(response){
			var objResponse = response[optObj];
			var _options = '';
			if(objResponse==''){
				$('#' + selectTargetId).find('option').remove().end().append('<option>Data tidak ada</option>');
			}else{
				$('#' + selectTargetId).find('option').remove().end().append('<option>Pilihan</option>').val('');
			}

			$.each(objResponse, function(i, value) {
				console.log(value);
				_options +=('<option value="'+ value[optPk]+'">'+ value[optNama] +'</option>');
				console.log(value);
			});
			
			$('#' + selectTargetId).append(_options);
			$('#' + eventDivContent).show();
		}
	});
}

/** format parsing : this select, form id, div id for show response */
function submitWithSelectOption(sel, eventForm, eventDivContent){
	var objParsingVal = sel.value;
	var objParsingName = sel.name;
	var jsonParam = JSON.parse('{"'+objParsingName+'":'+objParsingVal+'}');
	$.ajax({
		type:'POST',
		data:jsonParam,
		url: $('#' + eventForm).attr('action'),
		success:function(data){
			if(objParsingVal=='Pilihan'){
				$('#' + eventDivContent).hide();
				$('#' + eventDivContent).html('');
			}else{
				$('#' + eventDivContent).show();
				$('#' + eventDivContent).html(data);
			}
		}
	});
}

/** format parsing : this select, content id for show response */
function uploadFile(formTarget, responseContent){
	$(document).on('submit', '#'+formTarget.id, function(e) {
		e.preventDefault();
	var data = new FormData(document.getElementById(formTarget.id));
	$.ajax({
		data : data,
		type : $(this).attr('method'),
		url : $(this).attr('action'),
        async: false,
		processData: false,
		contentType: false,
		cache:false,
        timeout: 600000,
		dataType: "json",
		success : function(response) {
			if(response.status=='success'){
				$("#"+responseContent).html("<h4 class='text-success'>Process upload : "+response.status+"</h4>");
			}else{
				$("#"+responseContent).html("<h4 class='text-danger'>Process upload : "+response.status+"</h4>");
			}
			
			console.log("success : ", "success");
			$("#" + formTarget.id).find('[type=submit]').prop("disabled", true);
		},
		error: function (e) {
			$("#"+responseContent).html("<h4 class='alert-danger space-10 padding-5'>Proses Data Bermasalah, Silahkan Hubungi Administrator</h4>");
			console.log("ERROR : ", e);
			$("#" + formTarget.id).find('[type=submit]').prop("disabled", false);
		}
	});
	return false;
	});
}

/** format parsing : this select, content id for show response */
function procesForm(formTarget, responseContent){
	$(document).on('submit', '#'+formTarget.id, function(e) {
		e.preventDefault();
		var data = new FormData(document.getElementById(formTarget.id));
		$.ajax({
			data : data,
			type : $(this).attr('method'),
			url : $(this).attr('action'),
			async: false,
			processData: false,
			contentType: false,
			cache:false,
			timeout: 600000,
			dataType: "json",
			success : function(response) {
				if(response.status=='success'){
					$("#"+responseContent).html("<h4 class='text-success'>Process save : "+response.status+"</h4>");
				}else{
					$("#"+responseContent).html("<h4 class='text-danger'>Process save : "+response.status+"</h4>");
				}
			
				$("#"+responseContent).fadeTo(2000, 500).slideUp(500, function(){
					$("#"+responseContent).slideUp(500);
				});
			
				console.log("success : ", "success");
				$("#" + formTarget.id).find('[type=submit]').prop("disabled", true);
			},
			error: function (e) {
				$("#"+responseContent).html("<h4 class='alert-danger space-10 padding-5'>Proses Data Bermasalah, Silahkan Hubungi Administrator</h4>");
				console.log("ERROR : ", e);
				$("#" + formTarget.id).find('[type=submit]').prop("disabled", false);
			}
		});
	return false;
	});
}

/** format parsing : this button action */
function getModal(btnId){
	var urlHref = $(btnId).attr('data-href');
	var modalTarget = $(btnId).attr('data-target');
	$(modalTarget).on('show.bs.modal', function(e) {
		var $modal = $(this), esseyId = e.relatedTarget.id;
		$.ajax({
			cache : false,
			type : 'POST',
			url : urlHref,
			success : function(data) {
				$modal.find('.modal-body').html(data);
			}
		});
	});
}

/** format parsing : this button action */
function getModalWithParam(btnId){
	var urlHref = $(btnId).attr('data-href');
	var modalTarget = $(btnId).attr('data-target');
	var objParsingName = $(btnId).attr('data-var');
	var objParsingVal = $(btnId).attr('data-id');
	var jsonParam = JSON.parse('{"'+objParsingName+'":'+objParsingVal+'}');
	$(modalTarget).on('show.bs.modal', function(e) {
		var $modal = $(this), esseyId = e.relatedTarget.id;
		$.ajax({
			data : jsonParam,
			cache : false,
			type : 'POST',
			url : urlHref,
			success : function(data) {
				$modal.find('.modal-body').html(data);
			}
		});
	});
}

$(document).ready(function() {
	$('body').on('hidden.bs.modal', '.modal', function () {
		location.reload();
	});
});