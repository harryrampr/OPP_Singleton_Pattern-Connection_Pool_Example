<?php declare(strict_types=1);
require_once __DIR__ . '/../../vendor/autoload.php';

use App\ConnectionPool;

echo '<h1>Connections Pool Simulation</h1>', PHP_EOL;
$connectionPool = ConnectionPool::getInstance();
ConnInPool($connectionPool);

// New connection, since pool is empty
echo "<div class=\"conn\">\n<h2>Request Connection:</h2>", PHP_EOL;
$connection1 = $connectionPool->getConnection();
ShowConnDetails($connection1);
echo '</div>', PHP_EOL;
ConnInPool($connectionPool);

sleep(3);
echo "<div class=\"conn\">\n<h2>Release Connection</h2>\n</div>", PHP_EOL;
$connectionPool->releaseConnection($connection1);
ConnInPool($connectionPool);

// Recycled connection, since pool had a one connection
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

function ShowConnDetails(object $connection): void
{
    echo '<p>', $connection->description, ' Created: ',
    gmdate('m-d-Y H:i:s', $connection->createdTime), '</p>', PHP_EOL;
}

function ConnInPool(object $pool): void
{
    echo '<h2 class="pool">Connections in Pool: ', $pool->poolCount(), ':</h2>', PHP_EOL;
}