<?php
class Produto{

  //Atributos
  private $id;
  private $nome;
  private $descricao;
  private $fornecedor;
  //private $quantidade Para futuro controle de estoque

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

  public function getNome(){
    return $this->nome;
  }

  public function setDescricao($descricao){
    $this->descricao = $descricao;
  }

  public function getDescricao(){
    return $this->descricao;
  }

  public function setFornecedor($fornecedor){
    $this->fornecedor = $fornecedor;
  }

  public function getFornecedor(){
    return $this->fornecedor;
  }
}
?>
