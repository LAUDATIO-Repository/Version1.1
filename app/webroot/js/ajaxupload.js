$(function () {
	$('#id').bind("keyup",allowTeiUpload);
	$('#id').bind("focusout",allowTeiUpload);
	$('#teiupload').bind('change', upload);
	if(!$('#id').val()){
		$('#teiupload').attr('style','display:none;');
		$('#teiupload').after('<div id="insertFirst">Specify Corpus Name</div>');
	}
});

function toggleSubmitButton(src,state){
    console.log('disable submit button from ',src,':',state);

    if(state){
         $('#formSubmitButton').attr('disabled',true);
         $('#formSubmitButton').attr('style','color: #bbb;');
    }
    else {
        $('#formSubmitButton').prop('disabled',null);
        $('#formSubmitButton').prop('style',null);
    }
}

function allowTeiUpload(){
	if(!$('#id').val()||$('#id').hasClass('valerror')){
		$('#teiupload').attr('style','display:none;');

		if(!$('#insertFirst').length) $('#teiupload').after('<span id="insertFirst">specify name</span>');
	}
    else {
		$('#teiupload').removeAttr('style');
		$('#insertFirst').remove();
	}
}

function upload(){
    reset();
	File = $('input[type="file"]')[0].files[0]

	formData = new FormData();
	if ('getAsBinary' in File){
		formData.append('teifile', File.getAsBinary());
	}
    else {
		formData.append('teifile' || File.fileName, File);

        $('#formSubmitButton').prop('disabled',null);
        $('#formSubmitButton').attr('style','color: #000000;');
	}
	formData.append('filename',File.name || File.fileName);
	formData.append('id',$('#id').val());
	xhr = new XMLHttpRequest();
	xhr.upload.addEventListener("progress", onUploadProgress);
	 
	var url = $(this).attr('data-url');
	xhr.open('post', url, true);
	xhr.onreadystatechange=function(){
	  if (xhr.readyState==4){

          $('#corpusResponse').after('<span id="corpusResponseDone"></span> ');
          $('#corpusResponse').attr('style','display:none;');

    	if(xhr.status==200) {
            $('#corpusResponseDone').html(xhr.responseText);
            if(xhr.responseText.includes("Error")){
                toggleSubmitButton('corpus',true);
            }
        }
        else {
            $('#corpusResponseDone').text('upload failed');
            toggleSubmitButton('corpus',true);
        }
        validateDocuments(url);
	  }
    };
    xhr.send(formData);
}

function reset(){
    if($('#uploadResponse').attr('style') != undefined){
        $('#uploadResponse').removeAttr('style');
        return;
    }
    $('#documentResponseDone').remove();
    $('#corpusResponseDone').remove();
    $('#preparationResponseDone').remove();
    $('#corpusResponse').removeAttr('style');
    $('#preparationResponse').removeAttr('style');
    $('#documentResponse').removeAttr('style');
}

function validateDocuments(url){
    $.ajax({
        type: "post",
        url: url+'/docs',
        success: function (result) {
            $('#documentResponse').after('<span id="documentResponseDone"></span> ');
            $('#documentResponse').attr('style','display:none;');
            $('#documentResponseDone').html(result);
            if(result.indexOf("Error") > -1){
                toggleSubmitButton('documents',true);
            }
        },
        error: function(){
            $('#documentResponse').after('<span id="documentResponseDone"></span> ');
            $('#documentResponse').attr('style','display:none;');
            $('#documentResponseDone').html('<b>upload error</b>');
            toggleSubmitButton('documents',true);
        }
    });
    validatePreparations(url);
}

function validatePreparations( url){
    $.ajax({
        type: "post",
        url: url+'/preps',
        success: function (result) {
            $('#preparationResponse').after('<span id="preparationResponseDone"></span> ');
            $('#preparationResponse').attr('style','display:none;');
            $('#preparationResponseDone').html(result);
            if(result.indexOf("Error") > -1){
                toggleSubmitButton('preparations',true);
            }
        },
        error: function(){
            $('#preparationResponse').after('<span id="preparationResponseDone"></span> ');
            $('#preparationResponse').attr('style','display:none;');
            $('#preparationResponseDone').html('<b>upload error</b>');
            toggleSubmitButton('preparations',true);
        }
    });
}

function getText(responseText) {
    if(responseText.indexOf('!temp')!= -1){
        //console.log(responseText.substr(responseText.indexOf('!temp')+5,responseText.length-responseText.indexOf('!temp')+5))
        return responseText.substr(responseText.indexOf('!temp')+5,responseText.length-responseText.indexOf('!temp')+5)
    }
}

function getFileName(responseText) {
    if(responseText.indexOf('!temp')!= -1){
        //console.log(responseText.substr(0,responseText.indexOf('!temp')));
        return responseText.substr(0,responseText.indexOf('!temp'))
    }
}

function onUploadProgress(event) {
    if(event.lengthComuptable) {
        var percentage = log(Math.round((event.loaded * 100) / event.total) + '%');
        if(percentage = 100){
            $('#uploadPercentage').html('');
        }else{
            $('#uploadPercentage').html('upload: '+percentage+'<br/>');
        }
    }
}