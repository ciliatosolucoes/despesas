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
                $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                $tipoDeDespesaC = new TipoDeDespesaController();

                if (isset($post)) {
                    var_dump($post);

                    $codigo = $post['codigo'];
                    $descricao = $post['descricao'];

                    if ($codigo > 0) {
                        $tipoDeDespesa = $tipoDeDespesaC->getTipoDeDespesa($codigo);
                    } else {
                        $tipoDeDespesa = new TipoDeDespesa();
                    }

                    $tipoDeDespesa->setDescricao($descricao);

                    if ($tipoDeDespesaC->edit($tipoDeDespesa) > 0) {
                        echo "Tipo de Despesa Atualizada com Sucesso!";
                    }
                }

                $tiposDeDespesas = $tipoDeDespesaC->getTiposDeDespesas();
                $total = count($tiposDeDespesas);
                ?>

                <table id="tabelaspec" width="85%" border="0" cellspacing="2" cellpadding="0">
                    <tr>
                        <td colspan="5"><a href="tipodedespesa.php?codigo=0"> Novo </a> </td>
                    </tr>
                    <tr>
                        <th>Código</th>
                        <th>Descrição</th>
                    </tr>
                    <?php
                    if ($total > 0) {
                        foreach ($tiposDeDespesas as $p) {
                            echo "<tr>";
                            echo "<td> {$p->getCodigo()}</td>";
                            echo "<td> {$p->getDescricao()}</td>";
                            echo "<td> <a href='tipoDeDespesa.php?codigo={$p->getCodigo()}'>Editar</a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                    <tr>
                        <th colspan="3">Total: <?php echo $total; ?> </th>
                    </tr>
                </table>
                <?php include('rodape.php'); ?>
            </body>
</html>
