<?php

require __DIR__ . '/../../src/Model.php';
$cadastrar = new Monitoramento();

$id_cliente = $_POST['id'];
$delete = $cadastrar->deleteUser($id_cliente);

if($delete > 0) {
    echo true;
}else {
    echo false;
}