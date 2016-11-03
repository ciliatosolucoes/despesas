<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conn
 *
 * @author clebe
 */
class Conn {
    private static $Host = "localhost";
    private static $User = "root";
    private static $Pass = "123456";
    private static $dbsa = "projetophp";
    private static $Connect = null;
    
    private static function Conectar(){
        try {
            if (self::$Connect == null):
                $dsn = 'mysql:host='. self::$Host . 
                       ';dbname=' . self::$dbsa;
                $option = [PDO::MYSQL_ATTR_INIT_COMMAND =>
                        'SET NAMES UTF8'];
                self::$Connect = new PDO($dsn, 
                        self::$User, self::$Pass, $option);
            endif;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die;
        }
        self::$Connect->setAttribute(PDO::ATTR_ERRMODE, 
                PDO::ERRMODE_EXCEPTION);
        return self::$Connect;
    }
      
    public static function getConn(){
        return self::Conectar();
    }
    
}
