<?php

include_once 'database.php';

class Inseert_notify extends Database
{
    public function __construct()    
    {
        parent::__construct();
    }

    public function index() 
    {
        $author = $_POST['author'];
        $comment = $_POST['comment'];
    
        $timestart = time();
    
        if (isset($_POST['timestamp'])) {
            $timestamp = $_POST['timestamp'];
        } else {
            $get_time = $this->connection->prepare("SELECT NOW() as now");
            $get_time->execute();
            $row = $get_time->fetchObject();
    
            $timestamp = $row->now;
        }
    
        
        $sql = $this->connection->prepare("INSERT INTO notifications(author, comment, timestamp) VALUES('$author', '$comment', '$timestamp')");
        $sql->execute();
        /* ->fetchObject() */
        
        
        var_dump($sql);
            
    }
}

   /*  $username =  'root'; 
    $password =    '';      

    try {
        $PDO = new PDO('mysql:host=localhost;dbname=teste', $username, $password);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    } */

    
   



