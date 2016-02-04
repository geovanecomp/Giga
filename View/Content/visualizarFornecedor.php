<html lang="en">

<?php include('COMMONS/head.php') ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('COMMONS/navigation.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Informações do fornecedor</h1>
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
                        <?php

                          if(isset($fornecedor)){?>
                            <center><h2>Informações</h2></center>
                            <table align = 'center' width = '800'>
                                <tr><td width = "50"><h4><label>Nome:</label><?php echo $fornecedor->getNome() ?></h4><br /></td>
                                <td width = "50"><h4><label>Descrição:</label> <?php echo $fornecedor->getDescricao() ?></h4><br /></td>
                                <td width = "50"><h4><label>Cidade:</label> <?php echo $fornecedor->getCidade() ?></h4><br /></td></tr>
                                <tr><td width = "50"><h4><label>Endereço:</label> <?php echo $fornecedor->getEndereco() ?></h4><br /></td>
                                <td width = "50"><h4><label>Bairro:</label> <?php echo $fornecedor->getBairro() ?></h4><br /></td>
                                <td width = "50"><h4><label>Número:</label> <?php echo $fornecedor->getNumero() ?></h4><br /></td></tr>
                                <tr><td><h3>Telefones:</h3></tr></td>
                                <?php foreach ($fornecedor->getTelefones() as $t) { ?>
                                  <tr><td width = "50"><h4><label>DDD:</label> <?php echo $t->getDdd() ?></h4><br /></td>
                                  <td width = "50"><h4><label>Número Telefone:</label> <?php echo $t->getNumero() ?></h4><br /></td>
                                  <td width = "50"><h4><label>Referência:</label> <?php echo $t->getReferencia() ?></h4><br /></td></tr>
                                <?php } ?>
                                <tr><td><h3>Emails:</h3></tr></td>
                                <?php foreach ($fornecedor->getEmails() as $e){?>
                                  <tr><td width = "50"><h4><label>Email:</label> <?php echo $e->getEmail() ?></h4><br /></td>
                                  <td width = "50"><h4><label>Referência:</label> <?php echo $e->getReferencia() ?></h4><br /></td></tr>
                                <?php } ?>
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
