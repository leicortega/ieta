
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#buscar-qr').submit(function () {
    var id = $('#identificacion').val()
    $.ajax({
        url: '/view-qr/'+id,
        type: 'get',
        success: function (data) {
            $('#content-qr').html(`
                <img src="`+data.personal[0].qr+`" />
                <p class="text-white h6 mt-2">Escanear el Codigo QR para ver la información.</p>
            `);
        }
    });
    return false;
});