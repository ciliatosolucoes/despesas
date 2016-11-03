<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PessoaController
 *
 * @author Cleberson
 */
class PessoaController {

    // nao é necessario criar um construtor
    function add(Pessoa $pessoa) {
        $pessoaDAO = new PessoaDAO();
        $pessoaDAO->adicionarPessoa($pessoa);
    }

    function edit(Pessoa $pessoa) {
        $pessoaDAO = new PessoaDAO();
        return $pessoaDAO->atualizarPessoa($pessoa);
    }

    function remove($pessoaId) {
        $pessoaDAO = new PessoaDAO();
        $pessoaDAO->removerPessoa($pessoaId);
    }

    function desativar($pessoaId) {
        $pessoaDAO = new PessoaDAO();
        $pessoaDAO->desativarPessoa($pessoaId);
    }

    public function getListaPessoas() {
        $pessoaDAO = new PessoaDAO();
        $pessoas = $pessoaDAO->getPessoas();
        return $pessoas;
    }

    public function getPessoa($codigo) {
        $pessoaDAO = new PessoaDAO();
        $pessoa = $pessoaDAO->getPessoa($codigo);
        return $pessoa;
    }

}
