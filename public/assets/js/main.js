$(document).ready(function () {
   
    $('#foto').fileinput({
        lenguaje: 'es',
        allowesFileExtensions: ['jpg', 'jprg', 'png'],
        maxFileSize: 2000,
        showUpload: false,
        showColes: false,
        initialPreviewAsData: true,
        theme: 'fas'
    });

});