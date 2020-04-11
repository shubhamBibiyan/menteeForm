<?php
    $dsn = "mysql:host=localhost; dbname=resultchecking";
    $username = "shubham";
    $password = "12345";
    
    try{
        $db = new PDO($dsn, $username, $password);
    
        //set pdo error mode to exception
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //display that database is successfully connected.
        echo "Connected to the database";
    }
    catch(PDOException $ex){
        echo "Connection failed due to ".$ex->getMessage();
    }
?>