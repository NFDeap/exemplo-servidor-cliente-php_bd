<?php 

class Database
    {	

        private $dsn = 'mysql:dbname=teste;host=localhost';
        private $user = 'root';
        private $password = '';
        protected $connection;

        public function __construct()
        {
            try {
               /*  $username =  'root';  
                $password =    '';      
                $PDO = new PDO('mysql:host=localhost;dbname=teste', $username, $password);
                $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $PDO; */

                $this->connection = new PDO($this->dsn, $this->user, $this->password);	
                return $this->connection;
            } catch (PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            }
        }

    }

