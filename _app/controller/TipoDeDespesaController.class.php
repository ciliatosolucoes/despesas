<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoDeDespesaController
 *
 * @author clebe
 */
class TipoDeDespesaController {

    function gravar(TipoDeDespesa $tipoDeDespesa) {
        $tipoDeDespesaDAO = new TipoDeDespesaDAO();
        return $tipoDeDespesaDAO->gravar($tipoDeDespesa);
    }

    function alterar(TipoDeDespesa $tipoDeDespesa) {
        $tipoDeDespesaDAO = new TipoDeDespesaDAO();
        return $tipoDeDespesaDAO->alterar($tipoDeDespesa);
    }

    function getTiposDeDespesas() {
        $tipoDeDespesaDAO = new TipoDeDespesaDAO();
        return $tipoDeDespesaDAO->getTiposDeDespesas();
    }

    function getTipoDeDespesa($codigo) {
        $tipoDeDespesaDAO = new TipoDeDespesaDAO();
        return $tipoDeDespesaDAO->getTipoDeDespesa($codigo);
    }

}
