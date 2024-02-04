<?php

class Dbh
{
    protected function connect()
    {
        try {
            $username = 'root';
            $password = '';
            $dbh = new PDO(
                'mysql:host=localhost;dbname=database_IRS',  
                $username , 
                $password
            );
            return $dbh;
        } catch (PDOException $e) {
            error_log("Database connection failed: " . $e->getMessage());
            header("location: index.php?error=database_connection_failed");           
            die();
        }
    }
}