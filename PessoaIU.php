<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require "_app/Config.inc.php";

        $param = filter_input_array(INPUT_GET, FILTER_DEFAULT);

        $nomeBotao = "";
        if (isset($param)) {
            $codigo = $param["codigo"];
            $pessoaC = new PessoaController();
            $pessoa = $pessoaC->getPessoa($codigo);
            $nomeBotao = "botao-alterar.png";
        } else {
            $pessoa = new Pessoa();
            $nomeBotao = "botao-salvar.png";
        }
        ?>

        <form  id="fContato" action="PessoaLista.php" method="post">
            <fieldset id="usuario">usuario
                <legend>Dados da Pessoa</legend>
                <p>Código:<input type="text" readonly="true" value="<?php echo $pessoa->getCodigo(); ?>" name="codigo" id="cNome"  > </p>
                <p><label tabindex="0" for="cNome">Nome:</label> <input type="text" value="<?php echo $pessoa->getNome(); ?>" name="nome" id="cNome" size="20" maxlength="30" placeholder="Nome Completo"> </p>
                <p><label tabindex="1" for="cRua">Endereco:</label><input type="text" value="<?php echo $pessoa->getEndereco(); ?>" name="endereco" id="cRua" size="13" maxlength="80" placeholder="Rua, avenida, travessa ..."/> </p>
                <p><label tabindex="2" for="cTel">Telefone:</label><input type="text"  value="<?php echo $pessoa->getTelefone(); ?>" name="telefone" id="cRua"  placeholder="Telefone ..."/> </p>
            </fieldset>
            <input type="image" name="tEnviar" src=<?php echo "_imagens/{$nomeBotao}" ?> />

        </form>
    </body>
</html>
