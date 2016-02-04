<?php
  include('Telefone.php');
  include('Email.php');
  //Classe Fornecedor
  class Fornecedor{
    //Atributos
    private $id;
    private $nome;
    private $descricao;
    private $cidade;
    private $endereco;
    private $bairro;
    private $numero;
    private $telefones = array();
    private $emails = array();

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

    public function setNome($nome){
      $this->nome = $nome;
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

    public function setCidade($cidade){
      $this->cidade = $cidade;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function setEndereco($endereco){
      $this->endereco = $endereco;
    }

    public function getEndereco(){
        return $this->endereco;
    }
    public function setBairro($bairro){
      $this->bairro = $bairro;
    }

    public function getBairro(){
        return $this->bairro;
    }
    public function setNumero($numero){
      $this->numero = $numero;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getTelefones(){
      return $this->telefones;
    }

    public function getEmails(){
      return $this->emails;
    }

    //Pela composição, Fornecedor deve instanciar Telefone (Pelo menos um)
    public function adicionarTelefone($dddTelefone, $numeroTelefone, $referenciaTelefone, $id = null){
      $telefone = new Telefone();
      $telefone->setId($id);
      $telefone->setDdd($dddTelefone);
      $telefone->setNumero($numeroTelefone);
      $telefone->setReferencia($referenciaTelefone);
      $this->telefones[] = $telefone;
    }

    public function removerTelefones(){
      $this->telefones = array();
    }

    //Pela agregação pode ter ou não um email atrelado ao fornecedor
    public function adicionarEmail(Email $email){
      $this->emails[] = $email;
    }

  }
 ?>
