<?php
  class FornecedorDao{
    private $bd;
    public function __construct() {
        $opcoes = array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" );
        $dsn = "mysql:dbname=giga;host=localhost";
        $usuario = "root";
        $senha = "bzol1832" 
        $this->bd = null;
        try{
            $this->bd = new PDO($dsn, $usuario, $senha, $opcoes);
        } catch (Exception $ex) {
            die(($ex->getMessage()));
        }
    }

    public function cadastrarFornecedor(Fornecedor $fornecedor){
      $comando = 'insert into fornecedor (nome, descricao, cidade, endereco,
        bairro, numero) values (?,?,?,?,?,?)';
      $cp = $this->bd->prepare($comando);
      $cp->execute(array($fornecedor->getNome(), $fornecedor->getDescricao(),
        $fornecedor->getCidade(), $fornecedor->getBairro(), $fornecedor->getNumero()));
      if($cp->rowCount() > 0){
        return 'Inserção realizada com sucesso!';
      }
      else{
        return 'Erro de inserção';
      }
    }
    public function listarFornecedores(){
      $comando = 'select * from fornecedor';
      $resultado = $this->bd->query($comando);
      $fornecedor = new Fornecedor();
      $arrayFornecedores = array();
      while($r = $resultado->fetchObject()){
        $fornecedor->setId($r->id);
        $fornecedor->setNome($r->nome);
        $fornecedor->setDescricao($r->descricao);
        $fornecedor->setCidade($r->cidade);
        $fornecedor->setEndereco($r->endereco);
        $fornecedor->setBairro($r->bairro);
        $fornecedor->setNumero($r->numero);
        $arrayFornecedores[] = $fornecedor;
      }
      return $arrayFornecedores;
    }

    public function buscarFornecedorPorNome($nome){
      $comando = 'select * from fornecedor where nome = ?';
      $cp = $this->bd->prepare($comando);
      $resultado = $cp->execute(array($nome));
      $arrayFornecedores = array();
      while($r = $resultado->fetchObject()){
        $fornecedor->setId($r->id);
        $fornecedor->setNome($r->nome);
        $fornecedor->setDescricao($r->descricao);
        $fornecedor->setCidade($r->cidade);
        $fornecedor->setEndereco($r->endereco);
        $fornecedor->setBairro($r->bairro);
        $fornecedor->setNumero($r->numero);
        $arrayFornecedores[] = $fornecedor;
      }
      return arrayFornecedores;
    }

    public function buscarFornecedorPorId($id){
      $comando = 'select * from fornecedor where id = ?';
      $cp = $this->bd->prepare($comando);
      $resultado = $cp->execute(array($id));
      while($r = $resultado->fetchObject()){
        $fornecedor->setId($r->id);
        $fornecedor->setNome($r->nome);
        $fornecedor->setDescricao($r->descricao);
        $fornecedor->setCidade($r->cidade);
        $fornecedor->setEndereco($r->endereco);
        $fornecedor->setBairro($r->bairro);
        $fornecedor->setNumero($r->numero);
      }
      return fornecedor;
    }

    public function atualizarFornecedor(Fornecedor $fornecedor){
      $comando = 'update fornecedor set (nome, descricao, cidade, endereco,
        bairro, numero) values (?,?,?,?,?,?)';
      $cp = $this->bd->prepare($comando);
      $cp->execute(array($fornecedor->getNome(), $fornecedor->getDescricao(),
        $fornecedor->getCidade(), $fornecedor->getBairro(), $fornecedor->getNumero()));
      if($cp->rowCount() > 0){
        return 'Atualiação realizada com sucesso!';
      }
      else{
        return 'Erro de atualiação';
      }

    }

    public function excluirFornecedor($id){
      $comando = 'delete from telefone where idFornecedor = ?';
      $cp = $this->bd->prepare($comando);
      $cp = execute(array($id));

      $comado = 'delete from email where idFornecedor = ?';
      $cp = $this->bd->prepare($comando);
      $cp = execute(array($id));

      $comado = 'delete from fornecedor where id = ?';
      $cp = $this->bd->prepare($comando);
      $cp = execute(array($id));

      if($cp->rowCount() > 0){
        return 'Remoção realizada com sucesso!';
      }
      else{
        return 'Erro de remoção';
      }

    }

  }
?>
