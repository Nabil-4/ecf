<?php 
$sql ="CREATE TABLE IF NOT EXISTS nabil_connexion (
            id INT UNSIGNED AUTO_INCREMENT,
            ip VARCHAR(20),
            identifiant VARCHAR(50),
            date_connexion DATETIME,

            PRIMARY KEY (id)
            )
            CHARACTER SET utf8 COLLATE utf8_general_ci,
            ENGINE = INNOBD
        ";

        $sth = $dbh -> query($sql);
        
        $ip = $_SERVER['REMOTE_ADDR'];

        $sql ="INSERT INTO nabil_connexion
               VALUES (id, '$ip', '$id', NOW())
        ";

        $sth = $dbh -> query($sql);