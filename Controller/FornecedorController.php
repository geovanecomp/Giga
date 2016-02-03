<?php
  include('/../Model/Fornecedor.php');
  include('/../Service/FornecedorService.php');
  class FornecedorController{

    //Atributos
    private $service;

    //Construtor
    public function __construct(){
      $dao = new Dao();
      $this->service = new FornecedorService($dao);
    }

    public function cadastrarFornecedor(){
      $campos = array(nome, descricao, cidade, endereco, bairro, numero);
      $status = "";
      foreach ($campos as $c){
        if(!isset($_POST["$c"])){
          $status = "Campo ".$c." nao enviado <br />".$status;
        }
        else{
          if(strlen($_POST["$c"]) <= 0){
            $status = "Preencha o campo ".$c." corretamente <br />".$status;
          }
          else{
            $fornecedor = new Fornecedor();
            $fornecedor->setNome();
            $fornecedor->setDescricao();
            $fornecedor->setCidade();
            $fornecedor->setEndereco();
            $fornecedor->setBairro();
            $fornecedor->setNumero();

            $status = $this->service->cadastrarFornecedor($fornecedor);
          }
        }
      }
    }

    public function listarFornecedores(){
      $fornecedores = $this->service->listarFornecedores();
    }

    public function buscarFornecedorPorNome(){
      if(!isset($_POST['nome'])){
        $status = "Campo nome nao enviado.";
      }
      else{
        if($_POST['nome']) <= 0){
          $status = "Preencha o campo nome corretamente.";
        }
        else{
          $fornecedor = $this->service->buscarFornecedorPorNome($_POST['nome']);
        }
      }
    }

    public function buscarFornecedorPorId(){
      if(!isset($_POST['id'])){
        $status = "Campo id nao enviado.";
      }
      else{
        if($_POST['id']) <= 0 && is_numeric($_POST['id'])){
          $status = "Preencha o campo id corretamente.";
        }
        else{
          $fornecedor = $this->service->buscarFornecedorPorId($_POST['id']);
        }
      }
    }

    public function atualizarFornecedor(){
      $campos = array(id, nome, descricao, cidade, endereco, bairro, numero);
      foreach ($campos as $c){
        if(!isset($_POST["$c"])){
          $status = "Campo ".$c." nao enviado.";
        }
        else{
          if(strlen($_POST["$c"]) <= 0){
            $status = "Preencha o campo ".$c." corretamente.";
          }
          else{
            $fornecedor = new Fornecedor();
            $fornecedor->setId();
            $fornecedor->setNome();
            $fornecedor->setDescricao();
            $fornecedor->setCidade();
            $fornecedor->setEndereco();
            $fornecedor->setBairro();
            $fornecedor->setNumero();

            $status = $this->service->atualizarFornecedor($fornecedor);
          }
        }
      }
    }

    public function excluirFornecedor(){
      if(!isset($_POST['id'])){
        $status = "Campo id nao enviado.";
      }
      else{
        if($_POST['id']) <= 0 && is_numeric($_POST['id'])){
          $status = "Preencha o campo id corretamente.";
        }
        else{
          $status = $this->service->excluirFornecedor($_POST['id']);
        }
      }
    }

  }
?>
