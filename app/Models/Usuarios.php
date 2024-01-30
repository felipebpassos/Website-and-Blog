<?php

require_once 'Conexao.php';

Class Usuarios {

    private $con;

    public function __construct() {

        $this->con = Conexao::getConexao();

    }

}


?>