<?php
session_start();
require __DIR__ . '/../../src/Model.php';
$cadastrar = new Monitoramento();

$email = $_POST['email'];
$password = $_POST['password'];

$check = $cadastrar->checkLogin($email, $password);

if($check == true) {
    $_SESSION['login'] = true;
    echo true;
}else {
    echo false;
}