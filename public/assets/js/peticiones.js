
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

function codeQr(id) {
    $.ajax({
        url: '/codeQr/'+id,
        type: 'get',
        success: function (data) {
            $('#modal-blade').modal('show');
            $('#codeQr').html(`<img src="${data.qr}" class="img-fluid" alt="Foto">`);
            $('#modal-blade-title').html(data.name);
        }
    });
}