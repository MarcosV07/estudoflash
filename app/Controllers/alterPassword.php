<?php
session_start();
require __DIR__ . '/../../src/Model.php';
$cadastrar = new Monitoramento();

$senha = $_POST['password'];

$alterPassword = $cadastrar->alterPassword($_SESSION['id'], $senha);

if($alterPassword > 0) {
    echo true;
}else {
    echo false;
}