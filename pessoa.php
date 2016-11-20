<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <!--Título da página-->
        <title>Página do {nome do aluno}</title>
        <link rel="stylesheet" href="_css/estilo.css"/>
    </head>
    <body>
        <div id="interface">
            <!--Cabeçalho da página-->
            <?php
            include('cabecalho.php');
            require('verifica.php');
            ?>
            <body>
                <?php
                require "_app/Config.inc.php";

                $get = filter_input_array(INPUT_GET, FILTER_DEFAULT);

                $nomeBotao = "botao-salvar.png";
                $pessoaC = new PessoaController();

                /* Caso esteja gravando alteração ou nova pessoa */
                if (isset($get) && !empty($get['acao'])) {
                    $codigo = 0;
                    if (isset($get['codigo'])) {
                        $codigo = $get['codigo'];
                    }
                    $nome = $get['nome'];
                    $endereco = $get['endereco'];
                    $telefone = $get['telefone'];

                    if ($codigo > 0) {
                        $pessoa = $pessoaC->getPessoa($codigo);
                        $pessoa->setNome($nome);
                        $pessoa->setEndereco($endereco);
                        $pessoa->setTelefone($telefone);

                        if ($pessoaC->alterar($pessoa) > 0) {
                            echo "Dados Atualizados com Sucesso!";
                            header('location:pessoa-lista.php');
                        }
                    } else {

                        $pessoa = new Pessoa();
                        $pessoa->setNome($nome);
                        $pessoa->setEndereco($endereco);
                        $pessoa->setTelefone($telefone);

                        if ($pessoaC->gravar($pessoa)) {
                            echo "Dados Gravados com Sucesso!";
                            header('location:pessoa-lista.php');
                        }
                    }
                    /* Caso seja a chamada da lista para alterar ou para uma nova pessoa */
                } elseif (isset($get)) {
                    $codigo = $get['codigo'];

                    if ($codigo > 0) {
                        $pessoa = $pessoaC->getPessoa($codigo);
                        $nomeBotao = "botao-alterar.png";
                    } else {
                        $pessoa = new Pessoa();
                    }
                }
                ?>

                <form  id="fContato" method="get">
                    <fieldset id="dados">
                        <legend>Dados da Pessoa</legend>
                        <input type="hidden" name="acao" value="gravar"/>
                        <p>Código:<input type="text" value="<?php echo $pessoa->getCodigo(); ?>" name="codigo" id="cNome"  > </p>
                        <p><label tabindex="0" for="cNome">Nome:</label> <input type="text" value="<?php echo $pessoa->getNome(); ?>" name="nome" id="cNome" size="20" maxlength="30" placeholder="Nome Completo"> </p>
                        <p><label tabindex="1" for="cRua">Endereco:</label><input type="text" value="<?php echo $pessoa->getEndereco(); ?>" name="endereco" id="cRua" size="13" maxlength="80" placeholder="Rua, avenida, travessa ..."/> </p>
                        <p><label tabindex="2" for="cTel">Telefone:</label><input type="text"  value="<?php echo $pessoa->getTelefone(); ?>" name="telefone" id="cRua"  placeholder="Telefone ..."/> </p>
                    </fieldset>
                    <input type="image" name="tEnviar"  src=<?php echo "_imagens/{$nomeBotao}" ?> />
                </form>
                <?php include('rodape.php'); ?>
            </body>
</html>
