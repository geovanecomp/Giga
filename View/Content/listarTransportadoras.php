<!DOCTYPE html>
<html lang="en">

<?php include('COMMONS/head.php') ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('COMMONS/navigation.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Transportadora cadastradas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      <?php
                        if(isset($status) && !empty($status)){
                          echo $status;
                        }
                       ?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                      <?php
                                        if(isset($transportadoras)){
                                          foreach ($transportadoras as $t) { ?>
                                            <tr class="odd gradeX">
                                                <td><a href="index.php?secao=Transportadora&acao=buscarTransportadoraPorId&id=<?php echo $t->getId() ?>"><?php echo $t->getNome() ?></a></td>
                                                <td><a href="index.php?secao=Transportadora&acao=excluirTransportadora&id=<?php echo $t->getId() ?>">Excluir Transportadora</a>
                                                | <a href="index.php?secao=Transportadora&acao=buscarTransportadoraPorIdParaAtualizar&id=<?php echo $t->getId() ?>">Atualizar Transportadora</a></td>
                                            </tr>
                                          <?php }
                                        } ?>
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="View/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="View/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="View/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="View/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="View/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="View/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
