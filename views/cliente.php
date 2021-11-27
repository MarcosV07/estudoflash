<?php
session_start();
require __DIR__ . '/../src/Model.php';
$verifica = new Monitoramento();

if (isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}else {
    header('location: ./');
}

if (isset($_GET['q'])){
    $_SESSION['login'] = FALSE;
	session_destroy();
    header("location: ./");
}

$nome_cliente = $verifica->get_fullname($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/timeline.css">

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
                        <a href="#!">Home</a>
                    </li>
                    <li>
                        <a href="#!"><?= $nome_cliente?></a>
                        <ul class="nav-dropdown">
                            <li>
                                <a href="#" id="btnpassword">Alterar Senha</a>
                            </li>
                            <li>
                                <a href="?q=logout">Sair</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="container" id="timeline">
        <h1>Trilha de estudo</h1>
        <p class="leader">Seja Bem Vindo(a) <?= strtoupper($nome_cliente);?></p>
        <div class="demo-card-wrapper">
            <div class="demo-card demo-card--step1">
                <div class="head">
                    <div class="number-box">
                        <span>01</span>
                    </div>
                    <h2><span class="small">Curso</span> Composer</h2>
                </div>
                <div class="body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                    <img src="http://placehold.it/1000x500" alt="Graphic">
                </div>
            </div>

            <div class="demo-card demo-card--step2">
                <div class="head">
                    <div class="number-box">
                        <span>02</span>
                    </div>
                    <h2><span class="small">Curso</span>Iniciando com OO</h2>
                </div>
                <div class="body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                    <img src="http://placehold.it/1000x500" alt="Graphic">
                </div>
            </div>

            <div class="demo-card demo-card--step3">
                <div class="head">
                    <div class="number-box">
                        <span>03</span>
                    </div>
                    <h2><span class="small">Curso</span>Avançando com OO.</h2>
                </div>
                <div class="body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                    <img src="http://placehold.it/1000x500" alt="Graphic">
                </div>
            </div>

            <div class="demo-card demo-card--step4">
                <div class="head">
                    <div class="number-box">
                        <span>04</span>
                    </div>
                    <h2><span class="small">Curso</span>MVC</h2>
                </div>
                <div class="body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                    <img src="http://placehold.it/1000x500" alt="Graphic">
                </div>
            </div>

            <div class="demo-card demo-card--step5">
                <div class="head">
                    <div class="number-box">
                        <span>05</span>
                    </div>
                    <h2><span class="small">Curso</span> PHP 7 Novidades</h2>
                </div>
                <div class="body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                    <img src="http://placehold.it/1000x500" alt="Graphic">
                </div>
            </div>
        
        </div>
    </section>

    <div id="Modalpassword" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3 class="register">Alterar Senha</h3>

            <form action="" id="alterpassword" autocomplete="off" method="post">
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