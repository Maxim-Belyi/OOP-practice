<?php

namespace Library\Items;

use Library\Core\LibraryItem;

class Magazine extends LibraryItem
{
    private int $issueNumber;

    public function __construct(string $title, int $issueNumber)
    {
        parent::__construct($title);
        $this->issueNumber = $issueNumber;
    }

    public function getSummary()
    {
        return "<strong>Журнал:</strong> " . "{$this->title}" . "<br>" . "Выпуск №: " . "{$this->issueNumber}" . "<br>";
    }
}