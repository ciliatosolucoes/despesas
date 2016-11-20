<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioController
 *
 * @author clebe
 */
class UsuarioController {
    function logar($login, $senha) {
        $usuarioDAO = new usuarioDAO();
        return $usuarioDAO->logar($login, $senha);
    }
}
