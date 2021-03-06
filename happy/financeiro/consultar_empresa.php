<?php
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerLogado();
    require_once '../DAO/EmpresaDAO.php';
    $objEmpresa = new EmpresaDAO();
    $empresas = $objEmpresa->ConsultarEmpresa();
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
                        <?php include_once ('_msg.php');?>
                        <h2>Consultar Empresa</h2>
                        <h5>Aqui você poderá consultar suas empresas. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
               
                <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Empresas Cadastradas <span> <a href="nova_empresa.php"><i title="Criar Nova Empresa" style="font-size: 22px;float: right;" class="fa fa-plus-circle"></i></a></span>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nome Empresa</th>
                                            <th>Endereço</th>
                                            <th>Telefone</th>
                                            <th>E-mail</th>
                                            <th>Ação</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i=0; $i<count($empresas) ; $i++) { ?> 
                                        <tr class="odd gradeX">
                                            <td><?= $empresas[$i]['nome_empresa']?></td>
                                            <td><?= $empresas[$i]['endereco_empresa']?></td>
                                            <td><?= $empresas[$i]['telefone_empresa']?></td>
                                            <td><?= $empresas[$i]['email_empresa']?></td>
                                            <td>
                                                <a class="btn btn-warning btn-xs" href="alterar_empresa.php?cod=<?=$empresas[$i]['id_empresa']?>">alterar</a>
                                            </td>
                                            
                                        </tr>
                                      <?php } ?>  
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>



            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
    
</body>

</html>