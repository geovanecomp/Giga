<?php

  class PedidoService{

    private $dao;

    public function __construct($dao){
      $this->dao = $dao;
    }

    public function cadastrarPedido(Pedido $pedido){
      return $this->dao->cadastrarPedido($pedido);
    }
    public function listarPedidos(){
      return $this->dao->listarPedidos();
    }
    public function buscarPedidoPorNome($nome){
      return $this->dao->buscarPedidoPorNome($nome);
    }
    public function buscarPedidoPorId($id){
      return $this->dao->buscarPedidoPorId($id);
    }
    public function atualizarPedido(Pedido $pedido){
      return $this->dao->atualizarPedido($pedido);
    }
    public function excluirPedido($id){
      return $this->dao->excluirPedido($id);
    }
    public function listarFornecedores(){
      return $this->dao->listarFornecedores();
    }
  }
?>
