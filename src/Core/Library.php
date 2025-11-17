<?php

namespace Library\Core;

use Library\Contracts\Borrowable;

class  Library
{
    private array $items = [];
    private array $members = [];

    public function addLibraryItem(LibraryItem $item)
    {
        $this->items[] = $item;
    }

    public function registerMember(Member $member)
    {
        $this->members[] = $member;
    }

    public function lendItem(Member $member, LibraryItem $item)
    {
        if (!$item instanceof Borrowable) {
            echo "Ошибка! {$item->getSummary()} не одалживаемое издание" . "<br>";
            return;
        }

        if (!$item->isAvailable()) {
            echo "Ошибка! {$item->getSummary()} уже на руках" . "<br>";
            return;
        }

        $item->borrow();
        $member->borrowItem($item);
        echo "Успешный успех!" . "<br>" . "Мы выдали {$item->getSummary()} пользователю {$member->getName()}";
    }

    public function acceptReturn(LibraryItem $item) {
        if (!$item instanceof Borrowable) {
            echo "Ошибка!" . "<br>" . "{$item->getSummary()}" . " не относится к изданиям, которые можно взять =(" . "<br>";
            return;
        }

        $item->returnItem();

        //ищем кто взял и удаляем из списка
        foreach ($this->members as $member) {
            foreach ($member->getBorrowedItems() as $borrowedItem) {
                if ($borrowedItem->getUniqueID() === $item->getUniqueID()){
                    $member->returnItem($item);
                    echo "Принят возврат " . "{$item->getSummary()}" . " от пользователя: " . "{$member->getName()}" . "<br>";
                    return;
                }
            }
        }
    }
}
