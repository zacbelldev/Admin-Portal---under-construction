<?php

function onlineSalesConnect() {
    
    $server = "127.0.0.1";
    $database = "xxxxxxxxxxxxxxxxxxxxxxxx";

// MBS Production:
//    $server = "127.0.0.1";
//    $database = "xxxxxxxxxxxxxxxxxxxxxxxx";
//    $username = "xxxxxxxxxxxxxxxxxxxxxxxx";
//    $password = "xxxxxxxxxxxxxxxxxxxxxxxx";

// LOCAL HOST TESTING:
    $server = "localhost";
    $database = "xxxxxxxxxxxxxxxxxxxxxxxx";
    $username = 'xxxxxxxxxxxxxxxxxxxxxxxx';
    $password = 'xxxxxxxxxxxxxxxxxxxxxxxx';

    $dsn = 'mysql:host=' . $server . ';dbname=' . $database;
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $onlineSalesDeptDB = new PDO($dsn, $username, $password, $options);
//        echo 'connection successful';
        return $onlineSalesDeptDB;
    } catch (PDOException $exc) {
//        echo $exc->getTraceAsString();
//        echo 'connection failed';
        header('Location: /index.php?action=error');
        exit;
    }
}