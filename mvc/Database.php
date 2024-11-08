<?php


class Database
{
    public static function connect():PDO
    {
        return new PDO("mysql:host='localhost';dbname='testdb';",'root','');
    }
}