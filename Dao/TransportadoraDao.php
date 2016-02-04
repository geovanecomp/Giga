<?php
  class TransportadoraDao{
    //Atributos
    private $bd;

    //Realizando a conexão ao banco de dados pelo construtor.
    public function __construct() {
        //Setando utf8 ao BD
        $opcoes = array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" );
        //Dados para conexão
        $dsn = "mysql:dbname=giga;host=localhost";
        $usuario = "root";
        $senha = "";
        $this->bd = null;
        try{
            $this->bd = new PDO($dsn, $usuario, $senha, $opcoes);
        } catch (Exception $ex) {
            die(($ex->getMessage()));
        }
    }

    public function cadastrarTransportadora(Transportadora $transportadora){
      //Como values poderia usar como chaves um campo, ou '?'.
      $comando = 'insert into transportadora (nome) values (?)';
      //Como são dados informados pelo usuário, por questão de segurança deve-se usar o comando prepare.
      $cp = $this->bd->prepare($comando);
      $cp->execute(array($transportadora->getNome()));
      if($cp->rowCount() > 0){
        return 'Inserção realizada com sucesso!';
      }
      else{
        return 'Erro de inserção';
      }
    }
    public function listarTransportadoras(){
      $comando = 'select * from transportadora';
      $resultado = $this->bd->query($comando);
      $arrayTransportadoras = array();
      //Para consultas 'grandes', não deve-se usar o fetchall por questões de desempenho.
      while($r = $resultado->fetchObject()){
        $transportadora = new Transportadora();
        $transportadora->setId($r->id);
        $transportadora->setNome($r->nome);
        $arrayTransportadoras[] = $transportadora;
      }
      return $arrayTransportadoras;
    }

    public function buscarTransportadoraPorNome($nome){
      $comando = 'select * from transportadora where nome = ?';
      $cp = $this->bd->prepare($comando);
      $resultado = $cp->execute(array($nome));
      $transportadora = new Transportadora();
      $arrayTransportadoras = array();
      while($r = $resultado->fetchObject()){
        $transportadora->setId($r->id);
        $transportadora->setNome($r->nome);
        $transportadora->setDescricao($r->descricao);
        $arrayTransportadoras[] = $transportadora;
      }
      return arrayTransportadoras;
    }

    public function buscarTransportadoraPorId($id){
      $comando = 'select * from transportadora where id = ?';
      $cp = $this->bd->prepare($comando);
      $resultado = $cp->execute(array($id));
      $transportadora = new Transportadora();
      while($r = $cp->fetchObject()){
        $transportadora->setId($r->id);
        $transportadora->setNome($r->nome);
      }
      return $transportadora;
    }

    public function atualizarTransportadora(Transportadora $transportadora){
      $comando = 'update transportadora set nome = ? where id = ?';
      $cp = $this->bd->prepare($comando);
      $cp->execute(array($transportadora->getNome(), $transportadora->getId()));
      if($cp->rowCount() > 0){
        return 'Atualiação realizada com sucesso!';
      }
      else{
        return 'Erro de atualiação';
      }
    }

    public function excluirTransportadora($id){
      $comando = 'delete from transportadora where id = ?';
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
