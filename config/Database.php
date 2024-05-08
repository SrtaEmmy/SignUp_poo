<?php 
 
class Database{
    public static function connect(){
        $connection = new mysqli('localhost', 'root', '', 'login_poo');
        $connection->query("SET NAMES 'utf8'");
        return $connection;
    }
}  
 
 
?>