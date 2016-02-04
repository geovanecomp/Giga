<?php
  include('Model/Transportadora.php');
  include('Service/TransportadoraService.php');
  include('Dao/TransportadoraDao.php');
  class TransportadoraController{

    //Atributos
    private $service;

    //Construtor
    public function __construct(){
      $dao = new TransportadoraDao();
      $this->service = new TransportadoraService($dao);
    }

    //Para não fazer uma verificação inical dos campos
    public function viewCadastrar(){
      include('View/Content/cadastrarTransportadora.php');
    }
    public function cadastrarTransportadora(){
      $campos = array('nome');
      $status = "";
      $validacaoOK = true;

      //Validação simples dos campos de Produto
      //Forma genérica para a validação de quaisquer campos
      foreach ($campos as $c){
        if(!isset($_POST["$c"])){
          $status = $status."Campo ".$c." nao enviado <br />";
          $validacaoOK = false;
        }
        else{
          if(strlen($_POST["$c"]) <= 0){
            $status = $status."Preencha o campo ".$c." corretamente <br />";
            $validacaoOK = false;
          }
        }
      }

      if($validacaoOK){

        $transportadora = new Transportadora();
        $transportadora->setNome($_POST['nome']);

        $status = $this->service->cadastrarTransportadora($transportadora);

      }
      //Salvando com sucesso ou não, redirecionada para a página de cadastro
      include ('View/Content/cadastrarTransportadora.php');

    }

    public function listarTransportadoras(){
      $transportadoras = $this->service->listarTransportadoras();
      include ('View/Content/listarTransportadoras.php');
    }

    public function buscarTransportadoraPorNome(){
      if(!isset($_POST['nome'])){
        $status = "Campo nome nao enviado.";
      }
      else{
        if(count($_POST['nome']) <= 0){
          $status = "Preencha o campo nome corretamente.";
        }
        else{
          $transportadora = $this->service->buscarTransportadoraPorNome($_POST['nome']);
        }
      }
    }

    public function buscarTransportadoraPorId(){
      if(!isset($_GET['id'])){
        $status = "Campo id nao enviado.";
      }
      else{
        if(count($_GET['id']) <= 0 && is_numeric($_GET['id'])){
          $status = "Preencha o campo id corretamente.";
        }
        else{
          $transportadora = $this->service->buscarTransportadoraPorId($_GET['id']);
          include('View/Content/visualizarTransportadora.php');
        }
      }
    }

    public function buscarTransportadoraPorIdParaAtualizar(){
      if(!isset($_REQUEST['id'])){
        $status = "Campo id nao enviado.";
      }
      else{
        if(strlen($_REQUEST['id']) <= 0 && is_numeric($_REQUEST['id'])){
          $status = "Preencha o campo id corretamente.";
        }
        else{
          $transportadora = $this->service->buscarTransportadoraPorId($_REQUEST['id']);
          include('View/Content/atualizarTransportadora.php');
        }
      }
    }

    public function atualizarTransportadora(){
      $campos = array('idTransportadora', 'nome');
      $validacaoOK = true;
      $status = "";
      foreach ($campos as $c){
        if(!isset($_POST["$c"])){
          echo 'entro';
          $status = $status."Campo ".$c." nao enviado <br />";
          $validacaoOK = false;
        }
        else{
          if(strlen($_POST["$c"]) <= 0){
            $status = $status."Campo ".$c." nao enviado <br />";
            $validacaoOK = false;
          }
        }
      }
      if($validacaoOK){
        $transportadora = new Transportadora();
        $transportadora->setId($_POST['idTransportadora']);
        $transportadora->setNome($_POST['nome']);

        $status = $this->service->atualizarTransportadora($transportadora);
      }
      $transportadoras = $this->service->listarTransportadoras();
      include('View/Content/listarTransportadoras.php');

    }

    public function excluirTransportadora(){
      if(!isset($_GET['id'])){
        $status = "Campo id nao enviado.";
      }
      else{
        if(count( $_GET['id']) <= 0 && is_numeric($_GET['id'])){
          $status = "Preencha o campo id corretamente.";
        }
        else{
          $status = $this->service->excluirTransportadora($_GET['id']);
          $this->listarTransportadoras();
        }
      }
    }

  }
?>
