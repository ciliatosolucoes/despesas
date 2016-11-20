<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *
 * @author clebe
 */
class UsuarioDAO extends Conn {

    private $Conn;
    private $Read;

    public function logar($login, $senha) {
        $Select = " Select login, senha FROM usuario WHERE login = ? and senha = ?";
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($Select);
        $this->Read->bindParam(1, $login);
        $this->Read->bindParam(2, $senha);
        $this->Read->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Usuario");
        $this->Read->execute();
        return $this->Read->fetch();
    }

}
