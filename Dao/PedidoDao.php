<?php
  class PedidoDao{
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
  }
?>
