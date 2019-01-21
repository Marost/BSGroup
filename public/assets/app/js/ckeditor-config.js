CKEDITOR.plugins.addExternal('embed', '/assets/app/plugins/ckeditor/plugins/embed/', 'plugin.js');
CKEDITOR.plugins.addExternal('embedbase', '/assets/app/plugins/ckeditor/plugins/embedbase/', 'plugin.js');
CKEDITOR.plugins.addExternal('notificationaggregator', '/assets/app/plugins/ckeditor/plugins/notificationaggregator/', 'plugin.js');
CKEDITOR.plugins.addExternal('widget', '/assets/app/plugins/ckeditor/plugins/widget/', 'plugin.js');
CKEDITOR.plugins.addExternal('notification', '/assets/app/plugins/ckeditor/plugins/notification/', 'plugin.js');
CKEDITOR.plugins.addExternal('lineutils', '/assets/app/plugins/ckeditor/plugins/lineutils/', 'plugin.js');
CKEDITOR.plugins.addExternal('widgetselection', '/assets/app/plugins/ckeditor/plugins/widgetselection/', 'plugin.js');

CKEDITOR.editorConfig = function( config ) {
    config.language = 'es';

    config.filebrowserBrowseUrl = '/assets/app/plugins/kcfinder/browse.php?type=files';
    config.filebrowserImageBrowseUrl = '/assets/app/plugins/kcfinder/browse.php?type=images';
    config.filebrowserFlashBrowseUrl = '/assets/app/plugins/kcfinder/browse.php?type=flash';
    config.filebrowserUploadUrl = '/assets/app/plugins/kcfinder/upload.php?type=files';
    config.filebrowserImageUploadUrl = '/assets/app/plugins/kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl = '/assets/app/plugins/kcfinder/upload.php?type=flash';

    config.toolbar = [
        { name: 'clipboard', items: ['Undo', 'Redo' ] },
        { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
        { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
        { name: 'links', items: [ 'Link', 'Unlink' ] },
        { name: 'insert', items: [ 'Image', 'Embed', 'Table', 'HorizontalRule' ] },
        { name: 'tools', items: [ 'Maximize' ] },
        { name: 'styles', items: [ 'Format', ] }
    ];

    config.extraPlugins = 'embed';
};