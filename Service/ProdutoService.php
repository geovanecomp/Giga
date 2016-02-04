<?php

  class ProdutoService{

    private $dao;

    public function __construct($dao){
      $this->dao = $dao;
    }

    public function cadastrarProduto(Produto $produto){
      return $this->dao->cadastrarProduto($produto);
    }
    public function listarProdutos(){
      return $this->dao->listarProdutos();
    }
    public function buscarProdutoPorNome($nome){
      return $this->dao->buscarProdutoPorNome($nome);
    }
    public function buscarProdutoPorId($id){
      return $this->dao->buscarProdutoPorId($id);
    }
    public function atualizarProduto(Produto $produto){
      return $this->dao->atualizarProduto($produto);
    }
    public function excluirProduto($id){
      return $this->dao->excluirProduto($id);
    }
    public function listarFornecedores(){
      return $this->dao->listarFornecedores();
    }
  }
?>
