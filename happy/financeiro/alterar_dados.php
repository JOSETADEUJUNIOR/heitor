<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/UsuarioDAO.php';
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
$objUsuario = new UsuarioDAO();
$pag_ret = 'meus_dados.php';

if (isset($_GET['cod'])) {
    
    $id_user = $_GET['cod'];
    $dados = $objUsuario->DetalharUsuario($id_user);

    if (count($dados)==0) {
        header('location: meus_dados.php');
        exit;
    }


}else if (isset($_POST['btn_alterar'])) {
    echo 'passou por aqui';
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $cod = $_POST['cod'];
    $ret = $objUsuario->AlterarUsuario($nome, $email, $senha, $cod);

    var_dump($ret);
}else{
    echo 'caiu aqui no erro';
    header('location: meus_dados.php');
    exit;
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php include_once('_head.php'); ?>

<body>
    <div id="wrapper">
        <?php include_once('_topo.php'); ?>
        <?php include_once('_menu.php'); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include('_msg.php') ?>
                        <h2>Meus Dados</h2>
                        <h5>Aqui você poderá alterar seus dados. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <form action="alterar_dados.php" method="post">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_usuario']?>">
                    <div class="col-md-12">
                        <div class="form-group col-md-6" id="divDadosNome">
                            <label>Nome</label>
                            <input name="nome" id="dadosNome" value="<?= $dados[0]['nome_usuario']?>" type="text" placeholder="Digite o seu nome" class="form-control" onfocusout="SinalizaCampo('divDadosNome','dadosNome')">
                        </div>
                        <div class="form-group col-md-6" id="divDadosNome">
                            <label>Senha</label>
                            <input name="senha" id="dadosSenha" value="<?= $dados[0]['senha_usuario']?>" type="text" placeholder="Digite o seu nome" class="form-control" onfocusout="SinalizaCampo('divDadosNome','dadosNome')">
                        </div>
                        <div class="form-group col-md-12" id="divDadosEmail">
                            <label>E-mail</label>
                            <input name="email" id="dadosEmail" value="<?= $dados[0]['email_usuario']?>" type="text" placeholder="Digite o seu nome" class="form-control" onfocusout="SinalizaCampo('divDadosEmail','dadosEmail')">
                        </div>
                        <div class="col-md-12">
                            <button name="btn_alterar" class="btn btn-success col-md-2 " onclick=" return ValidarMeusDados()">Alterar</button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /. PAGE INNER  -->




        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->


</body>

</html>