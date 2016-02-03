<?php
  //Classe Pedido
  class Pedido{
    private $id;
    private $dataHora;
    private $notaFiscal;
    private $desconto;
    private $valorTotal;
    private $transportadora;
    private $itens = array();

    //Construtor
    public function __construct(){

    }

    //Sets e gets
    public function setId($id){
      $this->id = $id;
    }

    public function getId(){
      return $this->id;
    }
    
    public function setDataHora($dataHora){
      $this->dataHora = $dataHora;
    }

    public function getDataHora(){
      return $this->dataHora;
    }

    public function setNotaFiscal($notaFiscal){
      $this->notaFiscal = $notaFiscal;
    }

    public function getNotaFiscal(){
      return $this->notaFiscal;
    }

    public function setDesconto($desconto){
      $this->desconto = $desconto;
    }

    public function getDesconto(){
      return $this->desconto;
    }

    public function setValorTotal($valorTotal){
      $this->valorTotal = $valorTotal;
    }

    public function getValorTotal(){
      return $this->valorTotal
    }

    public function setTransportadora($transportadora){
      $this->transportadora = $transportadora;
    }

    public function getTransportadora(){
      return $this->transportadora;
    }

    //Pela composição, Pedido deve instanciar Item
    public function adicionarItem($quantidadeItem, $valorItem){
      $item = new item();
      $item->setQuantidade($quantidadeItem);
      $item->setValor($valorItem);
      $this->itens[] = $item;
    }

  }
?>
