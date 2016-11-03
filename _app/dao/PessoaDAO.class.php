<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PessoaDao
 *
 * @author Cleberson
 */
class PessoaDAO extends Conn {

    private $Conn;
    private $Result;
    private $Read;

    public function PessoaDAO() {
        $this->Conn = parent::getConn();
    }

    public function adicionarCliente(Pessoa $pessoa) {
        $QrCreate = "INSERT INTO pessoa(nome, endereco, telefone) VALUES(?, ?, ?)";
        $Create = $this->Conn->prepare($QrCreate);

        $Create->bindParam(1, $pessoa->getNome(), PDO::PARAM_STR);
        $Create->bindParam(2, $pessoa->getEndereco(), PDO::PARAM_STR);

        return $this->Conn->getConn()->lastInsertId();
    }

    public function atualizarPessoa(Pessoa $pessoa) {
        $QrCreate = "UPDATE Pessoa SET nome = ? , endereco = ? , telefone= ?  WHERE codigo=?";
        $Create = $this->Conn->prepare($QrCreate);

        $codigo = $pessoa->getCodigo();
        $nome = $pessoa->getNome();
        $endereco = $pessoa->getEndereco();
        $telefone = $pessoa->getTelefone();

        $Create->bindParam(1, $nome, PDO::PARAM_STR);
        $Create->bindParam(2, $endereco, PDO::PARAM_STR);
        $Create->bindParam(3, $telefone, PDO::PARAM_STR);
        $Create->bindParam(4, $codigo, PDO::PARAM_INT);

        $Create->execute();
        return $Create->rowCount();
    }

    public function getPessoas() {
        $Select = " Select codigo, nome, endereco, telefone from pessoa order by nome";
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($Select);
        $this->Read->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Pessoa");
        $this->Read->execute();
        return $this->Read->fetchAll();
    }

    public function getPessoa($codigo) {
        $Select = " Select codigo, nome, endereco, telefone from pessoa WHERE codigo = ? order by nome";
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($Select);
        $this->Read->bindParam(1, $codigo);
        $this->Read->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Pessoa");
        $this->Read->execute();
        return $this->Read->fetch();
    }

}
