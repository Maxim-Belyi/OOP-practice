<?php
namespace Library\Core;

use Library\Traits\HasUniqueID;

abstract class LibraryItem {
    use HasUniqueID;

    protected string $title;

    public function __construct(string $title) {
        $this->title = $title;
        $this->generateID();
    }

    public function getTitle(){
        return $this->title;
    }

    abstract public function getSummary();
}