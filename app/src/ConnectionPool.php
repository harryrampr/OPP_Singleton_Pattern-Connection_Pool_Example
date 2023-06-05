<?php declare(strict_types=1);

namespace App;

use App\Connection;

/**
 * The ConnectionPool class represents a pool of connections.
 * It allows obtaining and releasing connections for efficient reuse.
 */
class ConnectionPool
{
    /**
     * An array to hold the instances of the ConnectionPool class.
     *
     * @var array
     */
    private static array $instances = [];

    /**
     * An array to hold the connections in the pool.
     *
     * @var array
     */
    private array $connections;

    /**
     * Private constructor to prevent direct instantiation.
     */
    private function __construct()
    {
        // Initialize connections in the pool
        $this->connections = [];
    }

    /**
     * Returns the instance of the ConnectionPool class.
     *
     * @return ConnectionPool
     */
    public static function getInstance(): ConnectionPool
    {
        $class = ConnectionPool::class;
        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new ConnectionPool();
        }
        return self::$instances[$class];
    }

    /**
     * Returns a connection from the pool.
     * If the pool is empty, creates a new connection.
     *
     * @return Connection
     */
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

    /**
     * Creates a new connection and returns it.
     *
     * @return Connection
     */
    private function createNewConnection(): Connection
    {
        return new Connection();
    }

    /**
     * Releases a connection back to the pool.
     *
     * @param Connection $connection The connection to be released.
     * @return void
     */
    public function releaseConnection(Connection $connection): void
    {
        // Return the connection to the pool
        $this->connections[] = $connection;
    }

    /**
     * Returns the count of connections in the pool.
     *
     * @return int
     */
    public function poolCount(): int
    {
        return count($this->connections);
    }

    // Other methods for managing the connection pool
}