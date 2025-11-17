<?php
namespace Library\Traits;

trait HasUniqueID {
    private string $uuid;

    private function generateID(): void {
        $this->uuid = uniqid('id_', 'true');
    }

    public function getUniqueID(): string {
        return $this->uuid;
    }

}