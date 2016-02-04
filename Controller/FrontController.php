<?php
  ini_set('display_errors', 'on');
  include('Controller/FornecedorController.php');
  include('Controller/ProdutoController.php');
  include('Controller/TransportadoraController.php');
  include('Controller/PedidoController.php');

  class FrontController{
    public function __construct(){
      if(isset($_GET['secao']) && isset($_GET['acao'])){
        if(strtolower($_GET['secao']) == strtolower('Fornecedor')){
          $fornecedorController = new FornecedorController();
          if(strtolower($_GET['acao']) == strtolower('cadastrarFornecedor')){
            if( $_POST ){
              $fornecedorController->cadastrarFornecedor();
            }else{
              $fornecedorController->viewCadastrar();
            }
          }
          elseif(strtolower($_GET['acao']) == strtolower('listarFornecedores')){
            $fornecedorController->listarFornecedores();
          }
          elseif(strtolower($_GET['acao']) == strtolower('buscarFornecedorPorNome')){
            $fornecedorController->buscarFornecedorPorNome();
          }
          elseif(strtolower($_GET['acao']) == strtolower('buscarFornecedorPorId') && isset($_REQUEST['id'])){
            $fornecedorController->buscarFornecedorPorId();
          }
          elseif(strtolower($_GET['acao']) == strtolower('buscarFornecedorPorIdParaAtualizar') && isset($_REQUEST['id'])){
            $fornecedorController->buscarFornecedorPorIdParaAtualizar();
          }
          elseif(strtolower($_GET['acao']) == strtolower('atualizarFornecedor') && isset($_REQUEST['idFornecedor'])){
            $fornecedorController->atualizarFornecedor();
          }
          elseif(strtolower($_GET['acao']) == strtolower('excluirFornecedor') && isset($_REQUEST['id'])){
            $fornecedorController->excluirFornecedor();
          }
        }

        elseif(strtolower($_GET['secao']) == strtolower('Produto')){

          $produtoController = new ProdutoController();

          if(strtolower($_GET['acao']) == strtolower('cadastrarProduto')){
            if( $_POST ){
              $produtoController->cadastrarProduto();
            }else{
              $produtoController->viewCadastrar();
            }
          }
          elseif(strtolower($_GET['acao']) == strtolower('listarProdutos')){
            $produtoController->listarProdutos();
          }
          // Não Implementado
          elseif(strtolower($_GET['acao']) == strtolower('buscarProdutoPorNome')){
            $produtoController->buscarProdutoPorNome();
          }
          elseif(strtolower($_GET['acao']) == strtolower('buscarProdutoPorId')){
            $produtoController->buscarProdutoPorId();
          }
          elseif(strtolower($_GET['acao']) == strtolower('buscarProdutoPorIdParaAtualizar') && isset($_REQUEST['id'])){
            $produtoController->buscarProdutoPorIdParaAtualizar();
          }
          elseif(strtolower($_GET['acao']) == strtolower('atualizarProduto') && isset($_REQUEST['idProduto'])){
            $produtoController->atualizarProduto();
          }
          elseif(strtolower($_GET['acao']) == strtolower('excluirProduto')){
            $produtoController->excluirProduto();
          }

        }

        elseif(strtolower($_GET['secao']) == strtolower('Pedido')){

          $pedidoController = new PedidoController();

          if(strtolower($_GET['acao']) == strtolower('cadastrarPedido')){
            if( $_POST ){
              $pedidoController->cadastrarPedido();
            }else{
              $pedidoController->viewCadastrar();
            }
          }
          elseif(strtolower($_GET['acao']) == strtolower('listarPedidos')){
            $pedidoController->listarPedidos();
          }
          // Não Implementado
          elseif(strtolower($_GET['acao']) == strtolower('buscarPedidoPorNome')){
            $pedidoController->buscarPedidoPorNome();
          }
          elseif(strtolower($_GET['acao']) == strtolower('buscarPedidoPorId')){
            $pedidoController->buscarPedidoPorId();
          }
          // Não Implementado
          elseif(strtolower($_GET['acao']) == strtolower('atualizarPedido') && isset($_REQUEST['idPedido'])){
            $pedidoController->atualizarPedido();
          }
          elseif(strtolower($_GET['acao']) == strtolower('excluirPedido')){
            $pedidoController->excluirPedido();
          }

        }

        elseif(strtolower($_GET['secao']) == strtolower('Transportadora')){

          $transportadoraController = new TransportadoraController();

          if(strtolower($_GET['acao']) == strtolower('cadastrarTransportadora')){
            if( $_POST ){
              $transportadoraController->cadastrarTransportadora();
            }else{
              $transportadoraController->viewCadastrar();
            }

          }
          elseif(strtolower($_GET['acao']) == strtolower('listarTransportadoras')){
            $transportadoraController->listarTransportadoras();
          }
          // Não Implementado
          elseif(isset($_GET['buscarTransportadoraPorNome'])){
            $transportadoraController->buscarTransportadoraPorNome();
          }
          elseif(strtolower($_GET['acao']) == strtolower('buscarTransportadoraPorId')){
            $transportadoraController->buscarTransportadoraPorId();
          }
          elseif(strtolower($_GET['acao']) == strtolower('buscarTransportadoraPorIdParaAtualizar') && isset($_REQUEST['id'])){
            $transportadoraController->buscarTransportadoraPorIdParaAtualizar();
          }
          // Não Implementado
          elseif(strtolower($_GET['acao']) == strtolower('atualizarTransportadora') && isset($_REQUEST['idTransportadora'])){
            $transportadoraController->atualizarTransportadora();
          }
          elseif(strtolower($_GET['acao']) == strtolower('excluirTransportadora')){
            $transportadoraController->excluirTransportadora();
          }
        }
      else{
        include('View/Content/inicio.php');
      }
    }
    else{
      include('View/Content/inicio.php');
    }
  }
}
?>
