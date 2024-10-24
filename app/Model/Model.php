<?php
namespace App\Model;

class Model 
{

    public static function connect()
    {
        \ORM::configure('mysql:host=localhost;dbname=recipes');
        \ORM::configure('username', 'root');
        \ORM::configure('password', '');
    }

    public static function findAll()
    {
        $table = static::getTable();
        return \ORM::forTable($table)->findMany();
    }

    public static function findOne($id)
    {
        $table = static::getTable();
        return \ORM::forTable($table)->findOne($id);
    }

    public static function table()
    {
        $table = static::getTable();
        return \ORM::forTable($table);
    }

    

   


}