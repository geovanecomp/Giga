<?php
  //Classe Transportadora
  class Transportadora{
    private $id;
    private $nome;

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

    public function setNome($nome){
      $this->nome = $nome;
    }

    public function getNome(){
      return $this->nome = $nome;
    }

  }
?>
