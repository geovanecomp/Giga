<?php
  class FornecedorDao{
    private $bd;
    public function __construct() {
        $opcoes = array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" );
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

    public function cadastrarFornecedor(Fornecedor $fornecedor){
      //O ideal seria utilizar transação em PDO (commit e rollback), para caso
      //der algum problema, ou salvar tudo ou salvar nada. Mas por ser um projeto
      //simples e objetivo, não implementei.
      $comando1 = 'insert into fornecedor (nome, descricao, cidade, endereco,
        bairro, numero) values (?,?,?,?,?,?)';
      $cp1 = $this->bd->prepare($comando1);
      $cp1->execute(array($fornecedor->getNome(), $fornecedor->getDescricao(),
        $fornecedor->getCidade(), $fornecedor->getEndereco(),
        $fornecedor->getBairro(), $fornecedor->getNumero()));

      $lastId = $this->bd->lastInsertId();

      $arrayTelefones = $fornecedor->getTelefones();
      for($i = 0; $i < count($arrayTelefones); $i++){
        $comando2 = 'insert into telefone (idFornecedor, ddd, numero, referencia)
          values (?,?,?,?)';
        $cp2 = $this->bd->prepare($comando2);
        $cp2->execute(array($lastId, $arrayTelefones[$i]->getDdd(),
          $arrayTelefones[$i]->getNumero(), $arrayTelefones[$i]->getReferencia()));
      }

      $arrayEmails = $fornecedor->getEmails();
      for($i = 0; $i < count($arrayEmails); $i++){
        $comando3 = 'insert into email (idFornecedor, email, referencia)
          values (?,?,?)';
        $cp3 = $this->bd->prepare($comando3);
        $cp3->execute(array($lastId, $arrayEmails[$i]->getEmail(),
          $arrayEmails[$i]->getReferencia()));
      }

      if($cp1->rowCount() > 0 && $cp2->rowCount() > 0){
        return 'Inserção realizada com sucesso!';
      }
      else{
        return 'Erro de inserção';
      }
    }

    public function listarFornecedores(){
      //Aqui o intuito é apenas mostrar alguns dados para o usuario, para que
      //posteriormente este selecione visualizar algum fornecedor.
      $comando = 'select * from fornecedor';
      $resultado = $this->bd->query($comando);
      $arrayFornecedores = array();
      //Para consultas 'grandes', não deve-se usar o fetchall por questões de desempenho.
      while($f = $resultado->fetchObject()){
        $fornecedor = new Fornecedor();
        $fornecedor->setId($f->id);
        $fornecedor->setNome($f->nome);
        $fornecedor->setDescricao($f->descricao);
        $fornecedor->setCidade($f->cidade);
        $fornecedor->setEndereco($f->endereco);
        $fornecedor->setBairro($f->bairro);
        $fornecedor->setNumero($f->numero);
        $arrayFornecedores[] = $fornecedor;
      }
      return $arrayFornecedores;
    }

    public function buscarFornecedorPorNome($nome){
      $comando1 = 'select * from fornecedor where nome = ?';
      $cp1 = $this->bd->prepare($comando1);
      $resultado = $cp1->execute(array($nome));
      $arrayFornecedores = array();
      while($r = $cp->fetchObject()){
        $fornecedor = new Fornecedor();
        $fornecedor->setId($f->id);
        $fornecedor->setNome($f->nome);
        $fornecedor->setDescricao($f->descricao);
        $fornecedor->setCidade($f->cidade);
        $fornecedor->setEndereco($f->endereco);
        $fornecedor->setBairro($f->bairro);
        $fornecedor->setNumero($f->numero);

        $comando2 = 'select * from telefone where idFornecedor = ?';
        $cp2 = $this->bd->prepare($comando2);
        $resultado = $cp2->execute(array($fornecedor->getId()));

        while($t = $cp2->fetchObject()){
          $fornecedor->adicionarTelefone($t->ddd, $t->numero, $t->referencia, $t->id);
        }

        $comando3 = 'select * from email where idFornecedor = ?';
        $cp3 = $this->bd->prepare($comando3);
        $resultado = $cp3->execute(array($fornecedor->getId()));

        while($e = $cp3->fetchObject()){
          $email = new Email();
          $email->setId($e->id);
          $email->setEmail($e->email);
          $email->setReferencia($e->referencia);
          $fornecedor->adicionarEmail($email);
        }

        $arrayFornecedores[] = $fornecedor;
      }
      return arrayFornecedores;
    }

    public function buscarFornecedorPorId($id){
      //A estrutura continua sendo para vários registros, mas como é uma
      //buscar por id, só teremos um fornecedor, logo teremos loops unitários.
      $comando1 = 'select * from fornecedor where id = ?';
      $cp1 = $this->bd->prepare($comando1);
      $resultado = $cp1->execute(array($id));

      while($f = $cp1->fetchObject()){
        $fornecedor = new Fornecedor();
        $fornecedor->setId($f->id);
        $fornecedor->setNome($f->nome);
        $fornecedor->setDescricao($f->descricao);
        $fornecedor->setCidade($f->cidade);
        $fornecedor->setEndereco($f->endereco);
        $fornecedor->setBairro($f->bairro);
        $fornecedor->setNumero($f->numero);

        $comando2 = 'select * from telefone where idFornecedor = ?';
        $cp2 = $this->bd->prepare($comando2);
        $resultado = $cp2->execute(array($id));

        while($t = $cp2->fetchObject()){
          $fornecedor->adicionarTelefone($t->ddd, $t->numero, $t->referencia, $t->id);
        }

        $comando3 = 'select * from email where idFornecedor = ?';
        $cp3 = $this->bd->prepare($comando3);
        $resultado = $cp3->execute(array($id));

        while($e = $cp3->fetchObject()){
          $email = new Email();
          $email->setId($e->id);
          $email->setEmail($e->email);
          $email->setReferencia($e->referencia);
          $fornecedor->adicionarEmail($email);
        }
      }
      return $fornecedor;
    }

    public function atualizarFornecedor(Fornecedor $fornecedor){
      $comando1 = 'update fornecedor set nome = ?, descricao = ?, cidade = ?,
        endereco = ?, bairro = ?, numero = ? where id =  ?';
      $cp1 = $this->bd->prepare($comando1);
      $cp1->execute(array($fornecedor->getNome(), $fornecedor->getDescricao(),
        $fornecedor->getCidade(), $fornecedor->getEndereco(),$fornecedor->getBairro(),
        $fornecedor->getNumero(), $fornecedor->getId()));

        $arrayTelefones = $fornecedor->getTelefones();
        for($i = 0; $i < count($arrayTelefones); $i++){
          $comando2 = 'update telefone set ddd = ?, numero = ?, referencia = ?
            where idFornecedor = ? and id = ?';
          $cp2 = $this->bd->prepare($comando2);
          $cp2->execute(array($arrayTelefones[$i]->getDdd(),
            $arrayTelefones[$i]->getNumero(), $arrayTelefones[$i]->getReferencia(),
            $fornecedor->getId(), $arrayTelefones[$i]->getId()));
        }

        $arrayEmails = $fornecedor->getEmails();
        for($i = 0; $i < count($arrayEmails); $i++){
          $comando3 = 'update email set email = ?, referencia = ?
            where idFornecedor = ? and id = ?';
          $cp3 = $this->bd->prepare($comando3);
          $cp3->execute(array($arrayEmails[$i]->getEmail(),
            $arrayEmails[$i]->getReferencia(), $fornecedor->getId(),
            $arrayEmails[$i]->getId()));
        }

      if($cp1->rowCount() > 0 || $cp2->rowCount() > 0 || $cp3->rowCount() > 0){
        return 'Atualização realizada com sucesso!';
      }
      else{
        return 'Erro de atualização';
      }

    }

    public function excluirFornecedor($id){
      $comando = 'delete from fornecedor where id = ?';
      $cp = $this->bd->prepare($comando);
      $cp->execute(array($id));

      //Como estou usando delete e update em cascata, não pecisou excluir
      //os telefones e emails, mas caso fosse necessário, basta executar:

      /*$comando = 'delete from telefone where idFornecedor = ?';
      $cp = $this->bd->prepare($comando);
      $cp->execute(array($id));

      $comando = 'delete from email where idFornecedor = ?';
      $cp = $this->bd->prepare($comando);
      $cp->execute(array($id));*/

      if($cp->rowCount() > 0){
        return 'Remoção realizada com sucesso!';
      }
      else{
        return 'Erro de remoção';
      }

    }

  }
?>
