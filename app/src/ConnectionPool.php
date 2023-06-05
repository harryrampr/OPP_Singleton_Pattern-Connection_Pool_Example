<?php declare(strict_types=1);

namespace App;

use App\Connection;

class ConnectionPool
{
    private static array $instances = [];
    private array $connections;

    private function __construct()
    {
        // Private constructor to prevent direct instantiation
        $this->connections = [];
        // Initialize connections in the pool
    }

    public static function getInstance(): ConnectionPool
    {
        $class = ConnectionPool::class;
        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new ConnectionPool();
        }
        return self::$instances[$class];
    }

    public function getConnection(): Connection
    {
        if (empty($this->connections)) {
            // Create a new connection
            return $this->createNewConnection();
        } else {
            // Reuse an existing connection from the pool
            return array_shift($this->connections);
        }
    }

    private function createNewConnection(): Connection
    {
        return new Connection();
    }

    public function releaseConnection(Connection $connection): void
    {
        // Return the connection to the pool
        $this->connections[] = $connection;
    }

    public function poolCount(): int
    {
        return count($this->connections);
    }
    // Other methods for managing the connection pool
}