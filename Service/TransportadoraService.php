<?php
  class TransportadoraService{
    private $dao;
    public function __construct($dao){
      $this->dao = $dao;
    }

    public function cadastrarTransportadora(Transportadora $transportadora){
      return $this->dao->cadastrarTransportadora($transportadora);
    }
    public function listarTransportadoras(){
      return $this->dao->listarTransportadoras();
    }
    public function buscarTransportadoraPorId($id){
      return $this->dao->buscarTransportadoraPorId($id);
    }
    public function buscarTransportadoraPorNome($nome){
      return $this->dao->buscarTransportadoraPorNome($nome);
    }
    public function atualizarTransportadora(Transportadora $transportadora){
      return $this->dao->atualizarTransportadora($transportadora);
    }
    public function excluirTransportadora($id){
      return $this->dao->excluirTransportadora($id);
    }
  }
?>
