<?php
  include ('Model/Fornecedor.php');
  include ('Service/FornecedorService.php');
  include ('Dao/FornecedorDao.php');
  ini_set('display_errors', 'on');
  class FornecedorController{

    //Atributos
    private $service;

    //Construtor
    public function __construct(){
      $dao = new FornecedorDao();
      $this->service = new FornecedorService($dao);
    }

    //Para não fazer uma verificação inical dos campos
    public function viewCadastrar(){
      include('View/Content/cadastrarFornecedor.php');
    }

    public function cadastrarFornecedor(){
      $campos = array('nome', 'descricao', 'cidade', 'endereco', 'bairro', 'numero');
      $telefones = array('ddd', 'numeroTel', 'referenciaTel');
      $qtdDeTelefones = 2;
      $qtdDeEmails = 2;
      $status = "";
      $validacaoOk = true;

      //Validação simples dos campos de fornecedor
      //Forma genércia para a validação de quaisquer campos
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

      //Validação simples dos telefones
      //Forma genércia para a validação de quaisquer campos em qualquer quantidade
      for($i = 0; $i < $qtdDeTelefones; $i++){
        foreach ($telefones as $t) {
          if(!isset($_POST["$t"][$i])){
            $status = $status."Campo ".$t." nao enviado <br />";
            $validacaoOk = false;
          }
          else{
            if(strlen($_POST["$t"][$i]) <= 0){
              $status = $status."Preencha o campo ".$t." corretamente <br />";
              $validacaoOk = false;
            }
            else{

            }
          }
        }
      }

      if($validacaoOk){
        $fornecedor = new Fornecedor();
        $fornecedor->setNome($_POST['nome']);
        $fornecedor->setDescricao($_POST['descricao']);
        $fornecedor->setCidade($_POST['cidade']);
        $fornecedor->setEndereco($_POST['endereco']);
        $fornecedor->setBairro($_POST['bairro']);
        $fornecedor->setNumero($_POST['numero']);

        //Depois de validar os telefones, posso adiciona-los ao fornecedor
        for($i = 0; $i < $qtdDeTelefones; $i++){
          $fornecedor->adicionarTelefone($_POST['ddd']["$i"],
            $_POST['numeroTel']["$i"], $_POST['referenciaTel']["$i"]);
        }

        //Depois de verificar o envio dos emails, posso adiciona-los ao fornecedor
        for($i = 0; $i < $qtdDeEmails; $i++){
          $email = new Email();
          $email->setEmail($_POST["email"]["$i"]);
          $email->setReferencia($_POST["referenciaEmail"]["$i"]);
          $fornecedor->adicionarEmail($email);
        }

        $status = $this->service->cadastrarFornecedor($fornecedor);
      }

      //Salvando com sucesso ou não, redirecionada para a pag de cadastro
      include ('View/Content/cadastrarFornecedor.php');

    }

    public function listarFornecedores(){
      $fornecedores = $this->service->listarFornecedores();
      include('View/Content/listarFornecedores.php');
    }

    public function buscarTodosFornecedores(){
      return $fornecedores = $this->service->listarFornecedores();
    }

    public function buscarFornecedorPorNome(){
      if(!isset($_POST['nome'])){
        $status = "Campo nome nao enviado.";
      }
      else{
        if(strlen($_POST['nome']) <= 0){
          $status = "Preencha o campo nome corretamente.";
        }
        else{
          $fornecedor = $this->service->buscarFornecedorPorNome($_POST['nome']);
        }
      }
    }

    public function buscarFornecedorPorId(){
      if(!isset($_REQUEST['id'])){
        $status = "Campo id nao enviado.";
      }
      else{
        if(strlen($_REQUEST['id']) <= 0 && is_numeric($_REQUEST['id'])){
          $status = "Preencha o campo id corretamente.";
        }
        else{
          $fornecedor = $this->service->buscarFornecedorPorId($_REQUEST['id']);
          include('View/Content/visualizarFornecedor.php');
        }
      }
    }

    public function buscarFornecedorPorIdParaAtualizar(){
      if(!isset($_REQUEST['id'])){
        $status = "Campo id nao enviado.";
      }
      else{
        if(strlen($_REQUEST['id']) <= 0 && is_numeric($_REQUEST['id'])){
          $status = "Preencha o campo id corretamente.";
        }
        else{
          $fornecedor = $this->service->buscarFornecedorPorId($_REQUEST['id']);
          include('View/Content/atualizarFornecedor.php');
        }
      }
    }

    public function atualizarFornecedor(){
      $campos = array('idFornecedor','nome', 'descricao', 'cidade', 'endereco', 'bairro', 'numero');
      $telefones = array('idTel','ddd', 'numeroTel', 'referenciaTel');
      $qtdDeTelefones = 2;
      $qtdDeEmails = 2;
      $status = "";
      $validacaoOk = true;
      $fornecedorTemp = new Fornecedor();

      //Validação simples dos campos de fornecedor
      //Forma genércia para a validação de quaisquer campos
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

      //Validação simples dos telefones
      //Forma genércia para a validação de quaisquer campos em qualquer quantidade
      for($i = 0; $i < $qtdDeTelefones; $i++){
        foreach ($telefones as $t) {
          if(!isset($_POST["$t"][$i])){
            $status = $status."Campo ".$t." nao enviado <br />";
            $validacaoOk = false;
          }
          else{
            if(strlen($_POST["$t"][$i]) <= 0){
              $status = $status."Preencha o campo ".$t." corretamente <br />";
              $validacaoOk = false;
            }
          }
        }
      }


      if($validacaoOk){
        $fornecedor = new Fornecedor();
        $fornecedor->setId($_POST['idFornecedor']);
        $fornecedor->setNome($_POST['nome']);
        $fornecedor->setDescricao($_POST['descricao']);
        $fornecedor->setCidade($_POST['cidade']);
        $fornecedor->setEndereco($_POST['endereco']);
        $fornecedor->setBairro($_POST['bairro']);
        $fornecedor->setNumero($_POST['numero']);

        //Depois de validar os telefones, posso adiciona-los ao fornecedor
        for($i = 0; $i < $qtdDeTelefones; $i++){
          $fornecedor->adicionarTelefone($_POST['ddd']["$i"],
            $_POST['numeroTel']["$i"], $_POST['referenciaTel']["$i"], $_POST['idTel'][$i]);
        }

        //Depois de verificar o envio dos emails, posso adiciona-los ao fornecedor
        for($i = 0; $i < $qtdDeEmails; $i++){
          $email = new Email();
          $email->setId($_POST['idEmail'][$i]);
          $email->setEmail($_POST["email"]["$i"]);
          $email->setReferencia($_POST["referenciaEmail"]["$i"]);
          $fornecedor->adicionarEmail($email);
        }

        $status = $this->service->atualizarFornecedor($fornecedor);

      }
      $fornecedores = $this->service->listarFornecedores();
      include('View/Content/listarFornecedores.php');
    }

    public function excluirFornecedor(){
      if(!isset($_REQUEST['id'])){
        $status = "Campo id nao enviado.";
      }
      else{
        if(strlen($_REQUEST['id']) <= 0 && is_numeric($_REQUEST['id'])){
          $status = "Preencha o campo id corretamente.";
        }
        else{
          $status = $this->service->excluirFornecedor($_REQUEST['id']);
          $this->listarFornecedores();
        }
      }
    }

  }
?>
