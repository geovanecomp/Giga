<?php
  class FornecedorService{
    private $dao;
    public function __construct($dao){
      $this->dao = $dao;
    }

    public function cadastrarFornecedor(Fornecedor $fornecedor){
      return $this->dao->cadastrarFornecedor($fornecedor);
    }
    public function listarFornecedores(){
      return $this->dao->listarFornecedores();
    }
    public function buscarFornecedorPorNome($nome){
      return $this->dao->buscarFornecedorPorNome($nome)
    }
    public function atualizarFornecedor(Fornecedor $fornecedor){
      return $this->dao->atualizarFornecedor($fornecedor);
    }
    public function excluirFornecedor($id){
      return $this->dao->excluirFornecedor($id);
    }
  }
?>
