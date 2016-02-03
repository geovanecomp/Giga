<?php

//Classe email
class Email{

    //Atributos
    private $id;
    private $email;
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

    public function setEmail($email){
      $this->email = $email;
    }

    public function getEmail(){
      return $this->email;
    }

    public function setReferencia($referencia){
      $this->referencia = $referencia;
    }

    public function getReferencia(){
      return $this->referencia;
    }
}
?>
