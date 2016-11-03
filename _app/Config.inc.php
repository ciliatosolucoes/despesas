<?php

// AUTO LOAD DE CLASSES ####################
function __autoload($Class) {

//    $dirName = 'class';
//
//    if (file_exists("{$dirName}/{$Class}.class.php")):
//        require_once("{$dirName}/{$Class}.class.php");
//    else:
//        die("Erro ao incluir {$dirName}/{$Class}.class.php<hr>");
//    endif;

    $cDir = array('Conn', 'controller', 'dao', 'model');
    $iDir = null;

    foreach ($cDir as $dirName):
        if (!$iDir && file_exists(__DIR__ . "\\{$dirName}\\{$Class}.class.php") && !is_dir(__DIR__ . "\\{$dirName}\\{$Class}.class.php")):
            include_once(__DIR__ . "\\{$dirName}\\{$Class}.class.php");
            $iDir = true;
        endif;
    endforeach;

    if (!$iDir):
        trigger_error("Não foi possível incluir {$Class}.class.php", E_USER_ERROR);
        die;
    endif;
}
