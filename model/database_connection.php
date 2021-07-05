<?php
/*
Author: John Gray
Last Revision: 05.05.14
File Name: database_connection.php
Description: Connects to the database via PDO 
*/

    $dsn = 'mysql:host=localhost;dbname=dbw2_db';
    $username = 'root';
    $password = 'root';
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('./errors/database_error.php');
        exit();
    }
?>