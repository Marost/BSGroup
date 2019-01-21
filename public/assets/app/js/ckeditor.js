$('.editors').each(function(){
    CKEDITOR.replace( $(this).attr('id'),{
        customConfig: '/assets/app/js/ckeditor-config.js'
    });
});