<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <!--Título da página-->
        <title>Página do {nome do aluno}</title>
        <link rel="stylesheet" href="_css/estilo.css"/>
        <link rel="stylesheet" href="_css/form.css"/>
    </head>
    <body>
        <div id="interface">
            <!--Cabeçalho da página-->
            <?php
            include('cabecalho.php');
            require "_app/Config.inc.php";

            $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if (isset($post)) {
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    session_start();
                }

                $usuarioC = new UsuarioController();

                $login = $post['login'];
                $senha = $post['senha'];
                $usuario = $usuarioC->logar($login, $senha);
                $_SESSION['login'] = $usuario->getLogin();
                echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=index.php'>";
            }
            ?>

            <section id = "corpo">
                <article id = "noticia-principal">
                    <header id = "cabecalho-artigo">
                        <hgroup>
                            <h3>Inicio > Home</h3>
                            <h2>por Ciliato Soluções.</h2>
                            <h3 class = "direita">Atualizado em 20/Novembro/2016</h3>

                            <form method="post" action="">
                                <label for="login" >Login:</label><input type="text" id="login" name="login" maxlength="20" placeholder="Usuário"/>
                                <label for="senha"> Senha:</label><input type="password" id="senha" name="senha" maxlength="20" placeholder="Senha"/>
                                <input type="submit" id="btnEnviar" value="Logar"/>
                            </form>

                        </hgroup>
                    </header>
                    <h2>Html</h2>
                    <p>

                    </p>

                </article>
            </section>
            <?php include('rodape.php'); ?>
        </div>
    </body>
</html>