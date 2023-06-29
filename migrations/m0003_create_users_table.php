<?php

namespace app\migrations;

use yzh\phhpmvc\Application;


class m0003_create_users_table
{
    public \PDO $pdo;
    public function up()
    {
       $db = Application::$app->db;
       $SQL = "CREATE TABLE products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        sku VARCHAR(255) NOT NULL,
        productname VARCHAR(255) NOT NULL,
        status TINYINT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
       ) ENGINE=INNODB;";
       $db->pdo->exec($SQL); 

    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE users";
        $db->pdo->exec($SQL); 
    }
}
