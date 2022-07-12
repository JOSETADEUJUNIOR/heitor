<?php

require_once '../DAO/UsuarioDAO.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $objdao = new UsuarioDAO();
    $ret = $objdao->ValidarEmail($email);

    echo $ret;
}



?>