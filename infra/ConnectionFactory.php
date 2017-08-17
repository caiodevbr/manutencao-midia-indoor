<?php

/**
 * Description of ConnectionFactory
 *
 * @author miolivc
 */
class ConnectionFactory {
    private $host = "127.0.0.1";
    private $port = 5432;
    private $user = "postgres";
    private $password = "postgres";
    private $dbname = "noticias";
    
    public static function getConnection() {
        $connection_string = "host=127.0.0.1 port=5432 dbname=noticias user=postgres password=postgres";
        return pg_connect($connection_string);
    }
    
}
