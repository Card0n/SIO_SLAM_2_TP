<?php
 
namespace App\Service;
 
class Database
{
    private $pdo;
 
    public function __construct(string $dsn)
    {
        try {
            // Parse the DATABASE_URL
            $url = parse_url($dsn);
            $host = $url['host'] ?? '127.0.0.1';
            $port = $url['port'] ?? '3306';
            $dbname = ltrim($url['path'] ?? '', '/');
            $user = $url['user'] ?? '';
            $pass = $url['pass'] ?? '';
 
            // Build PDO DSN
            $pdoDsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
 
            $this->pdo = new \PDO($pdoDsn, $user, $pass, [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            ]);
        } catch (\PDOException $e) {
            throw new \Exception('Database connection failed: ' . $e->getMessage());
        }
    }
 
    public function getPdo(): \PDO
    {
        return $this->pdo;
    }
}