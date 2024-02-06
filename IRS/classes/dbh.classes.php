<?php
class Dbh
{
    protected function connect()
    {
        require_once('vendor/autoload.php');
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];  

        try {
            $dbh = new PDO(
                "mysql:host=$host;dbname=$dbname",
                $username,
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