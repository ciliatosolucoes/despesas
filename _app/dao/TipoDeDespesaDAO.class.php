<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoDeDespesaDAO
 *
 * @author clebe
 */
class TipoDeDespesaDAO extends Conn {

    private $Conn;
    private $Read;

    public function TipoDeDespesaDAO() {
        $this->Conn = parent::getConn();
    }

    public function gravar(TipoDeDespesa $tipoDeDespesa) {
        $QrCreate = "INSERT INTO tipodedespesa(descricao) VALUES(?)";
        $Create = $this->Conn->prepare($QrCreate);

        $descricao = $tipoDeDespesa->getDescricao();

        $Create->bindParam(1, $descricao, PDO::PARAM_STR);

        $Create->execute();

      return $this->Conn->lastInsertId();
    }

    public function alterar(TipoDeDespesa $tipoDeDespesa) {
        $QrCreate = "UPDATE tipodedespesa SET descricao = ? WHERE codigo=? ";
        $Create = $this->Conn->prepare($QrCreate);

        $codigo = $tipoDeDespesa->getCodigo();
        $descricao = $tipoDeDespesa->getDescricao();


        $Create->bindParam(1, $descricao, PDO::PARAM_STR);
        $Create->bindParam(2, $codigo, PDO::PARAM_INT);

        $Create->execute();
        return $Create->rowCount();
    }

    public function getTiposDeDespesas() {
        $Select = " Select codigo, descricao from tipodedespesa order by codigo";
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($Select);
        $this->Read->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "TipoDeDespesa");
        $this->Read->execute();
        return $this->Read->fetchAll();
    }

    public function getTipoDeDespesa($codigo) {
        $Select = " Select codigo, descricao FROM tipodedespesa WHERE codigo = ? order by codigo";
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($Select);
        $this->Read->bindParam(1, $codigo);
        $this->Read->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "TipoDeDespesa");
        $this->Read->execute();
        return $this->Read->fetch();
    }

}
