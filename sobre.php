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

            <section id="corpo">
                <article id="noticia-principal">
                    <header id="cabecalho-artigo">
                        <hgroup>
                            <h3>Inicio > Home</h3>
                            <h2>por {seu nome}</h2>

                            <h3 class="direita">Atualizado em 30/Setembro/2016</h3>

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