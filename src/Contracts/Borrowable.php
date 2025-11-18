<?php

namespace Library\Contracts;

interface Borrowable
{
    public function borrow(): void;

    public function returnItem(): void;

    public function isAvailable(): bool;
}