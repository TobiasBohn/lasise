<?php
class helper{
    // DB Connect
    public static function db(){
        $db = mysqli_connect("localhost", "USER", "PASSWORD", "DATENBANK");
        if(!$db){
          exit("Verbindungsfehler: ".mysqli_connect_error());
        }
        $db->set_charset("utf8");
        return $db;
    }
}