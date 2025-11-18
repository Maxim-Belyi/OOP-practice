<?php

namespace Library\Items;

use Library\Core\LibraryItem;
use Library\Contracts\Borrowable;

class Book extends LibraryItem implements Borrowable
{
    private string $author;
    private bool $isBorrowed = false;

    public function __construct(string $title, string $author)
    {
        parent::__construct($title);
        $this->author = $author;
    }

    public function getSummary()
    {
        return "<u>'{$this->title}'</u> " . "<strong>Автор:</strong> " . "{$this->author}"  . "<br>";
    }

    public function borrow(): void
    {
        $this->isBorrowed = true;
    }

    public function returnItem(): void
    {
        $this->isBorrowed = false;
    }

    public function isAvailable(): bool
    {
        return !$this->isBorrowed;
    }


}
