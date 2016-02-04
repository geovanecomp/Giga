
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
                    <h1 class="page-header">Atualizar Produto</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Atualize os dados abaixo.
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <?php

                                     if(isset($transportadora)){ ?>
                                      <form role="form" method="post" action="index.php?secao=Transportadora&acao=atualizarTransportadora">
                                        <input type = "hidden" name="idTransportadora" id = "idTransportadora" value = "<?php echo $transportadora->getId()?>">
                                        <div class="form-group">
                                          <label>Nome:</label>
                                          <input name="nome" id = "nome" class="form-control" value = "<?php echo $transportadora->getNome()?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Atualizar</button>
                                        <a class="btn btn-danger" href="index.php">Cancelar</a>
                                      </form>
                                    <?php }
                                    else{?>
                                      <center><h2>Nenhuma transportadora cadastrada</h2></center>
                                    <?php } ?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
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

</body>

</html>
