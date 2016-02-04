<?php

  include('Model/Produto.php');
  include('Service/ProdutoService.php');
  include('Dao/ProdutoDao.php');
  //include('Controller/FornecedorController.php');

  class ProdutoController{

    //Atributos
    private $service;

    //Construtor
    public function __construct(){
      $dao = new ProdutoDao();
      $this->service = new ProdutoService($dao);
    }

    //Para não fazer uma verificação inical dos campos
    public function viewCadastrar(){
      $fornecedorController = new FornecedorController();
      $fornecedores = $fornecedorController->buscarTodosFornecedores();
      include('View/Content/cadastrarProduto.php');
    }

    public function cadastrarProduto(){
      $fornecedorController = new FornecedorController();
      $fornecedores = $fornecedorController->buscarTodosFornecedores();
      $campos = array('nome', 'descricao', 'idFornecedor');
      $status = "";
      $validacaoOk = true;

      //Validação simples dos campos de Produto
      //Forma genérica para a validação de quaisquer campos
      foreach ($campos as $c){
        if(!isset($_POST["$c"])){
          $status = $status."Campo ".$c." nao enviado <br />";
          $validacaoOk = false;
        }
        else{
          if(strlen($_POST["$c"]) <= 0){
            $status = $status."Preencha o campo ".$c." corretamente <br />";
            $validacaoOk = false;
          }
        }
      }

      if($validacaoOk){

        $produto = new Produto();
        $produto->setNome($_POST['nome']);
        $produto->setDescricao($_POST['descricao']);

        $fornecedor = new Fornecedor();
        $fornecedor->setId( $_POST['idFornecedor'] );

        $produto->setFornecedor($fornecedor);

        $status = $this->service->cadastrarProduto($produto);

      }

      //$fornecedores = $this->service->listarFornecedores();

      //Salvando com sucesso ou não, redirecionada para a página de cadastro
      include ('View/Content/cadastrarProduto.php');

    }

    public function listarProdutos(){
      $produtos = $this->service->listarProdutos();
      include('View/Content/listarProdutos.php');
    }

    public function buscarProdutoPorNome(){
      if(!isset($_POST['nome'])){
        $status = "Campo nome nao enviado.";
      }
      else{
        if(strlen($_POST['nome']) <= 0){
          $status = "Preencha o campo nome corretamente.";
        }
        else{
          $produto = $this->service->buscarProdutoPorNome($_POST['nome']);
        }
      }
    }

    public function buscarProdutoPorId(){
      if(!isset($_GET['id'])){
        $status = "Campo id nao enviado.";
      }
      else{
        if(strlen($_GET['id']) <= 0 && is_numeric($_GET['id'])){
          $status = "Preencha o campo id corretamente.";
        }
        else{
          $produto = $this->service->buscarProdutoPorId($_GET['id']);
          include('View/Content/visualizarProduto.php');
        }
      }
    }


    public function buscarProdutoPorIdParaAtualizar(){
      if(!isset($_REQUEST['id'])){
        $status = "Campo id nao enviado.";
      }
      else{
        if(strlen($_REQUEST['id']) <= 0 && is_numeric($_REQUEST['id'])){
          $status = "Preencha o campo id corretamente.";
        }
        else{
          $fornecedorController = new FornecedorController();
          $fornecedores = $fornecedorController->buscarTodosFornecedores();
          $produto = $this->service->buscarProdutoPorId($_REQUEST['id']);
          include('View/Content/atualizarProduto.php');
        }
      }
    }

    public function atualizarProduto(){
      $campos = array('idProduto' ,'nome', 'descricao', 'idFornecedor');
      $validacaoOk = true;
      foreach ($campos as $c){
        if(!isset($_POST["$c"])){
          $status = $status."Campo ".$c." nao enviado <br />";
          $validacaoOk = false;
        }
        else{
          if(strlen($_POST["$c"]) <= 0){
            $status = $status."Preencha o campo ".$c." corretamente <br />";
            $validacaoOk = false;
          }
        }
      }
      if($validacaoOk){
        $produto = new Produto();
        $produto->setId($_POST['idProduto']);
        $produto->setNome($_POST['nome']);
        $produto->setDescricao($_POST['descricao']);
        $idFornecedor = $_POST['idFornecedor'];

        $fornecedor = new Fornecedor();
        $fornecedor->setId($idFornecedor);
        $produto->setFornecedor($fornecedor);
        $status = $this->service->atualizarProduto($produto);
      }
      $produtos = $this->service->listarProdutos();
      include('View/Content/listarProdutos.php');
    }

    public function excluirProduto(){
      if(!isset($_GET['id'])){
        $status = "Campo id nao enviado.";
      }
      else{
        if(strlen($_GET['id']) <= 0 && is_numeric($_GET['id'])){
          $status = "Preencha o campo id corretamente.";
        }
        else{
          $status = $this->service->excluirProduto($_GET['id']);
          $this->listarProdutos();
        }
      }
    }

  }
?>
