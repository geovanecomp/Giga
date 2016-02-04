

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
                    <h1 class="page-header">Cadastrar Fornecedor</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Informe os dados abaixo. <br />
                            <?php
                              if(isset($status) && !empty($status)){
                                echo $status;
                              }
                             ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="index.php?secao=Fornecedor&acao=cadastrarFornecedor">
                                        <div class="form-group">
                                            <label>Nome:</label>
                                            <input name="nome" id = "nome" class="form-control">
                                            <label>Descrição:</label>
                                            <input name="descricao" id = "descricao" class="form-control">
                                            <label>Endereço:</label>
                                            <input name="endereco" id = "endereco" class="form-control">
                                            <label>Cidade:</label>
                                            <input name="cidade" id = "cidade" class="form-control">
                                            <label>Bairro:</label>
                                            <input name="bairro" id = "bairro" class="form-control">
                                            <label>Número:</label>
                                            <input name="numero" id = "numero" class="form-control">
                                            <label>Telefone 1:</label>
                                            <input name="ddd[0]" id = "ddd[0]" class="form-control">
                                            <input name="numeroTel[0]" id = "numeroTel[0]" class="form-control">
                                            <input name="referenciaTel[0]" id = "referenciaTel" class="form-control">
                                            <label>Telefone 2:</label>
                                            <input name="ddd[1]" id = "ddd[1]" class="form-control">
                                            <input name="numeroTel[1]" id = "numeroTel" class="form-control">
                                            <input name="referenciaTel[1]" id = "referenciaTel" class="form-control">
                                            <label>Email 1:</label>
                                            <input name="email[0]" id = "email[0]" class="form-control">
                                            <input name="referenciaEmail[0]" id = "referenciaEmail" class="form-control">
                                            <label>Email 2:</label>
                                            <input name="email[1]" id = "email[1]" class="form-control">
                                            <input name="referenciaEmail[1]" id = "referenciaEmail" class="form-control">
                                            <!--<p class="help-block">Exemplo: 1-A</p> Para dar exemplo de preenchimento-->
                                        </div>

                                        <button type="submit" class="btn btn-primary">Cadastrar</button>

                                        <a class="btn btn-danger" href="index.php">Cancelar</a>
                                    </form>
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
