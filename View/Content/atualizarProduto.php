
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

                                     if(isset($produto) && isset($fornecedores)){ ?>
                                      <form role="form" method="post" action="index.php?secao=Produto&acao=atualizarProduto">
                                        <input type = "hidden" name="idProduto" id = "idProduto" value = "<?php echo $produto->getId()?>">
                                        <div class="form-group">
                                          <label>Nome:</label>
                                          <input name="nome" id = "nome" class="form-control" value = "<?php echo $produto->getNome()?>">
                                          <label>Descrição:</label>
                                          <input name="descricao" id = "descricao" class="form-control" value = "<?php echo $produto->getDescricao()?>">

                                          <label for="fornecedor">Fornecedor</label>
                                          <select id="idFornecedor" name="idFornecedor" class="form-control">
                                          <?php foreach ($fornecedores as $f) {
                                            if($f->getId() != $produto->getFornecedor()->getId()){ ?>
                                                <option value="<?php echo $f->getId(); ?>"><?php echo $f->getNome(); ?></option>
                                            <?php }
                                            else{ ?>
                                                <option value="<?php echo $f->getId(); ?>" selected="selected"><?php echo $f->getNome(); ?></option>
                                          <?php }

                                        } ?> </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Atualizar</button>
                                        <a class="btn btn-danger" href="index.php">Cancelar</a>
                                      </form>
                                    <?php }
                                    else{?>
                                      <center><h2>Nenhum produto cadastrado</h2></center>
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
