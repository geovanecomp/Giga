<?php
  include('Model/Pedido.php');
  include('Service/PedidoService.php');
  include('Dao/PedidoDao.php');
  class PedidoController{

    //Atributos
    private $service;

    //Construtor
    public function __construct(){
      $dao = new PedidoDao();
      $this->service = new PedidoService($dao);
    }

    //Para não fazer uma verificação inical dos campos
    public function viewCadastrar(){
      include('View/Content/cadastrarPedido.php');
    }

    public function cadastrarPedido(){
      //Ainda faltam os dados referentes as outras classes.
      $campos = array('dataHora', 'notaFiscal', 'valorFrete', 'desconto', 'valorTotal');
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
            $pedido = new Pedido();
            $pedido->setDataHora($_POST['dataHora']);
            $pedido->setNotaFiscal($_POST['notaFiscal']);
            $pedido->setValorFrete($_POST['valorFrete']);
            $pedido->setDesconto($_POST['desconto']);
            $pedido->setValorTotal($_POST['valorTotal']);

            $status = $this->service->cadastrarPedido($pedido);
          }
        }
      }
    }

    public function listarPedidos(){
      //$pedidos = $this->service->listarPedidos();
      //Como não está implementada, estou apenas direcionando
      include('View/Content/listarPedidos.php');
    }

    public function buscarPedidoPorNome(){
      if(!isset($_POST['nome'])){
        $status = "Campo nome nao enviado.";
      }
      else{
        if(strlen($_POST['nome']) <= 0){
          $status = "Preencha o campo nome corretamente.";
        }
        else{
          $pedido = $this->service->buscarPedidoPorNome($_POST['nome']);
        }
      }
    }

    public function buscarPedidoPorId(){
      if(!isset($_POST['id'])){
        $status = "Campo id nao enviado.";
      }
      else{
        if(strlen($_POST['id']) <= 0 && is_numeric($_POST['id'])){
          $status = "Preencha o campo id corretamente.";
        }
        else{
          $pedido = $this->service->buscarPedidoPorId($_POST['id']);
        }
      }
    }

    public function atualizarPedido(){
      //Ainda faltam os dados referentes as outras classes.
      $campos = array('id','dataHora', 'notaFiscal', 'valorFrete', 'desconto', 'valorTotal');
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
            $pedido = new Pedido();
            $pedido->setDataHora($_POST['dataHora']);
            $pedido->setNotaFiscal($_POST['notaFiscal']);
            $pedido->setValorFrete($_POST['valorFrete']);
            $pedido->setDesconto($_POST['desconto']);
            $pedido->setValorTotal($_POST['valorTotal']);

            $status = $this->service->atualizarPedido($pedido);
          }
        }
      }

    }

    public function excluirPedido(){
      if(!isset($_POST['id'])){
        $status = "Campo id nao enviado.";
      }
      else{
        if(strlen($_POST['id']) <= 0 && is_numeric($_POST['id'])){
          $status = "Preencha o campo id corretamente.";
        }
        else{
          $status = $this->service->excluirPedido($_POST['id']);
        }
      }
    }

  }
?>
