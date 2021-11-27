<?php

require __DIR__ . '/../../src/Model.php';
$cadastrar = new Monitoramento();

$id = $_POST['id'];
$nome = $_POST['name'];
$idade = $_POST['idade'];
$email = $_POST['email'];

$alterar = $cadastrar->alterUser($id,$nome,$idade,$email);

if($alterar > 0) {
    echo true;
}else {
    echo false;
}