<?php

namespace Library\Core;

use Library\Traits\HasUniqueID;
use Library\Core\Library;

class Member
{
    use HasUniqueID;

    private string $name;
    private array $borrowedItems = [];

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->generateID();
    }

    public function getName(): string
    {
        return "<strong>{$this->name}</strong>" . "<br>";
    }

    public function borrowItem(LibraryItem $item): void
    {
        $this->borrowedItems[] = $item;
    }

    public function returnItem(LibraryItem $item): void
    {
        $this->borrowedItems = array_filter(
            $this->borrowedItems,
            fn($borrowedItem) => $borrowedItem->getUniqueID() !== $item->getUniqueID()
        );
    }

    public function getBorrowedItems(): array
    {
        return $this->borrowedItems;
    }
}