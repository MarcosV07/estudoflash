<?php
    require __DIR__ . '/../src/Model.php';
    $verifica = new Monitoramento();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estudo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <link rel="stylesheet" href="./assets/css/style.css">

    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
    <section class="navigation">
    <div class="nav-container">
        <div class="brand">
        <a href="#!">Estudo</a>
        </div>
        <nav>
        <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
        <ul class="nav-list">
            <li>
                <a class="btn-header" href="#" id="btnModalLogin">Login</a>
            </li>
            <li>
                <a class="btn-header" href="#" id="myBtn">Cadastre-se</a>
            </li>
        </ul>
        </nav>
    </div>
    </section>

    <section class="header">
        <div class="inner-header flex">
            <h1 class="glitch" data-text="Estudo Flash">Estudo Flash</h1>
        </div>
        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
    </section>

    <section class="container">
        <div class="table-index">
            <div class="box-user">
                <div class="title">
                    <h1>Usuários</h1>
                    <div class="input-filter">
                        <input type="search" class="input textinput" placeholder="Nome do usuário">
                    </div>
                </div>
            </div>
            <div class="table-response">
                <table class="table-fill">
                    <thead>
                        <tr>
                            <th class="text-left">Nome</th>
                            <th class="text-left">Idade</th>
                            <th class="text-left">E-mail</th>
                            <th class="text-left">opções</th>
                        </tr>
                    </thead>
                    <tbody class="table-hover" id="table-user">
                        <?php
                            $clientes = $verifica->showUser();
                            if($clientes != ''){
                                foreach ($clientes as $row) {                     
                        ?>
                        <tr data-filtro="<?= $row['nome'];?>">
                            <td class="text-left"><?= $row['nome'];?></td>
                            <td class="text-left"><?= $row['idade'];?></td>
                            <td class="text-left"><?= $row['email'];?></td>
                            <td class="text-left option-table">
                                <div class="btn-option">
                                    <a href="?alterando=<?=$row['id_cliente'];?>" class="alter-user">Alterar</a>
                                    <button id="delet<?=$row['id_cliente'];?>" class="delet-user" onclick="deleteUser(this)">Deletar</button>
                                </div>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <?php
        if(isset($_GET['alterando'])){
            echo '
            <script>
                $(document).ready(function() {
                    $("#myModalAlter").addClass("modal-show");
                })
            </script>
            ';
        }
    ?>

    <div id="myModalAlter" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3 class="register">Alterar Dados</h3>

            <form action="" id="form-alter" autocomplete="off" method="post">
                <?php
                    foreach ($clientes as $row) {     
                        if($_GET['alterando'] == $row['id_cliente']){                
                ?>
                <div class="label-float">
                    <input type="text" name="name" onblur="completeCadastro(event, 'label-name-alter')" class="input-form" value="<?= $row['nome']?>" required>
                    <label id="label-name-alter">Nome:</label>
                </div>
                <div class="label-float">
                    <input type="number" name="idade" onblur="completeCadastro(event, 'label-idade-alter')" class="input-form" value="<?= $row['idade']?>" required>
                    <label id="label-idade-alter">Idade:</label>
                </div>
                <div class="label-float">
                    <input type="email" name="email" onblur="completeCadastro(event, 'label-email-alter')" class="input-form" value="<?= $row['email']?>" required>
                    <label id="label-email-alter">E-mail:</label>
                </div>
                <div class="btn-form">
                    <input type="hidden" name="id" value="<?=$row['id_cliente']?>">
                    <button class="btn-send">salvar</button>
                </div>
                <?php
                        }
                    }                     
                ?>
            </form>
        </div>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3 class="register">Cadastre-se</h3>

            <form action="" id="form-cad" autocomplete="off" method="post">
                <div class="label-float">
                    <input type="text" name="name" onblur="completeCadastro(event, 'label-name')" class="input-form" required>
                    <label id="label-name">Nome:</label>
                </div>
                <div class="label-float">
                    <input type="number" name="idade" onblur="completeCadastro(event, 'label-idade')" class="input-form"   required>
                    <label id="label-idade">Idade:</label>
                </div>
                <div class="label-float">
                    <input type="email" name="email" onblur="completeCadastro(event, 'label-email')" class="input-form" required>
                    <label id="label-email">E-mail:</label>
                </div>
                <div class="label-float">
                    <input type="password" name="password" onblur="completeCadastro(event, 'label-password')" class="input-form" required>
                    <label id="label-password">Senha:</label>
                </div>
                <div class="btn-form">
                    <button class="btn-send">Enviar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="ModalLogin" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3 class="register">Login</h3>

            <form action="" id="form-login" autocomplete="off" method="post">
                <div class="label-float">
                    <input type="email" name="email" onblur="completeCadastro(event, 'label-email-login')" class="input-form" required>
                    <label id="label-email-login">E-mail:</label>
                </div>
                <div class="label-float">
                    <input type="password" name="password" onblur="completeCadastro(event, 'label-pass-login')" class="input-form" required>
                    <label id="label-pass-login">Senha:</label>
                </div>
                <div class="btn-form">
                    <button class="btn-send">Enviar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/ajax.js"></script>
</body>
</html>