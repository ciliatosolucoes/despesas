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
        <link rel="stylesheet" type="text/css" href="_css/estilo.css"/>
    </head>
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

            if ($codigo>0){
            $pessoa = $pessoaC->getPessoa($codigo);
            }else{
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
                <td><a href="PessoaIU.php"> Inserir Nova Pessoa </a> </td>
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
                    echo "<td> {$p->getCodigo()}</td>";
                    echo "<td> {$p->getNome()}</td>";
                    echo "<td> {$p->getEndereco()}</td>";
                    echo "<td> {$p->getTelefone()}</td>";
                    echo "<td> <a href='PessoaIU.php?codigo= {$p->getCodigo()}'> Alterar </a></td>";
                }
            }
            ?>
            <tr>
                <th colspan="3">Total: <?php echo $total; ?> </th>
            </tr>
        </table>
    </body>
</html>
