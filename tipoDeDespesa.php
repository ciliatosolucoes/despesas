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
            ?>
            <body>
                <?php
                require "_app/Config.inc.php";

                $get = filter_input_array(INPUT_GET, FILTER_DEFAULT);

                $nomeBotao = "botao-salvar.png";
                $tipoDeDespesaC = new TipoDeDespesaController();

                /* Caso esteja gravando alteração ou nova tipoDeDespesa */
                if (isset($get) && !empty($get['acao'])) {
                    $codigo = 0;
                    if (isset($get['codigo'])) {
                        $codigo = $get['codigo'];
                    }
                    $descricao = $get['descricao'];

                    if ($codigo > 0) {
                        $tipoDeDespesa = $tipoDeDespesaC->getTipoDeDespesa($codigo);
                        $tipoDeDespesa->setDescricao($descricao);

                        if ($tipoDeDespesaC->alterar($tipoDeDespesa) > 0) {
                            echo "Dados Atualizados com Sucesso!";
                            header('location:tipoDeDespesa-lista.php');
                        }
                    } else {

                        $tipoDeDespesa = new TipoDeDespesa();
                        $tipoDeDespesa->setDescricao($descricao);

                        if ($tipoDeDespesaC->gravar($tipoDeDespesa)) {
                            echo "Dados Gravados com Sucesso!";
                            header('location:tipoDeDespesa-lista.php');
                        }
                    }
                    /* Caso seja a chamada da lista para alterar ou para uma nova tipoDeDespesa */
                } elseif (isset($get)) {
                    $codigo = $get['codigo'];

                    if ($codigo > 0) {
                        $tipoDeDespesa = $tipoDeDespesaC->getTipoDeDespesa($codigo);
                        $nomeBotao = "botao-alterar.png";
                    } else {
                        $tipoDeDespesa = new TipoDeDespesa();
                    }
                }
                ?>

                <form  id="fContato" method="get">
                    <fieldset id="dados">
                        <legend>Dados da TipoDeDespesa</legend>
                        <input type="hidden" name="acao" value="gravar"/>
                        <p>Código:<input type="text" value="<?php echo $tipoDeDespesa->getCodigo(); ?>" name="codigo" id="cNome" readonly > </p>
                        <p><label tabindex="0" for="cDescricao">Descricao:</label> <input type="text" value="<?php echo $tipoDeDespesa->getDescricao(); ?>" name="descricao" id="cDescricao" size="20" maxlength="30" placeholder="Nome Completo"> </p>
                    </fieldset>
                    <input type="image" name="tEnviar"  src=<?php echo "_imagens/{$nomeBotao}" ?> />
                </form>
                <?php include('rodape.php'); ?>
            </body>
</html>
