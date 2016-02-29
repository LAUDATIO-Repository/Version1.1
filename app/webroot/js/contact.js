/**
 * Created by DZielke on 23.04.14.
 */
/*
$(document).ready(function()  {

    $('h2 img').click(loadContent);
});

function loadContent(){
    if($('#accordion').attr('data-edit') !== undefined){
        var file = $('#accordion').attr('data-edit');
        $('#accordion').removeAttr('data-edit');
        var text = $('#accordion div[data-file-name="'+file+'"] span').html();
        var descriptionElement = $('#accordion div[data-file-name="'+file+'"]');
        descriptionElement.children().each(function(){
            this.remove();
        });
        descriptionElement.html(text);
    }
    var file = $(this).attr('data-file-name');
    $.ajax({
        url:window.location.pathname,
        type:"POST",
        data:{'file':file},
        dataType: "text",
        success:function(data,textStatus,jqXHR){
            var selector = '#accordion div[data-file-name="'+file+'"]'
            var descriptionElement = $(selector);
            var text = descriptionElement.html();
            $('#accordion').attr('data-edit',file);
            descriptionElement.text('');
            descriptionElement.append('<span style="display:none;">'+text+'</span>');
            descriptionElement.append('<form method="post" action="contact" id="contentForm"><input type="hidden" name="file" value="'+file+'"><textarea style="width:100%;min-height:300px;" name="content" id="editContent">'+data+'</textarea></form>');

            showTiny('#editContent');
        }
    })
}


function tinySubmit(){
    tinyMCE.triggerSave();
    var element = document.getElementById('contentForm');
    element.submit();
}

function showTiny(selector){
    tinymce.init({
        selector: selector,

        force_br_newlines : true,
        force_p_newlines : false,
        gecko_spellcheck : true,
        forced_root_block : '', // Needed for 3.x

        remove_linebreaks : false,



        inline: false,
        plugins: [
            "save","link","code"
        ],
        theme_advanced_buttons1 : "save",
        toolbar: "save | styleselect | code | undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
        save_enablewhendirty : true,
        save_onsavecallback : "tinySubmit"

    });
}
*/

$(document).ready(function()  {

    $('dt img').click(loadContent);
});

function loadContent(){
    if($('#tabs2').attr('data-edit') !== undefined){
        var file = $('#tabs2').attr('data-edit');
        $('#tabs2').removeAttr('data-edit');
        var text = $('#tabs2 dd[data-file-name="'+file+'"] span').html();
        var descriptionElement = $('#tabs2 dd[data-file-name="'+file+'"]');
        descriptionElement.children().each(function(){
            this.remove();
        });
        descriptionElement.html(text);
    }
    var file = $(this).attr('data-file-name');
    $.ajax({
        url:window.location.pathname,
        type:"POST",
        data:{'file':file},
        dataType: "text",
        success:function(data,textStatus,jqXHR){
            var selector = '#tabs2 dd[data-file-name="'+file+'"]'
            var descriptionElement = $(selector);
            var text = descriptionElement.html();
            $('#tabs2').attr('data-edit',file);
            descriptionElement.text('');
            descriptionElement.append('<span style="display:none;">'+text+'</span>');
            descriptionElement.append('<form method="post" action="contact" id="contentForm"><input type="hidden" name="file" value="'+file+'"><textarea style="width:100%;min-height:300px;" name="content" id="editContent">'+data+'</textarea></form>');
            //$('#editContent').val(data);
            showTiny('#editContent');

            //showTiny(selector);
            //descriptionElement.text(data);
        }
    })
    //$('#tabs2').after('<td><button type="button" onclick="tinySubmit()">submit changes</button></td>')
}


function tinySubmit(){
    //$('#editContent').tinymce().save();
    //tinymce.triggerSave();

    tinyMCE.triggerSave();
    var element = document.getElementById('contentForm');
    element.submit();
}


/*
 $("textarea[id='id_answer']").change(function(){
 var editor_id = $(this).attr('id');
 var editor = tinymce.get(editor_id);
 editor.setContent($(this).val()).save();
 });
 */

function showTiny(selector){
    tinymce.init({
        selector: selector,

        inline: false,
        plugins: [
            "save","link","code"
        ],
        theme_advanced_buttons1 : "save",
        toolbar: "save | styleselect | code | undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
        save_enablewhendirty : true,
        save_onsavecallback : "tinySubmit"

    });
}
