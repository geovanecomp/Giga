
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
                    <h1 class="page-header">Atualizar Fornecedor</h1>
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

                                    if(isset($fornecedor)){ ?>
                                      <form role="form" method="post" action="index.php?secao=Fornecedor&acao=atualizarFornecedor">
                                        <input type = "hidden" name="idFornecedor" id = "idFornecedor" value = "<?php echo $fornecedor->getId()?>">
                                        <div class="form-group">
                                          <label>Nome:</label>
                                          <input name="nome" id = "nome" class="form-control" value = "<?php echo $fornecedor->getNome()?>">
                                          <label>Descrição:</label>
                                          <input name="descricao" id = "descricao" class="form-control" value = "<?php echo $fornecedor->getDescricao()?>">
                                          <label>Endereço:</label>
                                          <input name="endereco" id = "endereco" class="form-control" value = "<?php echo $fornecedor->getEndereco()?>">
                                          <label>Cidade:</label>
                                          <input name="cidade" id = "cidade" class="form-control" value = "<?php echo $fornecedor->getCidade()?>">
                                          <label>Bairro:</label>
                                          <input name="bairro" id = "bairro" class="form-control" value = "<?php echo $fornecedor->getBairro()?>">
                                          <label>Número:</label>
                                          <input name="numero" id = "numero" class="form-control" value = "<?php echo $fornecedor->getNumero()?>">
                                          <label>Telefones:</label>
                                          <?php
                                            $i = 0;
                                            foreach ($fornecedor->getTelefones() as $t) { ?>
                                            <input type = "hidden" name="idTel[<?php echo $i ?>]" id = "idTel" value = "<?php echo $t->getId()?>">
                                            <input name="ddd[<?php echo $i ?>]" id = "ddd" class="form-control" value = "<?php echo $t->getDdd()?>">
                                            <input name="numeroTel[<?php echo $i ?>]" id = "numeroTel" class="form-control" value = "<?php echo $t->getNumero()?>">
                                            <input name="referenciaTel[<?php echo $i ?>]" id = "referenciaTel" class="form-control" value = "<?php echo $t->getReferencia()?>">
                                            <br />
                                          <?php $i++; } ?>
                                          <label>Emails:</label>
                                          <?php
                                            $i = 0;
                                            foreach ($fornecedor->getEmails() as $e){?>
                                            <input type = "hidden" name="idEmail[<?php echo $i ?>]" id = "idEmail" value = "<?php echo $e->getId()?>">
                                            <input name="email[<?php echo $i ?>]" id = "email" class="form-control" value = "<?php echo $e->getEmail() ?>">
                                            <input name="referenciaEmail[<?php echo $i ?>]" id = "referenciaEmail" class="form-control" value = "<?php echo $e->getReferencia()?>">
                                            <br />
                                          <?php $i++; } ?>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Atualizar</button>

                                        <a class="btn btn-danger" href="index.php">Cancelar</a>
                                      </form>
                                    <?php }
                                    else{?>
                                      <center><h2>Nenhum fornecedor cadastrado</h2></center>
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
