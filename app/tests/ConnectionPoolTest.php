<?php

namespace Tests;

use App\ConnectionPool;
use App\Connection;
use PHPUnit\Framework\TestCase;

/**
 * Class ConnectionPoolTest
 *
 * This class contains unit tests for the ConnectionPool class.
 */
class ConnectionPoolTest extends TestCase
{
    /**
     * Test case for getInstance method of ConnectionPool.
     *
     * This test checks if the getInstance method of ConnectionPool returns the same instance
     * when called multiple times.
     *
     * @return void
     */
    public function testGetInstance(): void
    {
        $instance1 = ConnectionPool::getInstance();
        $instance2 = ConnectionPool::getInstance();

        $this->assertInstanceOf(ConnectionPool::class, $instance1);
        $this->assertSame($instance1, $instance2);
    }

    /**
     * Test case for getConnection method of ConnectionPool.
     *
     * This test checks if the getConnection method of ConnectionPool returns different
     * Connection instances each time it is called, when pool is empty
     *
     * @return void
     */
    public function testGetConnection(): void
    {
        $pool = ConnectionPool::getInstance();

        $connection1 = $pool->getConnection();
        $connection2 = $pool->getConnection();

        $this->assertInstanceOf(Connection::class, $connection1);
        $this->assertInstanceOf(Connection::class, $connection2);
        $this->assertNotSame($connection1, $connection2);
    }

    /**
     * Test case for releaseConnection method of ConnectionPool.
     *
     * This test checks if the releaseConnection method of ConnectionPool correctly adds
     * the released connection back to the pool.
     *
     * @return void
     */
    public function testReleaseConnection(): void
    {
        $pool = ConnectionPool::getInstance();
        $connection = $pool->getConnection();
        $initialCount = $pool->poolCount();

        $pool->releaseConnection($connection);
        $finalCount = $pool->poolCount();

        $this->assertEquals($initialCount + 1, $finalCount);
    }

    /**
     * Test case for connection pooling in ConnectionPool.
     *
     * This test checks if the ConnectionPool correctly reuses a released connection
     * when getConnection is called again.
     *
     * @return void
     */
    public function testConnectionPooling(): void
    {
        $pool = ConnectionPool::getInstance();
        $connection1 = $pool->getConnection();

        // Release the connection back to the pool
        $pool->releaseConnection($connection1);

        // Get a new connection
        $connection2 = $pool->getConnection();

        $poolFinalCount = $pool->poolCount();

        $this->assertSame($connection1, $connection2);
        $this->assertSame($poolFinalCount, 0);
    }
}