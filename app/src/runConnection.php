<?php declare(strict_types=1);
require_once __DIR__ . '/../../vendor/autoload.php';

use App\ConnectionPool;

/**
 * Display the number of connections in the pool.
 *
 * @param object $pool The ConnectionPool object.
 * @return void
 */
function ConnInPool(object $pool): void
{
    echo '<h2 class="pool">Connections in Pool: ', $pool->poolCount(), ':</h2>', PHP_EOL;
}

/**
 * Display the connection details.
 *
 * @param object $connection The Connection object.
 * @return void
 */
function ShowConnDetails(object $connection): void
{
    echo '<p>', $connection->description, ' Created: ',
    gmdate('m-d-Y H:i:s', $connection->createdTime), '</p>', PHP_EOL;
}

// Display the title of the connections pool simulation.
echo '<h1>Connections Pool Simulation</h1>', PHP_EOL;

// Get an instance of the ConnectionPool.
$connectionPool = ConnectionPool::getInstance();

ConnInPool($connectionPool);

// New connection, since pool is empty
echo "<div class=\"conn\">\n<h2>Request Connection:</h2>", PHP_EOL;
$connection1 = $connectionPool->getConnection();
ShowConnDetails($connection1);
echo '</div>', PHP_EOL;
ConnInPool($connectionPool);

// Wait and release the connection for reuse
sleep(3);
echo "<div class=\"conn\">\n<h2>Release Connection</h2>\n</div>", PHP_EOL;
$connectionPool->releaseConnection($connection1);
ConnInPool($connectionPool);

// Reused connection, since pool had a one connection
echo "<div class=\"conn\">\n<h2>Request Connection:</h2>", PHP_EOL;
$connection2 = $connectionPool->getConnection();
ShowConnDetails($connection2);
echo '</div>', PHP_EOL;
ConnInPool($connectionPool);

// New connection, since pool is empty
echo "<div class=\"conn\">\n<h2>Request Connection:</h2>", PHP_EOL;
$connection3 = $connectionPool->getConnection();
ShowConnDetails($connection3);
echo '</div>', PHP_EOL;
ConnInPool($connectionPool);