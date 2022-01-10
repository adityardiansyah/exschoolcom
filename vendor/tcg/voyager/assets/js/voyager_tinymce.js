function setImageValue(url){
  $('.mce-btn.mce-open').parent().find('.mce-textbox').val(url);
}

$(document).ready(function(){

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  tinymce.init({
    menubar: 'view',
    selector:'textarea.richTextBox',
    skin: 'voyager',
    min_height: 600,
    resize: 'vertical',
    plugins: 'lists, link, image, code, youtube, giphy, table, textcolor, emoticons, preview, autolink, legacyoutput',
    extended_valid_elements : 'input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]',
    // extended_valid_elements: 'script[type|defer|src|language]',
    extended_valid_elements: 'script[language|type|src]',
    file_browser_callback: function(field_name, url, type, win) {
            if(type =='image'){
              $('#upload_file').trigger('click');
            }
        },
    toolbar: 'styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist | outdent indent | link image table youtube giphy | code | emoticons | preview',
    convert_urls: true,
    image_caption: true,
    image_title: true,

  });

});
