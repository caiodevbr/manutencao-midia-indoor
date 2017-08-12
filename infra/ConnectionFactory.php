<?php

/**
 * Description of ConnectionFactory
 *
 * @author miolivc
 */
class ConnectionFactory {
    private $host = "localhost";
    private $port = "5432";
    private $user = "postgres";
    private $password = "";
    
    public static function getConnection() {
        $connection_string = "host='{$host}' port='{$port}' user='{$user}'";
        $conn = pg_connect($connection_string);
        return $conn;
    }
    
}
