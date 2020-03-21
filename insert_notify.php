<?php

    $username =  'root'; 
    $password =    '';      

    try {
        $PDO = new PDO('mysql:host=localhost;dbname=teste', $username, $password);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    
    $author = $_POST['author'];
    $comment = $_POST['comment'];

    $timestart = time();

    if (isset($_POST['timestamp'])) {
        $timestamp = $_POST['timestamp'];
    } else {
        $get_time = $PDO->prepare("SELECT NOW() as now");
        $get_time->execute();
        $row = $get_time->fetchObject();

        $timestamp = $row->now;
    }

    
    $sql = $PDO->prepare("INSERT INTO notifications(author, comment, timestamp) VALUES('$author', '$comment', '$timestamp')");
    $sql->execute();
    /* ->fetchObject() */
    


    var_dump($sql);

    



