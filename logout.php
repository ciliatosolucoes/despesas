<?php

$get = filter_input_array(INPUT_GET, FILTER_DEFAULT);
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
var_dump($get);
if (isset($get) && isset($get['acao'])) {
    if ($get['acao'] == "logout") {
        session_destroy();
        header("Location: index.php");
    }
}
