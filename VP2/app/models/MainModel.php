<?php
namespace Models;
class Database {
    function __construct() {
        $capsule = new Capsule;
        $capsule->addConnection([
            "driver" => DBDRIVER,
            "host" => DBHOST,
            "database" => DBNAME,
            "username" => DBUSER,
            "password" => DBPASS,
            "charset" => "utf8",
            "collation" => "utf8_unicode_ci",
            "prefix" => "",
        ]);

        $capsule->bootEloquent();
    }
}