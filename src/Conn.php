<?php 

namespace Ralfaro\UserManagement;

class Conn {
    public function getConn(): ?\PDO {
        try {
            // Use environment variables (set these in Railway)
            $host = getenv('DB_HOST') ?: '127.0.0.1';
            $port = getenv('DB_PORT') ?: '3306';
            $db   = getenv('DB_NAME') ?: 'users_db';
            $user = getenv('DB_USER') ?: 'root';
            $pass = getenv('DB_PASS') ?: '';

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