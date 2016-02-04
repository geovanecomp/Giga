<?php
  class ProdutoDao{
    private $bd;
    public function __construct() {
        $opcoes = array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" );
        $dsn = "mysql:dbname=giga;host=localhost";
        $usuario = "root";
        $senha = "root";
        $this->bd = null;
        try{
            $this->bd = new PDO($dsn, $usuario, $senha, $opcoes);
        } catch (Exception $ex) {
            die(($ex->getMessage()));
        }
    }

    public function cadastrarProduto(Produto $produto){
      $comando = 'insert into produto (nome, descricao,idFornecedor) values (?,?,?)';
      $cp = $this->bd->prepare($comando);
      $cp->execute(array($produto->getNome(), $produto->getDescricao(), $produto->getFornecedor()->getId()));
      if($cp->rowCount() > 0){
        return 'Inserção realizada com sucesso!';
      }
      else{
        return 'Erro de inserção';
      }
    }
    public function listarProdutos(){
      $comando = 'select * from produto';
      $resultado = $this->bd->query($comando);
      $arrayProdutos = array();
      while($r = $resultado->fetchObject()){
        $produto = new Produto();
        $produto->setId($r->id);
        $produto->setNome($r->nome);
        $produto->setDescricao($r->descricao);
        $arrayProdutos[] = $produto;
      }
      return $arrayProdutos;
    }

    public function listarFornecedores(){
      $comando = 'select * from fornecedor';
      $resultado = $this->bd->query($comando);
      $arrayFornecedores = array();
      //Para consultas 'grandes', não deve-se usar o fetchall por questões de desempenho.
      while($r = $resultado->fetchObject()){
        $fornecedor = new Fornecedor();
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

    public function buscarProdutoPorNome($nome){
      $fornecedorDao = new fornecedorDao();
      $comando = 'select * from produto where nome = ?';
      $cp = $this->bd->prepare($comando);
      $resultado = $cp->execute(array($nome));
      $arrayProdutos = array();
      while($r = $resultado->fetchObject()){
        $produto = new Produto();
        $fornecedor = new Fornecedor();

        $produto->setId($r->id);
        $produto->setNome($r->nome);
        $produto->setDescricao($r->descricao);
        $fornecedor->setId($r->idFornecedor);

        $comando = 'select * from fornecedor where id = ?';
        $cp = $this->bd->prepare($comando);
        $resultado = $cp->execute(array($fornecedor->getId()));

        while($r = $cp->fetchObject()){

          $fornecedor->setNome($r->nome);
          $fornecedor->setDescricao($r->descricao);
          $fornecedor->setCidade($r->cidade);
          $fornecedor->setEndereco($r->endereco);
          $fornecedor->setBairro($r->bairro);
          $fornecedor->setNumero($r->numero);
        }

        $produto->setFornecedor( $fornecedor );
        $arrayProdutos[] = $produto;
      }
      return arrayProdutos;
    }

    public function buscarProdutoPorId($id){

      $comando = 'select * from produto where id = ?';
      $cp = $this->bd->prepare($comando);
      $resultado = $cp->execute(array($id));

      $produto = new Produto();

      $fornecedor = new Fornecedor();

      while($r = $cp->fetchObject()){
        $produto->setId($r->id);
        $produto->setNome($r->nome);
        $produto->setDescricao($r->descricao);
        $fornecedor->setId($r->idFornecedor);
      }

      $comando = 'select * from fornecedor where id = ?';
      $cp = $this->bd->prepare($comando);
      $resultado = $cp->execute(array($fornecedor->getId()));

      while($r = $cp->fetchObject()){

        $fornecedor->setNome($r->nome);
        $fornecedor->setDescricao($r->descricao);
        $fornecedor->setCidade($r->cidade);
        $fornecedor->setEndereco($r->endereco);
        $fornecedor->setBairro($r->bairro);
        $fornecedor->setNumero($r->numero);
      }

      $produto->setFornecedor( $fornecedor );

      return $produto;
    }

    public function atualizarProduto(Produto $produto){
      $comando = 'update produto set nome = ?, descricao = ?, idFornecedor = ?
        where id = ?';
      $cp = $this->bd->prepare($comando);
      $cp->execute(array($produto->getNome(), $produto->getDescricao(),
        $produto->getFornecedor()->getId(), $produto->getId()));

      if($cp->rowCount() > 0){
        return 'Atualiação realizada com sucesso!';
      }
      else{
        return 'Erro de atualiação';
      }
    }

    public function excluirProduto($id){
      $comando = 'delete from produto where id = ?';
      $cp = $this->bd->prepare($comando);
      $resultado = $cp->execute(array($id));

      if($cp->rowCount() > 0){
        return 'Remoção realizada com sucesso!';
      }
      else{
        return 'Erro de remoção';
      }
    }
  }
?>
