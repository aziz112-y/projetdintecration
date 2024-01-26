<?php
class connection
{
    public function getConnection()
    {
        $dbname = "mysql:host=mysql-zimys2024.alwaysdata.net;dbname=zimys2024_reclamation";
        $user = "zimys2024";
        $pass = "isetrades2024";
        $db = new PDO($dbname, $user, $pass);
        return $db;
    }
    

}