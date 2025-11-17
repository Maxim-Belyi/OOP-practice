<?php

namespace Library\Items;

use Library\Core\LibraryItem;

class Magazine extends LibraryItem
{
    private int $issueNumber;

    public function __construct(string $title, int $issueMember)
    {
        parent::__construct($title);
        $this->issueNumber = $issueNumber;
    }

    public function getSummary()
    {
        return "Журнал: " . "{$this->title}" . "Выпуск №: " . "{$this->issueNumber}";
    }
}