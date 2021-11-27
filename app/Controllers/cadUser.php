<?php

require __DIR__ . '/../../src/Model.php';
$cadastrar = new Monitoramento();

$nome = $_POST['name'];
$idade = $_POST['idade'];
$email = $_POST['email'];
$password = $_POST['password'];

$cad_user = $cadastrar->cadUser($nome, $idade, $email,$password);

if($cad_user == true) {
    $recebId = $cadastrar->showEndUser();
    foreach ($recebId as $id_cliente){
        $id = $id_cliente['id_cliente'];
    }

    if($id_cliente > 0) {
        $retorno = [true, "id" => $id, "nome" => $nome , "idade" => $idade, "email" => $email,];
    }else {
        $retorno = false;
    }
}else {
    $retorno = false;
}

print_r(json_encode($retorno));
