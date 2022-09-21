<?php

    //error reporting
    // ini_set('display_errors', 1); 
    // ini_set('display_startup_errors', 1); 
    // error_reporting(E_ALL);
    
    $dsn = "mysql:host=localhost;dbname=employees";
    $user="root";
    $password="root";
    //Check PDO connection
    try 
    {
        $pdo = new PDO($dsn, $user, $password);
        // echo "Connected successfully";
    } 
    catch(PDOException $e) 
    {
        echo "Connection failed: $e->getMessage()";
    }

?>