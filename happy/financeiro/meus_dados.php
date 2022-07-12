<?php
require_once '../DAO/UsuarioDAO.php';
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();

$objDados = new UsuarioDAO();

$usuario = $objDados->ConsultarUsuario();

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

                <div class="panel-body col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nome do usuário</th>
                                    <th>E-mail do usuário</th>
                                    <th>Senha do usuário</th>
                                    <th>Data do Cadastro</th>
                                    <th>Ação</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($usuario as $user) { ?>
                                <tr class="odd gradeX">
                                    <td><?= $user['nome_usuario']?></td>
                                    <td><?= $user['email_usuario']?></td>
                                    <td><?= $user['senha_usuario']?></td>
                                    <td><?= UtilDAO::ExibirDataBr($user['data_usuario'])?></td>
                                    <td>
                                        <a class="btn btn-warning btn-xs" href="alterar_dados.php?cod=<?= $user['id_usuario'] ?>">alterar</a>
                                    </td>

                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                
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