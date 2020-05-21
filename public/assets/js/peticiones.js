
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

function verPersona(id) {
    $.ajax({
        url: '/view-qr/'+id,
        type: 'get',
        success: function (data) {
            $('#modal-blade').modal('show');
            $('#modal-blade-title').html(data.personal[0].name);
            $('#modal-blade-body').html(`
            
                <form action="/update-personal" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="qu3q9hdEknV82YbsFpaG72EtNFEKgAbCbWThwVr4">
                    <input type="hidden" name="id" value="${data.personal[0].id}">
                
                    <div class="form-group row">
                        <label for="identificacion" class="col-sm-2 col-form-label">Identificacion</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="identificacion" id="identificacion" value="${data.personal[0].identificacion}" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="name" id="name" value="${data.personal[0].name}" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sede" class="col-sm-2 col-form-label">Sede</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="sede" id="sede" value="${data.personal[0].sede}" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cargo" class="col-sm-2 col-form-label">Cargo</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="cargo" id="cargo" value="${data.personal[0].cargo}" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                        <div class="col-sm-10">
                            <select name="estado" id="estado" class="form-control" required>
                                <option value="">Seleccione el estado</option>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" name="email" id="email" value="${data.personal[0].email}" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="rh" class="col-sm-2 col-form-label">RH</label>
                        <div class="col-sm-10">
                            <select name="rh" id="rh" class="form-control" required>
                                <option value="">Seleccione el RH</option>
                                <option value="A+">A+</option>
                                <option value="B+">B+</option>
                                <option value="O+">O+</option>
                                <option value="AB+">AB+</option>
                                <option value="A-">A-</option>
                                <option value="B-">B-</option>
                                <option value="O-">O-</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-success btn-lg waves-effect waves-light" type="submit">Actualizar</button>
                    </div> 

                </form>
            
            `)

            $('#estado').val(data.personal[0].estado);
            $('#rh').val(data.personal[0].rh);
        }
    });
}