$("#form-cad").submit(function(event) {
    event.preventDefault();
    var dados = $(this).serialize();

    $.ajax({
        method: "POST",
        url: "app/controllers/cadUser.php",
        data: dados,
        dataType: 'json',
        success: function (retorna) {
            Swal.fire({
                icon: 'success',             
                text: 'Usuário cadastrado com sucesso'
            });
            $("#myModal").removeClass('modal-show');
            $("#form-cad")[0].reset();
            $("#table-user").append('<tr data-filtro="'+retorna.nome+'"><td class="text-left">'+retorna.nome+'</td><td class="text-left">'+retorna.idade+'</td><td class="text-left">'+retorna.email+'</td><td class="text-left option-table"><div class="btn-option"><a href="?alterando='+retorna.id+'" class="alter-user">Alterar</a><button id="delet'+retorna.id+'" class="delet-user" onclick="deleteUser(this)">Deletar</button></div></td></tr>');
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                text: 'Error ao cadastrar'
            })
        }
    });
});

function deleteUser(item) {
    var id = $(item).attr("id").replace(/[^0-9]/g,'');
    $.ajax({
        method: "POST",
        url: "app/controllers/deleteUser.php",
        data: {id:id},
        dataType: 'json',
        success: function () {
            Swal.fire({
                icon: 'success',             
                text: 'Deletado com sucesso'
            });

            $(item).parent().parent().parent().remove();
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                text: 'Error ao deletar'
            })
        }
    });
}

$("#form-alter").submit(function(event) {
    event.preventDefault();
    var dados = $(this).serialize();

    $.ajax({
        method: "POST",
        url: "app/controllers/alterUser.php",
        data: dados,
        dataType: 'json',
        success: function () {
            Swal.fire(
                'Usuário Alterado com sucesso',
                '',
                'success'
              ).then(() => {
                window.location.href = "index.php";
            })
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                text: 'Error ao Atualizar'
            })
        }
    });
})

$("#form-login").submit(function(event) {
    event.preventDefault();
    var dados = $(this).serialize();

    $.ajax({
        method: "POST",
        url: "app/controllers/LoginCliente.php",
        data: dados,
        dataType: 'json',
        success: function () {
            window.location.replace("./cliente");
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                title: 'Usuário inválido!',
                text: 'Tente novamente'
            })
        }
    });
})

$("#alterpassword").submit(function(event) {
    event.preventDefault();
    var dados = $(this).serialize();

    $.ajax({
        method: "POST",
        url: "app/controllers/alterPassword.php",
        data: dados,
        dataType: 'json',
        success: function () {
            Swal.fire({
                icon: 'success',
                title: 'Senha alterar com Sucesso!'
            })

            $("#Modalpassword").removeClass('modal-show');
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                title: 'Erro ao alterar senha!'
            })
        }
    });
})


