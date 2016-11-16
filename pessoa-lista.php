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
                $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                $pessoaC = new PessoaController();

                if (isset($post)) {
                    $codigo = $post['codigo'];
                    $nome = $post['nome'];
                    $endereco = $post['endereco'];
                    $telefone = $post['telefone'];

                    if ($codigo > 0) {
                        $pessoa = $pessoaC->getPessoa($codigo);
                    } else {
                        $pessoa = new Pessoa();
                    }

                    $pessoa->setNome($nome);
                    $pessoa->setEndereco($endereco);
                    $pessoa->setTelefone($telefone);

                    if ($pessoaC->edit($pessoa) > 0) {
                        echo "Pessoa Atualizada com Sucesso!";
                    }
                }

                $pessoas = $pessoaC->getListaPessoas();
                $total = count($pessoas);
                ?>

                <table id="tabelaspec" width="85%" border="0" cellspacing="2" cellpadding="0">
                    <tr>
                        <td colspan="5"><a href="pessoa.php?codigo=0"> Inserir Nova Pessoa </a> </td>
                    </tr>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                    </tr>

                    <?php
                    if ($total > 0) {
                        foreach ($pessoas as $p) {
                            echo "<tr>";
                            echo "<td> {$p->getCodigo()}</td>";
                            echo "<td> {$p->getNome()}</td>";
                            echo "<td> {$p->getEndereco()}</td>";
                            echo "<td> {$p->getTelefone()}</td>";
                            echo "<td> <a href='pessoa.php?codigo={$p->getCodigo()}'>Editar</a></td>";
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
