<?php

require_once 'validarCupom.php';
$dao = new validarCupom();

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Código obrigatório";
} else {
    $name = $_POST["name"];
    $ret = $dao->ValidaCupom($name);
   
    if ($ret == 1) {

        echo $success = 'Sua reserva foi confirmada, esperamos por você!';
    } else if ($ret == -3) {

        echo $success = 'Reserva já confirmada';
    }else{
        echo $success = 'Número de cupom inválido';
    }
}
