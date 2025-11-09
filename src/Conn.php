<?php 

namespace Ralfaro\UserManagement;

use Dotenv\Dotenv;

class Conn {
    public function getConn(): ?\PDO {
        try {
            // Load .env file
            $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
            $dotenv->load();

            // Use environment variables from .env file
            $host = $_ENV['MYSQLHOST'];
            $port = $_ENV['MYSQLPORT'];
            $db   = $_ENV['MYSQLDATABASE'];
            $user = $_ENV['MYSQLUSER'];
            $pass = $_ENV['MYSQLPASSWORD'];
            
            $dsn = "mysql:host={$host};port={$port};dbname={$db};charset=utf8mb4";

            $options = [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            return new \PDO($dsn, $user, $pass, $options);
        } catch (\Throwable $th) {
            // In production you may want to log the error rather than echoing
            error_log("DB connection error: " . $th->getMessage());
            echo "Database connection error.";
            return null;
        }
    }
}



?>