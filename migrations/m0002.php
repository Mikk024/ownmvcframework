<?php

use App\Core\Application;

class m0002 {

    public function up()
    {
        $db = Application::$app->db;
        $SQL = "ALTER TABLE users ADD password VARCHAR(512) NOT NULL";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "ALTER TABLE users DROP password";
        $db->pdo->exec($SQL);
    }
}



?>