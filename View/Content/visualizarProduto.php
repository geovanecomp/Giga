<html lang="en">

<?php include('COMMONS/head.php') ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('COMMONS/navigation.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Informações do Produto</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!--<div class="panel-heading">
                            Funcionário cadastrado
                        </div>-->
                        <!-- /.panel-heading -->
                        <?php if(isset($produto)){ ?>
                            <center><h2>Informações</h2></center>
                            <table align = 'center' width = '800'>
                                <tr><td width = "50"><h4><label>Nome:</label><?php echo $produto->getNome() ?></h4><br /></td>
                                <td width = "50"><h4><label>Descrição:</label> <?php echo $produto->getDescricao() ?></h4><br /></td>
                                <td width = "50"><h4><label>Fornecedor:</label> <?php echo $produto->getFornecedor()->getNome() ?></h4><br /></td>

                            </table>
                          <?php }
                          else{?>
                            <center><h2>Nenhum fornecedor cadastrado</h2></center>
                          <?php } ?>

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
