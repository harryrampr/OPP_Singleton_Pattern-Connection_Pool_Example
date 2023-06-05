<?php declare(strict_types=1);

namespace App;

/**
 * Class Connection
 *
 * Represents a connection object.
 */
class Connection
{
    /**
     * @var int The timestamp when the connection was created.
     */
    public int $createdTime;

    /**
     * @var string The description of the connection.
     */
    public string $description;

    /**
     * Connection constructor.
     *
     * Initializes a new Connection object with the provided description and sets
     * the createdTime property to the current timestamp.
     *
     * @param string $description The description of the connection (default: 'A Connection').
     */
    public function __construct(string $description = 'A Connection')
    {
        $this->createdTime = time();
        $this->description = $description;
    }
}