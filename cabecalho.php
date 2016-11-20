<header id="cabecalho">
    <hgroup>
        <h1>Despesas.</h1>
        <?php
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (isset($_SESSION["login"])) {
            echo "Usuario: {$_SESSION["login"]} <br/>";
            ?>
            <form method="get" action="logout.php" >
                <input type="hidden" name="acao" value="logout"/>
                <input type="submit" value="Logout" style="width: 100px;"/>
            </form>

            <?php
        }
//        }
        ?>
    </hgroup>
    <nav id="menu">
        <h1>Menu Principal</h1>
        <ul type="disc">
            <li><a href="index.php">Home</a></li>
            <li><a href="pessoa-lista.php">Pessoa</a></li>
            <li><a href="tipodedespesa-lista.php">Tipo De Despesa</a></li>
            <li><a href ="sobre.php">Sobre</a></li>
        </ul>
    </nav>
</header>
