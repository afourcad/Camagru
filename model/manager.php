<?php

namespace Adrien\Blog\Model;

class Manager{
   
    protected function dbConnect()
    {
        require("C:\wamp64\www\Camagru\config\database.php");
        $db = new \PDO($DB_DNS . ';charset=utf8', $DB_USER, $DB_PASSWORD);
        return $db;
    }
}