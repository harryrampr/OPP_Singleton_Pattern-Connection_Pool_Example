<?php

namespace Tests;

use App\Connection;
use PHPUnit\Framework\TestCase;

/**
 * Class ConnectionTest
 *
 * This class contains unit tests for the Connection class.
 */
class ConnectionTest extends TestCase
{
    /**
     * Test case for the Connection class constructor.
     *
     * This test checks if the Connection object is initialized correctly
     * with the provided description and a valid created time.
     *
     * @return void
     */
    public function testConstructor(): void
    {
        $description = 'Test Connection';
        $connection = new Connection($description);

        $this->assertInstanceOf(Connection::class, $connection);
        $this->assertSame($description, $connection->description);
        $this->assertIsInt($connection->createdTime);

        $currentTime = time();
        $this->assertGreaterThanOrEqual($currentTime - 1, $connection->createdTime);
        $this->assertLessThanOrEqual($currentTime, $connection->createdTime);
    }
}