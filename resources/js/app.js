require('./bootstrap');

$('.my-summernote').summernote(
    {
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear', 'superscript', 'subscript']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['misc', ['fullscreen', 'codeview', 'help']],
            ['insert', ['link', 'table', 'hr']]
        ], height: 400
    }
);
