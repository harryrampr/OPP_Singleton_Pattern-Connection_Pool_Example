<?php declare(strict_types=1);

namespace App;

class Connection
{
    public int $createdTime;
    public string $description;

    public function __construct(string $description = 'A Connection')
    {
        $this->createdTime = time();
        $this->description = $description;
    }

}