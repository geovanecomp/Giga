<?php
//Classe Telefone
class Telefone{

  //Atributos
  private $id;
  private $ddd;
  private $numero;
  private $referencia;

  //Construtor
  public function __construct(){

  }

  //Sets e gets dos atributos
  public function setId($id){
    $this->id = $id;
  }

  public function getId(){
    return $this->id;
  }

  public function setDdd($ddd){
    $this->ddd = $ddd;
  }

  public function getDdd(){
    return $this->ddd;
  }

  public function setNumero($numero){
    $this->numero = $numero;
  }

  public function getNumero(){
    return $this->numero;
  }

  public function setReferencia($referencia){
    $this->referencia = $referencia;
  }

  public function getReferencia(){
    return $this->referencia;
  }

}
?>
