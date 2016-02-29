$(function () {
    $('#teiupload').bind('change', upload);
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

function upload(){
    File = $('input[type="file"]')[0].files[0];
    formData = new FormData();
    if ('getAsBinary' in File) {
        formData.append('teifile', File.getAsBinary());
    }
    else {
        formData.append('teifile' || File.fileName, File);

        $('#formSubmitButton').prop('disabled',null);
        $('#formSubmitButton').attr('style','color: #000000;');
    }
    formData.append('filename',File.name || File.fileName);
    formData.append('id',$('#id').val());
    formData.append('scheme',$('#scheme').val());
    xhr = new XMLHttpRequest();
    xhr.upload.addEventListener("progress", onUploadProgress);

    var url = $(this).attr('data-url');
    xhr.open('post', url, true);

    xhr.onreadystatechange=function() {
        console.log('xhr status:',xhr);

        if (xhr.readyState==4){
            toggleSubmitButton('initial',false);

            $('#ajax-loader').attr('style','display:none;');

            if(xhr.status==200) {
                $('#corpusResponse').html(xhr.responseText);
                $('#uploadResponse').removeAttr('style');
                if(xhr.responseText.includes('Error')){
                    toggleSubmitButton('corpus',true);
                }
            }
            else {
                $('#uploadResponse').text('upload failed');
                toggleSubmitButton('corpus',true);
            }
            validateDocuments(url);
        }
    };
    $('#uploadResponse').removeAttr('style');
    xhr.send(formData);
}

function deleteFolder(url){
    return $.ajax({
        type: "post",
        url: url+'/delete'
    });
}

function validateDocuments(url){
    $.ajax({
        type: "post",
        url: url+'/docs',
        success: function (result) {
            $('#documentResponse').html(result);
            if(result.indexOf("Error") > -1){
                toggleSubmitButton('documents',true);
            }
        },
        error: function(){
            $('#documentResponse').html('<b>upload error</b>');
            toggleSubmitButton('documents',true);
        }
    });
    validatePreparations(url);
}

function validatePreparations(url){
    $.ajax({
        type: "post",
        url: url+'/preps',
        success: function (result) {
            $('#preparationResponse').html(result);
            if(result.indexOf("Error") > -1){
                toggleSubmitButton('preparations',true);
            }
        },
        error: function(){
            $('#documentResponse').html('<b>upload error</b>');
            toggleSubmitButton('preparations',true);
        }
    });
}

function getText(responseText) {
    if(responseText.indexOf('!temp')!= -1){
        //console.log(responseText.substr(responseText.indexOf('!temp')+5,responseText.length-responseText.indexOf('!temp')+5))
        return responseText.substr(responseText.indexOf('!temp')+5,responseText.length-responseText.indexOf('!temp')+5);
    }
    return null;
}

function getFileName(responseText) {
    if(responseText.indexOf('!temp')!= -1){
        //console.log(responseText.substr(0,responseText.indexOf('!temp')));
        return responseText.substr(0,responseText.indexOf('!temp'));
    }
    return null;
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

function validateForm(){
    if(!$('#label').val()){
        $('#label').addClass('valerror');
        return false;
    }else{
        return true;
    }
}