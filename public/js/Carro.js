$(document).ready(function () {
    $.ajax({
        type: "get",
        url: "api/carros",
        success: function (data) {
            var x = Object.values(data);
            var res = "";
            $.each(x, function (key, value) {
                res +=
                    "<tr>" +
                    "<td>" +
                    Object.values(value)[0] +
                    "</td>" +
                    "<td>" +
                    Object.values(value)[1] +
                    "</td>" +
                    "<td>" +
                    Object.values(value)[2] +
                    "</td>" +
                    "<td>" +
                    Object.values(value)[3] +
                    "</td>" +
                    "<td>" +
                    '<button type="button" id="' +
                    Object.values(value)[0] +
                    '" class="btn btn-warning btn-sm edit" data-toggle="modal" data-target="#modalEditar"><span class="glyphicon glyphicon-edit"></span></button>' +
                    "</td>" +
                    "<td>" +
                    '<button type="button" class="btn btn-danger btn-xs delete" id="' +
                    Object.values(value)[0] +
                    '">Delete</button>' +
                    "</td>" +
                    "</tr>";
            });

            $("tbody").html(res);
        },
    });


    $.ajax({
        type: "get",
        url: "http://fipeapi.appspot.com/api/1/carros/marcas.json",
        success: function (data) {
            var marcas = `<option value=""></option>`
            data.map(item => {
                marcas += `<option value="${item.name}">${item.name}</option>`
            })
            $("#marcas-edit").html(marcas);
            $("#marcas-add").html(marcas);
        }
    })
});

$(document).on("click", ".edit", function () {
    var id = $(this).attr("id");

    $("#ajaxModel").modal("show");
    $(document).on("click", "#saveBtn", function () {
        var marca = $("#marcas-edit").val();
        var modelo = $("#modelo").val();
        var ano = $("#ano").val();
        ajaxUpdate(marca, modelo, ano, id);
    });
});

$(document).on("click", "#add-row", function () {
    $("#ModalAdd").modal("show");
    $(document).on("click", "#addBtn", function () {
        var marca = $("#marcas-add").val();
        var modelo = $("#modeloAdd").val();
        var ano = $("#anoAdd").val();
        AjaxAdd(marca, modelo, ano);
    });
});

$(document).on("click", ".btn-xs", function () {
    var id = $(this).attr("id");
    swal(
        {
            title: "Tem certeza?",
            text: " Deletar Carro ",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sim",
            closeOnConfirm: false,
        },
        function (isConfirm) {
            if (!isConfirm) return;
            $.ajax({
                url: `api/carros/${id}`,
                type: "delete",
                dataType: "JSON",
                success: function () {
                    swal(
                        {
                            title: "Success",
                            text: "Carro Deletado com sucesso",
                            type: "success",
                        },
                        function () {
                            location.reload();
                        }
                    );
                },
                error: function (data, textStatus, msg) {
                    var errors = data.responseJSON;
                    var message = Object.values(errors);
                    console.log(message);
                    swal(
                        {
                            title: "Erro",
                            text: `${message.join("\n")}`,
                            type: "error",
                        },
                        function () {
                            location.reload();
                        }
                    );
                },
            });
        }
    );
});

function ajaxUpdate(marca, modelo, ano, id) {
    $.ajax({
        url: `api/carros/${id}`,
        type: "put",
        dataType: "JSON",
        data: { marca: marca, modelo: modelo, ano: ano },
        success: function () {
            swal(
                {
                    title: "Success",
                    text: "Carro atualizado com sucesso",
                    type: "success",
                },
                function () {
                    location.reload();
                }
            );
        },
        error: function (data, textStatus, msg) {
            var errors = data.responseJSON;
            var message = Object.values(errors);
            swal(
                {
                    title: "Erro",
                    text: `${message.join("\n")}`,
                    type: "error",
                },
                function () {
                    location.reload();
                }
            );
        },
    });
}

function AjaxAdd(marca, modelo, ano) {
    $.ajax({
        type: "POST",
        url: "api/carros",
        data: { marca: marca, modelo: modelo, ano: ano },
        dataType: "JSON",
        success: function (data, textStatus, msg) {
            swal(
                {
                    title: "Success",
                    text: "Carro Cadastrado com sucesso",
                    type: "success",
                },
                function () {
                    location.reload();
                }
            );
        },
        error: function (data, textStatus, msg) {
            var errors = data.responseJSON;
            var message = Object.values(errors);
            swal(
                {
                    title: "Erro",
                    text: `${message.join('\n')}`,
                    type: "error",
                },
                function () {
                    location.reload();
                }
            );
        }
    });
}
